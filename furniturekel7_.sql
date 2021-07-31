-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 01:28 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniturekel7_`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(6) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `kota_customer` varchar(20) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `telp_customer` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama_customer`, `kota_customer`, `alamat_customer`, `telp_customer`) VALUES
('wilson', 'Wilson Wijaya', 'Duri', 'Jl.Hangtuah', '082283552213');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `kode_furniture` varchar(6) NOT NULL,
  `nama_furniture` varchar(30) NOT NULL,
  `jenis_furniture` varchar(20) NOT NULL,
  `bahan_furniture` varchar(20) NOT NULL,
  `stok_furniture` int(5) NOT NULL,
  `harga_furniture` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`kode_furniture`, `nama_furniture`, `jenis_furniture`, `bahan_furniture`, `stok_furniture`, `harga_furniture`) VALUES
('ME-01', 'Meja Belajar', 'Meja', 'Kayu Jati', 4, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `akses` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `akses`) VALUES
('admin', 'admin', 'admin'),
('wilson', 'wilson', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_beli` varchar(6) NOT NULL,
  `kode_furniture` varchar(6) NOT NULL,
  `kode_customer` varchar(6) NOT NULL,
  `tgl_beli` varchar(20) NOT NULL,
  `jml_beli` int(5) NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_beli`, `kode_furniture`, `kode_customer`, `tgl_beli`, `jml_beli`, `harga_beli`) VALUES
('BE-01', 'ME-01', 'wilson', '2021-07-12', 3, 360000);

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `deletebeli` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
	UPDATE furniture SET stok_furniture = 		stok_furniture + old.jml_beli
    where kode_furniture = old.kode_furniture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertbeli` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
	UPDATE furniture set stok_furniture = 			stok_furniture-new.jml_beli
    where kode_furniture = new.kode_furniture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatebeli` AFTER UPDATE ON `pembelian` FOR EACH ROW BEGIN
	update furniture set stok_furniture = 
    (stok_furniture + old.jml_beli) - 			new.jml_beli WHERE kode_furniture = 		new.kode_furniture;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`kode_furniture`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_beli`),
  ADD KEY `FK_kode_customer` (`kode_customer`),
  ADD KEY `FK_kode_furniture` (`kode_furniture`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_kode_customer3` FOREIGN KEY (`kode_customer`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_kode_customer` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`),
  ADD CONSTRAINT `FK_kode_furniture` FOREIGN KEY (`kode_furniture`) REFERENCES `furniture` (`kode_furniture`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
