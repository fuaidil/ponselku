<?php 
	$koneksi = new mysqli("localhost","root","","ponselku");
	$keyword = $_GET["keyword"];
	$all = array();
	$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' ");
	while($data = $ambil->fetch_assoc())
	{
		$all[] = $data;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'menu.php'; ?>
	<div class="container">
		<h2>Hasil Pencarian : <?php echo $keyword; ?></h2>
		<hr>
		<?php if (empty($all)): ?>
			<div class="alert-cari">Produk <b><?php echo $keyword ?></b> tidak ditemukan</div>
		<?php endif ?>
		<div class="row">
			<?php foreach ($all as $key => $value): ?>
				
			<div class="content-outside">
				<div class="content-in">
					<img src="<?php echo $value['foto_produk'] ?>" class="img-responsive">
					<div class="caption">
						<h3><?php echo $value["nama_produk"] ?></h3>
						<h5>IDR <?php echo number_format($value["harga_produk"]) ?></h5>
						<a href="beli.php?id=<?php echo $value['id_produk'];  ?>" class="btn-primary">Buy</a>
						<a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>

</body>
</html>