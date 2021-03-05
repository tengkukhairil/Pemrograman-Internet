<?php
require 'functions.php';
$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Lengkap Mahasiswa</title>
</head>

<body>
    <h3>Info Lengkap Mahasiswa</h3>
    <ul>
        <li><img src="gambar/<?= $mhs['gambar']; ?>"></li>
        <li>NIM: <?= $mhs['nim']; ?></li>
        <li>Nama: <?= $mhs['nama']; ?></li>
        <li>E-Mail: <?= $mhs['email']; ?></li>
        <li>Jurusan: <?= $mhs['jurusan']; ?></li>
        <li><a href=""> Ubah </a> | <a href=""> Hapus </a></li>
        <li><a href="latihan3.php"> Kembali </a></li>
    </ul>
</body>

</html>