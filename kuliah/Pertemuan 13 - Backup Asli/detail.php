<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Jika tidak ada id di url
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

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
        <li><img src="gambar/<?= $mhs['gambar']; ?>" width="200"></li>
        <li>NIM: <?= $mhs['nim']; ?></li>
        <li>Nama: <?= $mhs['nama']; ?></li>
        <li>E-Mail: <?= $mhs['email']; ?></li>
        <li>Jurusan: <?= $mhs['jurusan']; ?></li>
        <li>&nbsp;</li>
        <li>
            <a href="ubah.php?id=<?= $mhs['id']; ?>"> Ubah </a> |
            <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Apakah anda yakin?');"> Hapus </a> |
            <a href="index.php"> Kembali </a>
        </li>
    </ul>
</body>

</html>