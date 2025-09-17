<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM soal WHERE id_soal=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])){
    $soal = mysqli_real_escape_string($conn, $_POST['soal']);
    $a = mysqli_real_escape_string($conn, $_POST['jwb_a']);
    $b = mysqli_real_escape_string($conn, $_POST['jwb_b']);
    $c = mysqli_real_escape_string($conn, $_POST['jwb_c']);
    $d = mysqli_real_escape_string($conn, $_POST['jwb_d']);
    $kunjaw = mysqli_real_escape_string($conn, $_POST['kunjaw']);

    $sql = "UPDATE soal SET soal='$soal', jwb_a='$a', jwb_b='$b', jwb_c='$c', jwb_d='$d', kunjaw='$kunjaw' WHERE id_soal=$id";
    
    if(mysqli_query($conn, $sql)) {
        $success = "Soal berhasil diperbarui!";
        // Refresh data
        $result = mysqli_query($conn, "SELECT * FROM soal WHERE id_soal=$id");
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
    <title>EduGame - Edit Soal Quiz</title>
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
                        <i class="bi bi-pencil-square me-2"></i>Edit Soal Quiz #<?= $id ?>
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
                                <i class="bi bi-question-circle me-2"></i>Pertanyaan Soal <span class="text-danger">*</span>
                            </label>
                            <textarea name="soal" class="form-control" rows="4" required><?= htmlspecialchars($data['soal']); ?></textarea>
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
                                <input type="text" name="jwb_a" value="<?= htmlspecialchars($data['jwb_a']); ?>" class="form-control" required>
                                <div class="invalid-feedback">
                                    Harap masukkan jawaban A.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-option me-2"></i>Jawaban B <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="jwb_b" value="<?= htmlspecialchars($data['jwb_b']); ?>" class="form-control" required>
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
                                <input type="text" name="jwb_c" value="<?= htmlspecialchars($data['jwb_c']); ?>" class="form-control" required>
                                <div class="invalid-feedback">
                                    Harap masukkan jawaban C.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-option me-2"></i>Jawaban D <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="jwb_d" value="<?= htmlspecialchars($data['jwb_d']); ?>" class="form-control" required>
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
                            <input type="text" name="kunjaw" value="<?= htmlspecialchars($data['kunjaw']); ?>" class="form-control" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                <strong>Saat ini:</strong> <?= htmlspecialchars($data['kunjaw']); ?>
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
                            <div>
                                <button type="submit" name="update" class="btn btn-warning px-4 me-2">
                                    <i class="bi bi-check-circle-fill me-2"></i>Update Soal
                                </button>
                                <a href="../../user/kuis.php" class="btn btn-outline-info" target="_blank">
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
                        <h6 class="fw-bold mb-3"><?= htmlspecialchars($data['soal']); ?></h6>
                        <div class="ms-3">
                            <div class="mb-2"><strong>A.</strong> <?= htmlspecialchars($data['jwb_a']); ?></div>
                            <div class="mb-2"><strong>B.</strong> <?= htmlspecialchars($data['jwb_b']); ?></div>
                            <div class="mb-2"><strong>C.</strong> <?= htmlspecialchars($data['jwb_c']); ?></div>
                            <div class="mb-2"><strong>D.</strong> <?= htmlspecialchars($data['jwb_d']); ?></div>
                        </div>
                        <div class="mt-3">
                            <span class="badge badge-custom">
                                <i class="bi bi-key-fill me-1"></i>Kunci: <?= htmlspecialchars($data['kunjaw']); ?>
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