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
