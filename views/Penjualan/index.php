<!DOCTYPE html>
<html>
<head>
	<title>Daftar Penjualan</title>
</head>

<body>
	<h1>Daftar Penjualan</h1>
	<p><a href="<?php echo $_SESSION['dashboard']; ?>">Kembali ke Dashboard</a></p>
	<a href="PenjualanController.php?action=add">Tambah Penjualan Barang</a>
	<table border="1">
		<tr>
			<th>ID Penjual</th>
			<th>Nama Barang</th>
			<th>Jumlah Penjualan</th>
			<th>Harga Jual</th>
			<th>Nama Pengguna</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($penjualanList as $penjualan) { ?>
			<tr>
				<td><?php echo $penjualan->getIdPenjualan(); ?></td>
				<td><?php echo $penjualan->getBarang(); ?></td>
				<td><?php echo $penjualan->getJumlahPenjualan(); ?></td>
				<td><?php echo 'Rp. '.number_format($penjualan->getHargaJual(), 0, ',', '.') ?></td>
				<td><?php echo $penjualan->getPengguna(); ?></td>
				<td>
					<a href="PenjualanController.php?action=edit&id=<?php echo $penjualan->getIdPenjualan(); ?>">Edit</a>
					<a href="PenjualanController.php?action=delete&id=<?php echo $penjualan->getIdPenjualan(); ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	
</body>
</html>
