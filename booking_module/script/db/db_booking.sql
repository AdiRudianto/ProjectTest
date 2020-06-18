-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 06:52 PM
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
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` char(7) NOT NULL,
  `nm_barang` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`) VALUES
('B000001', 'Barang1'),
('B000002', 'barang2'),
('B000003', 'barang3'),
('B000004', 'Barang4');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `start_day` int(11) DEFAULT NULL,
  `end_day` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `canceled` int(1) DEFAULT NULL,
  `kd_team` varchar(30) NOT NULL,
  `nm_leader` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `phone`, `item`, `start_day`, `end_day`, `start_time`, `end_time`, `canceled`, `kd_team`, `nm_leader`) VALUES
(2, 'Adi Rudianto', '087870301222', 'BookingOrder', 1592431200, 1592604000, 0, 84600, 1, 'TM00001', 'Orang1'),
(3, 'Adi Rudianto', '087870301222', 'WorkOrder', 1593122400, 1593208800, 0, 84600, 0, 'TM00002', 'Orang2'),
(5, 'Adi Rudianto', '087870301222', 'BookingOrder', 1593554400, 1596146400, 0, 84600, 0, 'TM00003', 'Orang3'),
(6, 'Adi Rudianto', '087870301222', 'WorkOrder', 1596232800, 1596751200, 0, 84600, 0, 'TM00002', 'Orang2'),
(7, 'Adi Rudianto', '087870301222', 'BookingOrder', 1592431200, 1592431200, 0, 19800, 0, 'TM00001', 'Orang1'),
(8, 'Adi Rudianto', '087870301222', 'WorkOrder', 1592431200, 1592431200, 21600, 73800, 0, 'TM00002', 'Orang2');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `kd_employees` varchar(7) NOT NULL,
  `nm_employees` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`kd_employees`, `nm_employees`) VALUES
('E000001', 'Orang1'),
('E000002', 'Orang2'),
('E000003', 'Orang3'),
('E000004', 'Orang4');

-- --------------------------------------------------------

--
-- Table structure for table `list_employees`
--

CREATE TABLE `list_employees` (
  `kd_team` varchar(7) NOT NULL,
  `nm_employees` varchar(30) NOT NULL,
  `kd_employees` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_employees`
--

INSERT INTO `list_employees` (`kd_team`, `nm_employees`, `kd_employees`) VALUES
('TM00001', 'Orang2', 'E000002'),
('TM00001', 'Orang3', 'E000003'),
('TM00002', 'Orang1', 'E000001'),
('TM00002', 'Orang3', 'E000003'),
('TM00003', 'Orang4', 'E000004');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `kd_team` varchar(7) NOT NULL,
  `nm_team` varchar(30) NOT NULL,
  `nm_leader` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`kd_team`, `nm_team`, `nm_leader`) VALUES
('TM00001', 'TEAM1', 'Orang1'),
('TM00002', 'TEAM2', 'Orang2'),
('TM00003', 'TEAM3', 'Orang3');

-- --------------------------------------------------------

--
-- Table structure for table `temp_employees`
--

CREATE TABLE `temp_employees` (
  `kd_employees` varchar(7) NOT NULL,
  `nm_employees` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_product`
--

CREATE TABLE `temp_product` (
  `kd_barang` varchar(7) NOT NULL,
  `nm_barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tproduct`
--

CREATE TABLE `tproduct` (
  `kd_team` varchar(7) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `kd_barang` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tproduct`
--

INSERT INTO `tproduct` (`kd_team`, `nm_barang`, `kd_barang`) VALUES
('TM00001', 'barang2', 'B000002'),
('TM00001', 'barang3', 'B000003'),
('TM00002', 'barang3', 'B000003'),
('TM00002', 'Barang4', 'B000004'),
('TM00003', 'Barang4', 'B000004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD UNIQUE KEY `kd_buku` (`kd_barang`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`kd_employees`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`kd_team`);

--
-- Indexes for table `temp_employees`
--
ALTER TABLE `temp_employees`
  ADD PRIMARY KEY (`kd_employees`);

--
-- Indexes for table `temp_product`
--
ALTER TABLE `temp_product`
  ADD PRIMARY KEY (`kd_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
