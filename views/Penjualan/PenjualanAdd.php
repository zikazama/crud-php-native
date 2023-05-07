<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penjualan</title>
</head>
<body>
	<h1>Tambah Penjualan</h1>
	<form method="post" action="PenjualanController.php?action=add">
		<label>Nama Barang:</label>
		<select name="idBarang">
			<?php foreach ($barangList as $barang) { ?>
				<option value="<?php echo $barang->getIdBarang(); ?>"><?php echo $barang->getNamaBarang(); ?></option>
			<?php } ?>
		</select>
		<br>
		<label>Jumlah Penjualan:</label>
		<input type="number" name="jumlahPenjualan">
		<br>
		<label>Harga Jual:</label>
		<input type="number" name="hargaJual">
		<br>
		<input type="submit" name="submit" value="Simpan">
		<a href="PenjualanController.php?action=view">Batal</a>
	</form>
</body>
</html>
