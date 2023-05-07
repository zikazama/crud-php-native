<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <form method="post" action="BarangController.php?action=add">
        <label>Nama Barang:</label>
        <input type="text" name="namaBarang"><br>
        <label>Keterangan:</label>
        <textarea name="keterangan"></textarea><br>
        <label>Satuan:</label>
        <input type="text" name="satuan"><br>
    
        <input type="submit" name="submit" value="Add">
    </form>
</body>
</html>
