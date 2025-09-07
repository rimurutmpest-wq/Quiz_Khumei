<?php
include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM soal");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Pilihan Ganda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Kuis Pilihan Ganda</h2>
                    <a href="index.php" class="btn btn-light">Kembali</a>
                </div>
            </div>

            <form action="" method="post">
                <?php
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
                $jawaban = $_POST ['jawaban'];
                $benar = 0; $salah = 0;

                foreach($jawaban as $id_soal => $pilihan){
                    $cek = mysqli_query($conn, "SELECT kunjaw FROM soal WHERE id_soal=$id_soal");
                    $data = mysqli_fetch_assoc($cek);

                    if ($pilihan == $data['kunjaw']){
                        $benar++;
                    } else {
                        $salah++;
                    }
                }

                echo "<div class='card shadow'>
                    <div class='card-header bg-success text-white'>
                        <h3 class='mb-0'>Hasil Kuis</h3>
                    </div>
                    <div class='card-body text-center'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='p-3 bg-light rounded'>
                                    <h2 class='text-success'>$benar</h2>
                                    <p class='mb-0'>Jawaban Benar</p>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='p-3 bg-light rounded'>
                                    <h2 class='text-danger'>$salah</h2>
                                    <p class='mb-0'>Jawaban Salah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
