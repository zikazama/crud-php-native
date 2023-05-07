<?php
require_once('../koneksi.php');
require_once('../models/Penjualan.php');
require_once('../models/Pengguna.php');
require_once('../models/Barang.php');
session_start();

$action = (isset($_GET['action'])) ? $_GET['action'] : 'view';

switch ($action) {
    case 'view':
        $penjualanList = array();
        $query = "SELECT Penjualan.*, NamaPengguna, NamaBarang FROM Penjualan 
        INNER JOIN Pengguna ON Penjualan.idPengguna = Pengguna.idPengguna 
        INNER JOIN Barang ON Penjualan.idBarang = Barang.idBarang";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $Penjualan = new Penjualan($row['idPenjualan'], $row['jumlahPenjualan'], $row['hargaJual'], $row['idPengguna'], $row['idBarang'], $row['NamaPengguna'], $row['NamaBarang']);
            $penjualanList[] = $Penjualan;
        }
        include('../views/Penjualan/index.php');
        break;
    case 'add':
        if (isset($_POST['submit'])) {
            $jumlahPenjualan = $_POST['jumlahPenjualan'];
            $hargaJual = $_POST['hargaJual'];
            $idPengguna = $_SESSION['id_pengguna'];
            $idBarang = $_POST['idBarang'];

            $query = "INSERT INTO Penjualan (JumlahPenjualan, HargaJual, idPengguna, idBarang) 
                      VALUES ('$jumlahPenjualan', '$hargaJual', '$idPengguna', '$idBarang')";
            mysqli_query($koneksi, $query);
            header('Location: Penjualancontroller.php?action=view');
        } else {
            $penggunaList = array();
            $query = "SELECT * FROM Pengguna";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
                $pengguna = new Pengguna($row['idPengguna'], $row['namaPengguna'], $row['password'], $row['namaDepan'], $row['namaBelakang'], $row['noHp'], $row['alamat'], $row['idAkses']);
                $penggunaList[] = $pengguna;
            }
            $barangList = array();
            $query = "SELECT * FROM Barang";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
                $barang = new Barang($row['idBarang'], $row['namaBarang'], $row['keterangan'], $row['satuan'], $row['idPengguna']);
                $barangList[] = $barang;
            }
            include('../views/Penjualan/PenjualanAdd.php');
        }
        break;
    case 'edit':
        if (isset($_POST['submit'])) {
            $idPenjualan = $_POST['idPenjualan'];
            $jumlahPenjualan = $_POST['jumlahPenjualan'];
            $hargaJual = $_POST['hargaJual'];
            $idPengguna = $_SESSION['id_pengguna'];
            $idBarang = $_POST['idBarang'];

            $query = "UPDATE Penjualan SET
                        JumlahPenjualan='$jumlahPenjualan',
                        HargaJual='$hargaJual',
                        idPengguna='$idPengguna',
                        idBarang='$idBarang'
                        WHERE idPenjualan='$idPenjualan'";
            mysqli_query($koneksi, $query);
            header('Location: PenjualanController.php?action=view');
        } else {
            $idPenjualan = $_GET['id'];
            $query = "SELECT Penjualan.*, NamaPengguna, NamaBarang FROM Penjualan
            INNER JOIN Pengguna ON Penjualan.idPengguna = Pengguna.idPengguna
            INNER JOIN Barang ON Penjualan.idBarang = Barang.idBarang
            WHERE idPenjualan='$idPenjualan'";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_array($result);
            $Penjualan = new Penjualan($row['idPenjualan'], $row['jumlahPenjualan'], $row['hargaJual'], $row['idPengguna'], $row['idBarang'], $row['NamaPengguna'], $row['NamaBarang']);
            $penggunaList = array();
            $query = "SELECT * FROM Pengguna";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
            $pengguna = new Pengguna($row['idPengguna'], $row['namaPengguna'], $row['password'], $row['namaDepan'], $row['namaBelakang'], $row['noHp'], $row['alamat'], $row['idAkses']);
            $penggunaList[] = $pengguna;
        }

            $barangList = array();
            $query = "SELECT * FROM Barang";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
                $barang = new Barang($row['idBarang'], $row['namaBarang'], $row['keterangan'], $row['satuan'], $row['idPengguna']);
                $barangList[] = $barang;
            }

        include('../views/Penjualan/PenjualanEdit.php');
    }
    break;

    case 'delete':
        $idPenjualan = $_GET['id'];
        $query = "DELETE FROM Penjualan WHERE idPenjualan='$idPenjualan'";
        mysqli_query($koneksi, $query);
        header('Location: PenjualanController.php?action=view');
        break;
    }
?>