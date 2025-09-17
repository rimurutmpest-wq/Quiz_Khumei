<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

if(isset($_POST['simpan'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama_user']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $level = mysqli_real_escape_string($conn, $_POST['lvl']);

    // Check if username already exists
    $check_user = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_num_rows($check_user) > 0) {
        $error = "Username sudah digunakan! Pilih username lain.";
    } else {
        $sql = "INSERT INTO user (nama_user, username, pass, lvl)
        VALUES ('$nama', '$username', '$password', '$level')";
        
        if(mysqli_query($conn, $sql)) {
            $success = "User berhasil ditambahkan!";
            // Auto redirect after 2 seconds
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
        } else {
            $error = "Gagal menambahkan user: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Tambah User</title>
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
            <a class="nav-link" href="index.php">
                <i class="bi bi-people me-1"></i>Daftar User
            </a>
            <a class="nav-link" href="../index.php">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">
                        <i class="bi bi-person-plus-fill me-2"></i>Tambah User Baru
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <?php if (isset($success)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?= $success ?>
                    <div class="mt-2">
                        <small><i class="bi bi-info-circle me-1"></i>Anda akan diarahkan ke halaman daftar user...</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?= $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card admin-card">
                <div class="card-body">
                    <form action="" method="post" class="needs-validation" novalidate>
                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-person me-2"></i>Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="nama_user" class="form-control" required 
                                   placeholder="Masukkan nama lengkap">
                            <div class="invalid-feedback">
                                Harap masukkan nama lengkap.
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-at me-2"></i>Username <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="username" class="form-control" required 
                                   placeholder="Masukkan username">
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>Username harus unik dan tidak boleh sama dengan user lain.
                            </div>
                            <div class="invalid-feedback">
                                Harap masukkan username.
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-key me-2"></i>Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" name="pass" id="password" class="form-control" required 
                                       placeholder="Masukkan password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback">
                                Harap masukkan password.
                            </div>
                        </div>

                        <!-- Level -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-shield me-2"></i>Level Akses <span class="text-danger">*</span>
                            </label>
                            <select name="lvl" class="form-select" required>
                                <option value="">Pilih level akses...</option>
                                <option value="1">
                                    <i class="bi bi-shield-check"></i> Admin - Akses penuh ke sistem
                                </option>
                                <option value="2">
                                    <i class="bi bi-person"></i> User Biasa - Akses terbatas
                                </option>
                            </select>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                <strong>Admin:</strong> dapat mengelola soal dan user. 
                                <strong>User Biasa:</strong> akun cadangan/testing.
                            </div>
                            <div class="invalid-feedback">
                                Harap pilih level akses.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" name="simpan" class="btn btn-custom px-4">
                                <i class="bi bi-check-circle-fill me-2"></i>Simpan User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Card -->
            <div class="card admin-card mt-4">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">
                        <i class="bi bi-lightbulb-fill me-2"></i>Tips Menambah User
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li><i class="bi bi-check text-success me-2"></i>Gunakan username yang mudah diingat</li>
                        <li><i class="bi bi-check text-success me-2"></i>Password sebaiknya minimal 6 karakter</li>
                        <li><i class="bi bi-check text-success me-2"></i>Level Admin untuk pengelola sistem</li>
                        <li><i class="bi bi-check text-success me-2"></i>User umum tidak perlu akun (bisa langsung main)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Form Validation Script -->
<script>
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Toggle Password Visibility
document.getElementById('togglePassword').addEventListener('click', function() {
    const password = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (password.type === 'password') {
        password.type = 'text';
        toggleIcon.className = 'bi bi-eye-slash';
    } else {
        password.type = 'password';
        toggleIcon.className = 'bi bi-eye';
    }
});
</script>

</body>
</html>