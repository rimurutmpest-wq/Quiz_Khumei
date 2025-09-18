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
            background: url('../images/bg-night.png') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            min-height: 100vh;
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
            background: rgba(7, 31, 66, 0.85);
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            color: #ffffff;
        }
        
        .navbar-custom {
            background: rgba(7, 31, 66, 0.9) !important;
            backdrop-filter: blur(10px);
        }
        
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff !important;
        }
        
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #95B9C7 !important;
        }
        
        .hero-title {
            font-size: 4.5rem;
            color: #ffffff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
            font-weight: bold;
        }
        
        .hero-subtitle {
            color: #ffffff;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        }
        
        .card.mb-4 {
            background: rgba(3, 27, 77, 0.8);
            color: #ffffff;
            border: 1px solid rgba(149, 185, 199, 0.3);
        }
        
        .card-header.bg-primary {
            background: linear-gradient(135deg, #071F42, #031B4D) !important;
            border-bottom: 1px solid rgba(149, 185, 199, 0.3);
        }
        
        .text-muted {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        
        .bg-dark {
            background: rgba(3, 27, 77, 0.95) !important;
        }
        
        /* Styling untuk stats cards */
        .stats-card {
            background: rgba(7, 31, 66, 0.9);
            border: 1px solid rgba(149, 185, 199, 0.2);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
        
        /* Text shadows untuk readability */
        h1, h2, h3, h4, h5, h6 {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }
        
        .lead {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }
        
        /* Hero Fullscreen */
        .hero-fullscreen {
            height: 100vh;
            position: relative;
        }
        
        .hero-card {
            background: rgba(7, 31, 66, 0.9) !important;
            border: 1px solid rgba(149, 185, 199, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        }
        
        /* Bounce animation for scroll indicator */
        .animate-bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        /* Custom scrollbar untuk night theme */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(3, 27, 77, 0.3);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(149, 185, 199, 0.6);
            border-radius: 6px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(149, 185, 199, 0.8);
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
    <!-- Hero Section - Fullscreen -->
    <div class="hero-fullscreen d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-custom text-center py-5 hero-card">
                        <div class="card-body">
                            <h1 class="hero-title mb-4">
                                <i class="bi bi-mortarboard text-primary me-3"></i>
                                Selamat Datang di EduGame!
                            </h1>
                            <p class="lead hero-subtitle mb-5">Platform pembelajaran interaktif dengan kuis menarik untuk menguji pengetahuan Anda</p>
                            
                            <div class="row justify-content-center">
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
                    
                    <!-- Scroll down indicator -->
                    <div class="scroll-indicator mt-4">
                        <p class="text-white mb-2">Gulir ke bawah untuk melihat materi</p>
                        <i class="bi bi-chevron-double-down text-white animate-bounce" style="font-size: 2rem;"></i>
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
                                        <li>Pantun dan peribahasa</li>
                                        <li>Kosakata dan sinonim</li>
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
            <div class="card stats-card text-center">
                <div class="card-body">
                    <i class="bi bi-question-circle-fill text-primary" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Quiz Interaktif</h5>
                    <p class="text-muted">Uji pengetahuan dengan berbagai pilihan ganda</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card text-center">
                <div class="card-body">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">True or False</h5>
                    <p class="text-muted">Tantangan logika dengan jawaban benar atau salah</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card text-center">
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