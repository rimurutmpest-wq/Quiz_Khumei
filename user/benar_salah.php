<?php

include "../config/auth.php";
include "../config/db.php";
cekLogin();
if ($_SESSION['lvl'] !=2){
    header("Location: ../admin/index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM soalbs");
?>

<h2>Kuis Benar/Salah</h2>
<a href="index.php">Kembali</a>
<hr>

<form action="" method="post">
<?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>$no. ".$row['soalbs']."</p>";
        echo "<input type='radio' name='jawaban[".$row['id_soalbs']."]' value='benar'> ".$row['benar']."<br>";
        echo "<input type='radio' name='jawaban[".$row['id_soalbs']."]' value='salah'> ".$row['salah']."<br>";
        $no++;
    }
?>
    <button type="submit" name="submit">Kirim Jawaban</button>
</form>

<?php
if(isset($_POST['submit'])){
    $jawaban = $_POST ['jawaban'];
    $benar = 0; $salah = 0;

    foreach($jawaban as $id_soalbs => $pilihan){
        $cek = mysqli_query($conn, "SELECT kunjaw FROM soalbs WHERE id_soalbs=$id_soalbs");
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