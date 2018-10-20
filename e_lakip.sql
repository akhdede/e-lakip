-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 04:11 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_lakip`
--

-- --------------------------------------------------------

--
-- Table structure for table `iku`
--

CREATE TABLE `iku` (
  `id` int(11) NOT NULL,
  `sasaran_strategis` varchar(255) NOT NULL,
  `indikator_kinerja` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isi_menu`
--

CREATE TABLE `isi_menu` (
  `id` int(4) NOT NULL,
  `konten` text NOT NULL,
  `id_menu` int(3) NOT NULL,
  `tahun` year(4) NOT NULL,
  `selesai` enum('y','n') DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_menu`
--

INSERT INTO `isi_menu` (`id`, `konten`, `id_menu`, `tahun`, `selesai`) VALUES
(23, '<p>Kata Pengantar</p>\r\n<p>Daftar Isi</p>\r\n<p>BAB I Pendahuluan</p>\r\n<p>BAB II Rencana Strategis dan Penetapan Kinerja</p>\r\n<p>BAB III Akuntabilitas Kinerja</p>\r\n<p>BAB VI Penutup</p>\r\n<p>Lampiran-lampiran</p>', 2, 2018, 'y'),
(27, '<p>Ini kata pengantar</p>', 1, 2018, 'y'),
(28, '<p>Ini bab penutup</p>', 6, 2018, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `isi_submenu`
--

CREATE TABLE `isi_submenu` (
  `id` int(4) NOT NULL,
  `konten` text NOT NULL,
  `id_submenu` int(3) DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `selesai` enum('y','n') DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_submenu`
--

INSERT INTO `isi_submenu` (`id`, `konten`, `id_submenu`, `tahun`, `selesai`) VALUES
(3, '<p>Ini latar belakang!</p>', 1, 2018, 'y'),
(4, '<p>Ini dasar hukum</p>', 2, 2018, 'y'),
(6, '<p>Ini tugas pokok dan fungsi</p>', 3, 2018, 'y'),
(9, '<p><img src=\"http://localhost/assets/image/post-image-1538928988005.jpg\" alt=\"\" width=\"333\" height=\"390\" /></p>', 4, 2018, 'y'),
(11, '<p>Ini visi misi</p>', 5, 2018, 'y'),
(13, '<p>Ini tujuan dan sasaran</p>', 6, 2018, 'y'),
(15, '<p>arah kebijakan umum</p>', 7, 2018, 'y'),
(17, '<p>ini rencana kinerja</p>', 8, 2018, 'y'),
(19, '<p>ini cara mencapai tujuan dan sasaran</p>', 9, 2018, 'y'),
(21, '<p>Ini capaian kinerja tahun sebelumnya.</p>', 10, 2018, 'y'),
(23, '<p>Ini evaluasi analisis dan capaian kinerja</p>', 11, 2018, 'y'),
(25, '<p>Ini akuntabilitas anggaran</p>', 12, 2018, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `id_program`) VALUES
(8, 'Penyediaan jasa surat menyurat', 44),
(9, 'Penyediaan jasa komunikasi, sumber daya air dan listrik', 44),
(11, 'Pembangunan gedung kantor', 43),
(12, 'Pengadaan perlengkapan gedung kantor', 43),
(13, 'Pengadaan peralatan gedung kantor', 43),
(14, 'Pengadaan mesin / kartu absensi', 42),
(15, 'Pengadaan pakaian dinas beserta perlengkapannya', 42);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`) VALUES
(1, 'KATA PENGANTAR', 'menu/katapengantar'),
(2, 'DAFTAR ISI', 'menu/daftarisi'),
(3, 'BAB I PENDAHULUAN', 'submenu'),
(4, 'BAB II RENCANA STRATEGIS DAN PENETAPAN KINERJA', '#'),
(5, 'BAB III AKUNTABILITAS KINERJA', '#'),
(6, 'BAB IV PENUTUP', 'menu/bab4'),
(7, 'LAMPIRAN-LAMPIRAN', '#');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `nama`) VALUES
(42, 'Program peningkatan disiplin aparatur sipil negara'),
(43, 'Program peningkatan sarana dan prasarana aparatur'),
(44, 'Program pelayanan administrasi perkantoran');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(3) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `id_menu` int(3) NOT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `nama`, `id_menu`, `link`) VALUES
(1, '1.1. Latar Belakang', 3, 'submenu/latarbelakang'),
(2, '1.2. Dasar Hukum', 3, 'submenu/dasarhukum'),
(3, '1.3. Tugas Pokok dan Fungsi', 3, 'submenu/tupoksi'),
(4, '1.4. Struktur Organisasi', 3, 'submenu/strukturorganisasi'),
(5, '2.1. Visi dan Misi', 4, 'submenu/visimisi'),
(6, '2.2. Tujuan dan Sasaran', 4, 'submenu/tujuansasaran'),
(7, '2.3. Arah Kebijakan Umum', 4, 'submenu/arahkebijakanumum'),
(8, '2.4. Rencana Kinerja', 4, 'submenu/rencanakinerja'),
(9, '2.5. Cara Pencapaian Tujuan dan Sasaran', 4, 'submenu/caracapaitujuansasaran'),
(10, 'A. Capaian Kinerja Tahun Sebelumnya', 5, 'submenu/capaiankinerja'),
(11, 'B. Evaluasi dan Analisis Capaian Kinerja', 5, 'submenu/evaluasianalisis'),
(12, 'C. Akuntabilitas Anggaran', 5, 'submenu/akuntabilitasanggaran'),
(13, 'Lampiran I (IKU)', 7, 'submenu/lampiran1'),
(14, 'Lampiran II', 7, NULL),
(15, 'Lampiran III', 7, NULL),
(16, 'Lampiran IV', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_iku`
--

CREATE TABLE `sub_iku` (
  `id` int(11) NOT NULL,
  `target` varchar(50) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `anggaran` int(11) DEFAULT NULL,
  `id_iku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_iku`
--

INSERT INTO `sub_iku` (`id`, `target`, `id_program`, `id_kegiatan`, `anggaran`, `id_iku`) VALUES
(48, NULL, 43, 11, NULL, 67),
(49, NULL, 43, 12, NULL, 67),
(50, NULL, 43, 13, NULL, 67),
(51, NULL, 42, 14, NULL, 66),
(52, NULL, 42, 15, NULL, 66),
(55, NULL, 43, 11, NULL, 70),
(56, NULL, 43, 12, NULL, 70),
(57, NULL, 43, 13, NULL, 70),
(58, NULL, 42, 14, NULL, 69),
(59, NULL, 42, 15, NULL, 69),
(62, NULL, 43, 11, NULL, 73),
(63, NULL, 43, 12, NULL, 73),
(64, NULL, 43, 13, NULL, 73),
(65, NULL, 42, 14, NULL, 72),
(66, NULL, 42, 15, NULL, 72);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$Bx8bW7SyvDtCoKXsa7ejpeHPMBXDX4HdxH3/a9LyomAGjnJtmKqO2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iku`
--
ALTER TABLE `iku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_menu`
--
ALTER TABLE `isi_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_submenu`
--
ALTER TABLE `isi_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_iku`
--
ALTER TABLE `sub_iku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iku`
--
ALTER TABLE `iku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `isi_menu`
--
ALTER TABLE `isi_menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `isi_submenu`
--
ALTER TABLE `isi_submenu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_iku`
--
ALTER TABLE `sub_iku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
