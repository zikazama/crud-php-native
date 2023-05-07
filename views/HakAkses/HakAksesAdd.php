<!DOCTYPE html>
<html>
<head>
	<title>Tambah Hak Akses</title>
</head>
<body>
	<h1>Tambah Hak Akses</h1>
	<form method="post" action="HakAksesController.php?action=add">
		<label>Nama Akses:</label><br>
		<input type="text" name="namaAkses"><br><br>
		<label>Keterangan:</label><br>
		<textarea name="keterangan"></textarea><br><br>
		<input type="submit" name="submit" value="Simpan">
	</form>
</body>
</html>
