<?php
// Konfig DB
$host = "localhost";
$user = "root";
$pass = "";
$db = "gameedu";

// Koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>