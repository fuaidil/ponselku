<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto_produk = $pecah['foto_produk'];
if (file_exists("../frontend/$frontend")) 
{
	unlink("../frontend/$frontend");
}

$koneksi->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");

echo "<script>
		alert('produk terhapus');
		location='index.php?halaman=produk';
</script>";

 ?>