<h2>Data Pembayaran</h2>
<hr>
<?php 
	$idpem = $_GET["id"];
	$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$idpem'");
	$detail = $ambil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-6">
		<table class="table table-bordered">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail["nama"] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail["bank"] ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td><?php echo $detail["jumlah"] ?></td>
			</tr>
			<tr>
				<th>Tanggal Pembayaran</th>
				<td><?php echo $detail["tanggal"] ?></td>
			</tr>
		</table>
<form method="post">
	<div class="form-group">
		<label>No Resi Pengiriman</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="lunas">Lunas</option>
			<option value="barang dikirim">Barang Dikirim</option>
			<option value="batal">Batal</option>
		</select>
	</div>
	<button class="btn btn-primary" name="submit">Submit</button>
</form>
	</div>
	<div class="col-md-6">
		<img src="<?php echo $detail['bukti']; ?>" class="img-responsive">
	</div>
</div>
<?php 
	if (isset($_POST["submit"])) 
	{
		$resi = $_POST["resi"];
		$status = $_POST["status"];
		$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi',status_pembelian='$status' WHERE id_pembelian='$idpem'");
		echo "<script>alert('Data telah di input');
				location='index.php?halamn=pembelian';
		</script>";
	}

?>