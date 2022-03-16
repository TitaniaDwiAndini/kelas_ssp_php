-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 08:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelas_ssp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `kodebrg` varchar(5) NOT NULL,
  `namabrg` varchar(25) NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `gambar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`kodebrg`, `namabrg`, `jumlah`, `harga`, `jenis`, `gambar`) VALUES
('KD001', 'Sandal', 5, 5000000, 'Fashion', 'gambar/sandal.jpg'),
('KD002', 'Kaos', 12, 65000, 'Fashion', 'gambar/kaos.jpg'),
('KD003', 'Pensil 2B', 45, 12000, 'Alat Tulis', 'gambar/pensil.jpg'),
('33', '55', 56, 55, 'Alat Tulis', 'gambar/sandal.jpg'),
('88', '88', 88, 88, 'Alat Tulis', 'gambar/1.jpg'),
('123', 'Penghapus ', 11, 11, 'Alat Tulis', 'gambar/2.jpg'),
('KD006', 'Baju', 34, 455555, 'Fashion', 'gambar/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
