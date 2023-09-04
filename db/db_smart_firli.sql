-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 01:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart_firli`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `rangking` int(1) NOT NULL,
  `bobot` float(10,2) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `rangking`, `bobot`, `ket`) VALUES
(1, 'irigasi pengairan', 1, 0.37, 'irigasi_pengairan'),
(2, 'PH', 2, 0.23, 'ph'),
(3, 'kelembaban', 3, 0.16, 'kelembaban'),
(4, 'penyiapan lahan', 4, 0.11, 'penyiapan_lahan'),
(5, 'gambut', 5, 0.07, 'gambut'),
(6, 'lereng', 6, 0.04, 'lereng'),
(7, 'rotasi tanaman', 7, 0.02, 'rotasi_tanaman');

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

CREATE TABLE `lahan` (
  `id` int(11) NOT NULL,
  `lahan` varchar(25) NOT NULL,
  `ph` float(2,1) NOT NULL,
  `rotasi_tanaman` int(11) NOT NULL,
  `kelembaban` int(11) NOT NULL,
  `lereng` int(11) NOT NULL,
  `irigasi_pengairan` int(11) NOT NULL,
  `penyiapan_lahan` int(11) NOT NULL,
  `gambut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`id`, `lahan`, `ph`, `rotasi_tanaman`, `kelembaban`, `lereng`, `irigasi_pengairan`, `penyiapan_lahan`, `gambut`) VALUES
(1, 'Tangkil', 6.0, 86, 35, 2, 3, 5, 80),
(2, 'Sinapel', 8.0, 50, 25, 17, 10, 16, 120),
(3, 'Loji', 4.0, 55, 28, 12, 15, 38, 105),
(4, 'gunung batu', 5.5, 66, 30, 17, 5, 2, 40),
(5, 'ciburial', 5.5, 80, 32, 15, 6, 4, 30),
(6, 'curug kalong', 5.4, 85, 28, 10, 4, 42, 29),
(7, 'legog asem', 4.7, 81, 33, 8, 3, 1, 30),
(8, 'jogjogan', 4.5, 67, 30, 9, 12, 5, 35),
(9, 'citaman', 4.0, 75, 32, 2, 8, 17, 40),
(10, 'cibeling', 3.4, 64, 91, 17, 9, 20, 155),
(11, 'cinagara', 7.0, 60, 28, 3, 2, 5, 100),
(12, 'lewikaso', 6.5, 87, 27, 5, 3, 45, 85),
(13, 'cisempur', 3.4, 80, 33, 9, 5, 5, 143),
(14, 'dukuh kaung', 6.5, 64, 80, 16, 7, 3, 80),
(15, 'babakan', 8.5, 73, 27, 13, 13, 40, 140),
(16, 'cimande', 5.0, 66, 85, 3, 6, 1, 90),
(17, 'nangeleng', 7.0, 85, 30, 8, 8, 4, 85),
(18, 'lemah duhur', 8.0, 100, 32, 17, 5, 4, 80),
(19, 'nangoh', 9.0, 60, 26, 16, 10, 40, 143),
(20, 'caringin', 8.7, 80, 27, 16, 7, 4, 39),
(21, 'sempur', 8.7, 50, 29, 16, 10, 42, 141),
(22, 'muara jaya', 6.0, 82, 28, 20, 8, 10, 80),
(23, 'pasir muncang', 6.5, 87, 30, 3, 6, 10, 150),
(24, 'pancawati', 6.5, 63, 27, 9, 2, 9, 70),
(25, 'ciderum', 6.5, 73, 91, 6, 11, 8, 100),
(26, 'ciherang pondok', 6.5, 67, 65, 6, 4, 5, 120),
(27, 'pasir buncir ', 4.4, 70, 32, 20, 15, 41, 141),
(28, 'lemur situ', 7.0, 80, 25, 16, 3, 17, 70),
(29, 'cikodok', 7.0, 70, 29, 12, 3, 15, 31),
(30, 'babakan laneh', 8.0, 60, 27, 8, 1, 41, 40);

-- --------------------------------------------------------

--
-- Table structure for table `lahan_harap`
--

