<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
</head>
<body>
	<h1>Data Barang</h1>
	<p><a href="<?php echo $_SESSION['dashboard']; ?>">Kembali ke Dashboard</a></p>
	<a href="BarangController.php?action=add">Tambah Barang Baru</a>
	<table border="1">
		<tr>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Keterangan</th>
			<th>Satuan</th>
			<th>Pengguna</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($barangList as $barang): ?>
		<tr>
			<td><?php echo $barang->getIdBarang(); ?></td>
			<td><?php echo $barang->getNamaBarang(); ?></td>
			<td><?php echo $barang->getKeterangan(); ?></td>
			<td><?php echo $barang->getSatuan(); ?></td>
			<td><?php echo $barang->getNamaPengguna(); ?></td>
			<td>
				<a href="BarangController.php?action=edit&id=<?php echo $barang->getIdBarang(); ?>">Edit</a>
				<a href="BarangController.php?action=delete&id=<?php echo $barang->getIdBarang(); ?>">Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
