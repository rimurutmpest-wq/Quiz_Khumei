<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soalbs");
if(isset($_POST['simpan'])){
    $soalbs = $_POST['soalbs'];
    $benar = $_POST['benar'];
    $salah = $_POST['salah'];
    $kunjaw = $_POST['kunjaw'];

    $sql = "INSERT INTO soalbs (soalbs, benar, salah, kunjaw)
    VALUES ('$soalbs', '$benar', '$salah', '$kunjaw')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Soal Benar Salah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0">Tambah Soal Benar Salah</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Soal</label>
                            <textarea name="soalbs" class="form-control" rows="3" required></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Benar:</label>
                                <input type="text" name="benar" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Salah:</label>
                                <input type="text" name="salah" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Kunci Jawaban:</label>
                            <input type="text" name="kunjaw" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>