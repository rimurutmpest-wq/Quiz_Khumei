<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM soal");
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
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>Kunci Jawaban</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$row['soal']."</td>
                <td>".$row['jwb_a']."</td>
                <td>".$row['jwb_b']."</td>
                <td>".$row['jwb_c']."</td>
                <td>".$row['jwb_d']."</td>
                <td>".$row['kunjaw']."</td>
                <td>
                    <a href='edit.php?id=".$row['id_soal']."'>Edit</a> | 
                    <a href='delete.php?id=".$row['id_soal']."' onclick=\"return confirm('Yakin hapus soal ini?')\">Hapus</a>
                </td>
            </tr>";
            }
            ?>
    </table>
</body>
</html>
