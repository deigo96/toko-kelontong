-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 12:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amanah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aId` int(11) NOT NULL,
  `aName` varchar(255) NOT NULL,
  `aDate` datetime NOT NULL,
  `aEmail` varchar(255) NOT NULL,
  `aPassword` varchar(255) NOT NULL,
  `aImage` varchar(255) NOT NULL DEFAULT 'admin.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aId`, `aName`, `aDate`, `aEmail`, `aPassword`, `aImage`) VALUES
(1, 'Deigo Siahaan', '2020-11-26 20:17:24', 'deigosiahaan@gmail.com', 'admin96', 'deigo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cId` int(11) NOT NULL,
  `cName` varchar(200) NOT NULL,
  `cStatus` int(11) NOT NULL,
  `cDate` datetime NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cId`, `cName`, `cStatus`, `cDate`, `adminId`) VALUES
(35, 'Minyak', 1, '2022-04-18 12:09:43', 1),
(42, 'Beras', 1, '2022-04-19 05:35:21', 1),
(43, 'Sabun Mandi', 1, '2022-04-19 05:35:53', 1),
(44, 'Sayur', 1, '2022-04-19 11:44:47', 1),
(45, 'Daging', 1, '2022-04-19 11:44:50', 1),
(46, 'Buah', 1, '2022-04-19 11:52:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `type_id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama`, `email`, `password`, `status`, `type_id`, `gambar`, `date`) VALUES
(1, 'amanah', 'amanah@gmail.com', '94bc76328d2f16a23b9a8ee6730cbc50', 1, 2, 'female.png', '0000-00-00 00:00:00'),
(2, 'deigo', 'deigosiahaan@gmail.com', '94bc76328d2f16a23b9a8ee6730cbc50', 1, 1, '', '0000-00-00 00:00:00'),
(12, 'joker', 'joker@gmail.com', 'cd3972c35448d79e5688c931a3beff82', 1, 1, '', '22-04-2022 05:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `namaDepan` varchar(50) NOT NULL,
  `namaBelakang` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `noTelp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `tanggalBeli` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `harga` bigint(20) NOT NULL,
  `kode_pesanan` int(11) NOT NULL,
  `bukti_upload` varchar(100) NOT NULL,
  `tanggal_verifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_produk`, `jumlah`, `namaDepan`, `namaBelakang`, `alamat`, `kota`, `kabupaten`, `noTelp`, `email`, `catatan`, `tanggalBeli`, `status`, `harga`, `kode_pesanan`, `bukti_upload`, `tanggal_verifikasi`) VALUES
