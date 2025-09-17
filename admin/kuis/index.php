<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soal ORDER BY id_soal DESC");
$total_soal = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Kelola Soal Quiz</title>
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
            <a class="nav-link" href="../index.php">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
            <a class="nav-link text-danger" href="../../logout.php">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">
                                <i class="bi bi-question-circle-fill me-2"></i>Kelola Soal Quiz
                            </h2>
                            <p class="mb-0">Manajemen soal pilihan ganda</p>
                        </div>
                        <div>
                            <span class="badge bg-light text-dark fs-6">
                                <i class="bi bi-list-ol me-1"></i>Total: <?= $total_soal ?> soal
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <a href="add.php" class="btn btn-custom">
                    <i class="bi bi-plus-circle-fill me-2"></i>Tambah Soal Baru
                </a>
                <a href="../index.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Questions Table -->
    <div class="row">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="bi bi-table me-2"></i>Daftar Soal Pilihan Ganda
                    </h5>
                </div>
                <div class="card-body">
                    <?php if ($total_soal == 0): ?>
                        <div class="text-center py-5">
                            <i class="bi bi-question-circle text-muted" style="font-size: 4rem;"></i>
                            <h4 class="mt-3 text-muted">Belum Ada Soal</h4>
                            <p class="text-muted">Klik tombol "Tambah Soal Baru" untuk menambahkan soal pertama.</p>
                            <a href="add.php" class="btn btn-custom">
                                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Soal Pertama
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="35%">Soal</th>
                                        <th width="12%">A</th>
                                        <th width="12%">B</th>
                                        <th width="12%">C</th>
                                        <th width="12%">D</th>
                                        <th width="10%">Kunci</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Potong teks jika terlalu panjang
                                        $soal_short = strlen($row['soal']) > 50 ? substr($row['soal'], 0, 50) . '...' : $row['soal'];
                                        $jwb_a_short = strlen($row['jwb_a']) > 20 ? substr($row['jwb_a'], 0, 20) . '...' : $row['jwb_a'];
                                        $jwb_b_short = strlen($row['jwb_b']) > 20 ? substr($row['jwb_b'], 0, 20) . '...' : $row['jwb_b'];
                                        $jwb_c_short = strlen($row['jwb_c']) > 20 ? substr($row['jwb_c'], 0, 20) . '...' : $row['jwb_c'];
                                        $jwb_d_short = strlen($row['jwb_d']) > 20 ? substr($row['jwb_d'], 0, 20) . '...' : $row['jwb_d'];
                                        
                                        echo "<tr>
                                            <td><span class='badge bg-secondary'>$no</span></td>
                                            <td>
                                                <div title='".$row['soal']."'>$soal_short</div>
                                            </td>
                                            <td><small title='".$row['jwb_a']."'>$jwb_a_short</small></td>
                                            <td><small title='".$row['jwb_b']."'>$jwb_b_short</small></td>
                                            <td><small title='".$row['jwb_c']."'>$jwb_c_short</small></td>
                                            <td><small title='".$row['jwb_d']."'>$jwb_d_short</small></td>
                                            <td>
                                                <span class='badge badge-custom'>".$row['kunjaw']."</span>
                                            </td>
                                            <td>
                                                <div class='btn-group btn-group-sm'>
                                                    <a href='edit.php?id=".$row['id_soal']."' 
                                                       class='btn btn-warning btn-sm' 
                                                       title='Edit Soal'>
                                                        <i class='bi bi-pencil-square'></i>
                                                    </a>
                                                    <a href='delete.php?id=".$row['id_soal']."' 
                                                       class='btn btn-danger btn-sm' 
                                                       title='Hapus Soal'
                                                       onclick=\"return confirm('Yakin hapus soal ini? Tindakan tidak dapat dibatalkan!')\">
                                                        <i class='bi bi-trash3-fill'></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Summary -->
                        <div class="mt-3 p-3 bg-light rounded">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <i class="bi bi-list-check text-success"></i>
                                    <strong><?= $total_soal ?></strong> Total Soal
                                </div>
                                <div class="col-md-4">
                                    <i class="bi bi-eye text-info"></i>
                                    <a href="../../user/kuis.php" class="text-decoration-none">Preview Quiz</a>
                                </div>
                                <div class="col-md-4">
                                    <i class="bi bi-plus-circle text-primary"></i>
                                    <a href="add.php" class="text-decoration-none">Tambah Soal</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>