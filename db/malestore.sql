-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 07:42 AM
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
(1, 1, 2, 1, 2),
(2, 1, 3, 1, 3),
(3, 1, 4, 1, 2),
(4, 1, 5, 1, 2),
(5, 2, 3, 1, 0.5),
(6, 2, 4, 1, 0.25),
(7, 2, 5, 1, 2),
(8, 3, 4, 1, 0.5),
(9, 3, 5, 1, 2),
(10, 4, 5, 1, 3),
(11, 1, 2, 2, 0.2),
(12, 1, 3, 2, 0.333333),
(13, 1, 4, 2, 0.5),
(14, 1, 5, 2, 0.5),
(15, 2, 3, 2, 0.333333),
(16, 2, 4, 2, 0.5),
(17, 2, 5, 2, 0.25),
(18, 3, 4, 2, 0.25),
(19, 3, 5, 2, 2),
(20, 4, 5, 2, 0.5),
(21, 1, 2, 3, 2),
(22, 1, 3, 3, 0.5),
(23, 1, 4, 3, 0.333333),
(24, 1, 5, 3, 0.333333),
(25, 2, 3, 3, 2),
(26, 2, 4, 3, 0.333333),
(27, 2, 5, 3, 2),
(28, 3, 4, 3, 3),
(29, 3, 5, 3, 2),
(30, 4, 5, 3, 4),
(31, 1, 2, 4, 0.333333),
(32, 1, 3, 4, 0.25),
(33, 1, 4, 4, 0.25),
(34, 1, 5, 4, 0.25),
(35, 2, 3, 4, 2),
(36, 2, 4, 4, 0.2),
(37, 2, 5, 4, 3),
(38, 3, 4, 4, 2),
(39, 3, 5, 4, 0.333333),
(40, 4, 5, 4, 4),
(41, 1, 2, 5, 0.5),
(42, 1, 3, 5, 0.333333),
(43, 1, 4, 5, 0.333333),
(44, 1, 5, 5, 4),
(45, 2, 3, 5, 3),
(46, 2, 4, 5, 0.333333),
(47, 2, 5, 5, 3),
(48, 3, 4, 5, 0.333333),
(49, 3, 5, 5, 0.5),
(50, 4, 5, 5, 3),
(51, 1, 6, 1, 3),
(52, 1, 7, 1, 0.333333),
(53, 1, 8, 1, 2),
(54, 2, 6, 1, 0.5),
(55, 2, 7, 1, 0.5),
(56, 2, 8, 1, 0.333333),
(57, 3, 6, 1, 0.333333),
(58, 3, 7, 1, 0.333333),
(59, 3, 8, 1, 0.333333),
(60, 4, 6, 1, 0.5),
(61, 4, 7, 1, 0.333333),
(62, 4, 8, 1, 0.5),
(63, 5, 6, 1, 2),
(64, 5, 7, 1, 0.333333),
(65, 5, 8, 1, 0.5),
(66, 6, 7, 1, 0.5),
(67, 6, 8, 1, 0.5),
(68, 7, 8, 1, 0.333333),
(69, 1, 6, 2, 3),
(70, 1, 7, 2, 2),
(71, 1, 8, 2, 3),
(72, 2, 6, 2, 4),
(73, 2, 7, 2, 3),
(74, 2, 8, 2, 5),
(75, 3, 6, 2, 4),
(76, 3, 7, 2, 2),
(77, 3, 8, 2, 3),
(78, 4, 6, 2, 4),
(79, 4, 7, 2, 3),
(80, 4, 8, 2, 0.333333),
(81, 5, 6, 2, 0.5),
(82, 5, 7, 2, 4),
(83, 5, 8, 2, 3),
(84, 6, 7, 2, 2),
(85, 6, 8, 2, 0.2),
(86, 7, 8, 2, 3),
(87, 1, 6, 3, 5),
(88, 1, 7, 3, 4),
(89, 1, 8, 3, 0.333333),
(90, 2, 6, 3, 0.333333),
(91, 2, 7, 3, 0.333333),
(92, 2, 8, 3, 5),
(93, 3, 6, 3, 5),
(94, 3, 7, 3, 0.333333),
(95, 3, 8, 3, 0.333333),
(96, 4, 6, 3, 4),
(97, 4, 7, 3, 0.333333),
(98, 4, 8, 3, 0.333333),
(99, 5, 6, 3, 3),
(100, 5, 7, 3, 0.5),
(101, 5, 8, 3, 3),
(102, 6, 7, 3, 0.333333),
(103, 6, 8, 3, 3),
(104, 7, 8, 3, 0.333333),
(105, 1, 6, 4, 0.333333),
(106, 1, 7, 4, 0.25),
(107, 1, 8, 4, 2),
(108, 2, 6, 4, 3),
(109, 2, 7, 4, 3),
(110, 2, 8, 4, 0.25),
(111, 3, 6, 4, 0.25),
(112, 3, 7, 4, 0.25),
(113, 3, 8, 4, 0.333333),
(114, 4, 6, 4, 3),
(115, 4, 7, 4, 4),
(116, 4, 8, 4, 0.333333),
(117, 5, 6, 4, 4),
(118, 5, 7, 4, 0.5),
(119, 5, 8, 4, 3),
(120, 6, 7, 4, 0.5),
(121, 6, 8, 4, 0.5),
(122, 7, 8, 4, 4),
(123, 1, 6, 5, 2),
(124, 1, 7, 5, 4),
(125, 1, 8, 5, 0.333333),
(126, 2, 6, 5, 0.333333),
(127, 2, 7, 5, 0.333333),
(128, 2, 8, 5, 3),
(129, 3, 6, 5, 3),
(130, 3, 7, 5, 1),
(131, 3, 8, 5, 4),
(132, 4, 6, 5, 4),
(133, 4, 7, 5, 0.333333),
(134, 4, 8, 5, 2),
(135, 5, 6, 5, 6),
(136, 5, 7, 5, 4),
(137, 5, 8, 5, 0.25),
(138, 6, 7, 5, 3),
(139, 6, 8, 5, 0.5),
(140, 7, 8, 5, 0.25);

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
(5, 'Referi', 'Sekretaris'),
(6, 'Rudi', 'Marketing'),
(7, 'Adam', 'Sortir Barang'),
(8, 'Gilang', 'Desainer');

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
(1, 1, 1, 0.181146),
(2, 2, 1, 0.0627645),
(3, 3, 1, 0.0688133),
(4, 4, 1, 0.114232),
(5, 5, 1, 0.0688944),
(6, 1, 2, 0.0856742),
(7, 1, 3, 0.124548),
(8, 1, 4, 0.0454667),
(9, 1, 5, 0.102501),
(10, 2, 2, 0.151882),
(11, 3, 2, 0.175814),
(12, 4, 2, 0.181088),
(13, 5, 2, 0.17392),
(14, 2, 3, 0.11563),
(15, 3, 3, 0.126531),
(16, 4, 3, 0.144622),
(17, 5, 3, 0.10463),
(18, 2, 4, 0.142883),
(19, 3, 4, 0.0805169),
(20, 4, 4, 0.218549),
(21, 5, 4, 0.132752),
(22, 2, 5, 0.13254),
(23, 3, 5, 0.125978),
(24, 4, 5, 0.191117),
(25, 5, 5, 0.114868),
(26, 6, 1, 0.103689),
(27, 7, 1, 0.202239),
(28, 8, 1, 0.198222),
(29, 6, 2, 0.0721253),
(30, 7, 2, 0.0570047),
(31, 8, 2, 0.102492),
(32, 6, 3, 0.0771153),
(33, 7, 3, 0.153984),
(34, 8, 3, 0.152941),
(35, 6, 4, 0.076073),
(36, 7, 4, 0.152304),
(37, 8, 4, 0.151455),
(38, 6, 5, 0.0811166),
(39, 7, 5, 0.122135),
(40, 8, 5, 0.129744);

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
  `password` varchar(300) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_users`, `nama`, `tipe`, `username`, `password`, `foto`) VALUES
(1, 'Aldy', 'admin', 'admin', '$2y$10$N5F7dHLO27qCJ1.TPHrpCOpCZ4PXe2MBzroVNfB0gRWQKa2boDONS', 'avatar5.jpg'),
(2, 'Karyawan', 'karyawan', 'Pee', '$2y$10$TfLlTpsWRq.Wcp9DxdN8EeD32BRD.PQBG0vFmLhtM2I2HQsWcJrJO', ''),
(3, 'Lana', 'admin', 'Lana', '$2y$10$aQuGt6XCK8svU6TvglgAp.xnaSgwmrIvEmxGdaRi3AhNc/DEJ7eka', 'EDIT.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
