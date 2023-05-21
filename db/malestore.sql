-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< Updated upstream
-- Generation Time: May 16, 2023 at 06:09 PM
=======
-- Generation Time: May 21, 2023 at 02:10 PM
>>>>>>> Stashed changes
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

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `job_desc`) VALUES
(1, 'Penjaga', 'Jaga Toko'),
(2, 'Bendahara', 'Manajemen keuangan bulanan'),
(3, 'Sortir Barang', 'Filter barang gudang'),
(4, 'Sekretaris', 'Mengelola, mengatur shift kerja dan management bahan dari supplier'),
(5, 'Desainer', 'Marketing design');

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

--
-- Dumping data for table `tb_banding_alternatif`
--

INSERT INTO `tb_banding_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(1, 1, 2, 1, 5),
(2, 1, 3, 1, 0.333333),
(3, 1, 4, 1, 0.2),
(4, 1, 5, 1, 0.333333),
(5, 2, 3, 1, 0.333333),
(6, 2, 4, 1, 0.142857),
(7, 2, 5, 1, 0.333333),
(8, 3, 4, 1, 0.333333),
(9, 3, 5, 1, 2),
(10, 4, 5, 1, 3),
(11, 1, 2, 2, 2),
(12, 1, 3, 2, 0.333333),
(13, 1, 4, 2, 4),
(14, 1, 5, 2, 0.333333),
(15, 2, 3, 2, 0.333333),
(16, 2, 4, 2, 2),
(17, 2, 5, 2, 0.333333),
(18, 3, 4, 2, 4),
(19, 3, 5, 2, 0.5),
(20, 4, 5, 2, 0.25),
(21, 1, 2, 3, 0.2),
(22, 1, 3, 3, 3),
(23, 1, 4, 3, 0.25),
(24, 1, 5, 3, 3),
(25, 2, 3, 3, 4),
(26, 2, 4, 3, 0.333333),
(27, 2, 5, 3, 5),
(28, 3, 4, 3, 0.2),
(29, 3, 5, 3, 2),
(30, 4, 5, 3, 9);

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

--
-- Dumping data for table `tb_banding_kriteria`
--

INSERT INTO `tb_banding_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(1, 1, 2, 5),
(2, 1, 3, 3),
(3, 2, 3, 0.333333),
(4, 1, 7, 0.333333),
(5, 2, 7, 0.166667),
(6, 3, 7, 0.5),
(7, 1, 8, 1),
(8, 2, 8, 1),
(9, 3, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `jabatan`) VALUES
(1, 'Ardi', 'Bendahara'),
(2, 'Faridz', 'Sortir Barang'),
(3, 'Fadhel', 'Penjaga'),
(4, 'Mirza', 'Desainer'),
(5, 'Referi', 'Sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_deskripsi` varchar(500) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kriteria_id`, `kriteria_deskripsi`, `kriteria_nama`) VALUES
(1, 'Penilaian seorang karyawan dalam melakukan peran tugas yang telah diberikan berdasarkan keputusan bersama', 'Kualitas Kerja'),
(2, 'Ketaatan seorang karyawan terhadap tata tertib dan peraturan yang telah dicantumkan', 'Kedisiplinan'),
(3, 'Menghindari unsur kecurangan dalam pengerjaan tugas masing-masing', 'Kejujuran');

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

--
-- Dumping data for table `tb_pv_alternatif`
--

INSERT INTO `tb_pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 0.111833),
(2, 2, 1, 0.0509262),
(3, 3, 1, 0.212644),
(4, 4, 1, 0.461307),
(5, 5, 1, 0.16329),
(6, 1, 2, 0.165852),
<<<<<<< Updated upstream
(7, 2, 2, 0.10523),
(8, 3, 2, 0.286354),
(9, 4, 2, 0.0637669),
(10, 5, 2, 0.378797),
(11, 1, 3, 0.12819),
=======
(7, 1, 3, 0.12819),
(8, 2, 2, 0.10523),
(9, 3, 2, 0.286354),
(10, 4, 2, 0.0637669),
(11, 5, 2, 0.378797),
>>>>>>> Stashed changes
(12, 2, 3, 0.281211),
(13, 3, 3, 0.0729319),
(14, 4, 3, 0.473678),
(15, 5, 3, 0.0439898);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pv_kriteria`
--

CREATE TABLE `tb_pv_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pv_kriteria`
--

INSERT INTO `tb_pv_kriteria` (`id`, `id_kriteria`, `nilai`) VALUES
(1, 1, 0.633346),
(2, 2, 0.106156),
(3, 3, 0.260498),
(4, 7, 0.45196),
(5, 8, 0.246429);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_users`, `nama`, `tipe`, `username`, `password`) VALUES
(1, 'Aldy', 'admin', 'admin', '$2y$10$N5F7dHLO27qCJ1.TPHrpCOpCZ4PXe2MBzroVNfB0gRWQKa2boDONS'),
(2, 'Karyawan', 'karyawan', 'Pee', '$2y$10$TfLlTpsWRq.Wcp9DxdN8EeD32BRD.PQBG0vFmLhtM2I2HQsWcJrJO'),
(3, 'Lana', 'admin', 'Lana', '$2y$10$aQuGt6XCK8svU6TvglgAp.xnaSgwmrIvEmxGdaRi3AhNc/DEJ7eka');

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
  MODIFY `id_jabatan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
