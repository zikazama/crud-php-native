<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang</h1>
    <form method="post" action="BarangController.php?action=edit">
        <input type="hidden" name="idBarang" value="<?php echo $barang->getIdBarang(); ?>">
        <label for="namaBarang">Nama Barang:</label>
        <input type="text" name="namaBarang" value="<?php echo $barang->getNamaBarang(); ?>"><br>
        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" value="<?php echo $barang->getKeterangan(); ?>"><br>
        <label for="satuan">Satuan:</label>
        <input type="text" name="satuan" value="<?php echo $barang->getSatuan(); ?>"><br>
        <label for="idPengguna">Pengguna:</label>
        <select name="idPengguna">
            <?php foreach ($penggunaList as $pengguna): ?>
                <?php if ($pengguna->getIdPengguna() == $barang->getIdPengguna()): ?>
                    <option value="<?php echo $pengguna->getIdPengguna(); ?>" selected><?php echo $pengguna->getNamaPengguna(); ?></option>
                <?php else: ?>
                    <option value="<?php echo $pengguna->getIdPengguna(); ?>"><?php echo $pengguna->getNamaPengguna(); ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" name="submit" value="Save">
    </form>
</body>
</html>
