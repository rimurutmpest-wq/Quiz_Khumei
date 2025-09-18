<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM soalbs WHERE id_soalbs=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])){
    $soalbs = mysqli_real_escape_string($conn, $_POST['soalbs']);
    $benar = mysqli_real_escape_string($conn, $_POST['benar']);
    $salah = mysqli_real_escape_string($conn, $_POST['salah']);
    $kunjaw = mysqli_real_escape_string($conn, $_POST['kunjaw']);

    $sql = "UPDATE soalbs SET soalbs='$soalbs', benar='$benar', salah='$salah', kunjaw='$kunjaw' WHERE id_soalbs=$id";
    
    if(mysqli_query($conn, $sql)) {
        $success = "Soal berhasil diperbarui!";
        // Refresh data
        $result = mysqli_query($conn, "SELECT * FROM soalbs WHERE id_soalbs=$id");
        $data = mysqli_fetch_assoc($result);
    } else {
        $error = "Gagal memperbarui soal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Edit Soal True/False</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Night Theme Consistent dengan index.php */
        :root {
            --main-color: #95B9C7;
            --main-hover: #7da5b5;
            --text-color: #ffffff;
            --bg-color: #071F42;
            --card-bg: rgba(7, 31, 66, 0.85);
            --card-border: rgba(149, 185, 199, 0.3);
        }

        body {
            background: url('../../images/bg-night.png') no-repeat center center fixed;
            background-size: cover;
            color: var(--text-color);
            min-height: 100vh;
        }
        
        .btn-custom {
            background-color: var(--main-color);
            border: none;
            color: #000000;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn-custom:hover {
            background-color: var(--main-hover);
            color: #000000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000000;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            color: #000000;
        }

        .navbar-custom {
            background: rgba(7, 31, 66, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--card-border);
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
        }

        .navbar-custom .nav-link:hover {
            color: var(--main-color) !important;
        }

        .admin-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            color: var(--text-color);
        }

        .card-header.bg-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800) !important;
            border-bottom: 1px solid var(--card-border);
            color: #000000;
        }

        .card-header.bg-light {
            background: rgba(255, 255, 255, 0.1) !important;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-color);
        }

        .form-label {
            color: var(--text-color);
            font-weight: 600;
        }

        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.95);
            border-color: var(--card-border);
            color: #000000;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--main-color);
            box-shadow: 0 0 0 0.25rem rgba(149, 185, 199, 0.25);
            background-color: rgba(255, 255, 255, 0.98);
        }

        .form-text {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .alert-success {
            background-color: rgba(25, 135, 84, 0.2);
            border-color: #198754;
            color: var(--text-color);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            border-color: #dc3545;
            color: var(--text-color);
        }

        .btn-outline-secondary {
            border-color: var(--card-border);
            color: var(--text-color);
        }

        .btn-outline-secondary:hover {
            background-color: var(--main-color);
            border-color: var(--main-color);
            color: #000000;
        }

        .btn-outline-info {
            border-color: #0dcaf0;
            color: #0dcaf0;
        }

        .btn-outline-info:hover {
            background-color: #0dcaf0;
            border-color: #0dcaf0;
            color: #000000;
        }

        h1, h2, h3, h4, h5, h6 {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            color: inherit;
        }

        .text-danger {
            color: #ff6b6b !important;
        }

        .text-success {
            color: #51cf66 !important;
        }

        .badge.bg-success {
            background-color: #51cf66 !important;
            color: #000000;
        }

        .badge.bg-danger {
            background-color: #ff6b6b !important;
            color: #000000;
        }

        .badge-custom {
            background-color: var(--main-color);
            color: #000000;
        }

        /* Preview section */
        .question-preview {
            background: rgba(255, 255, 255, 0.05);
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid var(--card-border);
        }
    </style>
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
                <i class="bi bi-list me-1"></i>Daftar Soal
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
                        <i class="bi bi-pencil-square me-2"></i>Edit Soal True/False #<?= $id ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
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
                        <!-- Question -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-check-circle me-2"></i>Pernyataan Soal <span class="text-danger">*</span>
                            </label>
                            <textarea name="soalbs" class="form-control" rows="4" required><?= htmlspecialchars($data['soalbs']); ?></textarea>
                            <div class="invalid-feedback">
                                Harap masukkan pernyataan soal.
                            </div>
                        </div>
                        
                        <!-- Answer Options -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>Label Pilihan Benar <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="benar" value="<?= htmlspecialchars($data['benar']); ?>" class="form-control" required>
                                <div class="invalid-feedback">
                                    Harap masukkan label pilihan benar.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-x-circle-fill text-danger me-2"></i>Label Pilihan Salah <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="salah" value="<?= htmlspecialchars($data['salah']); ?>" class="form-control" required>
                                <div class="invalid-feedback">
                                    Harap masukkan label pilihan salah.
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-key-fill me-2"></i>Kunci Jawaban <span class="text-danger">*</span>
                            </label>
                            <select name="kunjaw" class="form-select" required>
                                <option value="">Pilih kunci jawaban...</option>
                                <option value="benar" <?= ($data['kunjaw'] == 'benar') ? 'selected' : ''; ?>>Benar</option>
                                <option value="salah" <?= ($data['kunjaw'] == 'salah') ? 'selected' : ''; ?>>Salah</option>
                            </select>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                <strong>Saat ini:</strong> <?= ucfirst($data['kunjaw']); ?>
                            </div>
                            <div class="invalid-feedback">
                                Harap pilih kunci jawaban yang benar.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <div>
                                <button type="submit" name="update" class="btn btn-warning px-4 me-2">
                                    <i class="bi bi-check-circle-fill me-2"></i>Update Soal
                                </button>
                                <a href="../../user/benar_salah.php" class="btn btn-outline-info" target="_blank">
                                    <i class="bi bi-eye me-1"></i>Preview
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Preview -->
            <div class="card admin-card mt-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">
                        <i class="bi bi-eye-fill me-2"></i>Preview Soal
                    </h6>
                </div>
                <div class="card-body">
                    <div class="question-preview">
                        <h6 class="fw-bold mb-3"><?= htmlspecialchars($data['soalbs']); ?></h6>
                        <div class="ms-3">
                            <div class="mb-2">
                                <span class="badge bg-success me-2">
                                    <i class="bi bi-check-circle me-1"></i><?= htmlspecialchars($data['benar']); ?>
                                </span>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-danger me-2">
                                    <i class="bi bi-x-circle me-1"></i><?= htmlspecialchars($data['salah']); ?>
                                </span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge badge-custom">
                                <i class="bi bi-key-fill me-1"></i>Kunci: <?= ucfirst($data['kunjaw']); ?>
                            </span>
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
</script>

</body>
</html>