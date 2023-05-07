<?php
require_once('../koneksi.php');
require_once('../models/HakAkses.php');
require_once('../models/Pengguna.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'view';
}

switch ($action) {
    case 'view':
        $penggunaList = array();
        $query = "SELECT Pengguna.*,NamaAkses FROM Pengguna inner join HakAkses on HakAkses.idAkses=Pengguna.idAkses";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $pengguna = new Pengguna($row['idPengguna'], $row['namaPengguna'], $row['password'], $row['namaDepan'], $row['namaBelakang'], $row['noHp'], $row['alamat'], $row['idAkses'],$row['NamaAkses']);
            $penggunaList[] = $pengguna;
        }
        include('../views/Pengguna/index.php');
        break;
    case 'add':
        if (isset($_POST['submit'])) {
            $namaPengguna = $_POST['namaPengguna'];
            $password = $_POST['password'];
            $namaDepan = $_POST['namaDepan'];
            $namaBelakang = $_POST['namaBelakang'];
            $noHp = $_POST['noHp'];
            $alamat = $_POST['alamat'];
            $idAkses = $_POST['idAkses'];

            $query = "INSERT INTO pengguna (NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, idAkses) 
                      VALUES ('$namaPengguna', '$password', '$namaDepan', '$namaBelakang', '$noHp', '$alamat', '$idAkses')";
            mysqli_query($koneksi, $query);
            header('Location: PenggunaController.php?action=view');
        } else {
            $hakAksesList = array();
            $query = "SELECT * FROM HakAkses";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
                $hakAkses = new HakAkses($row['idAkses'], $row['namaAkses'], $row['keterangan']);
                $hakAksesList[] = $hakAkses;
            }
            include('../views/Pengguna/PenggunaAdd.php');
        }
        break;
    case 'edit':
    if (isset($_POST['submit'])) {
        $idPengguna = $_POST['idPengguna'];
        $namaPengguna = $_POST['namaPengguna'];
        $password = $_POST['password'];
        $namaDepan = $_POST['namaDepan'];
        $namaBelakang = $_POST['namaBelakang'];
        $noHp = $_POST['noHp'];
        $alamat = $_POST['alamat'];
        $idAkses = $_POST['idAkses'];
        
        $query = "UPDATE Pengguna SET 
                  namaPengguna='$namaPengguna', 
                  password='$password', 
                  namaDepan='$namaDepan', 
                  namaBelakang='$namaBelakang', 
                  noHp='$noHp', 
                  alamat='$alamat', 
                  idAkses='$idAkses'
                  WHERE idPengguna='$idPengguna'";
        
        mysqli_query($koneksi, $query);
        header('Location: PenggunaController.php?action=view');
    } else {
        $idPengguna = $_GET['idPengguna'];
        $query = "SELECT * FROM Pengguna WHERE idPengguna='$idPengguna'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_array($result);
        $pengguna = new Pengguna(
            $row['idPengguna'], 
            $row['namaPengguna'], 
            $row['password'], 
            $row['namaDepan'], 
            $row['namaBelakang'], 
            $row['noHp'], 
            $row['alamat'], 
            $row['idAkses']
        );
        $hakAksesList = array();
        $query = "SELECT * FROM HakAkses";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $hakAkses = new HakAkses($row['idAkses'], $row['namaAkses'], $row['keterangan']);
            $hakAksesList[] = $hakAkses;
        }
        include('../views/Pengguna/PenggunaEdit.php');
    }
    break;

case 'delete':
  $idPengguna = $_GET['idPengguna'];
  $query = "DELETE FROM Pengguna WHERE idPengguna='$idPengguna'";
  mysqli_query($koneksi, $query);
  header('Location: PenggunaController.php?action=view');
  break;
  default:
        $penggunaList = array();
        $query = "SELECT Pengguna.*,NamaAkses FROM Pengguna inner join HakAkses on HakAkses.idAkses=Pengguna.idAkses";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $pengguna = new Pengguna($row['idPengguna'], $row['namaPengguna'], $row['password'], $row['namaDepan'], $row['namaBelakang'], $row['noHp'], $row['alamat'], $row['idAkses'],$row['NamaAkses']);
            $penggunaList[] = $pengguna;
        }
        include('../views/Pengguna/index.php');
        break;
}
?>