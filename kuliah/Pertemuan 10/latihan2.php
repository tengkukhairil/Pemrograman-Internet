<?php
require 'functions.php';
$tbl_mahasiswa = query("SELECT * FROM mahasiswa");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h3></h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        foreach ($tbl_mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="gambar/<?= $mhs['gambar']; ?>" alt="<?= $mhs['gambar']; ?>"></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['email']; ?></td>
                <td><?= $mhs['jurusan']; ?></td>
                <td>
                    <a href=""> Ubah </a> |
                    <a href=""> Hapus </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>