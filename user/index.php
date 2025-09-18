<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
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
                        <i class="bi bi-stars me-2"></i>Tata Surya
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-sun-fill text-warning me-2"></i>
                                        Matahari
                                    </h5>
                                    <p class="card-text">
                                        Matahari merupakan sebuah bintang atau benda langit yang dapat menghasilkan cahaya sendiri. 
                                        Oleh karena tata letaknya yang dekat dengan bumi, cahaya matahari tampak lebih terang dan ukurannya tampak lebih besar 
                                        dibandingkan dengan berjuta-juta bintang lainnya.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-secondary me-2"></i>
                                        Merkurius
                                    </h5>
                                    <p class="card-text">
                                        Planet Merkurius adalah planet yang paling dekat dengan Matahari dan merupakan planet terkecil dalam tata surya. 
                                        Lapisan atmosfer planet Merkurius sangat tipis sehingga dapat melelehkan logam timah. 
                                        Planet ini tidak mempunyai udara dan air.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-danger me-2"></i>
                                        Venus
                                    </h5>
                                    <p class="card-text">
                                        Planet terdekat kedua dengan matahari adalah Venus. Ukuran Venus hampir sama dengan Bumi sehingga 
                                        orang sering menjulukinya sebagai kembaran Bumi. Venus merupakan planet terpanas dan terlihat paling terang dalam tata surya.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-globe text-success me-2"></i>
                                        Bumi
                                    </h5>
                                    <p class="card-text">
                                        Bumi merupakan planet ketiga dari Matahari. Bumi adalah planet satu-satunya yang dihuni oleh makhluk hidup. 
                                        Bumi memiliki atmosfer yang terdiri dari nitrogen, oksigen, karbon dioksida, dan uap air. 
                                        Atmosfer melindungi kita dari sinar ultraviolet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-moon-fill text-light me-2"></i>
                                        Bulan
                                    </h5>
                                    <p class="card-text">
                                        Bulan adalah satu-satunya satelit alami Bumi dan merupakan satelit alami terbesar ke-5 di Tata Surya. 
                                        Cahaya Bulan berasal dari cahaya matahari yang dipantulkan. Di bulan tidak terdapat udara atau air. 
                                        Banyak kawah yang disebabkan oleh hantaman komet.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-danger me-2" style="color: #CD5C5C !important;"></i>
                                        Mars
                                    </h5>
                                    <p class="card-text">
                                        Mars merupakan planet keempat dari Matahari. Planet Mars sering disebut planet merah karena tampak kemerahan. 
                                        Warna merah tersebut berasal dari debu yang banyak diterbangkan angin. 
                                        Kawah olympus Mars merupakan kawah terbesar di tata surya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-warning me-2" style="color: #FFA500 !important;"></i>
                                        Jupiter
                                    </h5>
                                    <p class="card-text">
                                        Jupiter merupakan planet terbesar dalam tata surya. Besar Jupiter 11 kali besar Bumi. 
                                        Suhu Jupiter sangat dingin karena jauh dari matahari. Jupiter memiliki 16 satelit dengan satelit terbesar 
                                        secara urut adalah Ganymede, Callisto, dan Europa.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-warning me-2" style="color: #DAA520 !important;"></i>
                                        Saturnus
                                    </h5>
                                    <p class="card-text">
                                        Saturnus adalah planet terbesar kedua dalam tata surya. Besar saturnus 9 kali ukuran Bumi. 
                                        Saturnus merupakan planet yang sangat indah karena memiliki tiga cincin pada bagian atmosfernya. 
                                        Planet Saturnus memiliki 31 buah satelit, Titan merupakan yang terbesar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-info me-2" style="color: #4FD0E7 !important;"></i>
                                        Uranus
                                    </h5>
                                    <p class="card-text">
                                        Uranus tampak berwarna hijau kebiruan. Atmosfer uranus tersusun dari hidrogen, helium, dan metana. 
                                        Uranus berotasi dari timur ke barat. Namun rotasinya tidak searah jarum jam. 
                                        Uranus memiliki 27 satelit. Satelit terbesar yaitu Miranda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="bi bi-circle-fill text-primary me-2"></i>
                                        Neptunus
                                    </h5>
                                    <p class="card-text">
                                        Neptunus tampak seperti Uranus karena ukurannya yang hampir sama. Neptunus tampak berwarna kebiruan. 
                                        Neptunus juga dikelilingi cincin debu. Neptunus memiliki 4 cincin dan 11 satelit. 
                                        Dua satelit yang paling besar adalah Triton dan Nereid.
                                    </p>
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