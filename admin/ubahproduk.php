<h2>Ubah Produk</h2>
<hr>
<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk= '$_GET[id]'");

$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama Produk</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
 	</div>
 	<div class="form-group">
		<label>Harga (IDR)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<img src="../frontend/<?php echo $pecah['foto_produk']; ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Stok Produk</label>
		<input type="number" name="stok" class="form-control" min="1" value="<?php echo $pecah['stok']; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="20">
			<?php echo $pecah['deskripsi_produk']; ?>
		</textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>
 <?php 
 if (isset($_POST['ubah'])) 
 {
 	$namafoto = $_FILES['foto']['name'];
 	$lokasifoto = $_FILES['foto']['tmp_name'];
 	if(!empty($lokasifoto))
 	{
 		move_uploaded_file($lokasifoto, "../frontend/$namafoto");

 		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk='$_POST[harga]', stok='$_POST[stok]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]' ");

 	}
 	else
 	{
		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk='$_POST[harga]', stok='$_POST[stok]', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]' "); 		
 	}
 	echo "<script>
 		alert('Data telah diubah');
 		location='index.php?halaman=produk';
 		</script>
 	";
 }

  ?>