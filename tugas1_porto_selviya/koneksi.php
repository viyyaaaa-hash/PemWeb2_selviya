<?php
// koneksi database
$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'db_selviyaportof';

// buat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// set charset
mysqli_set_charset($conn, 'utf8mb4');
?>