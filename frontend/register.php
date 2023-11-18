<?php 

	include 'function.php';
		if(isset($_POST['register'])){

			$reg = registrasi($_POST);

			// var_dump($reg);
			$password = $_POST['password'];
			echo password_hash($password, PASSWORD_DEFAULT);
			if($reg > 0){
				echo "<script>
					alert('Berhasil registrasi !');
					location.href='login.php';
				</script>";
			}
			else{
				echo mysqli_error($conn);
			}
		}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<style type="text/css">
		form{
			width: 250px;
		}
		label, input{
		left: 0;	
		}
	</style>
</head>
<body>

	<center><h1>Registrasi</h1>

	<form method="post">

				<label for="username">Username</label>
				<br>
				<input type="text" name="username" id="username">
				<br><br>
				<label for="password">Password</label>
				<br>
				<input type="password" name="password" id="password">
				<br><br>
				<label for="password1">Konfirmasi Password</label>
				<br>
				<input type="password" name="password1" id="password1">
				<br><br>
				<button type="submit" name="register">Register</button>
	
	</form>
</body>
</html>