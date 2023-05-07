<?php
require_once('../koneksi.php');
require_once('../models/Pembelian.php');
require_once('../models/Pengguna.php');
require_once('../models/Barang.php');
session_start();

$action = (isset($_GET['action'])) ? $_GET['action'] : 'view';

switch ($action) {
    case 'view':
        $pembelianList = array();
        $query = "SELECT Pembelian.*, NamaPengguna, NamaBarang FROM Pembelian 
        INNER JOIN Pengguna ON Pembelian.idPengguna = Pengguna.idPengguna 
        INNER JOIN Barang ON Pembelian.idBarang = Barang.idBarang";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $pembelian = new Pembelian($row['idPembelian'], $row['jumlahPembelian'], $row['hargaBeli'], $row['idPengguna'], $row['idBarang'], $row['NamaPengguna'], $row['NamaBarang']);
            $pembelianList[] = $pembelian;
        }
        include('../views/Pembelian/index.php');
        break;
    case 'add':
        if (isset($_POST['submit'])) {
            $jumlahPembelian = $_POST['jumlahPembelian'];
            $hargaBeli = $_POST['hargaBeli'];
            $idPengguna = $_SESSION['id_pengguna'];
            $idBarang = $_POST['idBarang'];

            $query = "INSERT INTO Pembelian (JumlahPembelian, HargaBeli, idPengguna, idBarang) 
                      VALUES ('$jumlahPembelian', '$hargaBeli', '$idPengguna', '$idBarang')";
            mysqli_query($koneksi, $query);
            header('Location: pembeliancontroller.php?action=view');
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
            include('../views/Pembelian/PembelianAdd.php');
        }
        break;
    case 'edit':
        if (isset($_POST['submit'])) {
            $idPembelian = $_POST['idPembelian'];
            $jumlahPembelian = $_POST['jumlahPembelian'];
            $hargaBeli = $_POST['hargaBeli'];
            $idPengguna = $_SESSION['id_pengguna'];
            $idBarang = $_POST['idBarang'];

            $query = "UPDATE Pembelian SET
                        JumlahPembelian='$jumlahPembelian',
                        HargaBeli='$hargaBeli',
                        idPengguna='$idPengguna',
                        idBarang='$idBarang'
                        WHERE idPembelian='$idPembelian'";
            mysqli_query($koneksi, $query);
            header('Location: PembelianController.php?action=view');
        } else {
            $idPembelian = $_GET['id'];
            $query = "SELECT Pembelian.*, NamaPengguna, NamaBarang FROM Pembelian
            INNER JOIN Pengguna ON Pembelian.idPengguna = Pengguna.idPengguna
            INNER JOIN Barang ON Pembelian.idBarang = Barang.idBarang
            WHERE idPembelian='$idPembelian'";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_array($result);
            $pembelian = new Pembelian($row['idPembelian'], $row['jumlahPembelian'], $row['hargaBeli'], $row['idPengguna'], $row['idBarang'], $row['NamaPengguna'], $row['NamaBarang']);
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

        include('../views/Pembelian/PembelianEdit.php');
    }
    break;

    case 'delete':
        $idPembelian = $_GET['id'];
        $query = "DELETE FROM Pembelian WHERE idPembelian='$idPembelian'";
        mysqli_query($koneksi, $query);
        header('Location: PembelianController.php?action=view');
        break;
    }
?>