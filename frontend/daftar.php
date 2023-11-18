<?php 
	$koneksi = new mysqli("localhost","root","","ponselku");
	if (isset($_GET["daftar"])) 
	{
	$nama = $_GET["nama"];
	$email = $_GET["email"];
	$password = $_GET["password"];
	$telepon = $_GET["telepon"];
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
	$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) 
		{
			$cocok = $ambil->fetch_assoc();
			$_SESSION["pelanggan"] = $cocok;
			echo "<script>
				alert('Email sudah digunakan');
				location='menu.php';
				</script>";
		}
		else
		{
			$koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES('$email','$password','$nama','$telepon') ");
			echo "<script>
				alert('Registrasi sukses');
				location='main.php';
				</script>";
		}
	}
?>