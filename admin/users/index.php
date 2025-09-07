<?php
include "../../config/auth.php";
include "../../config/db.php";
cekLogin();
cekAdmin();

$result = mysqli_query($conn, "SELECT * FROM user");
?>

<h2>Daftar User</h2>
<a href="add.php">Tambah User</a> |
<a href="../index.php">Kembali ke Dashboard</a>
<br><br>

<table border="1" cellpadding='8' cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)){
        $level = $row['lvl'] == 1 ? "Admin" : "User Biasa";
        echo "<tr>
            <td>".$no++."</td> 
            <td>".$row['nama_user']."</td>
            <td>".$row['username']."</td>
            <td>".$row['pass']."</td>
            <td>".$level."</td>
            <td>
                <a href ='edit.php?id=".$row['id_user']."'>Edit</a> |
                <a href ='delete.php?id=".$row['id_user']."' onclick=\"return confirm('Yakin hapus user ini?')\">Hapus</a> 
                </td>
                </tr>";
    } 
    ?>
</table>