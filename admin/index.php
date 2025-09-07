<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
cekAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h2>Dashboard Admin</h2>
                    <p class="mb-0">Halo, <?php echo $_SESSION['username']?>!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <a href="kuis/index.php" class="btn btn-primary w-100 py-3">
                                <strong>Kelola Soal Pilihan Ganda</strong>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="benar_salah/index.php" class="btn btn-info w-100 py-3">
                                <strong>Kelola Soal Benar/Salah</strong>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="users/index.php" class="btn btn-warning w-100 py-3">
                                <strong>Kelola User</strong>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="../logout.php" class="btn btn-danger w-100 py-3">
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