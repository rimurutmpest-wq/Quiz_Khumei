<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])){
    $nama_user = $_POST['nama_user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $lvl = $_POST['lvl'];

    $sql = "UPDATE user SET nama_user='$nama_user', username='$username', pass='$pass', lvl='$lvl' WHERE id_user=$id";
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
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h2 class="mb-0">Edit User</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama:</label>
                            <input type="text" name="nama_user" value="<?= $data['nama_user']; ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input type="text" name="username" value="<?= $data['username']; ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" name="pass" value="<?= $data['pass']; ?>" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Level:</label>
                            <select name="lvl" class="form-select" required>
                                <option value="">Pilih Level...</option>
                                <option value="1" <?= ($data['lvl'] == 1) ? 'selected' : ''; ?>>Admin</option>
                                <option value="2" <?= ($data['lvl'] == 2) ? 'selected' : ''; ?>>User Biasa</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="update" class="btn btn-warning">Update</button>
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