<!DOCTYPE html>
<html>
<head>
	<title>Administrator Dashboard</title>
</head>
<body>
	<h1>Selamat datang di Administrator Dashboard</h1>
	<p>Ini adalah halaman dashboard khusus untuk Administrator.</p>

	<h1>Menu Utama</h1>
	<ul>
		<li><a href="../controller/HakAksesController.php?action=view">Data Hak Akses</a></li>
		<li><a href="../controller/PenggunaController.php?action=view">Data Pengguna</a></li>
		<li><a href="../controller/BarangController.php?action=view">Data Barang</a></li>
		<li><a href="../controller/PembelianController.php?action=view">Data Pembelian</a></li>
		<li><a href="../controller/PenjualanController.php?action=view">Data Penjualan</a></li>
		<li><a href="../controller/KombinasiController.php?action=view">Data Kombinasi Paket Barang</a></li>
		<li><a href="../controller/DashboardController.php?action=view">Data Dashboard Laba Rugi</a></li>
	</ul>
	<p><a href="logout.php">Logout</a></p>
</body>
</html>
