-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 10:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kedaikopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `email` char(100) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `email`, `PASSWORD`) VALUES
(1, 'caca@gmail.com', '123'),
(11, 'fikri_erha@gmail.com', '$2y$10$Pxoe/DXOlxD2YMVCYDOabOAXt2tL3LuPI57ZmYA7zVdrkHVHTbV26');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `kedai`
--

CREATE TABLE `kedai` (
  `ID_KEDAI` int(11) NOT NULL,
  `NAMA_KEDAI` char(255) DEFAULT NULL,
  `DESKRIPSI` varchar(255) DEFAULT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `JAM_TUTUP` time DEFAULT NULL,
  `JAM_BUKA` time DEFAULT NULL,
  `TELP` char(50) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `FOTO_KEDAI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kedai`
--

INSERT INTO `kedai` (`ID_KEDAI`, `NAMA_KEDAI`, `DESKRIPSI`, `ALAMAT`, `JAM_TUTUP`, `JAM_BUKA`, `TELP`, `slug`, `FOTO_KEDAI`) VALUES
(2, 'Kandang Kopi Bangkalan', 'Cafe untuk umum', 'Jl. RE. Martadinata No.07', '13:25:58', '00:00:00', '0855-4900-0031', 'kandang-kopi-bangkalan', '5 Screenshot (22).png');

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `ID_KOMEN` int(11) NOT NULL,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `NAMA_KOMENTATOR` char(100) DEFAULT NULL,
  `EMAIL_KOMENTATOR` char(100) DEFAULT NULL,
  `KOMEN` varchar(255) NOT NULL,
  `TANGGAL` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`ID_KOMEN`, `ID_KEDAI`, `NAMA_KOMENTATOR`, `EMAIL_KOMENTATOR`, `KOMEN`, `TANGGAL`) VALUES
(4, 2, 'reno', 'reno@gmail.com', 'asek', '2022-10-25 05:51:03'),
(6, 2, 'rozy', 'rozy@gmail.com', 'jos', '2022-10-25 05:54:10'),
(7, 2, 'riziq', 'riziq@gmail.com', 'halal', '2022-10-25 05:54:10'),
(10, 2, 'shihab', 'shihab@gmail.com', 'auenakkk', '2022-10-25 05:54:54'),
(12, 2, 'Caca maharani', 'jajan@gmail.com', 'Mantap', '2022-10-25 04:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAMA_MENU` char(255) DEFAULT NULL,
  `HARGA` char(50) DEFAULT NULL,
  `FOTO_MENU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_MENU`, `ID_KEDAI`, `ID_KATEGORI`, `NAMA_MENU`, `HARGA`, `FOTO_MENU`) VALUES
(2, 2, 2, 'Es Teh', '2.000', '2 Screenshot (22).png'),
(5, 2, 2, 'Coffe beer', '10.000', '1 1666905274 Screenshot (21).png'),
(8, 2, 2, 'Seafood', '25.000', '1 1666905274 Screenshot (21).png'),
(10, 2, 2, 'Soda', '10.000', '1 1666905274 Screenshot (21).png'),
(16, 2, 1, 'Bakso', '10000', '2 Screenshot (22).png');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `ID_PESAN` int(11) NOT NULL,
  `NAMA_PESAN` char(100) DEFAULT NULL,
  `EMAIL_PESAN` char(100) DEFAULT NULL,
  `SUBJECT` char(100) NOT NULL,
  `PESAN` varchar(255) DEFAULT NULL,
  `TANGGAL` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`ID_PESAN`, `NAMA_PESAN`, `EMAIL_PESAN`, `SUBJECT`, `PESAN`, `TANGGAL`) VALUES
(1, 'Molly', 'Molyy@gmail.com', '', 'Nasi Goreng', '2022-10-26 00:00:00'),
(2, 'Habib', 'Habib@gmail.com', '', 'Black Coffe', '2022-10-26 00:00:00'),
(3, 'Bahar', 'Bahar@gmail.com', '', 'Nasi Goreng', '2022-10-26 00:00:00'),
(4, 'Bin', 'Bin@gmail.com', '', 'Seafood', '2022-10-26 00:00:00'),
(5, 'Smith', 'Smithh@gmail.com', '', 'Spagheti', '2022-10-26 00:00:00'),
(6, 'rizieq', 'rizieq@gmail.com', '', 'Black Coffe', '2022-10-26 00:00:00'),
(7, 'Shihab', 'Shihab@gmail.com', '', 'Soda', '2022-10-26 00:00:00'),
(8, 'Billy', 'Billy@gmail.com', '', 'Nasi Goreng', '2022-10-26 00:00:00'),
(9, 'Morgen', 'Morgen@gmail.com', '', 'Seafood', '2022-10-26 00:00:00'),
(10, 'Simbolon', 'Simbolon@gmail.com', '', 'Coffe', '2022-10-26 00:00:00'),
(11, 'Caca maharani', 'erhafikri@gmail.com', 'Asking Question', 'apa hayo\r\n', '2022-10-26 00:00:00'),
(12, 'Caca maharani', 'fikri_erha@gmail.com', 'Partnership With Coffee Land', 'Halo\r\n', '2022-10-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_kedai` int(11) NOT NULL,
  `email` char(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_kedai`, `email`, `password`) VALUES
(2, 2, 'Kandang@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `ADMIN_PK` (`ID_ADMIN`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`ID_KATEGORI`),
  ADD UNIQUE KEY `KATEGORI_MENU_PK` (`ID_KATEGORI`);

--
-- Indexes for table `kedai`
--
ALTER TABLE `kedai`
  ADD PRIMARY KEY (`ID_KEDAI`),
  ADD UNIQUE KEY `KEDAI_PK` (`ID_KEDAI`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`ID_KOMEN`),
  ADD UNIQUE KEY `KOMEN_PK` (`ID_KOMEN`),
  ADD KEY `RELATIONSHIP_3_FK` (`ID_KEDAI`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`),
  ADD UNIQUE KEY `MENU_PK` (`ID_MENU`),
  ADD KEY `RELATIONSHIP_1_FK` (`ID_KEDAI`),
  ADD KEY `RELATIONSHIP_2_FK` (`ID_KATEGORI`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`ID_PESAN`),
  ADD UNIQUE KEY `PESAN_PK` (`ID_PESAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kedai`
--
ALTER TABLE `kedai`
  MODIFY `ID_KEDAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `ID_KOMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `ID_PESAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `FK_KOMEN_RELATIONS_KEDAI` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_MENU_RELATIONS_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori_menu` (`ID_KATEGORI`),
  ADD CONSTRAINT `FK_MENU_RELATIONS_KEDAI` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
