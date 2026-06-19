<?php

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

    /**
     * Overriding hitungTotalBiaya()
     * Tarif standar murni tanpa biaya tambahan seleksi/tes laboratorium
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    /**
     * Overriding tampilkanInfoJalur()
     */
    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Regular, Prodi: " . $this->pilihanProdi . ", Lokasi: " . $this->lokasiKampus;
    }

    /**
     * Metode Query Spesifik
     */
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'regular'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}