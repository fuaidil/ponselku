<?php 

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");

echo "<script>
		alert('Data pelanggan berhasil dihapus');
		location='index.php?halaman=pelanggan';
</script>";

 ?>