<?php

class Produk
{
	public $judul = "Judul",
		$penulis = "Penulis",
		$penerbit = "Penerbit",
		$harga = 0;

	public function getLabel()
	{
		return "$this->penulis, $this->penerbit";
	}
}

$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;

echo "Komik : $produk3->penulis, $produk3->penerbit<br>";
echo $produk3->getLabel();
