<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Verify the record exists before deleting
    $check = mysqli_query($conn, "SELECT id_soalbs FROM soalbs WHERE id_soalbs=$id");
    if(mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "DELETE FROM soalbs WHERE id_soalbs=$id");
    }
}

header("Location: index.php");
exit;
?>