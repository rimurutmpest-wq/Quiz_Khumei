<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])){
    $nama_user = mysqli_real_escape_string($conn, $_POST['nama_user']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $lvl = mysqli_real_escape_string($conn, $_POST['lvl']);

    // Check if username already exists (except current user)
    $check_user = mysqli_query($conn, "SELECT username FROM user WHERE username='$username' AND id_user != $id");
    if(mysqli_num_rows($check_user) > 0) {
        $error = "Username sudah digunakan oleh user lain! Pilih username lain.";
    } else {
        $sql = "UPDATE user SET nama_user='$nama_user', username='$username', pass='$pass', lvl='$lvl' WHERE id_user=$id";
        
        if(mysqli_query($conn, $sql)) {
            $success = "User berhasil diperbarui!";
            // Refresh data
            $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");
            $data = mysqli_fetch_assoc($result);
        } else {
            $error = "Gagal memperbarui user: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Edit User</title>
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
                <div class="card-header bg-warning text-dark">
                    <h2 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i>Edit User #<?= $id ?>
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
                            <input type="text" name="nama_user" value="<?= htmlspecialchars($data['nama_user']); ?>" 
                                   class="form-control" required>
                            <div class="invalid-feedback">
                                Harap masukkan nama lengkap.
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-at me-2"></i>Username <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="username" value="<?= htmlspecialchars($data['username']); ?>" 
                                   class="form-control" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>Username saat ini: <strong><?= htmlspecialchars($data['username']); ?></strong>
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
                                <input type="password" name="pass" id="password" value="<?= htmlspecialchars($data['pass']); ?>" 
                                       class="form-control" required>
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
                                <option value="1" <?= ($data['lvl'] == 1) ? 'selected' : ''; ?>>
                                    Admin - Akses penuh ke sistem
                                </option>
                                <option value="2" <?= ($data['lvl'] == 2) ? 'selected' : ''; ?>>
                                    User Biasa - Akses terbatas
                                </option>
                            </select>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                Level saat ini: <strong><?= ($data['lvl'] == 1) ? 'Admin' : 'User Biasa'; ?></strong>
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
                            <button type="submit" name="update" class="btn btn-warning px-4">
                                <i class="bi bi-check-circle-fill me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Info -->
            <div class="card admin-card mt-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">
                        <i class="bi bi-info-circle-fill me-2"></i>Informasi User Saat Ini
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Nama:</strong><br>
                            <span class="text-muted"><?= htmlspecialchars($data['nama_user']); ?></span>
                        </div>
                        <div class="col-sm-6">
                            <strong>Username:</strong><br>
                            <span class="text-muted"><?= htmlspecialchars($data['username']); ?></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Level:</strong><br>
                            <span class="badge bg-<?= ($data['lvl'] == 1) ? 'danger' : 'info'; ?>">
                                <i class="bi bi-<?= ($data['lvl'] == 1) ? 'shield-check' : 'person'; ?> me-1"></i>
                                <?= ($data['lvl'] == 1) ? 'Admin' : 'User Biasa'; ?>
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <strong>ID User:</strong><br>
                            <span class="text-muted">#<?= $data['id_user']; ?></span>
                        </div>
                    </div>
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