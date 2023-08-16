<?php

use Produk as GlobalProduk;

class Produk
{
    public $satu, $dua, $tiga;

    public function __construct($satu = "Satu", $dua = "Dua", $tiga = "Tiga")
    {
        $this->satu = $satu;
        $this->dua = $dua;
        $this->tiga = $tiga;
    }

    public function getLabel()
    {
        return "Pertama = $this->satu, Kedua = $this->dua, Ketiga = $this->tiga";
    }
}

$bil1 = new Produk("3", "2", "1");
$bil2 = new Produk("6", "5", "4");

echo $bil1->getLabel();
echo "<br>";
echo $bil2->getLabel();
























// use Produk as GlobalProduk;

// class Produk
// {
//     public $judul, $penulis, $penerbit, $harga;

//     public function __construct($judul = "Judul", $penulis = "Nama", $penerbit = "Penerbit", $harga = 0)
//     {
//         $this->judul = $judul;
//         $this->penulis = $penulis;
//         $this->penerbit = $penerbit;
//         $this->harga = $harga;
//     }

//     public function getLabel()
//     {
//         return "Judul Buku: $this->judul<br> 
//         Nama Penulis: $this->penulis<br>
//         Penerbit: $this->penerbit<br>
//         Harga: Rp. $this->harga<hr>";
//     }
// }
// $produk1 = new Produk("Naruto", "Tengku", "Air Langga", "13000");
// echo $produk1->getLabel();

// $produk2 = new Produk("Doraemon", "Sazaki", "Tiga Serangkai", "12000");
// echo $produk2->getLabel();
