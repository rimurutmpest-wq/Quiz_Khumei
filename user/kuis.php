<?php

include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM soal");
?>

<h2>Kuis Pilihan Ganda</h2>
<a href="index.php">Kembali</a>
<hr>

<form action="" method="post">
<?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>$no. ".$row['soal']."</p>";
        echo "<input type='radio' name='jawaban[".$row['id_soal']."]' value='A'> A. ".$row['jwb_a']."<br>";
        echo "<input type='radio' name='jawaban[".$row['id_soal']."]' value='B'> B. ".$row['jwb_b']."<br>";
        echo "<input type='radio' name='jawaban[".$row['id_soal']."]' value='C'> C. ".$row['jwb_c']."<br>";
        echo "<input type='radio' name='jawaban[".$row['id_soal']."]' value='D'> D. ".$row['jwb_d']."<br><br>";
        $no++;
    }
?>
    <button type="submit" name="submit">Kirim Jawaban</button>
</form>

<?php
if(isset($_POST['submit'])){
    $jawaban = $_POST ['jawaban'];
    $benar = 0; $salah = 0;

    foreach($jawaban as $id_soal => $pilihan){
        $cek = mysqli_query($conn, "SELECT kunjaw FROM soal WHERE id_soal=$id_soal");
        $data = mysqli_fetch_assoc($cek);

        if ($pilihan == $data['kunjaw']){
            $benar++;
        } else {
            $salah++;
        }
    }

    echo "<h3>Hasil:</h3>";
    echo "Benar: $benar<br>";
    echo "Salah: $salah<br>";
}
?>