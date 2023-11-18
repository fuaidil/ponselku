<?php
	$all = array();
	$mulai = " ";
	$selesai = " ";
	// $koneksi = new mysqli("localhost","root","","ponselku");
	if (isset($_POST["kirim"])) 
	{
	$mulai = $_POST["tglm"];
	$selesai = $_POST["tgls"];
		$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE tanggal_pembelian BETWEEN '$mulai' AND '$selesai'");
		while ($data = $ambil->fetch_assoc()) 
		{
			$all[] = $data;
		}
		if (empty($all)) 
		{
			echo "<div class='alert alert-info'>Masukkan input dulu</div>
                  <meta http-equiv='refresh' content='1;url=index.php?halaman=laporan'>";
		}
		// echo "<pre>";
		// print_r($all);
		// echo "</pre>";
	}
?>
<h2>Laporan Pembelian dari <?php echo $mulai ?> hingga <?php echo $selesai ?></h2>
<hr>
<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" value="<?php echo $mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" value="<?php echo $selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($all as $key => $value) : ?>
		<?php $total+=$value["total_pembelian"] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo $value["tanggal_pembelian"] ?></td>
			<td>IDR <?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>IDR <?php echo number_format($total); ?></th>
		</tr>
	</tfoot>
</table>