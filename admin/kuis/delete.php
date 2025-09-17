<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Verify the record exists before deleting
    $check = mysqli_query($conn, "SELECT id_soal FROM soal WHERE id_soal=$id");
    if(mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "DELETE FROM soal WHERE id_soal=$id");
    }
}

header("Location: index.php");
exit;
?>