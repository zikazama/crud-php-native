<?php

class Penjualan {
    private $idPenjualan;
    private $jumlahPenjualan;
    private $hargaJual;

    private $idPengguna;
    private $idBarang;
    private $pengguna;
    private $barang;

    public function __construct($idPenjualan, $jumlahPenjualan, $hargaJual, $idPengguna,$idBarang,$pengguna, $barang) {
        $this->idPenjualan = $idPenjualan;
        $this->jumlahPenjualan = $jumlahPenjualan;
        $this->hargaJual = $hargaJual;
        $this->idPengguna = $idPengguna;
        $this->idBarang = $idBarang;
        $this->pengguna = $pengguna;
        $this->barang = $barang;
    }

    public function getidPenjualan() {
        return $this->idPenjualan;
    }

    public function setidPenjualan($idPenjualan) {
        $this->idPenjualan = $idPenjualan;
    }

    public function getjumlahPenjualan() {
        return $this->jumlahPenjualan;
    }

    public function setjumlahPenjualan($jumlahPenjualan) {
        $this->jumlahPenjualan = $jumlahPenjualan;
    }

    public function gethargaJual() {
        return $this->hargaJual;
    }

    public function sethargaJual($hargaJual) {
        $this->hargaJual = $hargaJual;
    }

    public function getPengguna() {
        return $this->pengguna;
    }

    public function setPengguna($pengguna) {
        $this->pengguna = $pengguna;
    }

    public function getBarang() {
        return $this->barang;
    }

    public function setBarang($barang) {
        $this->barang = $barang;
    }

    public function getIdPengguna() {
        return $this->idPengguna;
    }

    public function setIdPengguna($idPengguna) {
        $this->idPengguna = $idPengguna;
    }

    public function getIdBarang() {
        return $this->idBarang;
    }

    public function setIdBarang($idBarang) {
        $this->idBarang = $idBarang;
    }
}

?>
