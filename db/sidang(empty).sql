-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 12:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(30) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `job_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_banding_alternatif`
--

CREATE TABLE `tb_banding_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) DEFAULT NULL,
  `alternatif2` int(11) DEFAULT NULL,
  `pembanding` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_banding_kriteria`
--

CREATE TABLE `tb_banding_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) DEFAULT NULL,
  `kriteria2` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_deskripsi` varchar(500) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pv_alternatif`
--

CREATE TABLE `tb_pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pv_kriteria`
--

CREATE TABLE `tb_pv_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_users`, `nama`, `tipe`, `username`, `password`, `foto`) VALUES
(1, 'Aldy', 'admin', 'admin', '$2y$10$N5F7dHLO27qCJ1.TPHrpCOpCZ4PXe2MBzroVNfB0gRWQKa2boDONS', ''),
(2, 'Fadhel', 'karyawan', 'Pee', '$2y$10$TfLlTpsWRq.Wcp9DxdN8EeD32BRD.PQBG0vFmLhtM2I2HQsWcJrJO', ''),
(3, 'Lana', 'admin', 'lana', '$2y$10$6bdDZrk2eU9b0AY8/lnfr.Ir9vh7ngFfAshE2gzyrDNeayGVX8Lka', 'EDIT.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
