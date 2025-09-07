<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $level = $_POST['lvl'];

    $sql = "INSERT INTO user (nama_user, username, pass, lvl)
    VALUES ('$nama', '$username', '$password', '$level')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Tambah User</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama:</label>
                            <input type="text" name="nama_user" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Level:</label>
                            <select name="lvl" class="form-select" required>
                                <option value="">Pilih Level...</option>
                                <option value="1">Admin</option>
                                <option value="2">User Biasa</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>