-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2019 at 09:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_conakito`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(258) NOT NULL,
  `is_active` int(1) NOT NULL,
  `data_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `image`, `password`, `is_active`, `data_created`) VALUES
(6, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$5rtSMOWvJDboy9rkePGOEuUv/LQPQw/.TWUH7354Civ2fwJOlIA6S', 1, 1562568324);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `no_tlp`, `pertanyaan`) VALUES
(12, 'Tes', 'tes@gmail.com', '111111111111', 'Tes ini pertanyaan');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(5) NOT NULL,
  `nama_event` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `foto_event` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `deskripsi`, `tanggal`, `foto_event`) VALUES
(5, 'Musik Festival', 'Lorem ipsum dolor sit amet consectetur adipisicing', '2019-06-17', '6.jpg'),
(6, 'Musik Festival', 'Lorem ipsum dolor sit amet consectetur adipisicing', '2019-06-21', '5.jpg'),
(7, 'Brendo Ketupek', 'Lorem ipsum dolor sit amet consectetur adipisicing', '2019-06-12', '2.jpg'),
(8, 'Musik Festival', 'Lorem ipsum dolor sit amet consectetur adipisicing', '2019-06-12', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(10) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tujuan_provinsi` varchar(35) NOT NULL,
  `kurir` varchar(15) NOT NULL,
  `bank_transfer` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `nama_pembeli`, `alamat`, `no_tlp`, `email`, `tujuan_provinsi`, `kurir`, `bank_transfer`) VALUES
(104, 'pascal', 'Jl Pemuda.Komp Kemenkumham blok D2/5 Rt2/13', '081285528255', 'gunswinger0@gmail.co', '4 Bengkulu', 'JNE', 'BCA - 123456789 a/n PT Konakito');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `bank_pengirim` varchar(20) NOT NULL,
  `norek_pengirim` varchar(20) NOT NULL,
  `nama_pengirim` varchar(25) NOT NULL,
  `tanggal_pengirim` date NOT NULL,
  `jumlah_transfer` varchar(10) NOT NULL,
  `bukti_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `bank_pengirim`, `norek_pengirim`, `nama_pengirim`, `tanggal_pengirim`, `jumlah_transfer`, `bukti_pembayaran`) VALUES
(68, 'MANDIRI', '2121221', '12324124124', '2019-06-18', '150.000', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_invoice` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `jumlah_produk` int(10) NOT NULL,
  `berat_produk` int(10) NOT NULL,
  `harga_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_invoice`, `id_produk`, `nama_produk`, `jumlah_produk`, `berat_produk`, `harga_produk`) VALUES
(165, 95, 4, 'Robusta Semang', 1, 1000, 600000),
(166, 96, 2, 'Robusa Semang', 2, 1000, 150000),
(167, 97, 2, 'Robusa Semang', 1, 1000, 150000),
(168, 98, 2, 'Robusa Semang', 1, 1000, 150000),
(169, 99, 6, 'Robusta Lanang', 1, 250, 75000),
(170, 100, 2, 'Robusa Semang', 1, 1000, 150000),
(171, 101, 3, 'Robusta Semang', 1, 500, 300000),
(172, 102, 3, 'Robusta Semang', 1, 500, 300000),
(173, 103, 2, 'Robusa Semang', 1, 1000, 150000),
(174, 102, 2, 'Robusa Semang', 1, 1000, 150000),
(175, 103, 2, 'Robusa Semang', 1, 1000, 150000),
(176, 104, 5, 'Robusta Lanang', 1, 1000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `berat_produk` varchar(10) NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `foto_produk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `berat_produk`, `harga_produk`, `foto_produk`) VALUES
(2, 'Robusa Semang', '1000', 150000, 's1.jpg'),
(3, 'Robusta Semang', '500', 300000, 's1.jpg'),
(4, 'Robusta Semang', '1000', 600000, 's1.jpg'),
(5, 'Robusta Lanang', '1000', 40000, 's1.jpg'),
(6, 'Robusta Lanang', '250', 75000, 's2.jpg'),
(7, 'Robusta Lanang', '500', 160000, 's2.jpg'),
(8, 'Robusta Lanang', '1000', 300000, 's2.jpg'),
(9, 'Robusta Super Grade 1', '500', 95000, 's3.jpg'),
(10, 'Robusta Super Grade 1', '1000', 180000, 's3.jpg'),
(11, 'Robusta Super Grade 2', '1000', 150000, 's4.jpg'),
(12, 'Robusta Super Grade 2', '500', 75000, 's4.jpg'),
(13, 'Robusta Tradisional', '500', 40000, 's5.jpg'),
(14, 'Robusta Tradisional', '1000', 75000, 's5.jpg'),
(15, 'Arabica', '100', 35000, 's6.jpeg'),
(16, 'Arabica', '250', 50000, 's6.jpeg'),
(17, 'Arabica', '500', 95000, 's6.jpeg'),
(18, 'Arabica', '1000', 180000, 's6.jpeg'),
(19, 'Arabica Luwak', '100', 100000, 's7.jpg'),
(20, 'Arabica Luwak', '250', 200000, 's7.jpg'),
(21, 'Arabica Luwak', '500', 400000, 's7.jpg'),
(22, 'Arabica Luwak', '1000', 750000, 's7.jpg'),
(23, 'Robusa Semang', '1000', 75000, 'sa.jpg'),
(24, 'guns', '1000', 75000, 'lunch.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
