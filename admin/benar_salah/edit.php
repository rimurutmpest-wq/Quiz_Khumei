<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM soalbs WHERE id_soalbs=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])){
    $soal = $_POST['soalbs'];
    $benar = $_POST['benar'];
    $salah = $_POST['salah'];
    $kunjaw = $_POST['kunjaw'];

    $sql = "UPDATE soalbs SET soalbs='$soal', benar='$benar', salah='$salah', kunjaw='$kunjaw' WHERE id_soalbs=$id";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Soal Pilihan Ganda</h2>
<form action="" method="post">
    <label>Soal:</label><br>
    <textarea name="soalbs" required><?= $data['soalbs']; ?></textarea><br><br>

    <label>Benar:</label><br>
    <input type="text" name="benar" value="<?= $data['benar']; ?>" required><br><br>

    <label>Salah:</label><br>
    <input type="text" name="salah" value="<?= $data['salah']; ?>" required><br><br>

    <label>Kunci Jawaban:</label><br>
    <input type="text" name="kunjaw" value="<?= $data['kunjaw']; ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>