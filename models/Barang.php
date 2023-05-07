<?php

class Barang {
    protected $idBarang;
    protected $namaBarang;
    protected $keterangan;
    protected $satuan;
    protected $idPengguna;
	protected $NamaPengguna;

    public function __construct($idBarang, $namaBarang, $keterangan, $satuan, $idPengguna,$NamaPengguna="") {
        $this->idBarang = $idBarang;
        $this->namaBarang = $namaBarang;
        $this->keterangan = $keterangan;
        $this->satuan = $satuan;
        $this->idPengguna = $idPengguna;
		$this->NamaPengguna=$NamaPengguna;
    }

    public function getIdBarang() {
        return $this->idBarang;
    }

    public function setIdBarang($idBarang) {
        $this->idBarang = $idBarang;
    }

    public function getNamaBarang() {
        return $this->namaBarang;
    }

    public function setNamaBarang($namaBarang) {
        $this->namaBarang = $namaBarang;
    }

    public function getKeterangan() {
        return $this->keterangan;
    }

    public function setKeterangan($keterangan) {
        $this->keterangan = $keterangan;
    }

    public function getSatuan() {
        return $this->satuan;
    }

    public function setSatuan($satuan) {
        $this->satuan = $satuan;
    }

    public function getIdPengguna() {
        return $this->idPengguna;
    }

    public function setIdPengguna($idPengguna) {
        $this->idPengguna = $idPengguna;
    }
	
	public function getNamaPengguna() {
        return $this->NamaPengguna;
    }

    public function setNamaPengguna($NamaPengguna) {
        $this->NamaPengguna = $NamaPengguna;
    }
}

?>
