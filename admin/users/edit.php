<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])){
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $level = $_POST['lvl'];

    $sql = "UPDATE user SET nama_user='$nama', username='$username', pass='$pass', lvl=$level WHERE id_user=$id  ";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Edit User</h2>
<form action="" method="post">
    <label>Nama</label><br>
    <input type="text" name="nama_user" value="<?= $data['nama_user']; ?>" required><br><br>

    <label>Username</label><br>
    <input type="text" name="username" value="<?= $data['username']; ?>" required><br><br>

    <label>Password</label><br>
    <input type="text" name="pass" value="<?= $data['pass']; ?>" required><br><br>

    <label>Level</label><br>
    <select name="lvl" id="" required>
        <option value="1" <?= $data['lvl']==1 ? "selected" : ""; ?>>Admin</option>
        <option value="2" <?= $data['lvl']==2 ? "selected" : ""; ?>>User Biasa</option>
    </select>


    <button type="submit" name="update">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>