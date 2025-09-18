<?php
include "../config/db.php";

$result = mysqli_query($conn, "SELECT * FROM soalbs");
$total_soal = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - True or False</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Night Theme Consistent with index.php */
        :root {
            --main-color: #95B9C7;
            --main-hover: #7da5b5;
            --text-color: #ffffff;
            --bg-color: #071F42;
            --card-bg: rgba(7, 31, 66, 0.85);
            --card-border: rgba(149, 185, 199, 0.3);
        }

        body {
            background: url('../images/bg-night.png') no-repeat center center fixed;
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
        
        .card-custom {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            color: var(--text-color);
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

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: var(--main-color) !important;
        }

        .navbar-custom .nav-link.active {
            font-weight: bold;
        }
        
        /* Custom Radio Button Styles */
        .form-check-input:checked {
            background-color: var(--main-color);
            border-color: var(--main-color);
        }
        
        .form-check-input:focus {
            border-color: var(--main-color);
            box-shadow: 0 0 0 0.25rem rgba(149, 185, 199, 0.25);
        }
        
        .question-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            color: var(--text-color);
        }
        
        .question-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
        
        .true-false-option {
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .true-false-option:hover {
            background-color: rgba(149, 185, 199, 0.2);
            border-color: var(--main-color);
        }

        .card-header.bg-primary {
            background: linear-gradient(135deg, #071F42, #031B4D) !important;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-color);
        }

        .card-header.bg-success {
            background: linear-gradient(135deg, #198754, #146c43) !important;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-color);
        }

        h1, h2, h3, h4, h5, h6 {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            color: var(--text-color);
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.9) !important;
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

        /* Form check labels */
        .form-check-label {
            color: var(--text-color);
        }

        /* Badge styles */
        .badge.bg-light {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: var(--text-color);
        }

        .badge.bg-success {
            background-color: var(--main-color) !important;
            color: #000000;
        }

        /* Alert styling */
        .alert.alert-warning {
            background-color: rgba(255, 193, 7, 0.2);
            border-color: #ffc107;
            color: var(--text-color);
        }

        /* Result cards styling */
        .bg-light.rounded {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid var(--card-border);
        }
    </style>
    <script>
        function validateForm() {
            const totalSoal = <?= $total_soal; ?>;
            let jawabCount = 0;
            
            // Kumpulkan semua nama input radio yang unik
            const radioNames = new Set();
            const radios = document.querySelectorAll('input[type="radio"]');
            radios.forEach(radio => {
                radioNames.add(radio.name);
            });
            
            // Periksa apakah setiap grup radio sudah dijawab
            radioNames.forEach(name => {
                const radioGroup = document.querySelectorAll(`input[name="${name}"]`);
                for(let radio of radioGroup) {
                    if(radio.checked) {
                        jawabCount++;
                        break;
                    }
                }
            });
            
            if(jawabCount < totalSoal) {
                alert(`Harap jawab semua soal! (${jawabCount}/${totalSoal} dijawab)`);
                return false;
            }
            
            return confirm('Yakin ingin submit jawaban?');
        }
    </script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-mortarboard-fill me-2"></i>EduGame
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="bi bi-house-fill me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kuis.php">
                        <i class="bi bi-question-circle-fill me-1"></i>Quiz
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="benar_salah.php">
                        <i class="bi bi-check-circle-fill me-1"></i>True/False
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login.php">
                        <i class="bi bi-person-fill me-1"></i>Admin Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-custom">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0">
                            <i class="bi bi-check-circle-fill me-2"></i>True or False Quiz
                        </h2>
                    </div>
                    <div>
                        <span class="badge bg-light text-dark fs-6">
                            <i class="bi bi-list-ol me-1"></i>Total: <?= $total_soal; ?> soal
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($total_soal == 0): ?>
        <div class="card card-custom">
            <div class="card-body text-center py-5">
                <i class="bi bi-exclamation-triangle text-warning" style="font-size: 4rem;"></i>
                <h4 class="mt-3">Belum Ada Soal Tersedia</h4>
                <p class="text-muted">Silakan hubungi admin untuk menambahkan soal True/False.</p>
                <a href="index.php" class="btn btn-custom">
                    <i class="bi bi-house-fill me-2"></i>Kembali ke Home
                </a>
            </div>
        </div>
    <?php else: ?>
        <form action="" method="post" onsubmit="return validateForm()">
            <?php
            mysqli_data_seek($result, 0); // Reset pointer
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card card-custom question-card mb-4'>
                    <div class='card-body'>
                        <div class='d-flex align-items-start mb-4'>
                            <span class='badge bg-success me-3 fs-6'>$no</span>
                            <h5 class='card-title mb-0 flex-grow-1'>".$row['soalbs']."</h5>
                        </div>
                        
                        <div class='ms-5'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='true-false-option'>
                                        <div class='form-check d-flex align-items-center'>
                                            <input class='form-check-input me-3' type='radio' name='jawaban[".$row['id_soalbs']."]' value='benar' id='bs".$no."a' style='transform: scale(1.3);'>
                                            <label class='form-check-label fs-5 fw-bold text-success' for='bs".$no."a'>
                                                <i class='bi bi-check-circle-fill me-2'></i>".$row['benar']."
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='true-false-option'>
                                        <div class='form-check d-flex align-items-center'>
                                            <input class='form-check-input me-3' type='radio' name='jawaban[".$row['id_soalbs']."]' value='salah' id='bs".$no."b' style='transform: scale(1.3);'>
                                            <label class='form-check-label fs-5 fw-bold text-danger' for='bs".$no."b'>
                                                <i class='bi bi-x-circle-fill me-2'></i>".$row['salah']."
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
                $no++;
            }
            ?>
            
            <div class="text-center mb-5">
                <button type="submit" name="submit" class="btn btn-custom btn-lg px-5 py-3">
                    <i class="bi bi-send-fill me-2"></i>
                    <strong>Selanjutnya</strong>
                </button>
            </div>
        </form>

        <?php
        if(isset($_POST['submit'])){
            if(isset($_POST['jawaban']) && !empty($_POST['jawaban'])){
                $jawaban = $_POST['jawaban'];
                $benar = 0; 
                $salah = 0;

                foreach($jawaban as $id_soalbs => $pilihan){
                    $cek = mysqli_query($conn, "SELECT kunjaw FROM soalbs WHERE id_soalbs=$id_soalbs");
                    if($cek && mysqli_num_rows($cek) > 0) {
                        $data = mysqli_fetch_assoc($cek);
                        
                        if ($pilihan == $data['kunjaw']){
                            $benar++;
                        } else {
                            $salah++;
                        }
                    }
                }

                $total = $benar + $salah;
                $percentage = round(($benar / $total) * 100);

                echo "<div class='card card-custom'>
                    <div class='card-header bg-success text-white'>
                        <h3 class='mb-0'>
                            <i class='bi bi-trophy-fill me-2'></i>Hasil True/False Quiz
                        </h3>
                    </div>
                    <div class='card-body text-center py-5'>
                        <div class='row mb-4'>
                            <div class='col-md-4'>
                                <div class='p-4 bg-light rounded'>
                                    <i class='bi bi-check-circle-fill text-success' style='font-size: 3rem;'></i>
                                    <h2 class='text-success mb-2 mt-2'>$benar</h2>
                                    <p class='mb-0 fs-5'>Jawaban Benar</p>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='p-4 bg-light rounded'>
                                    <i class='bi bi-x-circle-fill text-danger' style='font-size: 3rem;'></i>
                                    <h2 class='text-danger mb-2 mt-2'>$salah</h2>
                                    <p class='mb-0 fs-5'>Jawaban Salah</p>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='p-4 bg-light rounded'>
                                    <i class='bi bi-percent text-info' style='font-size: 3rem;'></i>
                                    <h2 class='text-info mb-2 mt-2'>$percentage%</h2>
                                    <p class='mb-0 fs-5'>Persentase</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class='mt-4'>
                            <a href='benar_salah.php' class='btn btn-custom me-3 px-4 py-2'>
                                <i class='bi bi-arrow-clockwise me-2'></i>Coba Lagi
                            </a>
                            <a href='index.php' class='btn btn-outline-secondary px-4 py-2'>
                                <i class='bi bi-house-fill me-2'></i>Kembali ke Home
                            </a>
                        </div>
                    </div>
                </div>";
            } else {
                echo "<div class='card card-custom'>
                    <div class='card-body text-center py-4'>
                        <i class='bi bi-exclamation-triangle text-warning' style='font-size: 3rem;'></i>
                        <h4 class='mt-3'>Tidak Ada Jawaban yang Dipilih!</h4>
                        <p class='text-muted'>Silakan pilih jawaban untuk setiap soal sebelum submit.</p>
                    </div>
                </div>";
            }
        }
        ?>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>