<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Laba Rugi</title>
</head>

<body>
    <h1>Dashboard Laba Rugi</h1>
    <p><a href="<?php echo $_SESSION['dashboard']; ?>">Kembali ke Dashboard</a></p>

    <table border="1">
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Pembelian</th>
            <th>Penjualan</th>
            <th>Total</th>
        </tr>
        <?php foreach ($barangList as $barang) : ?>
            <tr>
                <td><?php echo $barang->getIdBarang(); ?></td>
                <td><?php echo $barang->getNamaBarang(); ?></td>
                <td><?php echo $barang->getKeterangan(); ?></td>
                <td><?php echo 'Rp. '.number_format($barang->getJumlahPembelian(), 0, ',', '.') ?></td>
                <td><?php echo 'Rp. '.number_format($barang->getJumlahPenjualan(), 0, ',', '.') ?></td>
                <td><?php echo 'Rp. '.number_format($barang->getJumlahPenjualan() - $barang->getJumlahPembelian() , 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>