<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center">
                    <h2>Selamat Datang, <?= $_SESSION['username']; ?> (User)</h2>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <a href="kuis.php" class="btn btn-primary btn-lg w-100 py-4">
                                <strong>Main Kuis<br>Pilihan Ganda</strong>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="benar_salah.php" class="btn btn-success btn-lg w-100 py-4">
                                <strong>Main Kuis<br>Benar/Salah</strong>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="../logout.php" class="btn btn-danger btn-lg w-100 py-4">
                                <strong>Logout</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>