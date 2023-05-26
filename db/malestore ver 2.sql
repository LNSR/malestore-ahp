-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 10:55 AM
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
(1, 'Marketing', 'Pemasaran produk melalui social media\r\n@malestorebjm'),
(2, 'Bendahara', 'Manajemen keuangan bulanan'),
(3, 'Sortir Barang', 'Filter barang gudang'),
(4, 'Sekretaris', 'Mengelola, mengatur shift kerja dan management bahan dari supplier'),
(5, 'Desainer', 'Kelola desain di perusahaan');

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
(1, 1, 2, 1, 0.2),
(2, 1, 3, 1, 4),
(3, 1, 4, 1, 4),
(4, 1, 5, 1, 5),
(5, 2, 3, 1, 0.142857),
(6, 2, 4, 1, 3),
(7, 2, 5, 1, 0.25),
(8, 3, 4, 1, 6),
(9, 3, 5, 1, 4),
(10, 4, 5, 1, 0.2),
(11, 1, 2, 2, 4),
(12, 1, 3, 2, 0.333333),
(13, 1, 4, 2, 0.5),
(14, 1, 5, 2, 0.5),
(15, 2, 3, 2, 0.333333),
(16, 2, 4, 2, 0.5),
(17, 2, 5, 2, 3),
(18, 3, 4, 2, 0.333333),
(19, 3, 5, 2, 2),
(20, 4, 5, 2, 0.25),
(21, 1, 2, 3, 4),
(22, 1, 3, 3, 0.166667),
(23, 1, 4, 3, 0.166667),
(24, 1, 5, 3, 0.2),
(25, 2, 3, 3, 6),
(26, 2, 4, 3, 5),
(27, 2, 5, 3, 6),
(28, 3, 4, 3, 0.142857),
(29, 3, 5, 3, 0.142857),
(30, 4, 5, 3, 4),
(31, 1, 2, 4, 3),
(32, 1, 3, 4, 0.25),
(33, 1, 4, 4, 0.5),
(34, 1, 5, 4, 0.25),
(35, 2, 3, 4, 0.333333),
(36, 2, 4, 4, 0.2),
(37, 2, 5, 4, 4),
(38, 3, 4, 4, 0.333333),
(39, 3, 5, 4, 4),
(40, 4, 5, 4, 0.5),
(41, 1, 2, 5, 0.333333),
(42, 1, 3, 5, 0.25),
(43, 1, 4, 5, 0.333333),
(44, 1, 5, 5, 4),
(45, 2, 3, 5, 0.25),
(46, 2, 4, 5, 5),
(47, 2, 5, 5, 6),
(48, 3, 4, 5, 2),
(49, 3, 5, 5, 2),
(50, 4, 5, 5, 0.25);

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
(1, 1, 2, 3),
(2, 1, 3, 0.5),
(3, 1, 4, 2),
(4, 1, 5, 2),
(5, 2, 3, 0.333333),
(6, 2, 4, 2),
(7, 2, 5, 0.5),
(8, 3, 4, 2),
(9, 3, 5, 3),
(10, 4, 5, 0.5);

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
(3, 'Fadhel', 'Marketing'),
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
(1, 'Dalam pengerjaan tugas karyawan diharapkan dapat menanggung kewajiban peran sesuai instruksi yang diberikan.', 'Tanggung Jawab'),
(2, 'Ketaatan seorang karyawan terhadap tata tertib dan peraturan yang telah dicantumkan', 'Kedisiplinan'),
(3, 'Efektivitas pegawai dalam mengerjakan tugas', 'Kualitas Kerja'),
(4, 'Indikator karyawan dalam mentaati aturan-aturan sesuai prosedur yang ada.', 'Ketaatan'),
(5, 'Menghindari unsur kecurangan dalam pengerjaan tugas masing-masing', 'Kejujuran');

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
(1, 1, 1, 0.314738),
(2, 2, 1, 0.206714),
(3, 3, 1, 0.294852),
(4, 4, 1, 0.0331316),
(5, 5, 1, 0.150564),
(6, 1, 2, 0.145169),
(7, 1, 3, 0.16572),
(8, 1, 4, 0.106893),
(9, 1, 5, 0.115256),
(10, 2, 2, 0.142997),
(11, 3, 2, 0.239287),
(12, 4, 2, 0.24231),
(13, 5, 2, 0.230237),
(14, 2, 3, 0.353821),
(15, 3, 3, 0.0881009),
(16, 4, 3, 0.240143),
(17, 5, 3, 0.152215),
(18, 2, 4, 0.127971),
(19, 3, 4, 0.259527),
(20, 4, 4, 0.300908),
(21, 5, 4, 0.204701),
(22, 2, 5, 0.280068),
(23, 3, 5, 0.354083),
(24, 4, 5, 0.120341),
(25, 5, 5, 0.130252);

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
(1, 1, 0.248399),
(2, 2, 0.120167),
(3, 3, 0.360624),
(4, 4, 0.107611),
(5, 5, 0.163198);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
