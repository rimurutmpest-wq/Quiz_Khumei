<?php
include "../config/db.php";

$result = mysqli_query($conn, "SELECT * FROM soal");
$total_soal = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Quiz Pilihan Ganda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <script>
        function validateForm() {
            const radios = document.querySelectorAll('input[type="radio"]');
            const soalIds = new Set();
            
            // Kumpulkan semua ID soal
            radios.forEach(radio => {
                const match = radio.name.match(/jawaban\[(\d+)\]/);
                if(match) soalIds.add(match[1]);
            });
            
            // Periksa apakah setiap soal sudah dijawab
            let answered = 0;
            soalIds.forEach(soalId => {
                const radioGroup = document.querySelectorAll(`input[name="jawaban[${soalId}]"]`);
                for(let radio of radioGroup) {
                    if(radio.checked) {
                        answered++;
                        break;
                    }
                }
            });
            
            if(answered < soalIds.size) {
                alert(`Harap jawab semua soal! (${answered}/${soalIds.size} dijawab)`);
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
                    <a class="nav-link active" href="kuis.php">
                        <i class="bi bi-question-circle-fill me-1"></i>Quiz
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="benar_salah.php">
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
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0">
                            <i class="bi bi-question-circle-fill me-2"></i>Quiz Pilihan Ganda
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
                <p class="text-muted">Silakan hubungi admin untuk menambahkan soal quiz.</p>
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
                        <div class='d-flex align-items-start mb-3'>
                            <span class='badge bg-primary me-3 fs-6'>$no</span>
                            <h5 class='card-title mb-0 flex-grow-1'>".$row['soal']."</h5>
                        </div>
                        
                        <div class='ms-5'>
                            <div class='form-check mb-3'>
                                <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='A' id='q".$no."a'>
                                <label class='form-check-label fs-6' for='q".$no."a'>
                                    <strong>A.</strong> ".$row['jwb_a']."
                                </label>
                            </div>
                            <div class='form-check mb-3'>
                                <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='B' id='q".$no."b'>
                                <label class='form-check-label fs-6' for='q".$no."b'>
                                    <strong>B.</strong> ".$row['jwb_b']."
                                </label>
                            </div>
                            <div class='form-check mb-3'>
                                <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='C' id='q".$no."c'>
                                <label class='form-check-label fs-6' for='q".$no."c'>
                                    <strong>C.</strong> ".$row['jwb_c']."
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='D' id='q".$no."d'>
                                <label class='form-check-label fs-6' for='q".$no."d'>
                                    <strong>D.</strong> ".$row['jwb_d']."
                                </label>
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

                foreach($jawaban as $id_soal => $pilihan){
                    $cek = mysqli_query($conn, "SELECT * FROM soal WHERE id_soal=$id_soal");
                    if($cek && mysqli_num_rows($cek) > 0) {
                        $data = mysqli_fetch_assoc($cek);
                        
                        // Ambil isi jawaban berdasarkan pilihan user
                        $jawaban_user = '';
                        switch($pilihan) {
                            case 'A':
                                $jawaban_user = $data['jwb_a'];
                                break;
                            case 'B':
                                $jawaban_user = $data['jwb_b'];
                                break;
                            case 'C':
                                $jawaban_user = $data['jwb_c'];
                                break;
                            case 'D':
                                $jawaban_user = $data['jwb_d'];
                                break;
                        }
                        
                        // Bandingkan isi jawaban dengan kunci jawaban
                        if ($jawaban_user == $data['kunjaw']){
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
                            <i class='bi bi-trophy-fill me-2'></i>Hasil Quiz Anda
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
                            <a href='kuis.php' class='btn btn-custom me-3 px-4 py-2'>
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