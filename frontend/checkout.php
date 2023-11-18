<?php 
	session_start();
	$koneksi = new mysqli("localhost", "root","","ponselku");
	if (!isset($_SESSION["pelanggan"])) 
	{
		echo "<script>
		alert('Anda harus login dulu');
		location='main.php'; </script>";
	}
	elseif (empty($_SESSION["keranjang"])) 
	{
		echo "<script> alert('Periksa Keranjang Belanja Anda')
				location='keranjang.php'
			</script>";
	}
 ?>
 <html>
 <head>
 	<title>Checkout</title>
 	<link rel="stylesheet" type="text/css" href="main.css">
 </head>
 <body>
 	<?php include 'menu.php'; ?>
 	<section class="konten">
 		<div class="content">
 			<h2>Keranjang Belanja</h2>
 			<hr>
 			<table class="tabel tabel-bordered">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Produk</th>
 						<th>Harga</th>
 						<th>Jumlah</th>
 						<th>Subtotal</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $nomor=1; ?>
 					<?php $totalbelanja=0; ?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
					<?php 
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$subtotal = $pecah["harga_produk"]*$jumlah;
					 ?>
 					<tr>
 						<td><?php echo $nomor; ?></td>
 						<td><?php echo $pecah["nama_produk"]; ?></td>
						<td><?php echo number_format($pecah["harga_produk"]); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>IDR <?php echo number_format($subtotal); ?></td>
 					</tr>
 				</tbody>
 				<?php $nomor++; ?>
 				<?php $totalbelanja+=$subtotal; ?>
			<?php endforeach ?>
 				<tfoot>
 					<td colspan="4">Total belanja</td>
 					<td>IDR <?php echo number_format($totalbelanja); ?></td>
 				</tfoot>
 			</table>
 			<form method="post">
				<div class="row">
					<div class="content-outside">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']; ?>" class="form-control">
						</div>
					</div>
					<div class="content-outside">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>" class="form-control">
						</div>
					</div>
					<div class="content-outside">
						<select class="form-control" name="id_ongkir">
							<option value="">Pilih Ongkos Kirim</option>
							<?php 
							$ambil = $koneksi->query("SELECT * FROM ongkir");
							while($perongkir = $ambil->fetch_assoc()) : ?>
							<option value="<?php echo $perongkir["id_ongkir"]; ?>">
								<?php echo $perongkir['nama_kota']; ?> - 
								IDR <?php echo number_format($perongkir['tarif']); ?>
							</option>
						<?php endwhile ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap"></textarea>
				</div>
				<button class="btn-primary" name="checkout">Checkout</button>
			</form>
			<?php 
			if (isset($_POST["checkout"])) 
			{
				$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
				$id_ongkir = $_POST["id_ongkir"];
				$tanggal_beli = date("y-m-d");

				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
				$arrayongkir = $ambil->fetch_assoc();
				$nama_kota = $arrayongkir['nama_kota'];
				$tarif = $arrayongkir['tarif'];
				$alamat = $_POST['alamat'];

				$total_beli = $totalbelanja + $tarif;

				$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_beli','$total_beli','$nama_kota','$tarif','$alamat') ");

				$id_beli_baru = $koneksi->insert_id;
				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
				{
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' ");
					$perproduk = $ambil->fetch_assoc();

					$nama = $perproduk['nama_produk'];
					$harga = $perproduk['harga_produk'];
					$subharga = $perproduk['harga_produk']*$jumlah;
					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,subharga,jumlah) VALUES ('$id_beli_baru','$id_produk','$nama','$harga','$subharga','$jumlah') ");

					$koneksi->query("UPDATE produk SET stok = stok - $jumlah WHERE id_produk='$id_produk'");
				}

				unset($_SESSION['keranjang']);

				echo "<script>
				alert('Pembelian sukses');
				location='nota.php?id=$id_beli_baru';
				</script>";
			}

			 ?>
 		</div>
 	</section>
 </body>
 </html>