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

// Ambil id dari url
$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah.');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah.');
                document.location.href = 'index.php';
                </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>

<body>
    <h3>Ubah Data Mahasiswa</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" value="<?= $mhs['nama']; ?>" required>
                </label>
            </li>
            <li>
                <label>
                    NIM :
                    <input type="number" name="nim" value="<?= $mhs['nim']; ?>" required maxlength="11">
                </label>
            </li>
            <li>
                <label>
                    E-Mail :
                    <input type="email" name="email" value="<?= $mhs['email']; ?>" required>
                </label>
            </li>
            <li><label>
                    Jurusan :
                    <input type="text" name="jurusan" value="<?= $mhs['jurusan']; ?>" required>
                </label></li>
            <li>
                <input type="hidden" name="gambar_lama" value="<?= $mhs['gambar']; ?>">
                <label>
                    Gambar :
                    <input type="file" name="gambar" class="gambar" onchange="previewImage()">
                </label>
                <img src="gambar/<?= $mhs['gambar']; ?>" width="120" style="display: block;" class="img-preview">
            </li>
            <li>
                <button type="submit" name="ubah"> Ubah Data </button>
                <a href="index.php"> Batal </a>
            </li>
        </ul>
    </form>
    <script src="js/script.js"></script>
</body>

</html>