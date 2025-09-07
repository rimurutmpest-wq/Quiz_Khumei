<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM user");
if(isset($_POST['simpan'])){
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $level = $_POST['lvl'];

    $sql = "INSERT INTO user (nama_user, username, pass, lvl)
    VALUES ('$nama_user', '$username', '$pass', '$level')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Tambah User</h2>
<form action="" method="post">
    <label for="">Nama</label><br>
    <textarea name="nama_user" required></textarea><br><br>
    
    <label>Benar</label><br>
    <input type="text" name="benar" required><br><br>

    <label>Salah</label><br>
    <input type="text" name="salah" required><br><br>

    <label>Kunci Jawaban:</label><br>
    <input type="text" name="kunjaw" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
    