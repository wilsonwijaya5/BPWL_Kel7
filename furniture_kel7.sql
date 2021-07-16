-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2021 pada 10.08
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_kel7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
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
-- Struktur dari tabel `furniture`
--

CREATE TABLE `furniture` (
  `kode_furniture` varchar(6) NOT NULL,
  `nama_furniture` varchar(30) NOT NULL,
  `jenis_furniture` varchar(20) NOT NULL,
  `bahan_furniture` varchar(20) NOT NULL,
  `stok_furniture` varchar(5) NOT NULL,
  `harga_furniture` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `akses` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_beli` varchar(6) NOT NULL,
  `kode_furniture` varchar(6) NOT NULL,
  `kode_customer` varchar(6) NOT NULL,
  `tgl_beli` varchar(20) NOT NULL,
  `jml_beli` varchar(5) NOT NULL,
  `harga_beli` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `pembelian`
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
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_jual` varchar(6) NOT NULL,
  `kode_furniture` varchar(6) NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `tgl_jual` varchar(20) NOT NULL,
  `jml_jual` varchar(5) NOT NULL,
  `harga_jual` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `penjualan`
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
-- Struktur dari tabel `supplier`
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
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indeks untuk tabel `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`kode_furniture`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_beli`),
  ADD KEY `FK_kode_customer` (`kode_customer`),
  ADD KEY `FK_kode_furniture` (`kode_furniture`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_jual`),
  ADD KEY `FK_kode_furniture2` (`kode_furniture`),
  ADD KEY `FK_kode_supplier` (`kode_supplier`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_kode_customer` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`),
  ADD CONSTRAINT `FK_kode_furniture` FOREIGN KEY (`kode_furniture`) REFERENCES `furniture` (`kode_furniture`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_kode_furniture2` FOREIGN KEY (`kode_furniture`) REFERENCES `furniture` (`kode_furniture`),
  ADD CONSTRAINT `FK_kode_supplier` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
