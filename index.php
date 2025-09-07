<?php
include "config/auth.php";
include "config/db.php";
cekLogin();
cekAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Dashboard Admin</h2>
    <p>Halo, <?php echo $_SESSION['username']?>!</p>

    <ul>
        <li><a href="kuis/index.php">Kelola Soal Pilihan Ganda</a></li>
        <li><a href="benar_salah/index.php">Kelola Soal Benar_salah</a></li>
        <li><a href="users/index.php">Kelola User</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>