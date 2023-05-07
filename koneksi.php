<?php

//Config
$host = "127.0.0.1";
$username = "root";
$password = "Password";
$dbname = "tp2_toko";
$port = 3306;


//Connect
$koneksi = mysqli_connect($host, $username, $password, $dbname, $port) or die("Database Mysql Tidak Terhubung");
