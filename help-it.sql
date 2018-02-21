-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2018 at 12:43 AM
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
(2, 'Food n Beverages'),
(3, 'Creative'),
(5, 'Taswer');

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
('PK-00001', '2018-02-20', 'sudah identifikasi nih\r\nlagi', 'Finished', '100%', 'Mardino Santosa'),
('PK-00002', '2018-02-20', 'werwerwerwer', 'Finished', '100%', 'Mardino Santosa'),
('PK-00003', '2018-02-20', 'werwe', 'On Progress', '25%', 'Mardino Santosa'),
('PK-00007', '2018-02-20', 'ertert', 'Finished', '100%', 'Mardino Santosa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` varchar(50) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `title`, `description`, `color`, `start`, `end`, `allDay`) VALUES
(24, 'Off', '', '#2f9550', '2018-01-28 00:00:00', '2018-01-28 00:00:00', 'true'),
(25, 'PH/Cuti', '', '#dd4b39', '2018-02-05 00:00:00', '2018-02-05 00:00:00', 'true'),
(26, 'PH/Cuti', '', '#dd4b39', '2018-02-07 00:00:00', '2018-02-07 00:00:00', 'true'),
(27, 'PH/Cuti', '', '#dd4b39', '2018-02-21 00:00:00', '2018-02-21 00:00:00', 'true'),
(28, 'Off', '', '#2f9550', '2018-01-29 00:00:00', '2018-01-29 00:00:00', 'true'),
(29, 'Off', '', '#2f9550', '2018-01-30 00:00:00', '2018-01-30 00:00:00', 'true'),
(30, 'Off', '', '#2f9550', '2018-01-31 00:00:00', '2018-01-31 00:00:00', 'true'),
(31, 'PH/Cuti', '', '#dd4b39', '2018-02-04 00:00:00', '2018-02-04 00:00:00', 'true'),
(32, 'Off', '', '#2f9550', '2018-02-06 00:00:00', '2018-02-06 00:00:00', 'true'),
(33, 'PH/Cuti', '', '#dd4b39', '2018-02-12 00:00:00', '2018-02-12 00:00:00', 'true'),
(34, 'PH/Cuti', '', '#dd4b39', '2018-03-02 00:00:00', '2018-03-02 00:00:00', 'true'),
(35, 'PH/Cuti', '', '#dd4b39', '2018-02-09 00:00:00', '2018-02-09 00:00:00', 'true');

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
('PK-00001', 'Mardino Santosa', 'IT', 'Buat data baruu', 'Finished', '2018-02-20'),
('PK-00002', 'Mardino Santosa', 'IT', 'erter werwerwe', 'Finished', '2018-02-20'),
('PK-00003', 'Mardino Santosa', 'Food n Beverages', 'err', 'On Progress', '2018-02-20'),
('PK-00005', 'Mardino Santosa', 'IT', 'rtyrty', 'Waiting', '2018-02-20'),
('PK-00007', 'Mardino Santosa', 'Food n Beverages', 'ert', 'Finished', '2018-02-20');

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
('PK-00001', '2018-02-20', 'sudah selesai', 'Finished', 'Mardino Santosa'),
('PK-00002', '2018-02-20', 'qweqwe', 'Finished', 'Mardino Santosa'),
('PK-00007', '2018-02-20', 'selesaiii', 'Finished', 'Mardino Santosa');

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
(1, 'dino', 'a8f5f167f44f4964e6c998dee827110c', 'Mardino Santosass', '1', './avatar/avatar31.png'),
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
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_departemen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
