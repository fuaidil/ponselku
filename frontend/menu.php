  <nav class="nav">
    <div class="content">
      <ul>
        <li class="judul">Aidil Cellular</li>
        <li><a href="main.php">Home</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>
        <?php if (isset($_SESSION["pelanggan"])) : ?>
          <li><a href="riwayat.php">Riwayat Belanja</a></li>
          <li id="log" title="Logout"><a href="logout.php"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></a></li>
        <?php else: ?>
          <li class="dropdown" id="log">
          <div class="dropbtn">Login</div>
          <div class="dropdown-content">
            <a href="../admin/login.php">Admin</a>
            <button onclick="document.getElementById('modal').style.display='block'" id="user">User</button>
          </div>
          </li>
        <?php endif ?>
        <li><a href="main.php#produk">Produk</a></li>
        <li><a href="checkout.php">Checkout</a></li>
      </ul>
        <form action="pencarian.php" method="get" class="nav-cari">
      <input type="text" name="keyword" class="form-cari" placeholder="&nbsp;&nbsp;Search">
      <button class="btn-primary">Cari</button>
    </form>
    </div>
  </nav>
    <section class="konten">
      <div id="modal" class="modal">
        <form class="modal-content animate" method="get" action="login.php">
          <div class="img-content-login">
            <span onclick="document.getElementById('modal').style.display='none'" class="btn-close" title="Close">&times;</span>
            <h2>Form Login</h2>
            <img src="find_user.png" class="avatar">
          </div>
          <div class="content-login">
            <input type="email" placeholder="Email" name="email" class="input-login" required>
            <input type="password" placeholder="Password" name="password" class="input-login" required>
            <button class="btn-login" name="login">Login</button>
          </div>
          <div class="content-login1">
            <button type="button" onclick="document.getElementById('modal').style.display='none'" class="btn-cancel">Cancel</button>
            <span class="hal-daftar">Not register ? <button onclick="document.getElementById('modal_reg').style.display='block'" class="hal-reg">Sign up</button></span>
          </div>
        </form>
      </div>
      <div id="modal_reg" class="modal">
          <form class="modal-content animate" method="get" action="daftar.php">
          <div class="img-content-login">
            <span onclick="document.getElementById('modal').style.display='none';document.getElementById('modal_reg').style.display='none'" class="btn-close" title="Close">&times;</span>
              <h2>Form Registration</h2>
          </div>
          <div class="content-login">
            <input type="text" name="nama" placeholder="Your name" class="input-login" required>
            <input type="email" name="email" placeholder="Your Email" class="input-login" required>
            <input type="password" name="password" placeholder="Password" class="input-login" required>
            <input type="number" name="telepon" placeholder="Phone number" class="input-login" required>
            <button class="btn-login" name="daftar">Sign up</button>
          </div>
          <div class="content-login1">
            <button type="button" onclick="document.getElementById('modal').style.display='none';document.getElementById('modal_reg').style.display='none'" class="btn-cancel">Cancel</button>
            <span class="hal-daftar">Already registered ? <button onclick="document.getElementById('modal_reg').style.display='none'" class="reg">Login here</button></span>
          </div>
        </form>
      </div>
    </section>
    <script>
        var modal = document.getElementById('modal');
        var modal_reg = document.getElementById('modal_reg');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            else if(event.target == modal_reg) {
                modal_reg.style.display = "none";
                modal.style.display = "none";
            }
        }
    </script>