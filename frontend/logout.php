<?php 
session_start();
session_destroy();

echo "<script>
alert('Anda telah logout');
location='main.php'; 
</script>";

 ?>