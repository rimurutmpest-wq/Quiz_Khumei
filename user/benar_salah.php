<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM soalbs");
$total_soal = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Benar/Salah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body class="bg-light">

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Kuis Benar/Salah</h2>
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
                                <h5 class='card-title text-info'>$no. ".$row['soalbs']."</h5>
                                <div class='mt-3'>
                                    <div class='form-check mb-2'>
                                        <input class='form-check-input' type='radio' name='jawaban[".$row['id_soalbs']."]' value='benar' id='bs".$no."a'>
                                        <label class='form-check-label' for='bs".$no."a'>".$row['benar']."</label>
                                    </div>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='jawaban[".$row['id_soalbs']."]' value='salah' id='bs".$no."b'>
                                        <label class='form-check-label' for='bs".$no."b'>".$row['salah']."</label>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        $no++;
                    }
                    ?>
                    <div class="text-center mb-4">
                        <button type="submit" name="submit" class="btn btn-info btn-lg px-5">Kirim Jawaban</button>
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
                                
                                // Debug: Tampilkan nilai untuk pengecekan
                                // echo "Soal ID: $id_soalbs, Pilihan: $pilihan, Kunci: ".$data['kunjaw']."<br>";
                                
                                if ($pilihan == $data['kunjaw']){
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
                                    <a href='benar_salah.php' class='btn btn-primary me-3 px-4'>Coba Lagi</a>
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