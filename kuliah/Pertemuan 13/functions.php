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

// Upload data
function upload()
{
    $nama = $_FILES['gambar']['name'];
    $tipe = $_FILES['gambar']['type'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $temp = $_FILES['gambar']['tmp_name'];

    // Jika tidak ada gambar yang dipilih
    if ($error == 4) {
        // echo "<script>
        //         alert('Pilih gambar terlebih dahulu..!');
        //         </script>";
        return 'nophoto.jpg';
    }

    // Cek ekstensi file
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $pecah_file = explode('.', $nama);
    $pecah_file = strtolower(end($pecah_file));
    if (!in_array($pecah_file, $ekstensi)) {
        echo "<script>
                alert('Yang anda pilih bukan gambar..!');
                </script>";
        return false;
    }

    // Cek tipe file
    if ($tipe != 'image/jpeg' && $tipe != 'image/png') {
        echo "<script>
                alert('Yang anda pilih bukan gambar..!');
                </script>";
        return false;
    }

    // Cek ukuran gambar (maksimal 5Mb == 5000000)
    if ($size > 5000000) {
        echo "<script>
                alert('Ukuran file terlalu besar..!');
                </script>";
        return false;
    }

    // Jika lolos pengecekan
    $nama_gbr_baru = uniqid();
    $nama_gbr_baru .= '.';
    $nama_gbr_baru .= $pecah_file;
    move_uploaded_file($temp, 'gambar/' . $nama_gbr_baru);

    return $nama_gbr_baru;
}

// Tambah data
function tambah($data)
{
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    #$gambar = htmlspecialchars($data['gambar']);
    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $conn = koneksi();
    $query = "INSERT into mahasiswa VALUES (
                null, 
                '$nama',
                '$nim',
                '$email',
                '$jurusan',
                '$gambar')";
    mysqli_query($conn, $query)
        or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

// Hapus data
function hapus($id)
{
    $conn = koneksi();
    // Menghapus gambar di folder gambar
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
    if ($mhs['gambar'] != 'nophoto.jpg') {
        unlink('gambar/' . $mhs['gambar']);
    }


    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id")
        or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

// Ubah data
function ubah($data)
{
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar_lama = htmlspecialchars($data['gambar_lama']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    if ($gambar == 'nophoto.jpg') {
        $gambar = $gambar_lama;
    }

    $conn = koneksi();
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nim = '$nim',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = $id";
    mysqli_query($conn, $query)
        or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

// Pencarian
function cari($keyword)
{
    $conn = koneksi();
    $query = "SELECT * FROM mahasiswa 
                WHERE 
                nama LIKE '%$keyword%' OR
                nim LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function login($data)
{
    $conn = koneksi();
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    // Cek username
    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
        // Cek password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }
    }
    return [
        'error' => true,
        'pesan' => 'Username atau Password salah'
    ];
}

// Registrasi
function registrasi($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);


    // Jika username atau password kosong
    if (empty($username) || empty($password1) || empty($password2)) {
        echo "<script>
                alert('username atau password tidak boleh kosong..!');
                document.location.href = 'registrasi.php';
                </script>";
        return false;
    }

    // Jika username sudah ada di database
    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
                alert('username yang anda piliha sudah ada..!');
                document.location.href = 'registrasi.php';
                </script>";
        return false;
    }

    // Jika konfirmasi password tidak sesuai
    if ($password1 !== $password2) {
        echo "<script>
                alert('Konfirmasi password yang anda masukkan tidak sama..!');
                document.location.href = 'registrasi.php';
                </script>";
        return false;
    }

    // Jika password < 5 digit
    if (strlen($password1) < 6) {
        echo "<script>
                alert('Minimal panjang password 6 digit..!');
                document.location.href = 'registrasi.php';
                </script>";
        return false;
    }

    // Jika username dan password sudah sesuai
    // Enkripsi password
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);

    // Insert ke tabel user
    $query = "INSERT INTO user
                VALUES (null, '$username','$password_baru')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
