<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pengguna</title>
</head>
<body>
	<h1>Tambah Pengguna</h1>
	<form action="PenggunaController.php?action=add" method="post">
		<label for="namaPengguna">Nama Pengguna:</label>
		<input type="text" id="namaPengguna" name="namaPengguna"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<label for="namaDepan">Nama Depan:</label>
		<input type="text" id="namaDepan" name="namaDepan"><br>

		<label for="namaBelakang">Nama Belakang:</label>
		<input type="text" id="namaBelakang" name="namaBelakang"><br>

		<label for="noHp">No. HP:</label>
		<input type="text" id="noHp" name="noHp"><br>

		<label for="alamat">Alamat:</label>
		<textarea id="alamat" name="alamat"></textarea><br>

		<label for="hakAkses">Hak Akses:</label>
		<select id="idAkses" name="idAkses">
			<?php foreach ($hakAksesList as $hakAkses): ?>
				<option value="<?php echo $hakAkses->getIdAkses(); ?>"><?php echo $hakAkses->getNamaAkses(); ?></option>
			<?php endforeach; ?>
		</select><br>

		<input type="submit" name="submit" value="Tambah Pengguna">
	</form>
</body>
</html>
