<?php 

	$conn = mysqli_connect('localhost', 'root', '', 'test');
	function registrasi($data){
		global $conn;
		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password1 = mysqli_real_escape_string($conn, $data["password1"]);


		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if(mysqli_num_rows($result) > 0 ){
			echo "<script>
			alert('username sudah ada !');
			</script>
			";
			return false;
		}

		// cek konfirmasi password
		if($password !== $password1){
			echo "<script>
				alert('password tidak sesuai !');
				</script>
			";
			return false;
		}
		$password = password_hash($password, PASSWORD_DEFAULT);

		

		$query = mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

		return mysqli_affected_rows($conn);
	}


 ?>