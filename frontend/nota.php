<?php 
session_start();
$koneksi = new mysqli("localhost","root","","ponselku"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nota</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
	<body>
		<?php include 'menu.php'; ?>
		<section class="konten">
			<div class="content">
				<h2>Detail Pembelian</h2>
				<hr>
			<?php 
				$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
				ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
				WHERE pembelian.id_pembelian='$_GET[id]'");
				$detail = $ambil->fetch_assoc();
		 	?>
			<?php 
				$idpel_beli = $detail["id_pelanggan"];
				$idpel_login = $_SESSION["pelanggan"]["id_pelanggan"];
				
				if ($idpel_beli!=$idpel_login) 
				{
					echo "<script>
					alert('Anda tidak berhak melihat data orang lain !');
					location='riwayat.php'; </script>";
				}
			?>
		 	<div class="row nota">
		 		<div class="content-outside nota-beli">
		 			<h3>Pembelian</h3>
		 			<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
		 			Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
		 			Total : <?php echo number_format($detail['total_pembelian']); ?>
		 		</div>
		 		<div class="content-outside nota-pelanggan">
		 			<h3>Pelanggan</h3>
		 		 	<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
			 		<?php echo $detail['telepon_pelanggan'] ?><br>
			 		<?php echo $detail['email_pelanggan'] ?>
		 		</div>
		 		<div class="content-outside nota-kirim">
		 			<h3>Pengiriman</h3>
		 			<strong><?php echo $detail['nama_kota']; ?></strong><br>
		 			Ongkir : <?php echo number_format($detail['tarif']); ?><br>
		 			Alamat : <?php echo $detail['alamat'] ?>
		 		</div>
		 	</div>
			<table class="tabel tabel-bordered">
		 		<thead>
		 			<tr>
		 				<th>No</th>
		 				<th>Nama Produk</th>
		 				<th>Harga</th>
		 				<th>Jumlah</th>
		 				<th>Subtotal</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			<?php $nomor=1; ?>
		 			<?php $ambil = $koneksi->query("SELECT *FROM pembelian_produk WHERE id_pembelian='$_GET[id]'") ?>
		 			<?php while($pecah = $ambil->fetch_assoc()) : ?>
		 			<tr>
		 				<td><?php echo $nomor; ?></td>
		 				<td><?php echo $pecah['nama']; ?></td>
		 				<td><?php echo number_format($pecah['harga']); ?></td>
		 				<td><?php echo $pecah['jumlah']; ?></td>
		 				<td><?php echo number_format($pecah['subharga']); ?></td>
		 			</tr>
		 			<?php $nomor++; ?>
		 		<?php endwhile; ?>
		 		</tbody>
		 	</table>
			<div class="row">
		 		<div class="content-outside">
			 		<div class="alert">
			 				Silahkan melakukan pembayaran IDR <?php echo number_format($detail['total_pembelian']) ?> ke <br>
			 				<strong>BANK CIMB NIAGA 761-130668-4900 AN. Fuaidil Ikhrom</strong>
			 		</div>
		 		</div>
		 	</div>
			</div>
		</section>
	</body>
</html>