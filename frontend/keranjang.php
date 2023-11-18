<?php 
	session_start();
	$koneksi = new mysqli("localhost","root","","ponselku");
	if (empty($_SESSION["keranjang"]) OR  !isset($_SESSION["keranjang"])) 
	{
		echo "<script>
		alert('Keranjang kosong, silahkan belanja dahulu');
		location='main.php'; 
		</script>";
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang</title>
 	<link rel="stylesheet" type="text/css" href="main.css">
 </head>
 <body>
 	<?php include 'menu.php'; ?>
    <section class="konten">
    	<div class="content">
    	<?php if (isset($_SESSION["pelanggan"])) : ?>
    		<h1>Keranjang Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h1>
    	<?php else: ?>
	    <h1>Keranjang Belanja</h1>
    	<?php endif ?>
	    <hr>
	    <table class="tabel tabel-bordered">
	    	<thead>
		    	<tr>
		    		<th>No</th>
		    		<th>Produk</th>
		    		<th>Harga</th>
		    		<th>Jumlah</th>
		    		<th>Subtotal</th>
		    		<th>Aksi</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
				<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subtotal = $pecah["harga_produk"]*$jumlah; ?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>IDR <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>IDR <?php echo number_format($subtotal); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>"  class="btn-hapus">Hapus</a>
					</td>
				</tr>
		    </tbody>
		    <?php $nomor++; ?>
		<?php endforeach ?>
	    </table>
	    <a href="main.php" class="btn-default">Lanjut Belanja</a>
		<a href="checkout.php" class="btn-primary">Checkout</a>
		</div>
	</section>
 </body>
 </html>