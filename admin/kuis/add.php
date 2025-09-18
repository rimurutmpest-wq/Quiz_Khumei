<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

if(isset($_POST['simpan'])){
    $soal = mysqli_real_escape_string($conn, $_POST['soal']);
    $a = mysqli_real_escape_string($conn, $_POST['jwb_a']);
    $b = mysqli_real_escape_string($conn, $_POST['jwb_b']);
    $c = mysqli_real_escape_string($conn, $_POST['jwb_c']);
    $d = mysqli_real_escape_string($conn, $_POST['jwb_d']);
    $kunjaw = mysqli_real_escape_string($conn, $_POST['kunjaw']);

    $sql = "INSERT INTO soal (soal, jwb_a, jwb_b, jwb_c, jwb_d, kunjaw)
    VALUES ('$soal', '$a', '$b', '$c', '$d', '$kunjaw')";
    
    if(mysqli_query($conn, $sql)) {
        $success = "Soal berhasil ditambahkan!";
        // Auto redirect after 2 seconds
        echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
    } else {
        $error = "Gagal menambahkan soal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Tambah Soal Quiz</title>
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

        .card-header.bg-success {
            background: linear-gradient(135deg, #198754, #146c43) !important;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-color);
        }

        .card-header.bg-info {
            background: linear-gradient(135deg, #0dcaf0, #0d6efd) !important;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-color);
        }

        .form-label {
            color: var(--text-color);
            font-weight: 600;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.95);
            border-color: var(--card-border);
            color: #000000;
        }

        .form-control:focus {
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

        h1, h2, h3, h4, h5, h6 {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            color: var(--text-color);
        }

        .text-danger {
            color: #ff6b6b !important;
        }

        .text-success {
            color: #51cf66 !important;
        }

        .invalid-feedback {
            color: #ff6b6b;
        }

        .was-validated .form-control:invalid {
            border-color: #ff6b6b;
        }

        .was-validated .form-control:valid {
            border-color: #51cf66;
        }

        /* List styling */
        .list-unstyled li {
            color: var(--text-color);
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
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0">
                        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Soal Quiz Baru
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
                    <div class="mt-2">
                        <small><i class="bi bi-info-circle me-1"></i>Anda akan diarahkan ke halaman daftar soal...</small>
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
                        <!-- Question -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-question-circle me-2"></i>Pertanyaan Soal <span class="text-danger">*</span>
                            </label>
                            <textarea name="soal" class="form-control" rows="4" required 
                                      placeholder="Contoh: Siapa presiden pertama Indonesia?"></textarea>
                            <div class="invalid-feedback">
                                Harap masukkan pertanyaan soal.
                            </div>
                        </div>
                        
                        <!-- Answers -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-option me-2"></i>Jawaban A <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="jwb_a" class="form-control" required 
                                       placeholder="Pilihan jawaban A">
                                <div class="invalid-feedback">
                                    Harap masukkan jawaban A.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-option me-2"></i>Jawaban B <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="jwb_b" class="form-control" required 
                                       placeholder="Pilihan jawaban B">
                                <div class="invalid-feedback">
                                    Harap masukkan jawaban B.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-option me-2"></i>Jawaban C <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="jwb_c" class="form-control" required 
                                       placeholder="Pilihan jawaban C">
                                <div class="invalid-feedback">
                                    Harap masukkan jawaban C.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-option me-2"></i>Jawaban D <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="jwb_d" class="form-control" required 
                                       placeholder="Pilihan jawaban D">
                                <div class="invalid-feedback">
                                    Harap masukkan jawaban D.
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-key-fill me-2"></i>Kunci Jawaban <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="kunjaw" class="form-control" required 
                                   placeholder="Masukkan isi jawaban yang benar (bukan A/B/C/D, tapi isi jawabannya)">
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                <strong>Penting:</strong> Masukkan teks lengkap dari jawaban yang benar, 
                                bukan hanya huruf A/B/C/D. Contoh: "Soekarno" bukan "A".
                            </div>
                            <div class="invalid-feedback">
                                Harap masukkan kunci jawaban yang benar.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" name="simpan" class="btn btn-custom px-4">
                                <i class="bi bi-check-circle-fill me-2"></i>Simpan Soal
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Card -->
            <div class="card admin-card mt-4">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">
                        <i class="bi bi-lightbulb-fill me-2"></i>Tips Membuat Soal
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li><i class="bi bi-check text-success me-2"></i>Buat pertanyaan yang jelas dan mudah dipahami</li>
                        <li><i class="bi bi-check text-success me-2"></i>Pastikan hanya ada satu jawaban yang paling tepat</li>
                        <li><i class="bi bi-check text-success me-2"></i>Hindari jawaban yang terlalu mirip atau ambigu</li>
                        <li><i class="bi bi-check text-success me-2"></i>Kunci jawaban harus persis sama dengan salah satu pilihan</li>
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
</script>

</body>
</html>