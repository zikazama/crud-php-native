<?php

class Pengguna {
    public $idPengguna;
    public $namaPengguna;
    public $password;
    public $namaDepan;
    public $namaBelakang;
    public $noHp;
    public $alamat;
    public $idAkses;
	public $namaAkses;

    public function __construct($idPengguna, $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses,$namaAkses="") {
        $this->idPengguna = $idPengguna;
        $this->namaPengguna = $namaPengguna;
        $this->password = $password;
        $this->namaDepan = $namaDepan;
        $this->namaBelakang = $namaBelakang;
        $this->noHp = $noHp;
        $this->alamat = $alamat;
        $this->idAkses = $idAkses;
		$this->namaAkses=$namaAkses;
    }

    // Getter dan setter untuk semua property
    public function getIdPengguna() {
        return $this->idPengguna;
    }

    public function setIdPengguna($idPengguna) {
        $this->idPengguna = $idPengguna;
    }

    public function getNamaPengguna() {
        return $this->namaPengguna;
    }

    public function setNamaPengguna($namaPengguna) {
        $this->namaPengguna = $namaPengguna;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNamaDepan() {
        return $this->namaDepan;
    }

    public function setNamaDepan($namaDepan) {
        $this->namaDepan = $namaDepan;
    }

    public function getNamaBelakang() {
        return $this->namaBelakang;
    }

    public function setNamaBelakang($namaBelakang) {
        $this->namaBelakang = $namaBelakang;
    }

    public function getNoHp() {
        return $this->noHp;
    }

    public function setNoHp($noHp) {
        $this->noHp = $noHp;
    }

    public function getAlamat() {
        return $this->alamat;
    }

    public function setAlamat($alamat) {
        $this->alamat = $alamat;
    }

    public function getIdAkses() {
        return $this->idAkses;
    }

    public function setIdAkses($idAkses) {
        $this->idAkses = $idAkses;
    }

	public function getNamaAkses() {
        return $this->namaAkses;
    }

    public function setNamaAkses($namaAkses) {
        $this->namaAkses = $namaAkses;
    }

}
?>