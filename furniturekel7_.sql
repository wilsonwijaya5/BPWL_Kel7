-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 11:47 AM
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
('admin', 'admin', 'admin');

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
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `deletebeli` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
	UPDATE furniture SET stok_furniture = 		stok_furniture - old.jml_beli
    where kode_furniture = old.kode_furniture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertbeli` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
	UPDATE furniture set stok_furniture = 			stok_furniture+new.jml_beli
    where kode_furniture = new.kode_furniture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatebeli` AFTER UPDATE ON `pembelian` FOR EACH ROW BEGIN
	update furniture set stok_furniture = 
    (stok_furniture - old.jml_beli) + 			new.jml_beli WHERE kode_furniture = 		new.kode_furniture;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_jual` varchar(6) NOT NULL,
  `kode_furniture` varchar(6) NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `tgl_jual` varchar(20) NOT NULL,
  `jml_jual` int(5) NOT NULL,
  `harga_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `deletejual` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
	UPDATE furniture SET stok_furniture = 		stok_furniture + old.jml_jual
    where kode_furniture = old.kode_furniture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertjual` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
	UPDATE furniture set stok_furniture = 			stok_furniture-new.jml_jual
    where kode_furniture = new.kode_furniture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatejual` AFTER UPDATE ON `penjualan` FOR EACH ROW BEGIN
	update furniture set stok_furniture = 
    (stok_furniture + old.jml_jual) - 			new.jml_jual WHERE kode_furniture = 		new.kode_furniture;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(6) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telp_supplier` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_jual`),
  ADD KEY `FK_kode_furniture2` (`kode_furniture`),
  ADD KEY `FK_kode_supplier` (`kode_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_kode_customer` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`),
  ADD CONSTRAINT `FK_kode_furniture` FOREIGN KEY (`kode_furniture`) REFERENCES `furniture` (`kode_furniture`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_kode_furniture2` FOREIGN KEY (`kode_furniture`) REFERENCES `furniture` (`kode_furniture`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_kode_supplier` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
