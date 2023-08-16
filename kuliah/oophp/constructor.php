<?php
// file: constructor.php

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

$produk1 = new Produk("Naruto","Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000);
$produk3 = new Produk("Dragon Ball"); // Hanya Judul Buku


echo "Komik : " . $produk1->getLabel() . "<br>";
echo "Game : " . $produk2->getLabel() . "<br><br>";
echo "Contoh data Produk 3 dengan nilai Default :<br>";
var_dump($produk3);

?>