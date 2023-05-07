<?php

class Pembelian {
    private $idPembelian;
    private $jumlahPembelian;
    private $hargaBeli;

    private $idPengguna;
    private $idBarang;
    private $pengguna;
    private $barang;

    public function __construct($idPembelian, $jumlahPembelian, $hargaBeli, $idPengguna,$idBarang,$pengguna, $barang) {
        $this->idPembelian = $idPembelian;
        $this->jumlahPembelian = $jumlahPembelian;
        $this->hargaBeli = $hargaBeli;
        $this->idPengguna = $idPengguna;
        $this->idBarang = $idBarang;
        $this->pengguna = $pengguna;
        $this->barang = $barang;
    }

    public function getIdPembelian() {
        return $this->idPembelian;
    }

    public function setIdPembelian($idPembelian) {
        $this->idPembelian = $idPembelian;
    }

    public function getJumlahPembelian() {
        return $this->jumlahPembelian;
    }

    public function setJumlahPembelian($jumlahPembelian) {
        $this->jumlahPembelian = $jumlahPembelian;
    }

    public function getHargaBeli() {
        return $this->hargaBeli;
    }

    public function setHargaBeli($hargaBeli) {
        $this->hargaBeli = $hargaBeli;
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
