<?php

// ==========================================
// 1. SUBCLASS: PendaftaranReguler
// ==========================================
class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik
    protected $pilihanProdi;
    protected $lokasiKampus;

    // Constructor mendefinisikan properti induk dan anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Implementasi metode abstrak dari induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Regular, Prodi: " . $this->pilihanProdi . ", Lokasi: " . $this->lokasiKampus;
    }

    // Metode Query Spesifik
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_campur 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'regular'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}