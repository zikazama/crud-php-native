<?php
require_once('../koneksi.php');
require_once('../models/Penjualan.php');
require_once('../models/Pengguna.php');
require_once('../models/Barang.php');
require_once('../models/Dashboard.php');
session_start();

$action = (isset($_GET['action'])) ? $_GET['action'] : 'view';

switch ($action) {
    case 'view':
        $barangList = array();
        $query = "
        SELECT
            *,
            COALESCE ((
            select
                sum(hargaBeli)
            from
                Pembelian
            where
                Pembelian.idBarang = Barang.idBarang),
            0) as jumlahPembelian,
                COALESCE ((
            select
                sum(hargaJual)
            from
                Penjualan
            where
                Penjualan.idBarang = Barang.idBarang),
            0) as jumlahPenjualan
        FROM
            Barang
        ";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $barang = new Dashboard($row['idBarang'], $row['namaBarang'], $row['keterangan'], $row['satuan'], $row['jumlahPembelian'], $row['jumlahPenjualan']);
            $barangList[] = $barang;
        }

        include('../views/Dashboard/index.php');
        break;
}