CREATE TABLE `lahan_harap` (
  `id` int(11) NOT NULL,
  `kelompok` varchar(25) NOT NULL,
  `ph` float(2,2) NOT NULL,
  `rotasi_tanaman` float(2,2) NOT NULL,
  `kelembaban` float(2,2) NOT NULL,
  `lereng` float(2,2) NOT NULL,
  `irigasi_pengairan` float(2,2) NOT NULL,
  `penyiapan_lahan` float(2,2) NOT NULL,
  `gambut` float(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lahan_harap`
--

INSERT INTO `lahan_harap` (`id`, `kelompok`, `ph`, `rotasi_tanaman`, `kelembaban`, `lereng`, `irigasi_pengairan`, `penyiapan_lahan`, `gambut`) VALUES
(1, 'S1', 0.61, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52),
(2, 'S2', 0.28, 0.27, 0.27, 0.27, 0.27, 0.27, 0.27),
(3, 'S3', 0.11, 0.15, 0.15, 0.15, 0.15, 0.15, 0.15),
(4, 'N', 0.00, 0.06, 0.06, 0.06, 0.06, 0.06, 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `lahan_transform`
--

CREATE TABLE `lahan_transform` (
  `id` int(11) NOT NULL,
  `lahan` varchar(25) NOT NULL,
  `ph` float(2,2) NOT NULL,
  `rotasi_tanaman` float(2,2) NOT NULL,
  `kelembaban` float(2,2) NOT NULL,
  `lereng` float(2,2) NOT NULL,
  `irigasi_pengairan` float(2,2) NOT NULL,
  `penyiapan_lahan` float(2,2) NOT NULL,
  `gambut` float(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lahan_transform`
--

INSERT INTO `lahan_transform` (`id`, `lahan`, `ph`, `rotasi_tanaman`, `kelembaban`, `lereng`, `irigasi_pengairan`, `penyiapan_lahan`, `gambut`) VALUES
(1, 'Tangkil', 0.61, 0.52, 0.52, 0.52, 0.52, 0.27, 0.27),
(2, 'Sinapel', 0.11, 0.06, 0.06, 0.06, 0.15, 0.15, 0.15),
(3, 'Loji', 0.11, 0.06, 0.15, 0.15, 0.06, 0.15, 0.15),
(4, 'gunung batu', 0.61, 0.15, 0.27, 0.06, 0.27, 0.52, 0.27),
(5, 'ciburial', 0.61, 0.27, 0.27, 0.15, 0.27, 0.52, 0.52),
(6, 'curug kalong', 0.28, 0.52, 0.15, 0.15, 0.27, 0.06, 0.52),
(7, 'legog asem', 0.28, 0.27, 0.52, 0.27, 0.52, 0.52, 0.52),
(8, 'jogjogan', 0.28, 0.15, 0.27, 0.15, 0.06, 0.27, 0.52),
(9, 'citaman', 0.11, 0.15, 0.27, 0.52, 0.15, 0.15, 0.27),
(10, 'cibeling', 0.11, 0.06, 0.52, 0.06, 0.15, 0.15, 0.06),
(11, 'cinagara', 0.61, 0.06, 0.15, 0.27, 0.52, 0.27, 0.27),
(12, 'lewikaso', 0.61, 0.52, 0.15, 0.27, 0.52, 0.06, 0.27),
(13, 'cisempur', 0.11, 0.27, 0.52, 0.15, 0.27, 0.27, 0.06),
(14, 'dukuh kaung', 0.61, 0.06, 0.52, 0.06, 0.15, 0.52, 0.27),
(15, 'babakan', 0.11, 0.15, 0.15, 0.15, 0.06, 0.15, 0.15),
(16, 'cimande', 0.28, 0.15, 0.52, 0.27, 0.27, 0.52, 0.27),
(17, 'nangeleng', 0.61, 0.52, 0.27, 0.27, 0.15, 0.52, 0.27),
(18, 'lemah duhur', 0.11, 0.52, 0.27, 0.06, 0.27, 0.52, 0.27),
(19, 'nangoh', 0.11, 0.06, 0.06, 0.06, 0.15, 0.15, 0.06),
(20, 'caringin', 0.11, 0.27, 0.15, 0.06, 0.15, 0.52, 0.52),
(21, 'sempur', 0.11, 0.06, 0.15, 0.06, 0.15, 0.06, 0.06),
(22, 'muara jaya', 0.61, 0.27, 0.15, 0.06, 0.15, 0.27, 0.27),
(23, 'pasir muncang', 0.61, 0.52, 0.27, 0.27, 0.27, 0.27, 0.06),
(24, 'pancawati', 0.61, 0.06, 0.15, 0.15, 0.52, 0.27, 0.27),
(25, 'ciderum', 0.61, 0.15, 0.52, 0.27, 0.06, 0.27, 0.27),
(26, 'ciherang pondok', 0.61, 0.15, 0.52, 0.27, 0.27, 0.27, 0.15),
(27, 'pasir buncir ', 0.11, 0.15, 0.27, 0.06, 0.06, 0.06, 0.06),
(28, 'lemur situ', 0.61, 0.27, 0.06, 0.06, 0.52, 0.15, 0.27),
(29, 'cikodok', 0.61, 0.15, 0.15, 0.15, 0.52, 0.27, 0.52),
(30, 'babakan laneh', 0.11, 0.06, 0.15, 0.27, 0.52, 0.06, 0.27),
(31, 'Cilebut', 0.61, 0.06, 0.52, 0.06, 0.06, 0.06, 0.27);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `lahan` varchar(25) NOT NULL,
  `nilai` decimal(10,5) NOT NULL,
  `kelompok` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `lahan`, `nilai`, `kelompok`) VALUES
(1, 'Tangkil', '0.49570', 'S2'),
(2, 'Sinapel', '0.12100', 'N'),
(3, 'Loji', '0.10570', 'N'),
(4, 'gunung batu', '0.36490', 'S2'),
(5, 'ciburial', '0.38840', 'S2'),
(6, 'curug kalong', '0.24770', 'S3'),
(7, 'legog asem', '0.44980', 'S2'),
(8, 'jogjogan', '0.20490', 'S3'),
(9, 'citaman', '0.18320', 'S3'),
(10, 'cibeling', '0.18830', 'S3'),
(11, 'cinagara', '0.41730', 'S2'),
(12, 'lewikaso', '0.40340', 'S2'),
(13, 'cisempur', '0.25370', 'S3'),
(14, 'dukuh kaung', '0.35870', 'S2'),
(15, 'babakan', '0.10750', 'N'),
(16, 'cimande', '0.33740', 'S2'),
(17, 'nangeleng', '0.33630', 'S2'),
(18, 'lemah duhur', '0.25730', 'S3'),
(19, 'nangoh', '0.11470', 'N'),
(20, 'caringin', '0.20620', 'S3'),
(21, 'sempur', '0.11920', 'N'),
(22, 'muara jaya', '0.27620', 'S2'),
(23, 'pasir muncang', '0.33850', 'S2'),
(24, 'pancawati', '0.41250', 'S2'),
(25, 'ciderum', '0.30810', 'S2'),
(26, 'ciherang pondok', '0.37740', 'S2'),
(27, 'pasir buncir ', '0.10690', 'N'),
(28, 'lemur situ', '0.38550', 'S2'),
(29, 'cikodok', '0.43180', 'S2'),
(30, 'babakan laneh', '0.27920', 'S2'),
(31, 'Cilebut', '0.27480', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_harap`
--

CREATE TABLE `nilai_harap` (
  `id` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `nilai` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_harap`
--

INSERT INTO `nilai_harap` (`id`, `kategori`, `nilai`) VALUES
(1, 'S1', '0.54070'),
(2, 'S2', '0.27230'),
(3, 'S3', '0.14080'),
(4, 'N', '0.04620');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `np` int(11) NOT NULL,
  `nk` int(11) NOT NULL,
  `na` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `sub_kriteria` varchar(50) NOT NULL,
  `rangking` int(11) NOT NULL,
  `bobot` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `id_kriteria`, `sub_kriteria`, `rangking`, `bobot`) VALUES
(1, 1, '1-3', 1, 0.52),
(2, 1, '4-6', 2, 0.27),
(3, 1, '7-10', 3, 0.15),
(4, 1, '>10', 4, 0.06),
(5, 2, '5.5-7.0', 1, 0.61),
(6, 2, '4.5-5.4 ;7.1-7.9', 2, 0.28),
(7, 2, '<4.5;>7.9', 3, 0.11),
(8, 3, '33-100', 1, 0.52),
(9, 3, '30-32', 2, 0.27),
(10, 3, '27-30', 3, 0.15),
(11, 3, '<27', 4, 0.06),
(12, 4, '<5', 1, 0.52),
(13, 4, '5-15', 2, 0.27),
(14, 4, '16-40', 3, 0.15),
(15, 4, '>40', 4, 0.06),
(16, 5, '<40', 1, 0.52),
(17, 5, '40-100', 2, 0.27),
(18, 5, '101-140', 3, 0.15),
(19, 5, '>140', 4, 0.06),
(20, 6, '<3', 1, 0.52),
(21, 6, '3-8', 2, 0.27),
(22, 6, '9-15', 3, 0.15),
(23, 6, '>15', 4, 0.06),
(24, 7, '85-100', 1, 0.52),
(25, 7, '79-84', 2, 0.27),
(26, 7, '65-78', 3, 0.15),
(27, 7, '<65', 4, 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'Petani', 'Petani', '21232f297a57a5a743894a0e4a801fc3', 2),
(4, 'Penyuluh', 'Penyuluh', '21232f297a57a5a743894a0e4a801fc3', 3),
(9, 'indra update', 'ndra2404@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lahan_harap`
--
ALTER TABLE `lahan_harap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lahan_transform`
--
ALTER TABLE `lahan_transform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_harap`
--
ALTER TABLE `nilai_harap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
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
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lahan_harap`
--
ALTER TABLE `lahan_harap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lahan_transform`
--
ALTER TABLE `lahan_transform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai_harap`
--
ALTER TABLE `nilai_harap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