(26, 2, '39', '2', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'admin@gmail.com', '', '21-04-2022 07:31:13', 1, 135500, 1113, '', '26-06-2022 19:05'),
(27, 2, '38', '1', 'deigo', 'jonathan siahaan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', '', '21-04-2022 07:43:56', 0, 135500, 1114, '', ''),
(28, 2, '39', '2', 'deigo', 'jonathan siahaan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', '', '21-04-2022 07:43:56', 0, 135500, 1114, '', ''),
(29, 2, '38', '1', 'deigo joanthan', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', '', '21-04-2022 07:45:27', 0, 135500, 1115, '', ''),
(30, 2, '39', '2', 'deigo joanthan', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', '', '21-04-2022 07:45:27', 0, 135500, 1115, '', ''),
(31, 2, '38', '7', 'deigo siahana', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'brengsek975@gmail.com', '', '21-04-2022 07:46:29', 1, 193500, 1116, '', '26-06-2022 18:56'),
(32, 2, '39', '2', 'deigo siahana', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'brengsek975@gmail.com', '', '21-04-2022 07:46:29', 1, 193500, 1116, '', '26-06-2022 18:56'),
(33, 2, '41', '1', 'deigo siahana', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'brengsek975@gmail.com', '', '21-04-2022 07:46:29', 1, 193500, 1116, '', '26-06-2022 18:56'),
(34, 2, '40', '3', 'jamila', 'sukanti', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'telkomsel@gmail.com', 'asal samapay', '22-04-2022 08:47:55', 0, 91500, 1117, '', ''),
(35, 2, '41', '2', 'jamila', 'sukanti', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'telkomsel@gmail.com', 'asal samapay', '22-04-2022 08:47:55', 0, 91500, 1117, '', ''),
(36, 2, '38', '1', 'jamila', 'sukanti', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'telkomsel@gmail.com', 'asal samapay', '22-04-2022 08:47:55', 0, 91500, 1117, '', ''),
(37, 11, '41', '3', 'joker', 'siahaan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'joker', '22-04-2022 09:05:05', 0, 205000, 1118, '', ''),
(38, 11, '39', '2', 'joker', 'siahaan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'joker', '22-04-2022 09:05:05', 0, 205000, 1118, '', ''),
(39, 2, '38', '1', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'dqwd', '27-05-2022 03:57:01', 0, 41500, 1119, '', ''),
(40, 2, '40', '3', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'dqwd', '27-05-2022 03:57:01', 0, 41500, 1119, '', ''),
(41, 2, '41', '3', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'asdas', '06-07-2022 04:21:54', 0, 123000, 1120, '', ''),
(42, 2, '40', '4', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'asdas', '06-07-2022 04:21:54', 0, 123000, 1120, '', ''),
(43, 2, '41', '1', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'admin@gmail.com', 'sad', '06-07-2022 04:27:47', 0, 25000, 1121, '', ''),
(44, 2, '40', '1', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'brengsek975@gmail.com', 'j', '06-07-2022 04:33:34', 0, 12000, 1122, '', ''),
(45, 2, '41', '1', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'deigosiahaan@gmail.com', 'asal samapay', '06-07-2022 04:36:20', 0, 25000, 1123, '', ''),
(46, 2, '41', '1', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'admdin@gmail.com', 'asd', '06-07-2022 04:41:16', 0, 25000, 1124, '16523896598051.jpg', ''),
(47, 2, '39', '3', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'telkomsel@gmail.com', 'dqwd', '06-07-2022 07:56:17', 1, 195000, 1125, '12.PNG', '06-07-2022 12:31'),
(48, 2, '41', '1', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'brengsek975@gmail.com', 'aaa', '06-07-2022 12:03:36', 1, 49000, 1126, 'Capture.PNG', '06-07-2022 12:30'),
(49, 2, '40', '2', 'deigo', 'jonathan', 'perum ksb blok j13 no.20 cibarusah', 'kabupaten Bekasi', 'kabupaten Bekasi', '082135277397', 'brengsek975@gmail.com', 'aaa', '06-07-2022 12:03:36', 1, 49000, 1126, 'Capture.PNG', '06-07-2022 12:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(11) NOT NULL,
  `pName` varchar(200) NOT NULL,
  `pStatus` int(11) NOT NULL,
  `pDate` datetime NOT NULL,
  `categoryId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `pDp` varchar(200) DEFAULT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pName`, `pStatus`, `pDate`, `categoryId`, `adminId`, `pDp`, `harga`, `stok`) VALUES
(38, 'Sayur Bayam', 1, '2022-04-19 11:51:38', 44, 1, 'lp-1.jpg', 5500, 120),
(39, 'Daging Sapi 500gr', 1, '2022-04-19 11:52:17', 45, 1, 'product-1.jpg', 65000, 10),
(40, 'Pisang 100gr', 1, '2022-04-19 11:52:49', 46, 1, 'product-2.jpg', 12000, 10),
(41, 'Anggur', 1, '2022-04-19 11:53:31', 46, 1, 'product-4.jpg', 25000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `LOGO` varchar(100) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `atas_nama`, `LOGO`, `isActive`) VALUES
(1, 'BRI', '12803812312', 'AISYATUN NAFISAH', 'assets/img/BRI.png', 1),
(2, 'BCA', '523245235', 'AISYATUN NAFISAH', 'assets/img/BCA.png', 1),
(3, 'MANDIRI', '722626246', 'AISYATUN NAFISAH', 'assets/img/MANDIRI.png', 1),
(4, 'BNI', '2124124124', 'AISYATUN NAFISAH', 'assets/img/BNI.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `tipe_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`tipe_id`, `nama`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`),
  ADD KEY `adminId` (`adminId`),
  ADD KEY `adminId_2` (`adminId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`tipe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `tipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_aId_fk` FOREIGN KEY (`adminId`) REFERENCES `admin` (`aId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_aId_fk` FOREIGN KEY (`adminId`) REFERENCES `admin` (`aId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categories_cId_fk` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`cId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
