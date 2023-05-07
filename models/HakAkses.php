<?php
class HakAkses {
    public $idAkses;
    public $namaAkses;
    public $keterangan;

    public function __construct($idAkses, $namaAkses="", $keterangan="") {
        $this->idAkses = $idAkses;
        $this->namaAkses = $namaAkses;
        $this->keterangan = $keterangan;
    }

    public function getIdAkses() {
        return $this->idAkses;
    }

    public function getNamaAkses() {
        return $this->namaAkses;
    }

    public function setNamaAkses($namaAkses) {
        $this->namaAkses = $namaAkses;
    }

    public function getKeterangan() {
        return $this->keterangan;
    }

    public function setKeterangan($keterangan) {
        $this->keterangan = $keterangan;
    }
}
?>