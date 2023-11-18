<?php 
  session_start();
  $koneksi = new mysqli("localhost","root","","ponselku"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Aidil Cell</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <section class="konten">
      <div class="realme">
        <div class="trl">
          <h3>realme <b>XT</b></h3>
          <h1><b>64MP Quad Camera Xpert</b></h1>
          <p>64MP Quad Camera | In-Display Fingerprint | VOOC Flash Charge 3.0</p>
          <a href="detail.php?id=1">
            <button>
              <b>Cek Selengkapnya</b>
            </button>
          </a>
        </div>
      </div>
      <div class="lg">
        <div class="tlg">
          <a href="detail.php?id=13">
          <button>
            <b>Cek Selengkapnya</b>
          </button>
          </a>
        </div>
      </div>
    </section>
    <div id="produk">
    <section class="konten">
      <div class="content">
        <hr>
        <center><h1>Produk</h1></center>
        <hr>
        <div class="row">
          <?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
          <?php while($perproduk = $ambil->fetch_assoc()) : ?>
          <div class="content-outside">
            <div class="content-in">
              <img src="<?php echo $perproduk['foto_produk']; ?>" >
              <div class="caption">
                <h1><?php echo $perproduk['nama_produk']; ?></h1>
                <h4>IDR <?php echo number_format($perproduk['harga_produk']); ?></h4>
                <a href="beli.php?id=<?php echo $perproduk['id_produk'];  ?>" class="btn-primary">Beli</a>
                <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn-default">Detail</a> 
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        </div>
      </div>
    </section>
    </div>
<!--     <section class="konten">
      <div class="content">
        <div class="footer">
          Copyright &copy; 2019 Aidil Cellular
        </div>
      </div>
    </section> -->
  </body>
</html>