-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 06:32 PM
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
(23, '<p>1. Ketuhanan yang maha esa</p>\r\n<p>2. Kemanusiaan yang adil dan beradab</p>\r\n<p>3. Persatuan Indonesia</p>', 2, 2018, 'y'),
(25, '<p>Ini adalah penutup</p>', 6, 2018, 'y'),
(26, '<p style=\"margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; vertical-align: baseline; color: #323232;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Bagian pembuka ini biasanya berada pada paragraf pertama hingga kedua kata pengantar. Pada bagian ini berisikan ucapan rasa syukur penulis atau tim penyusun atas selesainya makalah yang ditulis.</span></p>\r\n<p style=\"margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; vertical-align: baseline; color: #323232;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Di Indonesia, lumrahnya ucapan terima kasih pada bagian pembuka ini ditujukan kepada Tuhan Yang Maha Esa. Adapun, bagi sebagian orang atau kelompok, ucapan terima kasih kepada Tuhan disesuaikan dengan agama masing-masing. Bagi yang beragama Islam, ucapannya ditujukan kepada Allah SWT, dan begitu pula bagi pemeluk agama lainnya.</span></p>\r\n<p style=\"margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; vertical-align: baseline; color: #323232;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Setelah ucapan syukur dan terima kasih kepada Tuhan, biasanya dilanjutkan ucapan terima kasih kepada orang-orang yang membantu atau memiliki andil pada penulisan makalah tersebut.</span></p>\r\n<p style=\"margin: 0px 0px 1.25rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; vertical-align: baseline; color: #323232;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Urutan penyebutan pihak-pihak yang bersangkutan biasanya disesuaikan dengan seberapa berpengaruhnya orang yang bersangkutan pada penyelesaian makalah. Biasanya, untuk makalah tugas sekolah, nama pertama yang disebutkan dalam ucapan terima kasih ini ialah guru kelas yang memberikan tugas. Setelah itu, baru pihak-pihak yang memang membantu pembuatan makalah.</span></p>', 1, 2018, 'y');

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
(9, '<p><img src=\"http://localhost/assets/image/post-image-1538928988005.jpg\" alt=\"\" width=\"333\" height=\"390\" /></p>', 4, 2018, 'y');

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
(8, '2.4. Rencana Kinerja', 4, NULL),
(9, '2.5. Cara Pencapaian Tujuan dan Sasaran', 4, NULL),
(10, 'A. Capaian Kinerja Tahun Sebelumnya', 5, NULL),
(11, 'B. Evaluasi dan Analisis Capaian Kinerja', 5, NULL),
(12, 'C. Akuntabilitas Anggaran', 5, NULL),
(13, 'Lampiran I', 7, NULL),
(14, 'Lampiran II', 7, NULL),
(15, 'Lampiran III', 7, NULL),
(16, 'Lampiran IV', 7, NULL);

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
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
-- AUTO_INCREMENT for table `isi_menu`
--
ALTER TABLE `isi_menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `isi_submenu`
--
ALTER TABLE `isi_submenu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
