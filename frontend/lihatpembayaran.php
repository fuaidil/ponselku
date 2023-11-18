<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","ponselku");
	$idpem = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$idpem'");
	$data = $ambil->fetch_assoc();
	if (empty($data))
	{
		echo "<script>alert('Belum ada data pembayaran');
		location='riwayat.php'; </script>";
	}
	if ($_SESSION["pelanggan"]["id_pelanggan"]!==$data["id_pelanggan"]) 
	{
		echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain');
		location='riwayat.php'; </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lihat pembayaran</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'menu.php'; ?>
	<div class="content">
		<h2>Lihat Pembayaran</h2>
		<hr>
		<div class="row">
			<div class="content-outside">
				<table class="tabel tabel-bordered">
					<tr>
						<th>No</th>
						<td><?php echo $data['id_pembelian'] ?></td>
					</tr>
					<tr>
						<th>Nama</th>
						<td><?php echo $data['nama'] ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $data['bank'] ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo $data['tanggal'] ?></td>
					</tr>
					<tr>
						<th>Total Pembayaran</th>
						<td>IDR <?php echo number_format($data['jumlah']) ?></td>
					</tr>
				</table>
				<?php if ($data['status_pembelian']=='barang dikirim'): ?>
				<div class="alert">
					<b>No. Resi Pengiriman : <?php echo $data['resi_pengiriman'] ?></b>
				</div>	
				<?php endif ?>
			</div>
				<div class="col-md-3 col-md-offset-2">
					<img src="../gambarbukti/<?php echo $data['bukti']; ?>" class="img-lihat">
				</div>
		</div>
	</div>
</body>
</html>