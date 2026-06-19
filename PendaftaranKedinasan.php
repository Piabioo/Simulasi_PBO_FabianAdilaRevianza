<?php

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik
    protected $skIkatanDinas;
    protected $instansiSponsor;

    // Constructor mendefinisikan properti induk dan anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    /**
     * Overriding hitungTotalBiaya()
     * Dikenakan surcharge/biaya tambahan administrasi khusus & kemitraan dinas sebesar 25% dari biaya dasar
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    /**
     * Overriding tampilkanInfoJalur()
     */
    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan, Sponsor: " . $this->instansiSponsor . ", No SK: " . $this->skIkatanDinas;
    }

    /**
     * Metode Query Spesifik
     */
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}