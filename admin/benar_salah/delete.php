<?php
include "../../config/auth.php";
include "../../config/db.php";
cekAdmin();
cekLogin();

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM soalbs WHERE id_soalbs=$id");

header("Location: index.php");
exit;
?>