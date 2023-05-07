<?php
require_once('../koneksi.php');
require_once('../models/Penjualan.php');
require_once('../models/Pengguna.php');
require_once('../models/Barang.php');
session_start();

$action = (isset($_GET['action'])) ? $_GET['action'] : 'view';

function getCombinations($array, $minLength = 1, $maxLength = PHP_INT_MAX) {
    $result = array();

    for ($i = 0; $i < count($array); $i++) {
        $prefix = array($array[$i]);
        if ($minLength == 1) {
            $result[] = $prefix;
        }

        if ($maxLength > 1) {
            $suffixes = getCombinations(array_slice($array, $i + 1), $minLength - 1, $maxLength - 1);
            foreach ($suffixes as $suffix) {
                $result[] = array_merge($prefix, $suffix);
            }
        }
    }

    return $result;
}

switch ($action) {
    case 'view':
        $barangList = array();
        $query = "SELECT Barang.*,NamaPengguna FROM Barang inner join Pengguna on Barang.idPengguna=Pengguna.idPengguna";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $barang = new Barang($row['idBarang'], $row['namaBarang'], $row['keterangan'], $row['satuan'], $row['idPengguna'], $row['NamaPengguna']);
            $barangList[] = $barang;
        }
        
        include('../views/Kombinasi/index.php');
        break;
}
