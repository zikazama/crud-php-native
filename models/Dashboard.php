<?php
require_once "Barang.php";

class Dashboard extends Barang {
    private $jumlahPembelian;
    private $jumlahPenjualan;

    public function __construct($idBarang, $namaBarang, $keterangan, $satuan, $jumlahPembelian, $jumlahPenjualan) {
        $this->idBarang = $idBarang;
        $this->namaBarang = $namaBarang;
        $this->keterangan = $keterangan;
        $this->satuan = $satuan;
        $this->jumlahPembelian = $jumlahPembelian;
		$this->jumlahPenjualan = $jumlahPenjualan;
    }

    public function getJumlahPembelian() {
        return $this->jumlahPembelian;
    }

    public function getJumlahPenjualan() {
        return $this->jumlahPenjualan;
    }
}

?>
