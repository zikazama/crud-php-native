<?php

require_once '../koneksi.php';
require_once('../models/HakAkses.php');
require_once('../models/Pengguna.php');
session_start(); // memulai session

// Koneksi ke database



// Query untuk login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaPengguna = $_POST["username"];
    $pssw = $_POST["password"];

    $sql = "SELECT * FROM Pengguna WHERE namaPengguna='$namaPengguna' AND password='$pssw'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Buat objek User
        
        $user = new Pengguna($row["idPengguna"], $row["namaPengguna"],$row["password"], $row["namaDepan"], $row["namaBelakang"], $row["noHp"], $row["alamat"], $row["idAkses"],"");

        // Query untuk mendapatkan Hak Akses
        
        $sql = "SELECT * FROM HakAkses WHERE idAkses='$user->idAkses'";
        
        $result = $koneksi->query($sql);
      
        if ($result->num_rows > 0) {
          
            $row = $result->fetch_assoc();

            // Buat objek Hak Akses

            $hakAkses = new HakAkses($row["idAkses"], $row["namaAkses"], $row["keterangan"]);

            // Redirect ke dashboard sesuai Hak Akses
            $_SESSION['id_pengguna'] = $user->idPengguna;
            switch ($hakAkses->namaAkses) {
                case "Admin":
                    $_SESSION['dashboard'] = "../views/administrator-dashboard.php";
                    header("Location: ../views/administrator-dashboard.php");
                    break;
                case "Kasir":
                    $_SESSION['dashboard'] = "../views/kasir-dashboard.php";
                    header("Location: ../views/kasir-dashboard.php");
                    break;
                case "Stokist":
                    $_SESSION['dashboard'] = "../views/stokist-dashboard.php";
                    header("Location: ../views/stokist-dashboard.php");
                    break;
                case "User":
                    $_SESSION['dashboard'] = "../views/pengguna-dashboard.php";
                    header("Location: ../views/pengguna-dashboard.php");
                    break;
            }
        }
    } else {
        echo "Nama pengguna atau kata sandi salah.";
    }
}

?>
