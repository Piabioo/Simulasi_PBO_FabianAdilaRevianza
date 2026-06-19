<?php

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    // Constructor mendefinisikan properti induk dan anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Implementasi metode abstrak dari induk
    public function hitungTotalBiaya() {
        // Contoh implementasi: potongan biaya 25% bagi jalur prestasi
        return $this->biayaPendaftaranDasar * 0.75;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi, Jenis: " . $this->jenisPrestasi . " (" . $this->tingkatPrestasi . ")";
    }

    // Metode Query Spesifik
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}