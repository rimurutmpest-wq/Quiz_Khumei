<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM user ORDER BY id_user DESC");
$total_users = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Kelola User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../../user/index.php">
            <i class="bi bi-mortarboard-fill me-2"></i>EduGame Admin
        </a>
        
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="../index.php">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
            <a class="nav-link text-danger" href="../../logout.php">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-warning text-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">
                                <i class="bi bi-people-fill me-2"></i>Kelola User
                            </h2>
                            <p class="mb-0">Manajemen pengguna sistem</p>
                        </div>
                        <div>
                            <span class="badge bg-dark text-white fs-6">
                                <i class="bi bi-person-lines-fill me-1"></i>Total: <?= $total_users ?> user
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <a href="add.php" class="btn btn-custom">
                    <i class="bi bi-person-plus-fill me-2"></i>Tambah User Baru
                </a>
                <a href="../index.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="row">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="bi bi-table me-2"></i>Daftar User
                    </h5>
                </div>
                <div class="card-body">
                    <?php if ($total_users == 0): ?>
                        <div class="text-center py-5">
                            <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                            <h4 class="mt-3 text-muted">Belum Ada User</h4>
                            <p class="text-muted">Klik tombol "Tambah User Baru" untuk menambahkan user pertama.</p>
                            <a href="add.php" class="btn btn-custom">
                                <i class="bi bi-person-plus-fill me-2"></i>Tambah User Pertama
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="8%">No</th>
                                        <th width="25%">Nama</th>
                                        <th width="20%">Username</th>
                                        <th width="20%">Password</th>
                                        <th width="15%">Level</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $level_text = $row['lvl'] == 1 ? "Admin" : "User";
                                        $level_class = $row['lvl'] == 1 ? "danger" : "info";
                                        
                                        echo "<tr>
                                            <td><span class='badge bg-secondary'>$no</span></td>
                                            <td>
                                                <div class='d-flex align-items-center'>
                                                    <i class='bi bi-person-circle text-muted me-2'></i>
                                                    <span>".htmlspecialchars($row['nama_user'])."</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class='badge bg-secondary'>".htmlspecialchars($row['username'])."</span>
                                            </td>
                                            <td>
                                                <small class='text-muted'>".str_repeat('•', strlen($row['pass']))."</small>
                                            </td>
                                            <td>
                                                <span class='badge bg-$level_class'>
                                                    <i class='bi bi-".($row['lvl']==1?'shield-check':'person')." me-1'></i>$level_text
                                                </span>
                                            </td>
                                            <td>
                                                <div class='btn-group btn-group-sm'>
                                                    <a href='edit.php?id=".$row['id_user']."' 
                                                       class='btn btn-warning btn-sm' 
                                                       title='Edit User'>
                                                        <i class='bi bi-pencil-square'></i>
                                                    </a>
                                                    <a href='delete.php?id=".$row['id_user']."' 
                                                       class='btn btn-danger btn-sm' 
                                                       title='Hapus User'
                                                       onclick=\"return confirm('Yakin hapus user ini? Tindakan tidak dapat dibatalkan!')\">
                                                        <i class='bi bi-trash3-fill'></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Summary -->
                        <div class="mt-3 p-3 bg-light rounded">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <i class="bi bi-people-fill text-warning"></i>
                                    <strong><?= $total_users ?></strong> Total User
                                </div>
                                <div class="col-md-4">
                                    <i class="bi bi-shield-check text-danger"></i>
                                    <strong><?php
                                    $admin_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE lvl = 1"));
                                    echo $admin_count;
                                    ?></strong> Admin
                                </div>
                                <div class="col-md-4">
                                    <i class="bi bi-person text-info"></i>
                                    <strong><?php
                                    $user_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE lvl = 2"));
                                    echo $user_count;
                                    ?></strong> User Biasa
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Card -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">
                        <i class="bi bi-info-circle-fill me-2"></i>Informasi User Level
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="bi bi-shield-check text-danger me-2"></i>Admin (Level 1):</h6>
                            <ul class="list-unstyled ms-3">
                                <li><i class="bi bi-check text-success me-2"></i>Dapat mengakses semua fitur admin</li>
                                <li><i class="bi bi-check text-success me-2"></i>Mengelola soal quiz dan true/false</li>
                                <li><i class="bi bi-check text-success me-2"></i>Mengelola user lain</li>
                                <li><i class="bi bi-check text-success me-2"></i>Akses penuh ke dashboard admin</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="bi bi-person text-info me-2"></i>User Biasa (Level 2):</h6>
                            <ul class="list-unstyled ms-3">
                                <li><i class="bi bi-dot"></i>Akun cadangan/testing</li>
                                <li><i class="bi bi-dot"></i>Tidak digunakan untuk user umum</li>
                                <li><i class="bi bi-dot"></i>User umum tidak perlu registrasi</li>
                                <li><i class="bi bi-dot"></i>Login hanya untuk admin</li>
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