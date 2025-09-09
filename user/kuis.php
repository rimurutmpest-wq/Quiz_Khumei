<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM soal");
$total_soal = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Pilihan Ganda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body class="bg-light">

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Kuis Pilihan Ganda</h2>
                    <div>
                        <span class="badge bg-light text-dark">Total: <?= $total_soal; ?> soal</span>
                        <a href="index.php" class="btn btn-light ms-2">Kembali</a>
                    </div>
                </div>
            </div>

            <?php if ($total_soal == 0): ?>
                <div class="alert alert-warning text-center">
                    <h4>Belum ada soal tersedia</h4>
                    <p>Silakan hubungi admin untuk menambahkan soal.</p>
                </div>
            <?php else: ?>
                <form action="" method="post" onsubmit="return validateForm()">
                    <?php
                    mysqli_data_seek($result, 0); // Reset pointer
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='card shadow mb-3'>
                            <div class='card-body'>
                                <h5 class='card-title text-primary'>$no. ".$row['soal']."</h5>
                                <div class='mt-3'>
                                    <div class='form-check mb-2'>
                                        <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='A' id='q".$no."a'>
                                        <label class='form-check-label' for='q".$no."a'>A. ".$row['jwb_a']."</label>
                                    </div>
                                    <div class='form-check mb-2'>
                                        <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='B' id='q".$no."b'>
                                        <label class='form-check-label' for='q".$no."b'>B. ".$row['jwb_b']."</label>
                                    </div>
                                    <div class='form-check mb-2'>
                                        <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='C' id='q".$no."c'>
                                        <label class='form-check-label' for='q".$no."c'>C. ".$row['jwb_c']."</label>
                                    </div>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='jawaban[".$row['id_soal']."]' value='D' id='q".$no."d'>
                                        <label class='form-check-label' for='q".$no."d'>D. ".$row['jwb_d']."</label>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        $no++;
                    }
                    ?>
                    <div class="text-center mb-4">
                        <button type="submit" name="submit" class="btn btn-success btn-lg px-5">Kirim Jawaban</button>
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

                        echo "<div class='card shadow'>
                            <div class='card-header bg-success text-white'>
                                <h3 class='mb-0'>Hasil Kuis</h3>
                            </div>
                            <div class='card-body text-center'>
                                <div class='row mb-3'>
                                    <div class='col-md-6'>
                                        <div class='p-4 bg-light rounded'>
                                            <h2 class='text-success mb-2'>$benar</h2>
                                            <p class='mb-0 fs-5'>Jawaban Benar</p>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='p-4 bg-light rounded'>
                                            <h2 class='text-danger mb-2'>$salah</h2>
                                            <p class='mb-0 fs-5'>Jawaban Salah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class='mt-4'>
                                    <a href='kuis.php' class='btn btn-primary me-3 px-4'>Coba Lagi</a>
                                    <a href='index.php' class='btn btn-secondary px-4'>Kembali ke Menu</a>
                                </div>
                            </div>
                        </div>";
                    } else {
                        echo "<div class='alert alert-warning text-center'>
                            <h4>Tidak ada jawaban yang dipilih!</h4>
                            <p>Silakan pilih jawaban untuk setiap soal sebelum submit.</p>
                        </div>";
                    }
                }
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>