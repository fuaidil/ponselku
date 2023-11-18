<?php
	session_start(); 
	$koneksi = new mysqli("localhost","root","","ponselku");
	if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
	{
		echo "<script>
		alert('Anda harus login dulu');
		location='login.php'; </script>";
	}
	$idpem = $_GET["id"];
	$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
	$detailpem = $ambil->fetch_assoc();

	$idpel_beli = $detailpem["id_pelanggan"];
	$idpel_login = $_SESSION["pelanggan"]["id_pelanggan"];
	if ($idpel_login !== $idpel_beli) 
	{
		echo "<script>
		alert('Anda tidak berhak melihat data orang lain !');
		location='riwayat.php'; </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'menu.php'; ?>
	<div class="content">
		<h2>Konfirmasi Pembayaran</h2>
		<hr>
		<h4>Kirim bukti pembayaran Anda disini</h4>
		<div class="alert">Total tagihan Anda <b>IDR <?php echo number_format($detailpem["total_pembelian"]); ?></b></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" name="nama" class="form-control">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" name="bank" class="form-control">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" name="jumlah" class="form-control" min="1">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" name="bukti" class="form-control">
				<p>Foto bukti maksimal 2MB</p>
			</div>
			<button class="btn-primary" name="kirim">Kirim</button>
		</form>
		<?php
			if (isset($_POST["kirim"])) 
			{
				$namabukti = $_FILES["bukti"]["name"];
				$lokasibukti = $_FILES["bukti"]["tmp_name"];
				$namafiks = date("YmdHis").$namabukti;
				move_uploaded_file($lokasibukti, "../gambarbukti/$namafiks");
				$nama = $_POST["nama"];
				$bank = $_POST["bank"];
				$jumlah = $_POST["jumlah"];
				$tanggal = date("Y-m-d");
				$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

				$koneksi->query("UPDATE pembelian SET status_pembelian='Sudah kirim pembayaran' WHERE id_pembelian='$idpem' ");
				echo "<script>
				alert('Terima kasih telah mengirimkan bukti pembayaran');
				location='riwayat.php'; </script>";
			}
		?>
	</div>
</body>
</html>