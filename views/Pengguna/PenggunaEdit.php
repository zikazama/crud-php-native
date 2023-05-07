<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Pengguna</title>
</head>
<body>
	<h1>Edit Data Pengguna</h1>
	<form method="post" action="PenggunaController.php?action=edit">
		<input type="hidden" name="idPengguna" value="<?php echo $pengguna->getIdPengguna(); ?>">
		<table>
			<tr>
				<td>Nama Pengguna:</td>
				<td><input type="text" name="namaPengguna" value="<?php echo $pengguna->getNamaPengguna(); ?>"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" value="<?php echo $pengguna->getPassword(); ?>"></td>
			</tr>
			<tr>
				<td>Nama Depan:</td>
				<td><input type="text" name="namaDepan" value="<?php echo $pengguna->getNamaDepan(); ?>"></td>
			</tr>
			<tr>
				<td>Nama Belakang:</td>
				<td><input type="text" name="namaBelakang" value="<?php echo $pengguna->getNamaBelakang(); ?>"></td>
			</tr>
			<tr>
				<td>No HP:</td>
				<td><input type="text" name="noHp" value="<?php echo $pengguna->getNoHp(); ?>"></td>
			</tr>
			<tr>
				<td>Alamat:</td>
				<td><input type="text" name="alamat" value="<?php echo $pengguna->getAlamat(); ?>"></td>
			</tr>
			<tr>
				<td>Hak Akses:</td>
				<td>
					<select name="idAkses">
						<?php foreach ($hakAksesList as $hakAkses) : ?>
							<option value="<?php echo $hakAkses->getIdAkses(); ?>" <?php if ($pengguna->getIdAkses() == $hakAkses->getIdAkses()) echo 'selected'; ?>>
								<?php echo $hakAkses->getNamaAkses(); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
