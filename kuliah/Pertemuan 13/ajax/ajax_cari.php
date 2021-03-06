<?php
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);
?>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <?php if (empty($mahasiswa)) : ?>
        <tr>
            <td colspan="4">
                <p style="color: red; font-style: italic;">
                    Maaf, data yang anda cari tidak ditemukan..
                </p>
            </td>
        </tr>
    <?php endif; ?>
    <?php
    $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="gambar/<?= $mhs['gambar']; ?>" alt="<?= $mhs['nama']; ?>" width="50"></td>
            <td><?= $mhs['nama']; ?></td>
            <td><a href="detail.php?id=<?= $mhs['id']; ?>"> Lihat Detail </a></td>
        </tr>
    <?php endforeach; ?>
</table>