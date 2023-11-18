<?php 
	session_start();
	$koneksi = new mysqli("localhost","root","","ponselku");
	$id_produk = $_GET["id"];
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$detail = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Produk</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'menu.php'; ?>
	<section class="konten">
		<div class="content">
			<div class="row">
				<div class="content-outside">
					<img src="<?php echo $detail['foto_produk']; ?>" width="400" class="img-detail">
				</div>
				<div class="content-outside">
					<h2><?php echo $detail['nama_produk'] ?></h2>
					<h4>IDR <?php echo number_format($detail['harga_produk']); ?></h4>
					<form method="post">
						<div class="form-group">
							<p>Stok : <?php echo $detail["stok"] ?></p>
							<div class="input-group">
								<input type="number" min="1" max="<?php echo $detail['stok'] ?>" name="jumlah" class="form-control" placeholder="Masukkan jumlah yang akan dibeli">
								<div class="input-group-btn">
									<button class="btn-primary" name="beli">Beli</button>
								</div>
							</div>
						</div>
					</form>
					<?php 
						if (isset($_POST["beli"])) 
						{
							$jumlah = $_POST["jumlah"];
							$_SESSION["keranjang"][$id_produk]=$jumlah;
							echo "<script>
								alert('Produk telah masuk ke keranjang');
								location='keranjang.php';
								</script>
							";
						}
					 ?>
					<?php echo $detail['deskripsi_produk'] ?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>