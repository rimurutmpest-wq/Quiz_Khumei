<?php

//Cek apakah sudah login
function cekLogin(){
    if (!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit;
    }
}

//Cek apakah user admin
function cekAdmin(){
    if ($_SESSION['lvl'] !=1){
        echo "Akses ditolak";
        exit;
    }
}
?>