<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soalbs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Soal Benar/Salah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Daftar Soal Benar/Salah</h2>
                    <div>
                        <a href="add.php" class="btn btn-success me-2">+ Tambah Soal</a>
                        <a href="../index.php" class="btn btn-light">Kembali ke Dashboard</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Soal</th>
                                    <th>Pilihan Benar</th>
                                    <th>Pilihan Salah</th>
                                    <th>Kunci Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>".$no++."</td>
                                        <td>".$row['soalbs']."</td>
                                        <td>".$row['benar']."</td>
                                        <td>".$row['salah']."</td>
                                        <td><span class='badge bg-".($row['kunjaw']=='benar'?'success':'danger')."'>".$row['kunjaw']."</span></td>
                                        <td>
                                            <a href='edit.php?id=".$row['id_soalbs']."' class='btn btn-warning btn-sm'>Edit</a>
                                            <a href='delete.php?id=".$row['id_soalbs']."' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin hapus soal ini?')\">Hapus</a>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>