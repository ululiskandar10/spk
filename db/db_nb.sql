-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 05:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `img_dir` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `img_dir`) VALUES
('audyruslan', '$2y$10$YJMlsasuDDlkgqAUS/.XdOeu/6/gPq1Z9dr1xAe.j40T8TtjfnD5S', 'Audy Ruslan', 'image/1638426625.png'),
('ulul', '$2y$10$yx.NciroE7CKrA0znb.rEOC/Yg69igsNZcPZTVcbpxFMfaxvLtgAm', 'Ulul Asmi', 'image/1668827500.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(256) NOT NULL,
  `usia` int(11) NOT NULL,
  `motorik_kasar` varchar(256) NOT NULL,
  `motorik_halus` varchar(255) NOT NULL,
  `kognitif_anak` varchar(255) NOT NULL,
  `kompetensi_akhlak` varchar(256) NOT NULL,
  `kompetensi_umum` varchar(255) NOT NULL,
  `kemandirian` varchar(255) NOT NULL,
  `kesiapan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `nama_lengkap`, `jenis_kelamin`, `usia`, `motorik_kasar`, `motorik_halus`, `kognitif_anak`, `kompetensi_akhlak`, `kompetensi_umum`, `kemandirian`, `kesiapan`) VALUES
(3, 'Kamila Syifa Azzahra', 'Perempuan', 5, 'Berkembang sesuai Harapan (BSH)', 'Belum Muncul (BM)', 'Mulai Muncul (MM)', 'Belum Dievauasi (BD)', 'Mulai Muncul (MM)', 'Berkembang Sesuai Harapan (BSH)', 'Siap'),
(4, 'Raisa Arzafira ', 'Perempuan', 6, 'Belum Muncul (BM)', 'Berkembang Sesuai Harapan (BSH)', 'Belum Dievaluasi (BD)', 'Berkembang Sesuai Harapan (BSH)', 'Belum Muncul (BM)', 'Berkembang Sesuai Harapan (BSH)', 'Siap'),
(5, 'Suci Ramadan', 'Perempuan', 6, 'Berkembang sesuai Harapan (BSH)', 'Berkembang Sesuai Harapan (BSH)', 'Berkembang Sesuai Harapan (BSH)', 'Mulai Mucul (MM)', 'Berkembang Sesuai Harapan (BSH)', 'Mulai Berkembang (MB)', 'Belum Siap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id`, `nama_kriteria`, `kondisi`) VALUES
(27, 'Usia', '4'),
(28, 'Usia', '5'),
(29, 'Usia', '6'),
(30, 'Usia', '7'),
(37, 'Kemandirian', 'Mulai Berkembang (MB)'),
(38, 'Kesiapan', 'Siap'),
(39, 'Kesiapan', 'Belum Siap'),
(40, 'Kemandirian', 'Berkembang Sesuai Harapan (BSH)'),
(41, 'Kemandirian', 'Berkembang Sangat Baik (BSB)'),
(42, 'Motorik Kasar', 'Belum Dievaluasi (BD)'),
(43, 'Motorik Kasar', 'Belum Muncul (BM)'),
(44, 'Motorik Kasar', 'Mulai Muncul (MM)'),
(45, 'Motorik Kasar', 'Berkembang sesuai Harapan (BSH)'),
(46, 'Motorik Kasar', 'Berkembang Sangat Baik (BSB)'),
(47, 'Motorik Halus', 'Belum Dievaluasi (BD)'),
(48, 'Motorik Halus', 'Belum Muncul (BM)'),
(49, 'Motorik Halus', 'Mulai Muncul (MM)'),
(50, 'Motorik Halus', 'Berkembang Sesuai Harapan (BSH)'),
(51, 'Motorik Halus', 'Berkembang Sangat Baik'),
(52, 'Kognitif Anak', 'Belum Dievaluasi (BD)'),
(53, 'Kognitif Anak', 'Belum Muncul (BM)'),
(54, 'Kognitif Anak', 'Mulai Muncul (MM)'),
(55, 'Kognitif Anak', 'Berkembang Sesuai Harapan (BSH)'),
(56, 'Kognitif Anak', 'Bekembang Sangat Baik BSB)'),
(57, 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi', 'Belum Dievauasi (BD)'),
(58, 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi', 'Belum Muncul (BM)'),
(59, 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi', 'Mulai Mucul (MM)'),
(60, 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi', 'Berkembang Sesuai Harapan (BSH)'),
(61, 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi', 'Berkembang Sangat Baik (BSB)'),
(62, 'Kompetensi Dasar Umum', 'Belum Dievaluasi (BD) '),
(63, 'Kompetensi Dasar Umum', 'Belum Muncul (BM)'),
(64, 'Kompetensi Dasar Umum', 'Mulai Muncul (MM)'),
(65, 'Kompetensi Dasar Umum', 'Berkembang Sesuai Harapan (BSH)'),
(66, 'Kompetensi Dasar Umum', 'Berkembang Sangat Baik (BSB)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `nama_kriteria`) VALUES
(13, 'Usia'),
(14, 'Motorik Kasar'),
(15, 'Motorik Halus'),
(16, 'Kognitif Anak'),
(17, 'Kemandirian'),
(18, 'Kesiapan'),
(19, 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi'),
(20, 'Kompetensi Dasar Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `agama` varchar(256) NOT NULL,
  `pekerjaan_ayah` varchar(256) NOT NULL,
  `pekerjaan_ibu` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nama_lengkap`, `jenis_kelamin`, `usia`, `tmp_lahir`, `tgl_lahir`, `nama_ayah`, `nama_ibu`, `agama`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status`) VALUES
(34, 'Kamila Syifa Azzahra', 'Perempuan', 5, 'Ampana', '2017-10-08', 'Roni Lamahuseng', 'Tiwi putri', 'Islam', 'Nelayan', 'IRT', 1),
(35, 'Raisa Arzafira ', 'Perempuan', 6, 'Ampana', '2016-01-25', 'Marlin dg Mappa', 'Siti Maryam', 'Islam', 'Nelayan', 'IRT', 1),
(36, 'Suci Ramadan', 'Perempuan', 6, 'Labuan', '2016-06-08', 'Junaedi Iskandar', 'Rinawati', 'Islam', 'Nelayan', 'IRT', 0),
(37, 'Raisa', 'Perempuan', 6, 'Labuan', '2016-03-21', 'Gazali', 'Yulia Tagiling', 'Islam', 'Nelayan', 'IRT', 0),
(38, 'Rania Putri ', 'Perempuan', 7, 'Tambu', '2015-04-28', 'Kahar M Ali', 'Riani ', 'Islam', 'Nelayan', 'IRT', 0),
(39, 'Putri Salsabila R Taher', 'Perempuan', 6, 'Dondo', '2016-07-13', 'Gusman Salim', 'Maswa dg Matajjeng', 'Islam', 'Nelayan', 'IRT', 0),
(40, 'Kirana Djatung', 'Perempuan', 6, 'Labuan', '2016-06-07', 'Hamka', 'Marni', 'Islam', 'Nelayan', 'IRT', 0),
(41, 'Fauzia A Mangose', 'Perempuan', 6, 'Labuan', '2016-06-08', 'Kevin ', 'Irma Wati', 'Islam', 'Nelayan', 'IRT', 0),
(42, 'Alvian Suwandi', 'Laki-laki', 7, 'Ampana', '2017-02-19', 'Erwin', 'Lilis Nur wati', 'Islam', 'Wiraswasta', 'IRT', 0),
(43, 'Farid', 'Laki-laki', 7, 'Labuan', '2017-03-26', 'Herman', 'Nur Intan', 'Islam', 'Nelayan', 'IRT', 0),
(44, 'Ulul Asmi', 'Perempuan', 5, 'bada', '2018-10-09', 'Iskandar', 'Zaenab', 'Islam', 'wiraswasta', 'URT', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_kriteria` (`nama_kriteria`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
