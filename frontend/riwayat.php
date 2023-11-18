<?php
	session_start(); 
	$koneksi = new mysqli("localhost","root","","ponselku");
	if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
	{
		echo "<script>
		alert('Anda harus login dulu');
		location='main.php'; </script>";
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Riwayat belanja</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'menu.php'; ?>
	<section class="konten">
		<div class="content">
			<h2>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h2>
			<table class="tabel tabel-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1;
					$idpel = $_SESSION["pelanggan"]["id_pelanggan"];
					$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = '$idpel'");
					while($data = $ambil->fetch_assoc()) : ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $data["tanggal_pembelian"]; ?></td>
						<td>
							<?php echo $data["status_pembelian"]; ?>
							<br>
							<?php if (!empty($data['resi_pengiriman'])): ?>
								No. Resi : <?php echo $data["resi_pengiriman"]; ?>
							<?php endif ?>
						</td>
						<td>IDR <?php echo number_format($data["total_pembelian"]); ?></td>
						<td>
							<a href="nota.php?id=<?php echo $data['id_pembelian']; ?>" class="btn-info">Nota</a>
							<?php if ($data["status_pembelian"]=="pending"): ?>
								<a href="pembayaran.php?id=<?php echo $data['id_pembelian']; ?>" class="btn-success">Kirim Pembayaran</a>
							<?php else: ?>
								<a href="lihatpembayaran.php?id=<?php echo $data['id_pembelian'] ?>" class="btn-warning">Lihat Pembayaran</a>
							<?php endif ?>
						</td>
					</tr>
				<?php $nomor++; ?>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>