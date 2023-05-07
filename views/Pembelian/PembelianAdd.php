<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pembelian</title>
</head>
<body>
	<h1>Tambah Pembelian</h1>
	<form method="post" action="PembelianController.php?action=add">
		<label>Nama Barang:</label>
		<select name="idBarang">
			<?php foreach ($barangList as $barang) { ?>
				<option value="<?php echo $barang->getIdBarang(); ?>"><?php echo $barang->getNamaBarang(); ?></option>
			<?php } ?>
		</select>
		<br>
		<label>Jumlah Pembelian:</label>
		<input type="number" name="jumlahPembelian">
		<br>
		<label>Harga Beli:</label>
		<input type="number" name="hargaBeli">
		<br>
		<input type="submit" name="submit" value="Simpan">
		<a href="PembelianController.php?action=view">Batal</a>
	</form>
</body>
</html>
