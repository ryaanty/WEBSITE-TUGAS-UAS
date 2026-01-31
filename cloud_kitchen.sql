-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2026 at 02:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloud_kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_pengiriman`
--

CREATE TABLE `area_pengiriman` (
  `id_area` int(11) NOT NULL,
  `nama_area` varchar(100) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_pengiriman`
--

INSERT INTO `area_pengiriman` (`id_area`, `nama_area`, `ongkir`) VALUES
(1, 'Area 1', 10000),
(2, 'Area 2', 11000),
(3, 'Area 3', 12000),
(4, 'Area 4', 13000),
(5, 'Area 5', 14000),
(6, 'Area 6', 15000),
(7, 'Area 7', 16000),
(8, 'Area 8', 17000),
(9, 'Area 9', 18000),
(10, 'Area 10', 19000),
(11, 'Area 11', 20000),
(12, 'Area 12', 21000),
(13, 'Area 13', 22000),
(14, 'Area 14', 23000),
(15, 'Area 15', 24000);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama_bahan`, `stok`, `satuan`, `id_supplier`) VALUES
(1, 'Bahan 1', 50, 'kg', 1),
(2, 'Bahan 2', 40, 'kg', 2),
(3, 'Bahan 3', 30, 'kg', 3),
(4, 'Bahan 4', 60, 'kg', 4),
(5, 'Bahan 5', 55, 'kg', 5),
(6, 'Bahan 6', 45, 'kg', 6),
(7, 'Bahan 7', 35, 'kg', 7),
(8, 'Bahan 8', 25, 'kg', 8),
(9, 'Bahan 9', 20, 'kg', 9),
(10, 'Bahan 10', 15, 'kg', 10),
(11, 'Bahan 11', 70, 'kg', 11),
(12, 'Bahan 12', 65, 'kg', 12),
(13, 'Bahan 13', 75, 'kg', 13),
(14, 'Bahan 14', 80, 'kg', 14),
(15, 'Bahan 15', 90, 'kg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_menu`, `jumlah`, `subtotal`) VALUES
(51, 1, 1, 1, 20000),
(52, 2, 2, 1, 22000),
(53, 3, 3, 1, 25000),
(54, 4, 4, 1, 15000),
(55, 5, 5, 1, 10000),
(56, 6, 6, 1, 18000),
(57, 7, 7, 1, 23000),
(58, 8, 8, 1, 27000),
(59, 9, 9, 1, 30000),
(60, 10, 10, 1, 35000),
(61, 11, 11, 1, 16000),
(62, 12, 12, 1, 19000),
(63, 13, 13, 1, 21000),
(64, 14, 14, 1, 9000),
(65, 15, 15, 1, 12000),
(66, 16, 1, 1, 20000),
(67, 17, 2, 1, 22000),
(68, 18, 3, 1, 25000),
(69, 19, 4, 1, 15000),
(70, 20, 5, 1, 10000),
(71, 21, 6, 1, 18000),
(72, 22, 7, 1, 23000),
(73, 23, 8, 1, 27000),
(74, 24, 9, 1, 30000),
(75, 25, 10, 1, 35000),
(76, 26, 11, 1, 16000),
(77, 27, 12, 1, 19000),
(78, 28, 13, 1, 21000),
(79, 29, 14, 1, 9000),
(80, 30, 15, 1, 12000),
(81, 31, 1, 1, 20000),
(82, 32, 2, 1, 22000),
(83, 33, 3, 1, 25000),
(84, 34, 4, 1, 15000),
(85, 35, 5, 1, 10000),
(86, 36, 6, 1, 18000),
(87, 37, 7, 1, 23000),
(88, 38, 8, 1, 27000),
(89, 39, 9, 1, 30000),
(90, 40, 10, 1, 35000),
(91, 41, 11, 1, 16000),
(92, 42, 12, 1, 19000),
(93, 43, 13, 1, 21000),
(94, 44, 14, 1, 9000),
(95, 45, 15, 1, 12000),
(96, 46, 1, 1, 20000),
(97, 47, 2, 1, 22000),
(98, 48, 3, 1, 25000),
(99, 49, 4, 1, 15000),
(100, 50, 5, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jabatan`, `gaji`, `lokasi`) VALUES
(1, 'Karyawan 1', 'Koki', 3500000, 'Dapur'),
(2, 'Karyawan 2', 'Kasir', 3000000, 'Front'),
(3, 'Karyawan 3', 'Admin', 3200000, 'Office'),
(4, 'Karyawan 4', 'Kurir', 2800000, 'Lapangan'),
(5, 'Karyawan 5', 'Koki', 3500000, 'Dapur'),
(6, 'Karyawan 6', 'Kasir', 3000000, 'Front'),
(7, 'Karyawan 7', 'Admin', 3200000, 'Office'),
(8, 'Karyawan 8', 'Kurir', 2800000, 'Lapangan'),
(9, 'Karyawan 9', 'Koki', 3500000, 'Dapur'),
(10, 'Karyawan 10', 'Kasir', 3000000, 'Front'),
(11, 'Karyawan 11', 'Admin', 3200000, 'Office'),
(12, 'Karyawan 12', 'Kurir', 2800000, 'Lapangan'),
(13, 'Karyawan 13', 'Koki', 3500000, 'Dapur'),
(14, 'Karyawan 14', 'Kasir', 3000000, 'Front'),
(15, 'Karyawan 15', 'Admin', 3200000, 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Rice Bowl'),
(2, 'Ayam'),
(3, 'Seafood'),
(4, 'Snack'),
(5, 'Minuman'),
(6, 'Dessert'),
(7, 'Mie'),
(8, 'Pasta'),
(9, 'Burger'),
(10, 'Pizza'),
(11, 'Salad'),
(12, 'Vegan'),
(13, 'Kopi'),
(14, 'Teh'),
(15, 'Juice'),
(16, 'NWQJW'),
(19, 'GHGT');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `nama_menu`, `harga`) VALUES
(1, 1, 'Menu 6', 20000),
(2, 2, 'Menu 2', 22000),
(3, 3, 'Menu 3', 25000),
(4, 4, 'Menu 4', 15000),
(5, 5, 'Menu 5', 10000),
(6, 6, 'Menu 6', 18000),
(7, 7, 'Menu 7', 23000),
(8, 8, 'Menu 8', 27000),
(9, 9, 'Menu 9', 30000),
(10, 10, 'Menu 10', 35000),
(11, 11, 'Menu 11', 16000),
(12, 12, 'Menu 12', 19000),
(13, 13, 'Menu 13', 21000),
(14, 14, 'Menu 14', 9000),
(15, 15, 'Menu 15', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(11) NOT NULL,
  `metode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `metode`) VALUES
