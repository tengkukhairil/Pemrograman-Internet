<?php
// Koneksi ke database
function koneksi()
{
    $host = "localhost";   // nama host database
    $user = "root";        // nama user
    $pass = "";            // password user
    $dbas = "latihan";     // nama database
    return mysqli_connect($host, $user, $pass, $dbas);
}

// Query database
function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    // Jika hasil query hanya 1 data:
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

// Tambah data
function tambah($data)
{
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $conn = koneksi();
    $query = "INSERT into mahasiswa VALUES (
                null, 
                '$nama',
                '$nim',
                '$email',
                '$jurusan',
                '$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
