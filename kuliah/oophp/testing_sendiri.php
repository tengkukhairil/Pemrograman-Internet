<?php
// File: testing_sendiri.php

/**
 * Testing sendiri
 */
class Mobil 
{
	public $kode, $merk, $warna, $harga;
	
	public function __construct($kode = "Kode Mobil", $merk = "Merk", $warna = "Warna")
	{
		$this->kode = $kode;
		$this->merk = $merk;
		$this->warna = $warna;
		$this->harga = $harga;
	}

	public function getLabel(){
		return "$this->kode, $this->merk, $this->warna, $this->harga";
	}
}

$mobil1 = new Mobil("M0001","Fortuner","Black",350000);
$mobil2 = new Mobil("S0001","Rush","White",266100);

echo $mobil1->getLabel();
echo "<br>";
echo $mobil2->getLabel();
?>