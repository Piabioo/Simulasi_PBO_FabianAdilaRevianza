-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 03:17 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_trpl1a_fabianadilarevianza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('regular','prestasi','kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', 85.50, 200000.00, 'regular', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', 78.25, 200000.00, 'regular', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Dewi', 'SMA Kristen Yusuf', 90.00, 200000.00, 'regular', 'Kedokteran', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dedi Setiawan', 'SMKN 2 Surabaya', 82.10, 200000.00, 'regular', 'Teknik Mesin', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 5 Yogyakarta', 88.40, 200000.00, 'regular', 'Akuntansi', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'SMA Al-Azhar', 79.90, 200000.00, 'regular', 'Ilmu Komunikasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 1 Medan', 84.75, 200000.00, 'regular', 'Psikologi', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 70 Jakarta', 92.00, 150000.00, 'prestasi', 'Teknik Elektro', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Lestari', 'SMAN 1 Surakarta', 89.50, 150000.00, 'prestasi', 'Sastra Inggris', 'Kampus Selatan', 'Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(10, 'Joko Tingkir', 'SMA Taruna Nusantara', 86.00, 150000.00, 'prestasi', 'Hukum', 'Kampus Barat', 'Pencak Silat', 'Nasional', NULL, NULL),
(11, 'Kurniawati', 'SMAN 3 Semarang', 94.25, 150000.00, 'prestasi', 'Farmasi', 'Kampus Barat', 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMKN 1 Balikpapan', 83.50, 150000.00, 'prestasi', 'Arsitektur', 'Kampus Utama', 'Desain Grafis', 'Provinsi', NULL, NULL),
(13, 'Mega Utami', 'SMAN 1 Makassar', 91.10, 150000.00, 'prestasi', 'Manajemen', 'Kampus Selatan', 'Basket', 'Nasional', NULL, NULL),
(14, 'Naufal Hadi', 'SMA Muhammadiyah 1', 87.80, 150000.00, 'prestasi', 'Teknik Sipil', 'Kampus Utama', 'Olimpiade Fisika', 'Kabupaten/Kota', NULL, NULL),
(15, 'Oki Pratama', 'SMAN 1 penajam', 88.00, 250000.00, 'kedinasan', 'Ilmu Pemerintahan', 'Kampus Kedinasan', NULL, NULL, 'SK-77/IKD/2026', 'Kementerian Dalam Negeri'),
(16, 'Putri Ayu', 'SMAN 8 Jakarta', 95.00, 250000.00, 'kedinasan', 'Statistika Terapan', 'Kampus Kedinasan', NULL, NULL, 'SK-102/STIS/2026', 'Badan Pusat Statistik'),
(17, 'Rian Hidayat', 'SMA Negeri 2 Padang', 86.50, 250000.00, 'kedinasan', 'Sistem Informasi Poltekip', 'Kampus Kedinasan', NULL, NULL, 'SK-045/KUMHAM/2026', 'Kemenkumham'),
(18, 'Siti Aminah', 'SMAN 1 Banjarmasin', 89.20, 250000.00, 'kedinasan', 'Manajemen Keuangan Negara', 'Kampus Kedinasan', NULL, NULL, 'SK-993/KEMENKEU/2026', 'Kementerian Keuangan'),
(19, 'Taufik Hidayat', 'SMA Taruna Bakti', 91.00, 250000.00, 'kedinasan', 'Teknik Penerbangan', 'Kampus Kedinasan', NULL, NULL, 'SK-12/HUBUB/2026', 'Kementerian Perhubungan'),
(20, 'Utari Respati', 'SMAN 1 Denpasar', 87.30, 250000.00, 'kedinasan', 'Meteorologi dan Geofisika', 'Kampus Kedinasan', NULL, NULL, 'SK-88/BMKG/2026', 'BMKG'),
(21, 'Vino Bastian', 'SMAN 2 Malang', 90.50, 250000.00, 'kedinasan', 'Cyber Security', 'Kampus Kedinasan', NULL, NULL, 'SK-551/BSSN/2026', 'Badan Siber dan Sandi Negara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
