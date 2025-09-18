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
    <link href="./assets/css/custom.css" rel="stylesheet">
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