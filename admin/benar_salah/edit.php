<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM soalbs WHERE id_soalbs=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])){
    $soalbs = $_POST['soalbs'];
    $benar = $_POST['benar'];
    $salah = $_POST['salah'];
    $kunjaw = $_POST['kunjaw'];

    $sql = "UPDATE soalbs SET soalbs='$soalbs', benar='$benar', salah='$salah', kunjaw='$kunjaw' WHERE id_soalbs=$id";
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
    <title>Edit Soal Benar/Salah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h2 class="mb-0">Edit Soal Benar/Salah</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Soal:</label>
                            <textarea name="soalbs" class="form-control" rows="3" required><?= $data['soalbs']; ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilihan Benar:</label>
                                <input type="text" name="benar" value="<?= $data['benar']; ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilihan Salah:</label>
                                <input type="text" name="salah" value="<?= $data['salah']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Kunci Jawaban (benar/salah):</label>
                            <select name="kunjaw" class="form-select" required>
                                <option value="">Pilih kunci jawaban...</option>
                                <option value="benar" <?= ($data['kunjaw'] == 'benar') ? 'selected' : ''; ?>>Benar</option>
                                <option value="salah" <?= ($data['kunjaw'] == 'salah') ? 'selected' : ''; ?>>Salah</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="update" class="btn btn-warning">Update</button>
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