<?php
include "../../config/auth.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soalbs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Soal Pilihan Ganda</title>
</head>
<body>
    <h2>Daftar Soal Pilihan Ganda</h2>
    <a href="add.php">+Tambah Soal</a>
    <a href="../index.php">Kembali ke Dashboard</a>
    <br><br>
    
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Soal</th>
            <th>Benar</th>
            <th>Salah</th>
            <th>Kunci Jawaban</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$row['soalbs']."</td>
                <td>".$row['benar']."</td>
                <td>".$row['salah']."</td>
                <td>".$row['kunjaw']."</td>
                <td>
                    <a href='edit.php?id=".$row['id_soalbs']."'>Edit</a> | 
                    <a href='delete.php?id=".$row['id_soalbs']."' onclick=\"return confirm('Yakin hapus soal ini?')\">Hapus</a>
                </td>
            </tr>";
            }
            ?>
    </table>
</body>
</html>
