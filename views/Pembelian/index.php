<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pembelian</title>
</head>

<body>
	<h1>Daftar Pembelian</h1>
	
    <p><a href="<?php echo $_SESSION['dashboard']; ?>">Kembali ke Dashboard</a></p>
	<a href="PembelianController.php?action=add">Tambah Barang Baru</a>
	<table border="1">
		<tr>
			<th>ID Pembelian</th>
			<th>Nama Barang</th>
			<th>Jumlah Pembelian</th>
			<th>Harga Beli</th>
			<th>Nama Pengguna</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($pembelianList as $pembelian) { ?>
			<tr>
				<td><?php echo $pembelian->getIdPembelian(); ?></td>
				<td><?php echo $pembelian->getBarang(); ?></td>
				<td><?php echo $pembelian->getJumlahPembelian(); ?></td>
				<td><?php echo 'Rp. '.number_format($pembelian->getHargaBeli(), 0, ',', '.'); ?></td>
				<td><?php echo $pembelian->getPengguna(); ?></td>
				<td>
					<a href="PembelianController.php?action=edit&id=<?php echo $pembelian->getIdPembelian(); ?>">Edit</a>
					<a href="PembelianController.php?action=delete&id=<?php echo $pembelian->getIdPembelian(); ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	
</body>
</html>
