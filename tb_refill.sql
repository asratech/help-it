-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2018 at 03:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_refill`
--

CREATE TABLE `tb_refill` (
  `id_refill` int(3) NOT NULL,
  `printer` varchar(50) NOT NULL,
  `departemen` varchar(25) NOT NULL,
  `refill_terakhir` date DEFAULT NULL,
  `oleh` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refill`
--

INSERT INTO `tb_refill` (`id_refill`, `printer`, `departemen`, `refill_terakhir`, `oleh`) VALUES
(2, 'Epson L360', 'Edutainment', '2018-02-26', 'Mardino Santosa'),
(4, 'Canon IP1980', 'Food n Beverages', '2018-01-16', 'Mardino Santosa'),
(6, 'Canon IP1980', 'Production Facilities', '2018-02-16', 'Mardino Santosa'),
(7, 'Epson L220', 'Creative', '2018-02-19', 'Mardino Santosa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_refill`
--
ALTER TABLE `tb_refill`
  ADD PRIMARY KEY (`id_refill`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_refill`
--
ALTER TABLE `tb_refill`
  MODIFY `id_refill` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
