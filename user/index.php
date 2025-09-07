<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}
?>

<h2>Selamat Datang. <?= $_SESSION['nama_user']; ?> (User)</h2>
<a href="kuis.php">Main Kuis Pilihan Ganda</a>
<a href="kuis.php">Main Kuis Benar/Salah</a>
<a href="../logout.php">logout</a>
