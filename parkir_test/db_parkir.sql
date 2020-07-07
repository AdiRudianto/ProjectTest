-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 09:04 AM
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
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `no_polisi` varchar(10) NOT NULL,
  `jenis_kendaraan` varchar(5) NOT NULL,
  `nm_konsumen` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`no_polisi`, `jenis_kendaraan`, `nm_konsumen`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`) VALUES
('ASD1234', 'motor', 'test123', '2020-07-01', 'P', '081234567812'),
('B1208123', 'motor', '1123', '2020-05-04', 'P', '081234567812'),
('B1208UII', 'motor', '123131', '2020-07-01', 'L', '123123131');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(8) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `time_masuk` time NOT NULL,
  `time_keluar` time NOT NULL,
  `biaya` int(30) NOT NULL,
  `no_polisi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `tgl_transaksi`, `time_masuk`, `time_keluar`, `biaya`, `no_polisi`) VALUES
(1, '2020-07-01', '08:00:00', '19:00:00', 20000, 'B1208UII'),
(2, '2020-07-01', '00:00:00', '00:00:00', 20000, 'ASD1234'),
(3, '2020-07-01', '14:00:00', '00:00:00', 20000, 'ASD1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`no_polisi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
