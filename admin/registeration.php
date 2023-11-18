<?php 
  $koneksi = new mysqli("localhost","root","","ponselku");
  $kode = "admin456";
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Admin Register</h2>
               
                <h5>( Register yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New User ? Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                        <br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" name="nama" placeholder="Your Name" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Username" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="password2" placeholder="Retype Password" />
                                        </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="kode" placeholder="Admin Code" />
                                        </div>
                                     
                                     <button class="btn btn-success" name="daftar">Register</button>
                                    <hr />
                                    Already Registered ?  <a href="login.php" >Login here</a>
                                    </form>
                                    <?php 
                                        if (isset($_POST["daftar"])) 
                                        {
                                            $nama = $_POST["nama"];
                                            $username = $_POST["username"];
                                            $password = $_POST["password"];
                                            $password2 = $_POST["password2"];
                                            $_POST["kode"] == $kode;
                                                $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$username'");
                                                $cocok = $ambil->num_rows;
                                            if ($cocok==1)
                                            {
                                                $cck = $ambil->fetch_assoc();
                                                $_SESSION["admin"] = $cck;
                                                echo "<div class='alert alert-danger'>Username sudah digunakan</div>
                                                <meta http-equiv='refresh' content='1;url=registeration.php'>";
                                            }
                                            elseif ($password2 !== $password) 
                                            {
                                                echo "<div class='alert alert-danger'>Password tidak sesuai</div> 
                                                <meta http-equiv='refresh' content='1;url=registeration.php'>";
                                            }
                                            elseif ($_POST["kode"]!==$kode) 
                                            {
                                                echo "<div class='alert alert-danger'>Masukkan Kode Admin dengan benar</div> 
                                                <meta http-equiv='refresh' content='1;url=registeration.php'>";
                                            }
                                            else
                                            {
                                            $koneksi->query("INSERT INTO admin(username,password,nama) VALUES('$username','$password','$nama') ");
                                            echo "
                                            <div class='alert alert-info'>Registrasi sukses</div>
                                            <meta http-equiv='refresh' content='1;url=login.php'>
                                            ";
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
