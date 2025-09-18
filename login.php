<?php
session_start();
include "config/db.php";

if (isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // cek user
    $sql = "SELECT * FROM user WHERE username='$username' AND pass='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // simpan session
        $_SESSION['user_id'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['lvl'] = $row['lvl'];

        if ($row['lvl'] == 1){
            header("Location: admin/index.php");
        } else if($row['lvl'] == 2){
            header("Location: user/index.php");
        } else {
            $error = "Level user tidak valid!";
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Night Theme Consistent with index.php */
        :root {
            --main-color: #95B9C7;
            --main-hover: #7da5b5;
            --text-color: #ffffff;
            --bg-color: #071F42;
            --card-bg: rgba(7, 31, 66, 0.85);
            --card-border: rgba(149, 185, 199, 0.3);
        }

        body {
            background: url('images/bg-night.png') no-repeat center center fixed;
            background-size: cover;
            color: var(--text-color);
            min-height: 100vh;
        }
        
        .btn-custom {
            background-color: var(--main-color);
            border: none;
            color: #000000;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn-custom:hover {
            background-color: var(--main-hover);
            color: #000000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        .card-custom {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            color: var(--text-color);
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-control {
            background-color: rgba(255, 255, 255, 0.95);
            border-color: var(--card-border);
            color: #000000;
        }
        
        .form-control:focus {
            border-color: var(--main-color);
            box-shadow: 0 0 0 0.25rem rgba(149, 185, 199, 0.25);
            background-color: rgba(255, 255, 255, 0.98);
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--main-color), var(--main-hover));
            color: #000000;
        }

        .form-label {
            color: var(--text-color);
            font-weight: 600;
        }

        .btn-outline-secondary {
            border-color: var(--card-border);
            color: var(--text-color);
        }

        .btn-outline-secondary:hover {
            background-color: var(--main-color);
            border-color: var(--main-color);
            color: #000000;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            border-color: #dc3545;
            color: var(--text-color);
        }

        h1, h2, h3, h4, h5, h6 {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            color: inherit;
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        small.text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <!-- Back to Home Button -->
                <div class="text-center mb-4">
                    <a href="user/index.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Home
                    </a>
                </div>
                
                <div class="card card-custom">
                    <div class="card-header login-header text-center py-4">
                        <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                        <h3 class="mt-3 mb-0 fw-bold">Admin Login</h3>
                        <p class="mb-0 mt-2">Masuk ke panel administrasi</p>
                    </div>
                    <div class="card-body p-4">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div><?= $error ?></div>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-person-fill me-2"></i>Username
                                </label>
                                <input type="text" name="username" class="form-control form-control-lg" 
                                       placeholder="Masukkan username" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-lock-fill me-2"></i>Password
                                </label>
                                <input type="password" name="password" class="form-control form-control-lg" 
                                       placeholder="Masukkan password" required>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" name="login" class="btn btn-custom btn-lg py-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    <strong>Login</strong>
                                </button>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <small class="text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Hanya untuk administrator sistem
                            </small>
                        </div>
                    </div>
                </div>
                
                <!-- Demo Credentials Info -->
                <div class="card card-custom mt-3">
                    <div class="card-body text-center py-3">
                        <small class="text-muted">
                            <i class="bi bi-lightbulb me-1"></i>
                            <strong>Demo:</strong> Gunakan kredensial admin yang sudah dibuat
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>