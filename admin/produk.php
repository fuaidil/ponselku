<h2>Data Produk</h2>
<hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Stok Produk</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) : ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>IDR <?php echo number_format($pecah['harga_produk']); ?></td>
			<td>
				<img src="../frontend/<?php echo $pecah['foto_produk']; ?>" width="100px">
			</td>
			<td><?php echo $pecah['stok']; ?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn glyphicon glyphicon-trash"></a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning fa fa-edit"></a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php endwhile; ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary glyphicon glyphicon-plus">  Data</a>