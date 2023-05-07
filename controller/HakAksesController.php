<?php
require_once('../koneksi.php');
require_once('../models/HakAkses.php');
session_start();

if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'view';
}

switch ($action) {
	case 'view':
		$hakAksesList = array();
		$query = "SELECT * FROM HakAkses";
		$result = mysqli_query($koneksi, $query);
		while ($row = mysqli_fetch_array($result)) {
			$hakAkses = new HakAkses($row['idAkses'], $row['namaAkses'], $row['keterangan']);
			$hakAksesList[] = $hakAkses;
		}
		include('../views/HakAkses/index.php');
		break;
	case 'add':
		if (isset($_POST['submit'])) {
			$namaAkses = $_POST['namaAkses'];
			$keterangan = $_POST['keterangan'];
			$query = "INSERT INTO HakAkses (namaAkses, keterangan) VALUES ('$namaAkses', '$keterangan')";
			mysqli_query($koneksi, $query);
			header('Location: HakAksesController.php?action=view');
		} else {
			include('../views/HakAkses/HakAksesAdd.php');
		}
		break;
	case 'edit':
		if (isset($_POST['submit'])) {
			$idAkses = $_POST['idAkses'];
			$namaAkses = $_POST['namaAkses'];
			$keterangan = $_POST['keterangan'];
			$query = "UPDATE HakAkses SET namaAkses='$namaAkses', keterangan='$keterangan' WHERE idAkses='$idAkses'";
			mysqli_query($koneksi, $query);
			header('Location: HakAksesController.php?action=view');
		} else {
						$idAkses = $_GET['idAkses'];
			$query = "SELECT * FROM HakAkses WHERE idAkses='$idAkses'";
			$result = mysqli_query($koneksi, $query);
			$row = mysqli_fetch_array($result);
			$hakAkses = new HakAkses($row['idAkses'], $row['namaAkses'], $row['keterangan']);
			include('../views/HakAkses/HakAksesEdit.php');
		}
		break;
	case 'delete':
		$idAkses = $_GET['idAkses'];
		$query = "DELETE FROM HakAkses WHERE idAkses='$idAkses'";
		mysqli_query($koneksi, $query);
		header('Location: HakAksesController.php?action=view');
		break;
	default:
		$hakAksesList = array();
		$query = "SELECT * FROM HakAkses";
		$result = mysqli_query($koneksi, $query);
		while ($row = mysqli_fetch_array($result)) {
			$hakAkses = new HakAkses($row['idAkses'], $row['namaAkses'], $row['keterangan']);
			$hakAksesList[] = $hakAkses;
		}
		include('../views/HakAkses/index.php');
		break;
}

