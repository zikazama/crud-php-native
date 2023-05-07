<?php
require_once('../koneksi.php');
require_once('../models/Barang.php');
require_once('../models/Pengguna.php');
session_start();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'view';
}

switch ($action) {
    case 'view':
        $barangList = array();
        $query = "SELECT Barang.*,NamaPengguna FROM Barang inner join Pengguna on Barang.idPengguna=Pengguna.idPengguna";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $barang = new Barang($row['idBarang'], $row['namaBarang'], $row['keterangan'], $row['satuan'], $row['idPengguna'],$row['NamaPengguna']);
            $barangList[] = $barang;
        }
        include('../views/Barang/index.php');
        break;
    case 'add':
        if (isset($_POST['submit'])) {
            $namaBarang = $_POST['namaBarang'];
            $keterangan = $_POST['keterangan'];
            $satuan = $_POST['satuan'];
            $idPengguna = $_SESSION['id_pengguna'];

            $query = "INSERT INTO Barang (NamaBarang, Keterangan, Satuan, idPengguna) 
                      VALUES ('$namaBarang', '$keterangan', '$satuan', '$idPengguna')";
            mysqli_query($koneksi, $query);
            header('Location: BarangController.php?action=view');
        } else {
            $penggunaList = array();
            $query = "SELECT * FROM Pengguna";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
                $pengguna = new Pengguna($row['idPengguna'], $row['namaPengguna'], $row['password'], $row['namaDepan'], $row['namaBelakang'], $row['noHp'], $row['alamat'], $row['idAkses']);
                $penggunaList[] = $pengguna;
            }
            include('../views/Barang/BarangAdd.php');
        }
        break;
    case 'edit':
        if (isset($_POST['submit'])) {
            $idBarang = $_POST['idBarang'];
            $namaBarang = $_POST['namaBarang'];
            $keterangan = $_POST['keterangan'];
            $satuan = $_POST['satuan'];
            $idPengguna = $_SESSION['id_pengguna'];

            $query = "UPDATE Barang SET 
                      namaBarang='$namaBarang', 
                      keterangan='$keterangan', 
                      satuan='$satuan', 
                      idPengguna='$idPengguna'
                      WHERE idBarang='$idBarang'";
            mysqli_query($koneksi, $query);
            header('Location: BarangController.php?action=view');
        } else {
            $idBarang = $_GET['id'];
            $query = "SELECT * FROM Barang WHERE idBarang='$idBarang'";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_array($result);
            $barang = new Barang($row['idBarang'], $row['namaBarang'], $row['keterangan'], $row['satuan'], $row['idPengguna']);

            $penggunaList = array();
            $query = "SELECT * FROM Pengguna";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
                $pengguna = new Pengguna($row['idPengguna'], $row['namaPengguna'], $row['password'], $row['namaDepan'], $row['namaBelakang'], $row['noHp'], $row['alamat'], $row['idAkses']);
				$penggunaList[] = $pengguna;
			}
		include('../views/Barang/BarangEdit.php');
		}
		break;
	case 'delete':
		$idBarang = $_GET['id'];
		$query = "DELETE FROM Barang WHERE idBarang='$idBarang'";
		mysqli_query($koneksi, $query);
		header('Location: BarangController.php?action=view');
	break;
}
?>