(1, 'Cash'),
(2, 'Transfer'),
(3, 'E-Wallet'),
(4, 'QRIS'),
(5, 'Debit'),
(6, 'Kredit'),
(7, 'OVO'),
(8, 'GoPay'),
(9, 'Dana'),
(10, 'ShopeePay'),
(11, 'LinkAja'),
(12, 'Virtual Account'),
(13, 'COD'),
(14, 'PayLater'),
(15, 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `no_hp`, `alamat`, `kota`) VALUES
(1, 'Pelanggan 1', '0811111111', 'Alamat 1', 'Banjarmasin'),
(2, 'Pelanggan 2', '0811111112', 'Alamat 2', 'Banjarmasin'),
(3, 'Pelanggan 3', '0811111113', 'Alamat 3', 'Banjarmasin'),
(4, 'Pelanggan 4', '0811111114', 'Alamat 4', 'Banjarmasin'),
(5, 'Pelanggan 5', '0811111115', 'Alamat 5', 'Banjarbaru'),
(6, 'Pelanggan 6', '0811111116', 'Alamat 6', 'Banjarbaru'),
(7, 'Pelanggan 7', '0811111117', 'Alamat 7', 'Banjarbaru'),
(8, 'Pelanggan 8', '0811111118', 'Alamat 8', 'Banjarmasin'),
(9, 'Pelanggan 9', '0811111119', 'Alamat 9', 'Banjarmasin'),
(10, 'Pelanggan 10', '0811111120', 'Alamat 10', 'Banjarmasin'),
(11, 'Pelanggan 11', '0811111121', 'Alamat 11', 'Banjarmasin'),
(12, 'Pelanggan 12', '0811111122', 'Alamat 12', 'Banjarmasin'),
(13, 'Pelanggan 13', '0811111123', 'Alamat 13', 'Banjarbaru'),
(14, 'Pelanggan 14', '0811111124', 'Alamat 14', 'Banjarbaru'),
(15, 'Pelanggan 15', '0811111125', 'Alamat 15', 'Banjarmasin'),
(16, 'gf', 'iyuutydr', 'fds', 'hgtf');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_metode` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `id_metode`, `jumlah_bayar`, `tanggal_bayar`) VALUES
(1, 1, 1, 30000, '2025-01-01 10:00:00'),
(2, 2, 2, 32000, '2025-01-01 10:05:00'),
(3, 3, 1, 28000, '2025-01-01 10:10:00'),
(4, 4, 3, 35000, '2025-01-01 10:15:00'),
(5, 5, 1, 40000, '2025-01-01 10:20:00'),
(6, 6, 2, 31000, '2025-01-01 10:25:00'),
(7, 7, 1, 33000, '2025-01-01 10:30:00'),
(8, 8, 3, 36000, '2025-01-01 10:35:00'),
(9, 9, 2, 38000, '2025-01-01 10:40:00'),
(10, 10, 1, 42000, '2025-01-01 10:45:00'),
(11, 11, 1, 30000, '2025-01-01 10:50:00'),
(12, 12, 2, 32000, '2025-01-01 10:55:00'),
(13, 13, 1, 28000, '2025-01-01 11:00:00'),
(14, 14, 3, 35000, '2025-01-01 11:05:00'),
(15, 15, 1, 40000, '2025-01-01 11:10:00'),
(16, 16, 2, 31000, '2025-01-01 11:15:00'),
(17, 17, 1, 33000, '2025-01-01 11:20:00'),
(18, 18, 3, 36000, '2025-01-01 11:25:00'),
(19, 19, 2, 38000, '2025-01-01 11:30:00'),
(20, 20, 1, 42000, '2025-01-01 11:35:00'),
(21, 21, 1, 30000, '2025-01-01 11:40:00'),
(22, 22, 2, 32000, '2025-01-01 11:45:00'),
(23, 23, 1, 28000, '2025-01-01 11:50:00'),
(24, 24, 3, 35000, '2025-01-01 11:55:00'),
(25, 25, 1, 40000, '2025-01-01 12:00:00'),
(26, 26, 2, 31000, '2025-01-01 12:05:00'),
(27, 27, 1, 33000, '2025-01-01 12:10:00'),
(28, 28, 3, 36000, '2025-01-01 12:15:00'),
(29, 29, 2, 38000, '2025-01-01 12:20:00'),
(30, 30, 1, 42000, '2025-01-01 12:25:00'),
(31, 31, 1, 30000, '2025-01-01 12:30:00'),
(32, 32, 2, 32000, '2025-01-01 12:35:00'),
(33, 33, 1, 28000, '2025-01-01 12:40:00'),
(34, 34, 3, 35000, '2025-01-01 12:45:00'),
(35, 35, 1, 40000, '2025-01-01 12:50:00'),
(36, 36, 2, 31000, '2025-01-01 12:55:00'),
(37, 37, 1, 33000, '2025-01-01 13:00:00'),
(38, 38, 3, 36000, '2025-01-01 13:05:00'),
(39, 39, 2, 38000, '2025-01-01 13:10:00'),
(40, 40, 1, 42000, '2025-01-01 13:15:00'),
(41, 41, 1, 30000, '2025-01-01 13:20:00'),
(42, 42, 2, 32000, '2025-01-01 13:25:00'),
(43, 43, 1, 28000, '2025-01-01 13:30:00'),
(44, 44, 3, 35000, '2025-01-01 13:35:00'),
(45, 45, 1, 40000, '2025-01-01 13:40:00'),
(46, 46, 2, 31000, '2025-01-01 13:45:00'),
(47, 47, 1, 33000, '2025-01-01 13:50:00'),
(48, 48, 3, 36000, '2025-01-01 13:55:00'),
(49, 49, 2, 38000, '2025-01-01 14:00:00'),
(50, 50, 1, 42000, '2025-01-01 14:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_area`, `tanggal`, `total`, `status`) VALUES
(1, 1, 1, '2025-01-01 10:00:00', 30000, 'Selesai'),
(2, 2, 2, '2025-01-01 10:05:00', 32000, 'Selesai'),
(3, 3, 3, '2025-01-01 10:10:00', 28000, 'Selesai'),
(4, 4, 4, '2025-01-01 10:15:00', 35000, 'Selesai'),
(5, 5, 5, '2025-01-01 10:20:00', 40000, 'Selesai'),
(6, 6, 6, '2025-01-01 10:25:00', 31000, 'Selesai'),
(7, 7, 7, '2025-01-01 10:30:00', 33000, 'Selesai'),
(8, 8, 8, '2025-01-01 10:35:00', 36000, 'Selesai'),
(9, 9, 9, '2025-01-01 10:40:00', 38000, 'Selesai'),
(10, 10, 10, '2025-01-01 10:45:00', 42000, 'Selesai'),
(11, 11, 11, '2025-01-01 10:50:00', 30000, 'Selesai'),
(12, 12, 12, '2025-01-01 10:55:00', 32000, 'Selesai'),
(13, 13, 13, '2025-01-01 11:00:00', 28000, 'Selesai'),
(14, 14, 14, '2025-01-01 11:05:00', 35000, 'Selesai'),
(15, 15, 15, '2025-01-01 11:10:00', 40000, 'Selesai'),
(16, 1, 1, '2025-01-01 11:15:00', 31000, 'Selesai'),
(17, 2, 2, '2025-01-01 11:20:00', 33000, 'Selesai'),
(18, 3, 3, '2025-01-01 11:25:00', 36000, 'Selesai'),
(19, 4, 4, '2025-01-01 11:30:00', 38000, 'Selesai'),
(20, 5, 5, '2025-01-01 11:35:00', 42000, 'Selesai'),
(21, 6, 6, '2025-01-01 11:40:00', 30000, 'Selesai'),
(22, 7, 7, '2025-01-01 11:45:00', 32000, 'Selesai'),
(23, 8, 8, '2025-01-01 11:50:00', 28000, 'Selesai'),
(24, 9, 9, '2025-01-01 11:55:00', 35000, 'Selesai'),
(25, 10, 10, '2025-01-01 12:00:00', 40000, 'Selesai'),
(26, 11, 11, '2025-01-01 12:05:00', 31000, 'Selesai'),
(27, 12, 12, '2025-01-01 12:10:00', 33000, 'Selesai'),
(28, 13, 13, '2025-01-01 12:15:00', 36000, 'Selesai'),
(29, 14, 14, '2025-01-01 12:20:00', 38000, 'Selesai'),
(30, 15, 15, '2025-01-01 12:25:00', 42000, 'Selesai'),
(31, 1, 1, '2025-01-01 12:30:00', 30000, 'Selesai'),
(32, 2, 2, '2025-01-01 12:35:00', 32000, 'Selesai'),
(33, 3, 3, '2025-01-01 12:40:00', 28000, 'Selesai'),
(34, 4, 4, '2025-01-01 12:45:00', 35000, 'Selesai'),
(35, 5, 5, '2025-01-01 12:50:00', 40000, 'Selesai'),
(36, 6, 6, '2025-01-01 12:55:00', 31000, 'Selesai'),
(37, 7, 7, '2025-01-01 13:00:00', 33000, 'Selesai'),
(38, 8, 8, '2025-01-01 13:05:00', 36000, 'Selesai'),
(39, 9, 9, '2025-01-01 13:10:00', 38000, 'Selesai'),
(40, 10, 10, '2025-01-01 13:15:00', 42000, 'Selesai'),
(41, 11, 11, '2025-01-01 13:20:00', 30000, 'Selesai'),
(42, 12, 12, '2025-01-01 13:25:00', 32000, 'Selesai'),
(43, 13, 13, '2025-01-01 13:30:00', 28000, 'Selesai'),
(44, 14, 14, '2025-01-01 13:35:00', 35000, 'Selesai'),
(45, 15, 15, '2025-01-01 13:40:00', 40000, 'Selesai'),
(46, 1, 1, '2025-01-01 13:45:00', 31000, 'Selesai'),
(47, 2, 2, '2025-01-01 13:50:00', 33000, 'Selesai'),
(48, 3, 3, '2025-01-01 13:55:00', 36000, 'Selesai'),
(49, 4, 4, '2025-01-01 14:00:00', 38000, 'Selesai'),
(50, 5, 5, '2025-01-01 14:05:00', 42000, 'Selesai'),
(57, 1, 1, '2026-01-31 20:08:00', 20000, 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `shift_karyawan`
--

CREATE TABLE `shift_karyawan` (
  `id_shift` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift_karyawan`
--

INSERT INTO `shift_karyawan` (`id_shift`, `id_karyawan`, `tanggal`, `shift`) VALUES
(1, 1, '2025-01-01', 'Pagi'),
(2, 2, '2025-01-01', 'Pagi'),
(3, 3, '2025-01-01', 'Pagi'),
(4, 4, '2025-01-01', 'Pagi'),
(5, 5, '2025-01-01', 'Pagi'),
(6, 6, '2025-01-01', 'Pagi'),
(7, 7, '2025-01-01', 'Pagi'),
(8, 8, '2025-01-01', 'Pagi'),
(9, 9, '2025-01-01', 'Pagi'),
(10, 10, '2025-01-01', 'Pagi'),
(11, 11, '2025-01-02', 'Pagi'),
(12, 12, '2025-01-02', 'Pagi'),
(13, 13, '2025-01-02', 'Pagi'),
(14, 14, '2025-01-02', 'Pagi'),
(15, 15, '2025-01-02', 'Pagi'),
(16, 1, '2025-01-02', 'Pagi'),
(17, 2, '2025-01-02', 'Pagi'),
(18, 3, '2025-01-02', 'Pagi'),
(19, 4, '2025-01-02', 'Pagi'),
(20, 5, '2025-01-02', 'Pagi'),
(21, 6, '2025-01-03', 'Siang'),
(22, 7, '2025-01-03', 'Siang'),
(23, 8, '2025-01-03', 'Siang'),
(24, 9, '2025-01-03', 'Siang'),
(25, 10, '2025-01-03', 'Siang'),
(26, 11, '2025-01-03', 'Siang'),
(27, 12, '2025-01-03', 'Siang'),
(28, 13, '2025-01-03', 'Siang'),
(29, 14, '2025-01-03', 'Siang'),
(30, 15, '2025-01-03', 'Siang'),
(31, 1, '2025-01-04', 'Malam'),
(32, 2, '2025-01-04', 'Malam'),
(33, 3, '2025-01-04', 'Malam'),
(34, 4, '2025-01-04', 'Malam'),
(35, 5, '2025-01-04', 'Malam'),
(36, 6, '2025-01-04', 'Malam'),
(37, 7, '2025-01-04', 'Malam'),
(38, 8, '2025-01-04', 'Malam'),
(39, 9, '2025-01-04', 'Malam'),
(40, 10, '2025-01-04', 'Malam');

-- --------------------------------------------------------

--
-- Table structure for table `stok_menu`
--

CREATE TABLE `stok_menu` (
  `id_stok` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_menu`
--

INSERT INTO `stok_menu` (`id_stok`, `id_menu`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `tanggal`) VALUES
(1, 1, 100, 20, 10, 110, '2025-01-01'),
(2, 2, 100, 20, 10, 110, '2025-01-01'),
(3, 3, 100, 20, 10, 110, '2025-01-01'),
(4, 4, 100, 20, 10, 110, '2025-01-01'),
(5, 5, 100, 20, 10, 110, '2025-01-01'),
(6, 6, 100, 20, 10, 110, '2025-01-01'),
(7, 7, 100, 20, 10, 110, '2025-01-01'),
(8, 8, 100, 20, 10, 110, '2025-01-01'),
(9, 9, 100, 20, 10, 110, '2025-01-01'),
(10, 10, 100, 20, 10, 110, '2025-01-01'),
(11, 11, 100, 20, 10, 110, '2025-01-02'),
(12, 12, 100, 20, 10, 110, '2025-01-02'),
(13, 13, 100, 20, 10, 110, '2025-01-02'),
(14, 14, 100, 20, 10, 110, '2025-01-02'),
(15, 15, 100, 20, 10, 110, '2025-01-02'),
(16, 1, 100, 20, 10, 110, '2025-01-02'),
(17, 2, 100, 20, 10, 110, '2025-01-02'),
(18, 3, 100, 20, 10, 110, '2025-01-02'),
(19, 4, 100, 20, 10, 110, '2025-01-02'),
(20, 5, 100, 20, 10, 110, '2025-01-02'),
(21, 6, 100, 20, 10, 110, '2025-01-03'),
(22, 7, 100, 20, 10, 110, '2025-01-03'),
(23, 8, 100, 20, 10, 110, '2025-01-03'),
(24, 9, 100, 20, 10, 110, '2025-01-03'),
(25, 10, 100, 20, 10, 110, '2025-01-03'),
(26, 11, 100, 20, 10, 110, '2025-01-03'),
(27, 12, 100, 20, 10, 110, '2025-01-03'),
(28, 13, 100, 20, 10, 110, '2025-01-03'),
(29, 14, 100, 20, 10, 110, '2025-01-03'),
(30, 15, 100, 20, 10, 110, '2025-01-03'),
(31, 1, 100, 20, 10, 110, '2025-01-04'),
(32, 2, 100, 20, 10, 110, '2025-01-04'),
(33, 3, 100, 20, 10, 110, '2025-01-04'),
(34, 4, 100, 20, 10, 110, '2025-01-04'),
(35, 5, 100, 20, 10, 110, '2025-01-04'),
(36, 6, 100, 20, 10, 110, '2025-01-04'),
(37, 7, 100, 20, 10, 110, '2025-01-04'),
(38, 8, 100, 20, 10, 110, '2025-01-04'),
(39, 9, 100, 20, 10, 110, '2025-01-04'),
(40, 10, 100, 20, 10, 110, '2025-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kontak`, `alamat`, `kota`) VALUES
(1, 'Supplier 1', '0800000001', 'Alamat 1', 'Banjarmasin'),
(2, 'Supplier 2', '0800000002', 'Alamat 2', 'Banjarmasin'),
(3, 'Supplier 3', '0800000003', 'Alamat 3', 'Banjarmasin'),
(4, 'Supplier 4', '0800000004', 'Alamat 4', 'Banjarbaru'),
(5, 'Supplier 5', '0800000005', 'Alamat 5', 'Banjarbaru'),
(6, 'Supplier 6', '0800000006', 'Alamat 6', 'Banjarmasin'),
(7, 'Supplier 7', '0800000007', 'Alamat 7', 'Banjarmasin'),
(8, 'Supplier 8', '0800000008', 'Alamat 8', 'Banjarbaru'),
(9, 'Supplier 9', '0800000009', 'Alamat 9', 'Banjarmasin'),
(10, 'Supplier 10', '0800000010', 'Alamat 10', 'Banjarbaru'),
(11, 'Supplier 11', '0800000011', 'Alamat 11', 'Banjarmasin'),
(12, 'Supplier 12', '0800000012', 'Alamat 12', 'Banjarbaru'),
(13, 'Supplier 13', '0800000013', 'Alamat 13', 'Banjarmasin'),
(14, 'Supplier 14', '0800000014', 'Alamat 14', 'Banjarbaru'),
(15, 'Supplier 15', '0800000015', 'Alamat 15', 'Banjarmasin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_pengiriman`
--
ALTER TABLE `area_pengiriman`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_metode` (`id_metode`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `shift_karyawan`
--
ALTER TABLE `shift_karyawan`
  ADD PRIMARY KEY (`id_shift`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `stok_menu`
--
ALTER TABLE `stok_menu`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_pengiriman`
--
ALTER TABLE `area_pengiriman`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `shift_karyawan`
--
ALTER TABLE `shift_karyawan`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `stok_menu`
--
ALTER TABLE `stok_menu`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_menu` (`id_kategori`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_metode`) REFERENCES `metode_pembayaran` (`id_metode`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `area_pengiriman` (`id_area`);

--
-- Constraints for table `shift_karyawan`
--
ALTER TABLE `shift_karyawan`
  ADD CONSTRAINT `shift_karyawan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Constraints for table `stok_menu`
--
ALTER TABLE `stok_menu`
  ADD CONSTRAINT `stok_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
