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
    VALUES ('$nama', '$username', '$pass', '$level')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Tambah User</h2>
<form action="" method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama_user" required><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="pass" required><br><br>

    <label>Level:</label><br>
    <select name="lvl" required>
        <option value="1">Admin</option>
        <option value="2">User Biasa</option>
    </select><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
    