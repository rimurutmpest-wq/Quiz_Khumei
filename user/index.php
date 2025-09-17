<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><linearGradient id="bg" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:%23f8f9fa"/><stop offset="100%" style="stop-color:%23e9ecef"/></linearGradient></defs><rect width="1000" height="1000" fill="url(%23bg)"/></svg>') no-repeat center center fixed;
            background-size: cover;
            color: #000000;
        }
        
        .btn-custom {
            background-color: #95B9C7;
            border: none;
            color: #000000;
            transition: all 0.3s ease;
        }
        
        .btn-custom:hover {
            background-color: #7da5b5;
            color: #000000;
            transform: translateY(-2px);
        }
        
        .card-custom {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
        }
    </style>
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
                    <a class="nav-link active" href="index.php">
                        <i class="bi bi-house-fill me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kuis.php">
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

<!-- Main Content -->
<div class="container mt-5 pt-4">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card card-custom text-center py-5">
                <div class="card-body">
                    <h1 class="display-4 fw-bold mb-4">
                        <i class="bi bi-mortarboard text-primary me-3"></i>
                        Selamat Datang di EduGame!
                    </h1>
                    <p class="lead mb-4">Platform pembelajaran interaktif dengan kuis menarik untuk menguji pengetahuan Anda</p>
                    
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-3 mb-3">
                            <a href="kuis.php" class="btn btn-custom btn-lg w-100 py-3">
                                <i class="bi bi-question-circle-fill me-2"></i>
                                <strong>Mulai Quiz</strong>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="benar_salah.php" class="btn btn-custom btn-lg w-100 py-3">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <strong>True or False</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Learning Materials -->
    <div class="row">
        <div class="col-12">
            <div class="card card-custom mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">
                        <i class="bi bi-book-fill me-2"></i>Materi Pembelajaran
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-lightbulb-fill text-warning me-2"></i>
                                        Pengetahuan Umum
                                    </h5>
                                    <p class="card-text">
                                        Pengetahuan umum adalah kumpulan informasi dan fakta yang luas tentang berbagai topik dalam kehidupan sehari-hari. 
                                        Pengetahuan ini mencakup sejarah, geografi, sains, budaya, olahraga, dan banyak bidang lainnya.
                                    </p>
                                    <ul>
                                        <li>Sejarah dunia dan peradaban</li>
                                        <li>Geografi dan negara-negara</li>
                                        <li>Sains dan teknologi</li>
                                        <li>Budaya dan tradisi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-globe text-info me-2"></i>
                                        Wawasan Nusantara
                                    </h5>
                                    <p class="card-text">
                                        Indonesia adalah negara kepulauan terbesar di dunia dengan lebih dari 17.000 pulau. 
                                        Negara ini memiliki kekayaan budaya, bahasa, dan tradisi yang beragam dari Sabang sampai Merauke.
                                    </p>
                                    <ul>
                                        <li>34 Provinsi di Indonesia</li>
                                        <li>Kebudayaan dan adat istiadat</li>
                                        <li>Bahasa daerah dan nasional</li>
                                        <li>Kekayaan alam Indonesia</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-calculator text-success me-2"></i>
                                        Matematika Dasar
                                    </h5>
                                    <p class="card-text">
                                        Matematika adalah ilmu yang mempelajari struktur, ruang, dan perubahan. 
                                        Dalam kehidupan sehari-hari, matematika membantu kita memecahkan masalah logis dan numerik.
                                    </p>
                                    <ul>
                                        <li>Operasi hitung dasar</li>
                                        <li>Geometri dan pengukuran</li>
                                        <li>Pecahan dan persentase</li>
                                        <li>Statistik sederhana</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-translate text-danger me-2"></i>
                                        Bahasa Indonesia
                                    </h5>
                                    <p class="card-text">
                                        Bahasa Indonesia adalah bahasa resmi dan persatuan Republik Indonesia. 
                                        Kemampuan berbahasa Indonesia yang baik sangat penting untuk komunikasi formal dan informal.
                                    </p>
                                    <ul>
                                        <li>Tata bahasa dan ejaan</li>
                                        <li>Kosakata dan sinonim</li>
                                        <li>Pantun dan peribahasa</li>
                                        <li>Karya sastra Indonesia</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card card-custom text-center">
                <div class="card-body">
                    <i class="bi bi-question-circle-fill text-primary" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Quiz Interaktif</h5>
                    <p class="text-muted">Uji pengetahuan dengan berbagai pilihan ganda</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom text-center">
                <div class="card-body">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">True or False</h5>
                    <p class="text-muted">Tantangan logika dengan jawaban benar atau salah</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom text-center">
                <div class="card-body">
                    <i class="bi bi-trophy-fill text-warning" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Hasil Instan</h5>
                    <p class="text-muted">Lihat skor dan pembahasan secara langsung</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; 2025 EduGame. Platform pembelajaran interaktif untuk semua.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>