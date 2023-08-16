<?php
// file: object-type.php

class Produk {
	public $judul, $penulis, $penerbit, $harga;

	public function __construct($judul = "Judul", $penulis = "Penulis",	$penerbit = "Penerbit", $harga = 0){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
	}

	public function getLabel(){
		return "$this->penulis, $this->penerbit";
	}
}

class CetakInfoProduk {
	public function cetak(Produk $produk){
		$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
		return $str;
	}
}

$produk1 = new Produk("Naruto","Masashi Kishimoto", "Shonen Jump", 30000);

$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);

?>