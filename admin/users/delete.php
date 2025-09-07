<?php
include "../../config/auth.php";
include "../../config/db.php";
cekAdmin();
cekLogin();

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM user WHERE id_user=$id");

header("Location: index.php");
exit;
?>