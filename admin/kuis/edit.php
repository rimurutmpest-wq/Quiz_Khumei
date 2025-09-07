<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM soal WHERE id_soal=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])){
    $soal = $_POST['soal'];
    $a = $_POST['jwb_a'];
    $b = $_POST['jwb_b'];
    $c = $_POST['jwb_c'];
    $d = $_POST['jwb_d'];
    $kunjaw = $_POST['kunjaw'];

    $sql = "UPDATE soal SET soal='$soal', jwb_a='$a', jwb_b='$b', jwb_c='$c', jwb_d='$d', kunjaw='$kunjaw' WHERE id_soal=$id";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Soal Pilihan Ganda</h2>
<form action="" method="post">
    <label>Soal:</label><br>
    <textarea name="soal" required><?= $data['soal']; ?></textarea><br><br>

    <label>Jawaban A:</label><br>
    <input type="text" name="jwb_a" value="<?= $data['jwb_a']; ?>" required><br><br>

    <label>Jawaban B:</label><br>
    <input type="text" name="jwb_b" value="<?= $data['jwb_b']; ?>" required><br><br>

    <label>Jawaban C:</label><br>
    <input type="text" name="jwb_c" value="<?= $data['jwb_c']; ?>" required><br><br>

    <label>Jawaban D:</label><br>
    <input type="text" name="jwb_d" value="<?= $data['jwb_d']; ?>" required><br><br>

    <label>Kunci Jawaban:</label><br>
    <input type="text" name="kunjaw" value="<?= $data['kunjaw']; ?>" required><br><br>


    <button type="submit" name="update">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>