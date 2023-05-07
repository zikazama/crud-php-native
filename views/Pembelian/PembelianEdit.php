<!DOCTYPE html>
<html>

<head>
    <title>Edit Pembelian</title>
</head>

<body>
    <h1>Edit Pembelian</h1>

    <?php
    if (!empty($errorMessage)) {
        echo '<p style="color: red;">' . $errorMessage . '</p>';
    }
    ?>

    <form method="post" action="PembelianController.php?action=edit">
        <input type="hidden" name="idPembelian" value="<?php echo $pembelian->getIdPembelian(); ?>">
        <p>
            <label for="idBarang">Barang:</label>
            <select name="idBarang">
                <?php
                foreach ($barangList as $barang) {
                    if ($barang->getIdBarang() == $pembelian->getIdBarang()) {
                        echo '<option value="' . $barang->getIdBarang() . '" selected>' . $barang->getNamaBarang() . '</option>';
                    } else {
                        echo '<option value="' . $barang->getIdBarang() . '">' . $barang->getNamaBarang() . '</option>';
                    }
                }
                ?>
            </select>
        </p>
        <p>
            <label for="jumlahPembelian">Jumlah Pembelian:</label>
            <input type="number" name="jumlahPembelian" value="<?php echo $pembelian->getJumlahPembelian(); ?>">
        </p>
        <p>
            <label for="hargaBeli">Harga Beli:</label>
            <input type="number" name="hargaBeli" value="<?php echo $pembelian->getHargaBeli(); ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="Simpan">
        </p>
    </form>
</body>

</html>
