<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soal");
if(isset($_POST['simpan'])){
    $soal = $_POST['soal'];
    $a = $_POST['jwb_a'];
    $b = $_POST['jwb_b'];
    $c = $_POST['jwb_c'];
    $d = $_POST['jwb_d'];
    $kunjaw = $_POST['kunjaw'];

    $sql = "INSERT INTO soal (soal, jwb_a, jwb_b, jwb_c, jwb_d, kunjaw)
    VALUES ('$soal', '$a', '$b', '$c', '$d', '$kunjaw')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Tambah Soal Pilihan Ganda</h2>
<form action="" method="post">
    <label for="">Soal</label><br>
    <textarea name="soal" required></textarea><br><br>
    
    <label>Jawaban A:</label><br>
    <input type="text" name="jwb_a" required><br><br>

    <label>Jawaban B:</label><br>
    <input type="text" name="jwb_b" required><br><br>

    <label>Jawaban C:</label><br>
    <input type="text" name="jwb_c" required><br><br>

    <label>Jawaban D:</label><br>
    <input type="text" name="jwb_d" required><br><br>

    <label>Kunci Jawaban:</label><br>
    <input type="text" name="kunjaw" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
    