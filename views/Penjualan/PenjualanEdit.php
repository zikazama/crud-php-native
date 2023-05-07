<!DOCTYPE html>
<html>

<head>
    <title>Edit Penjualan</title>
</head>

<body>
    <h1>Edit Penjualan</h1>

    <?php
    if (!empty($errorMessage)) {
        echo '<p style="color: red;">' . $errorMessage . '</p>';
    }
    ?>

    <form method="post" action="PenjualanController.php?action=edit">
        <input type="hidden" name="idPenjualan" value="<?php echo $Penjualan->getidPenjualan(); ?>">
        <p>
            <label for="idBarang">Barang:</label>
            <select name="idBarang">
                <?php
                foreach ($barangList as $barang) {
                    if ($barang->getIdBarang() == $Penjualan->getIdBarang()) {
                        echo '<option value="' . $barang->getIdBarang() . '" selected>' . $barang->getNamaBarang() . '</option>';
                    } else {
                        echo '<option value="' . $barang->getIdBarang() . '">' . $barang->getNamaBarang() . '</option>';
                    }
                }
                ?>
            </select>
        </p>
        <p>
            <label for="jumlahPenjualan">Jumlah Penjualan:</label>
            <input type="number" name="jumlahPenjualan" value="<?php echo $Penjualan->getJumlahPenjualan(); ?>">
        </p>
        <p>
            <label for="hargaBeli">Harga Jual:</label>
            <input type="number" name="hargaJual" value="<?php echo $Penjualan->getHargaJual(); ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="Simpan">
        </p>
    </form>
</body>

</html>
