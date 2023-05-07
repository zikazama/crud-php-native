<!DOCTYPE html>
<html>
<head>
	<title>Edit Hak Akses</title>
</head>
<body>
	<h1>Edit Hak Akses</h1>
	<form method="post" action="HakAksesController.php?action=edit">
		<input type="hidden" name="idAkses" value="<?php echo $hakAkses->getIdAkses(); ?>">
		<label>Nama Akses:</label><br>
		<input type="text" name="namaAkses" value="<?php echo $hakAkses->getNamaAkses(); ?>"><br><br>
		<label>Keterangan:</label><br>
		<textarea name="keterangan"><?php echo $hakAkses->getKeterangan(); ?></textarea><br><br>
		<input type="submit" name="submit" value="Simpan">
	</form>
</body>
</html>