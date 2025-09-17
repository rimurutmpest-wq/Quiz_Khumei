<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Prevent deleting current admin user
    if($id == $_SESSION['id_user']) {
        header("Location: index.php?error=cannot_delete_self");
        exit;
    }
    
    // Verify the record exists before deleting
    $check = mysqli_query($conn, "SELECT id_user FROM user WHERE id_user=$id");
    if(mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "DELETE FROM user WHERE id_user=$id");
    }
}

header("Location: index.php");
exit;
?>