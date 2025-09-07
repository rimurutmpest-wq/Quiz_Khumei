<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soalbs");
if(isset($_POST['simpan'])){
    $soal = $_POST['soalbs'];
    $benar = $_POST['benar'];
    $salah = $_POST['salah'];
    $kunjaw = $_POST['kunjaw'];

    $sql = "INSERT INTO soalbs (soalbs, benar, salah, kunjaw)
    VALUES ('$soal', '$benar', '$salah', '$kunjaw')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Tambah Soal Benar Salah</h2>
<form action="" method="post">
    <label for="">Soal</label><br>
    <textarea name="soalbs" required></textarea><br><br>
    
    <label>Benar:</label><br>
    <input type="text" name="benar" required><br><br>

    <label>Salah: </label><br>
    <input type="text" name="salah" required><br><br>

    <label>Kunci Jawaban:</label><br>
    <input type="text" name="kunjaw" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
    