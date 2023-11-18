<?php
  session_start();
  $koneksi = new mysqli("localhost","root","","ponselku");
  
  if (isset($_GET["login"])) 
  {
    $email = $_GET["email"];
    $password = $_GET["password"];
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password' ");
    $akuncocok = $ambil->num_rows;
    if ($akuncocok==1) 
    {
      $akun = $ambil->fetch_assoc();
      $_SESSION["pelanggan"] = $akun;
      echo "<script>
      alert('Login sukses'); 
      </script>";
      
      if (isset($_SESSION["keranjang"]) OR (!empty($_SESSION["keranjang"]))) 
      {
        echo "<script>
        location='checkout.php'; 
        </script>";
      }
      else
      {
        echo "<script>
        location='riwayat.php';
        </script>";
      }
    }
    else
    {
      echo "<script>
      alert('Login gagal, mohon periksa akun anda'); 
      location='main.php'; 
      </script>";
    }
  }
?>