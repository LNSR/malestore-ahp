-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 05:16 PM
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
(5, 1, 6, 1, 3),
(6, 1, 7, 1, 0.333333),
(7, 1, 8, 1, 2),
(8, 2, 3, 1, 0.5),
(9, 2, 4, 1, 0.25),
(10, 2, 5, 1, 2),
(11, 2, 6, 1, 0.5),
(12, 2, 7, 1, 0.5),
(13, 2, 8, 1, 0.333333),
(14, 3, 4, 1, 0.5),
(15, 3, 5, 1, 2),
(16, 3, 6, 1, 0.333333),
(17, 3, 7, 1, 0.333333),
(18, 3, 8, 1, 0.333333),
(19, 4, 5, 1, 3),
(20, 4, 6, 1, 0.5),
(21, 4, 7, 1, 0.333333),
(22, 4, 8, 1, 0.5),
(23, 5, 6, 1, 2),
(24, 5, 7, 1, 0.333333),
(25, 5, 8, 1, 0.5),
(26, 6, 7, 1, 0.5),
(27, 6, 8, 1, 0.5),
(28, 7, 8, 1, 0.333333),
(29, 1, 2, 2, 0.2),
(30, 1, 3, 2, 0.333333),
(31, 1, 4, 2, 0.5),
(32, 1, 5, 2, 0.5),
(33, 1, 6, 2, 3),
(34, 1, 7, 2, 2),
(35, 1, 8, 2, 3),
(36, 2, 3, 2, 0.333333),
(37, 2, 4, 2, 0.5),
(38, 2, 5, 2, 0.25),
(39, 2, 6, 2, 4),
(40, 2, 7, 2, 3),
(41, 2, 8, 2, 5),
(42, 3, 4, 2, 0.25),
(43, 3, 5, 2, 2),
(44, 3, 6, 2, 4),
(45, 3, 7, 2, 2),
(46, 3, 8, 2, 3),
(47, 4, 5, 2, 0.5),
(48, 4, 6, 2, 4),
(49, 4, 7, 2, 3),
(50, 4, 8, 2, 0.333333),
(51, 5, 6, 2, 0.5),
(52, 5, 7, 2, 4),
(53, 5, 8, 2, 3),
(54, 6, 7, 2, 2),
(55, 6, 8, 2, 0.2),
(56, 7, 8, 2, 3),
(57, 1, 2, 3, 2),
(58, 1, 3, 3, 0.5),
(59, 1, 4, 3, 0.333333),
(60, 1, 5, 3, 0.333333),
(61, 1, 6, 3, 5),
(62, 1, 7, 3, 4),
(63, 1, 8, 3, 0.333333),
(64, 2, 3, 3, 2),
(65, 2, 4, 3, 0.333333),
(66, 2, 5, 3, 2),
(67, 2, 6, 3, 0.333333),
(68, 2, 7, 3, 0.333333),
(69, 2, 8, 3, 5),
(70, 3, 4, 3, 3),
(71, 3, 5, 3, 2),
(72, 3, 6, 3, 5),
(73, 3, 7, 3, 0.333333),
(74, 3, 8, 3, 0.333333),
(75, 4, 5, 3, 4),
(76, 4, 6, 3, 4),
(77, 4, 7, 3, 0.333333),
(78, 4, 8, 3, 0.333333),
(79, 5, 6, 3, 3),
(80, 5, 7, 3, 0.5),
(81, 5, 8, 3, 3),
(82, 6, 7, 3, 0.333333),
(83, 6, 8, 3, 3),
(84, 7, 8, 3, 0.333333),
(85, 1, 2, 4, 0.333333),
(86, 1, 3, 4, 0.25),
(87, 1, 4, 4, 0.25),
(88, 1, 5, 4, 0.25),
(89, 1, 6, 4, 0.333333),
(90, 1, 7, 4, 0.25),
(91, 1, 8, 4, 2),
(92, 2, 3, 4, 2),
(93, 2, 4, 4, 0.2),
(94, 2, 5, 4, 3),
(95, 2, 6, 4, 3),
(96, 2, 7, 4, 3),
(97, 2, 8, 4, 0.25),
(98, 3, 4, 4, 2),
(99, 3, 5, 4, 0.333333),
(100, 3, 6, 4, 0.25),
(101, 3, 7, 4, 0.25),
(102, 3, 8, 4, 0.333333),
(103, 4, 5, 4, 4),
(104, 4, 6, 4, 3),
(105, 4, 7, 4, 4),
(106, 4, 8, 4, 0.333333),
(107, 5, 6, 4, 4),
(108, 5, 7, 4, 0.5),
(109, 5, 8, 4, 3),
(110, 6, 7, 4, 0.5),
(111, 6, 8, 4, 0.5),
(112, 7, 8, 4, 4),
(113, 1, 2, 5, 0.5),
(114, 1, 3, 5, 0.333333),
(115, 1, 4, 5, 0.333333),
(116, 1, 5, 5, 4),
(117, 1, 6, 5, 2),
(118, 1, 7, 5, 4),
(119, 1, 8, 5, 0.333333),
(120, 2, 3, 5, 3),
(121, 2, 4, 5, 0.333333),
(122, 2, 5, 5, 3),
(123, 2, 6, 5, 0.333333),
(124, 2, 7, 5, 0.333333),
(125, 2, 8, 5, 3),
(126, 3, 4, 5, 0.333333),
(127, 3, 5, 5, 0.5),
(128, 3, 6, 5, 3),
(129, 3, 7, 5, 1),
(130, 3, 8, 5, 4),
(131, 4, 5, 5, 3),
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
(6, 6, 1, 0.103689),
(7, 7, 1, 0.202239),
(8, 8, 1, 0.198222),
(9, 1, 2, 0.0856742),
(10, 1, 3, 0.124548),
(11, 1, 4, 0.0454667),
(12, 1, 5, 0.102501),
(13, 2, 2, 0.151882),
(14, 3, 2, 0.175814),
(15, 4, 2, 0.181088),
(16, 5, 2, 0.17392),
(17, 6, 2, 0.0721253),
(18, 7, 2, 0.0570047),
(19, 8, 2, 0.102492),
(20, 2, 3, 0.11563),
(21, 3, 3, 0.126531),
(22, 4, 3, 0.144622),
(23, 5, 3, 0.10463),
(24, 6, 3, 0.0771153),
(25, 7, 3, 0.153984),
(26, 8, 3, 0.152941),
(27, 2, 4, 0.142883),
(28, 3, 4, 0.0805169),
(29, 4, 4, 0.218549),
(30, 5, 4, 0.132752),
(31, 6, 4, 0.076073),
(32, 7, 4, 0.152304),
(33, 8, 4, 0.151455),
(34, 2, 5, 0.13254),
(35, 3, 5, 0.125978),
(36, 4, 5, 0.191117),
(37, 5, 5, 0.114868),
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
(1, 'Aldy', 'admin', 'admin', '$2y$10$GHM00NiHCUQc5lu7dJ8MgOAEXfp3wy4FLdIYJuDQYZxQepeY9IA.i', ''),
(2, 'Karyawan', 'karyawan', 'Pee', '$2y$10$TfLlTpsWRq.Wcp9DxdN8EeD32BRD.PQBG0vFmLhtM2I2HQsWcJrJO', ''),
(3, 'Lana', 'admin', 'Lana', '$2y$10$aBxBXtGTcYJeN71qfY0REeeB6RCI/6vYimUaA0STN36ITIuRcvJD6', 'EDIT.jpg');

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
  ADD PRIMARY KEY (`id_jabatan`),
  ADD UNIQUE KEY `nama_jabatan` (`nama_jabatan`);

--
-- Indexes for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembanding(kriteria)` (`pembanding`),
  ADD KEY `banding_karyawan1` (`alternatif1`),
  ADD KEY `banding_karyawan2` (`alternatif2`);

--
-- Indexes for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banding_kriteria1` (`kriteria1`),
  ADD KEY `banding_kriteria2` (`kriteria2`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pv_kriteria` (`id_kriteria`),
  ADD KEY `pv_karyawan` (`id_alternatif`);

--
-- Indexes for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pv_kriteria` (`id_kriteria`);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  ADD CONSTRAINT `banding_karyawan1` FOREIGN KEY (`alternatif1`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banding_karyawan2` FOREIGN KEY (`alternatif2`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembanding(kriteria)` FOREIGN KEY (`pembanding`) REFERENCES `tb_kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  ADD CONSTRAINT `banding_kriteria1` FOREIGN KEY (`kriteria1`) REFERENCES `tb_kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banding_kriteria2` FOREIGN KEY (`kriteria2`) REFERENCES `tb_kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `jabatan` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`nama_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  ADD CONSTRAINT `pv_karyawan` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pv_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  ADD CONSTRAINT `tb_pv_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
