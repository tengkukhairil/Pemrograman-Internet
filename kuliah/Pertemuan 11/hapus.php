<?php
require 'functions.php';

// Jika tidak ada id di url
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Mengambil id dari url
$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus.');
            document.location.href = 'index.php';
            </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus.');
            document.location.href = 'index.php';
            </script>";
}
