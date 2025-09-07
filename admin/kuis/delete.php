<?php
include "../../config/auth.php";
include "../../config/db.php";
cekAdmin();
cekLogin();

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM soal WHERE id_soal=$id");

header("Location: index.php");
exit;
?>