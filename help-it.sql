-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2018 at 10:06 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `help-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1ad722b4152dac95b25ef0391367ba36', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', 1428339021, ''),
('6b6478c492b0fe2e504f291750a24d1c', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1428344604, 'a:3:{s:9:\"user_data\";s:0:\"\";s:7:\"id_user\";s:1:\"2\";s:4:\"user\";s:1:\"2\";}'),
('f19d98e1408babe7700aead53737bebf', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', 1428345373, 'a:3:{s:9:\"user_data\";s:0:\"\";s:7:\"id_user\";s:1:\"1\";s:5:\"admin\";s:1:\"1\";}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id_departemen` int(3) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'IT'),
(2, 'Operation'),
(3, 'Engineering'),
(4, 'Production Facilities'),
(5, 'Marketing Commercial'),
(6, 'Sales Corporate'),
(7, 'Sales Edutainment'),
(8, 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identifikasi`
--

CREATE TABLE `tb_identifikasi` (
  `id_identifikasi` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `identifikasi` text NOT NULL,
  `status` enum('On Progress','Finished') NOT NULL,
  `persentase` enum('25%','50%','75%','100%') NOT NULL,
  `oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identifikasi`
--

INSERT INTO `tb_identifikasi` (`id_identifikasi`, `tanggal`, `identifikasi`, `status`, `persentase`, `oleh`) VALUES
('PK-00001', '2018-02-17', 'Oke siapp', 'On Progress', '75%', 'Mardino Santosa'),
('PK-00002', '2018-02-15', 'siap laksanakannn\r\nssss\r\nzzz', 'Finished', '100%', 'Mardino Santosa'),
('PK-00003', '2018-02-14', 'siapp', 'Finished', '75%', 'Fajri'),
('PK-00004', '2018-02-17', 'harusnya ini sudah 25%\r\n50\r\nppp', 'Finished', '100%', 'Mardino Santosa'),
('PK-00005', '2018-02-16', 'power supply ngadat', 'On Progress', '25%', 'Fajri'),
('PK-00007', '2018-02-17', 'sudah saya identifikasi\r\nupdate\r\nlagi', 'Finished', '100%', 'Mardino Santosa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permintaan`
--

CREATE TABLE `tb_permintaan` (
  `id_permintaan` varchar(8) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('Waiting','On Progress','Finished') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permintaan`
--

INSERT INTO `tb_permintaan` (`id_permintaan`, `dari`, `departemen`, `catatan`, `status`, `tanggal`) VALUES
('PK-00001', 'Iwan S', 'Marketing Commercial', 'Sambungkan Printer LAN ke PC', 'On Progress', '2018-02-14'),
('PK-00002', 'Fajri', 'IT', 'Tolong pindahkan ruangan IT ke Basement segera', 'Finished', '0000-00-00'),
('PK-00003', 'Arty', 'Marketing Commercial', 'Tolong pindahkan meja', 'Finished', '2018-02-14'),
('PK-00004', 'Mardino Santosa', 'IT', 'pindah rumah', 'Finished', '2018-02-16'),
('PK-00005', 'Dewi', 'Engineering', 'Komputer mati', 'On Progress', '2018-02-16'),
('PK-00006', 'Mardino Santosa', 'IT', 'coba duylull', 'Waiting', '2018-02-17'),
('PK-00007', 'Joni Iskandars', 'Marketing Commercial', 'tanggal 18 jonis', 'Finished', '2018-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_solusi`
--

CREATE TABLE `tb_solusi` (
  `id_solusi` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `solusi` text NOT NULL,
  `status` enum('Finished') NOT NULL,
  `oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_solusi`
--

INSERT INTO `tb_solusi` (`id_solusi`, `tanggal`, `solusi`, `status`, `oleh`) VALUES
('PK-00002', '2018-02-17', 'selesai 100%', 'Finished', 'Mardino Santosa'),
('PK-00003', '2018-02-15', 'sudah saya pindahkan bosss', 'Finished', 'Mardino Santosa'),
('PK-00004', '2018-02-17', 'sudah diselesaikan, harusnya status 100%', 'Finished', 'Mardino Santosa'),
('PK-00007', '2018-02-18', 'selesai', 'Finished', 'Mardino Santosa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `pass_user` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `pass_user`, `nama_lengkap`, `level`, `avatar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Mardino Santosa', '1', './avatar/user2-160x160.jpg'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2', './avatar/avatar5.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tb_identifikasi`
--
ALTER TABLE `tb_identifikasi`
  ADD PRIMARY KEY (`id_identifikasi`);

--
-- Indexes for table `tb_permintaan`
--
ALTER TABLE `tb_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `tb_solusi`
--
ALTER TABLE `tb_solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  MODIFY `id_departemen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
