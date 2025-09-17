<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
cekAdmin();

// Get statistics
$total_soal_pg = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM soal"));
$total_soal_bs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM soalbs"));
$total_users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../user/index.php">
            <i class="bi bi-mortarboard-fill me-2"></i>EduGame Admin
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../user/index.php">
                        <i class="bi bi-house-fill me-1"></i>Lihat Website
                    </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link">
                        <i class="bi bi-person-circle me-1"></i>Halo, <?php echo $_SESSION['username']?>!
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../logout.php">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">
                                <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                            </h2>
                            <p class="mb-0">Selamat datang di panel administrasi EduGame</p>
                        </div>
                        <div>
                            <i class="bi bi-shield-check" style="font-size: 2.5rem; opacity: 0.8;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card admin-card text-center">
                <div class="card-body py-4">
                    <i class="bi bi-question-circle-fill text-primary" style="font-size: 3rem;"></i>
                    <h3 class="mt-3 mb-1"><?= $total_soal_pg ?></h3>
                    <p class="text-muted mb-0">Soal Pilihan Ganda</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card admin-card text-center">
                <div class="card-body py-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <h3 class="mt-3 mb-1"><?= $total_soal_bs ?></h3>
                    <p class="text-muted mb-0">Soal True/False</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card admin-card text-center">
                <div class="card-body py-4">
                    <i class="bi bi-people-fill text-warning" style="font-size: 3rem;"></i>
                    <h3 class="mt-3 mb-1"><?= $total_users ?></h3>
                    <p class="text-muted mb-0">Total Users</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="row">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>Menu Administrasi
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <a href="kuis/index.php" class="btn btn-custom w-100 py-4 text-decoration-none">
                                <div class="text-center">
                                    <i class="bi bi-question-circle-fill" style="font-size: 2.5rem;"></i>
                                    <h5 class="mt-3 mb-1">Kelola Quiz</h5>
                                    <small>Soal Pilihan Ganda</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="benar_salah/index.php" class="btn btn-custom w-100 py-4 text-decoration-none">
                                <div class="text-center">
                                    <i class="bi bi-check-circle-fill" style="font-size: 2.5rem;"></i>
                                    <h5 class="mt-3 mb-1">Kelola True/False</h5>
                                    <small>Soal Benar/Salah</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="users/index.php" class="btn btn-custom w-100 py-4 text-decoration-none">
                                <div class="text-center">
                                    <i class="bi bi-people-fill" style="font-size: 2.5rem;"></i>
                                    <h5 class="mt-3 mb-1">Kelola Users</h5>
                                    <small>Manajemen Pengguna</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="../user/index.php" class="btn btn-outline-secondary w-100 py-4 text-decoration-none">
                                <div class="text-center">
                                    <i class="bi bi-eye-fill" style="font-size: 2.5rem;"></i>
                                    <h5 class="mt-3 mb-1">Preview Website</h5>
                                    <small>Lihat Tampilan User</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Info -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle-fill me-2"></i>Informasi Sistem
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="bi bi-gear-fill me-2"></i>Fitur Tersedia:</h6>
                            <ul class="list-unstyled ms-3">
                                <li><i class="bi bi-check text-success me-2"></i>Manajemen soal pilihan ganda</li>
                                <li><i class="bi bi-check text-success me-2"></i>Manajemen soal true/false</li>
                                <li><i class="bi bi-check text-success me-2"></i>Manajemen pengguna</li>
                                <li><i class="bi bi-check text-success me-2"></i>Interface user-friendly</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="bi bi-exclamation-triangle-fill me-2"></i>Catatan Penting:</h6>
                            <ul class="list-unstyled ms-3">
                                <li><i class="bi bi-dot"></i>User biasa tidak perlu login untuk bermain</li>
                                <li><i class="bi bi-dot"></i>Hasil quiz tidak disimpan secara permanen</li>
                                <li><i class="bi bi-dot"></i>Hanya admin yang memerlukan login</li>
                                <li><i class="bi bi-dot"></i>Backup data secara berkala</li>
                            </ul>
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