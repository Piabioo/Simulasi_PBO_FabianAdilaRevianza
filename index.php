<?php
// Memuat koneksi dan semua class yang diperlukan
require_once 'koneksi.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// Mengambil data dari database menggunakan metode query spesifik masing-masing class
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="sidebar">
        <h1>Sistem PMB</h1>
        <ul class="sidebar-menu">
            <li><a href="#reguler" class="nav-link">Jalur Reguler</a></li>
            <li><a href="#prestasi" class="nav-link">Jalur Prestasi</a></li>
            <li><a href="#kedinasan" class="nav-link">Jalur Kedinasan</a></li>
        </ul>
    </div>

    <div class="main-content">

        <div class="stats-container">
            <div class="stat-card">
                <p>Jalur Reguler</p>
                <h3><?= count($dataReguler); ?> Calon</h3>
            </div>
            <div class="stat-card">
                <p>Jalur Prestasi</p>
                <h3><?= count($dataPrestasi); ?> Calon</h3>
            </div>
            <div class="stat-card">
                <p>Jalur Kedinasan</p>
                <h3><?= count($dataKedinasan); ?> Calon</h3>
            </div>
        </div>

        <section id="reguler">
            <h2 class="title-reguler">Jalur Reguler</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai</th>
                            <th>Informasi Jalur</th>
                            <th>Biaya Dasar</th>
                            <th>Total Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataReguler as $row): 
                            $maba = new PendaftaranReguler(
                                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                                $row['pilihan_prodi'], $row['lokasi_kampus']
                            );
                        ?>
                            <tr>
                                <td><?= $row['id_pendaftaran']; ?></td>
                                <td class="bold-text"><?= htmlspecialchars($row['nama_calon']); ?></td>
                                <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                                <td><?= $row['nilai_ujian']; ?></td>
                                <td><span class="badge badge-reguler"><?= $maba->tampilkanInfoJalur(); ?></span></td>
                                <td class="text-right">Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                                <td class="text-right cost-reguler">Rp <?= number_format($maba->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="prestasi">
            <h2 class="title-prestasi">Jalur Prestasi</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai</th>
                            <th>Informasi Jalur</th>
                            <th>Biaya Dasar</th>
                            <th>Total Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPrestasi as $row): 
                            $maba = new PendaftaranPrestasi(
                                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                                $row['jenis_prestasi'], $row['tingkat_prestasi']
                            );
                        ?>
                            <tr>
                                <td><?= $row['id_pendaftaran']; ?></td>
                                <td class="bold-text"><?= htmlspecialchars($row['nama_calon']); ?></td>
                                <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                                <td><?= $row['nilai_ujian']; ?></td>
                                <td><span class="badge badge-prestasi"><?= $maba->tampilkanInfoJalur(); ?></span></td>
                                <td class="text-right">Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                                <td class="text-right cost-prestasi">Rp <?= number_format($maba->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="kedinasan">
            <h2 class="title-kedinasan">Jalur Kedinasan</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai</th>
                            <th>Informasi Jalur</th>
                            <th>Biaya Dasar</th>
                            <th>Total Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataKedinasan as $row): 
                            $maba = new PendaftaranKedinasan(
                                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                                $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                            );
                        ?>
                            <tr>
                                <td><?= $row['id_pendaftaran']; ?></td>
                                <td class="bold-text"><?= htmlspecialchars($row['nama_calon']); ?></td>
                                <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                                <td><?= $row['nilai_ujian']; ?></td>
                                <td><span class="badge badge-kedinasan"><?= $maba->tampilkanInfoJalur(); ?></span></td>
                                <td class="text-right">Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                                <td class="text-right cost-kedinasan">Rp <?= number_format($maba->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</body>
</html>