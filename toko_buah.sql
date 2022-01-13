-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 03:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buah`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `distributor_id` int(10) NOT NULL,
  `distributor_date` date DEFAULT NULL,
  `distributor_name` varchar(100) NOT NULL,
  `distributor_company` varchar(100) NOT NULL,
  `distributor_konsumenid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`distributor_id`, `distributor_date`, `distributor_name`, `distributor_company`, `distributor_konsumenid`) VALUES
(1, '2022-01-13', 'Joe', 'PT Asia TBK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_toko`
--

CREATE TABLE `karyawan_toko` (
  `id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan_toko`
--

INSERT INTO `karyawan_toko` (`id`, `nama`, `email`, `username`, `pass`) VALUES
(1, 'bintang', 'bintang@gmail.com', 'bintang', 'bintang'),
(2, 'dani', 'dani@gmail.com', 'dani', 'danianjay');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `konsumen_id` int(10) NOT NULL,
  `konsumen_email` varchar(20) NOT NULL,
  `konsumen_alamat` varchar(100) NOT NULL,
  `konsumen_kodepos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`konsumen_id`, `konsumen_email`, `konsumen_alamat`, `konsumen_kodepos`) VALUES
(1, 'bintang@gmail.com', 'jalan jalan aja', 21131);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_exp` date DEFAULT NULL,
  `id_distributor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_exp`, `id_distributor`) VALUES
(1, 'Naga', '2022-01-27', 1),
(2, 'Pisang', '2022-01-27', 2),
(3, 'Nanas Muda', '2022-01-23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_deployment`
--

CREATE TABLE `product_deployment` (
  `deployment_id` int(10) NOT NULL,
  `deployment_provinsi` varchar(20) NOT NULL,
  `deployment_negara` varchar(100) NOT NULL,
  `deployment_kodepos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
