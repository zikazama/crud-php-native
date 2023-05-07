<!DOCTYPE html>
<html>
<head>
	<title>Daftar Hak Akses</title>
</head>
<body>
	<h1>Daftar Hak Akses</h1>
	<p><a href="<?php echo $_SESSION['dashboard']; ?>">Kembali ke Dashboard</a></p>
	<a href="HakAksesController.php?action=add">Tambah Hak Akses</a>
	<br><br>
	<table border="1">
		<tr>
			<th>ID Akses</th>
			<th>Nama Akses</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($hakAksesList as $hakAkses): ?>
		<tr>
			<td><?php echo $hakAkses->getIdAkses(); ?></td>
			<td><?php echo $hakAkses->getNamaAkses(); ?></td>
			<td><?php echo $hakAkses->getKeterangan(); ?></td>
			<td>
				<a href="HakAksesController.php?action=edit&idAkses=<?php echo $hakAkses->getIdAkses(); ?>">Edit</a>
				<a href="HakAksesController.php?action=delete&idAkses=<?php echo $hakAkses->getIdAkses(); ?>">Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
