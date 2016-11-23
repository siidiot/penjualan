-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 10:23 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `susipos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `prod_unit` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `prod_unit`, `harga`, `stok`) VALUES
(3, 2, 'kolor firaun', 'lusin', 1000, 80),
(5, 3, 'mukena putih', 'pcs', 85000, 69),
(6, 2, 'coba', 'kodi', 7000, 92),
(7, 1, 'dsfsdf', 'dfdsf', 20000, -46),
(8, 3, 'alo', 'batang', 23444, 0),
(9, 1, 'dfdf', 'dfdf', 4545, 0),
(10, 3, 'kolor', 'kain', 230000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `nama_customer`, `alamat`, `kota`, `phone`, `no_hp`, `ket`) VALUES
(1001, 'sinar agung empat', 'ditempat bae gaes    ', '9999', '838338', 'coba', 'saja'),
(1004, 'PT.abcccc', 'jl. kodau no 76', 'bekasi', '5555', '9999', '-'),
(1005, 'tonoris', 'jl.ampera no 10', 'cilacap', '0786778', '087765', '-');

-- --------------------------------------------------------

--
-- Table structure for table `history_bayar`
--

CREATE TABLE `history_bayar` (
  `transaksi_id` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `sisa_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_bayar`
--

INSERT INTO `history_bayar` (`transaksi_id`, `tgl_bayar`, `jumlah_bayar`, `sisa_bayar`) VALUES
(48, '2016-05-12', 50000, 140000),
(48, '2016-05-04', 130000, 10000),
(48, '2016-05-04', 10000, 0),
(49, '2016-05-31', 0, 255000),
(49, '2016-06-08', 100000, 155000),
(49, '2016-06-09', 20000, 135000),
(48, '2016-06-01', 135000, -65000),
(50, '2016-06-08', 0, 99000),
(50, '2016-06-01', 90000, 9000),
(50, '2016-06-02', 9000, 0),
(51, '2016-06-01', 0, 14000),
(51, '2016-06-08', 1000, 13000),
(51, '2016-06-08', 10000, 3000),
(51, '2016-06-02', 3000, 0),
(52, '2016-06-16', 1000, 27000),
(53, '2016-06-15', 3000, 337000),
(52, '2016-06-03', 27000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`kategori_id`, `nama_kategori`) VALUES
(1, 'sepatu bocah'),
(2, 'sepatu import'),
(3, 'baju muslimah'),
(4, 'karung');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `operator_id` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` date NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`operator_id`, `nama_lengkap`, `foto`, `username`, `password`, `last_login`, `level`) VALUES
(3, 'susi darmawanti', 'avatar.png', 'susi', '536931d80decb18c33db9612bdd004d4', '2016-06-01', '1'),
(4, 'dadi', 'index-1_img-21.jpg', '123', '202cb962ac59075b964b07152d234b70', '2016-06-01', '2');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual`
--

CREATE TABLE `transaksi_jual` (
  `transaksi_id` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `operator_id` int(11) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `piutang` int(11) NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_jual`
--

INSERT INTO `transaksi_jual` (`transaksi_id`, `tgl_transaksi`, `operator_id`, `cust_id`, `total`, `jumlah_bayar`, `piutang`, `tgl_jatuh_tempo`, `tgl_input`) VALUES
(50, '2016-06-08', 3, '1004', 99000, 99000, 0, '2016-06-23', '2016-06-01 19:37:29'),
(51, '2016-06-01', 3, '1004', 14000, 14000, 0, '2016-06-11', '2016-06-01 19:42:13'),
(52, '2016-06-16', 3, '1004', 28000, 28000, 0, '2016-06-26', '2016-06-01 19:57:41'),
(53, '2016-06-15', 3, '1001', 340000, 3000, 337000, '2016-07-05', '2016-06-01 20:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual_detail`
--

CREATE TABLE `transaksi_jual_detail` (
  `t_detail_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1=sudah diproses 0=belum diproses',
  `prod_unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_jual_detail`
--

INSERT INTO `transaksi_jual_detail` (`t_detail_id`, `barang_id`, `qty`, `transaksi_id`, `harga`, `status`, `prod_unit`) VALUES
(88, 6, 2, 50, 7000, '1', 'kodi'),
(89, 5, 1, 50, 85000, '1', 'pcs'),
(90, 6, 2, 51, 7000, '1', 'kodi'),
(91, 6, 4, 52, 7000, '1', 'kodi'),
(92, 5, 4, 53, 85000, '1', 'pcs'),
(94, 7, 4, 0, 20000, '0', 'dfdsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_jual_detail`
--
ALTER TABLE `transaksi_jual_detail`
  ADD PRIMARY KEY (`t_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `transaksi_jual_detail`
--
ALTER TABLE `transaksi_jual_detail`
  MODIFY `t_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
