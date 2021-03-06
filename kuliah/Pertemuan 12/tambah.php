<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan.');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal diinput.');
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
    <title>Tambah Data</title>
</head>

<body>
    <h3>Tambah Data Mahasiswa</h3>
    <form action="" method="POST">
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" required>
                </label>
            </li>
            <li>
                <label>
                    NIM :
                    <input type="number" name="nim" required maxlength="11">
                </label>
            </li>
            <li>
                <label>
                    E-Mail :
                    <input type="email" name="email" required>
                </label>
            </li>
            <li><label>
                    Jurusan :
                    <input type="text" name="jurusan" required>
                </label></li>
            <li><label>
                    Gambar :
                    <input type="text" name="gambar" required>
                </label></li>
            <li>
                <button type="submit" name="tambah"> Tambah Data </button>
            </li>
        </ul>
    </form>
</body>

</html>