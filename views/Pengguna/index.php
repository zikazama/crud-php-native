<!DOCTYPE html>
<html>
<head>
	<title>Data Pengguna</title>
</head>
<body>
	<h1>Data Pengguna</h1>
	<p><a href="../index.php">Kembali ke Menu Utama</a></p>
	<p><a href="PenggunaController.php?action=add">Tambah Pengguna Baru</a></p>
	<table border="1">
		<tr>
			<th>ID Pengguna</th>
			<th>Nama Pengguna</th>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
			<th>No. HP</th>
			<th>Alamat</th>
			<th>Akses</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($penggunaList as $pengguna) { ?>
			<tr>
				<td><?php echo $pengguna->getIdPengguna(); ?></td>
				<td><?php echo $pengguna->getNamaPengguna(); ?></td>
				<td><?php echo $pengguna->getNamaDepan(); ?></td>
				<td><?php echo $pengguna->getNamaBelakang(); ?></td>
				<td><?php echo $pengguna->getNoHp(); ?></td>
				<td><?php echo $pengguna->getAlamat(); ?></td>
				<td><?php echo $pengguna->getNamaAkses(); ?></td>
				<td>
					<a href="PenggunaController.php?action=edit&idPengguna=<?php echo $pengguna->getIdPengguna(); ?>">Edit</a> | 
					<a href="PenggunaController.php?action=delete&idPengguna=<?php echo $pengguna->getIdPengguna(); ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>
