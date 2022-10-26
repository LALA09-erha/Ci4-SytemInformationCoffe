-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 08:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `USERNAME` char(100) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
(1, 'caca', '123'),
(2, 'lala', '1234'),
(3, 'lili', '12345'),
(4, 'lele', '123456'),
(5, 'rafa', '4321'),
(6, 'rafi', '321'),
(7, 'rere', '21'),
(8, 'reza', '1'),
(9, 'rara', '987'),
(10, 'rani', '98');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `ID_KATEGORI` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
  `ID_KEDAI` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(1, 'Basecamp', 'Cafe untuk umum', 'Manggisan, Burneh, Bangkalan Regency, East Java 69121', '00:00:00', '00:00:00', ' 0823-3757-5604', 'basecamp', 'inifoto'),
(2, 'Kandang Kopi Bangkalan', 'Cafe untuk umum', 'Jl. RE. Martadinata No.07', '13:25:58', '00:00:00', '0855-4900-0031', 'kandang-kopi-bangkalan', 'inifotokedai');

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `ID_KOMEN` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(1, 1, 'lala', 'lala@gmail.com', 'hahahaha', '2022-10-23 21:03:51'),
(2, 2, 'jaja', 'jaja@gmail.com', 'mantap', '2022-10-23 21:03:51'),
(3, 1, 'PAPA', 'papa@gmail.com', 'mantao', '2022-10-23 21:26:30'),
(4, 2, 'reno', 'reno@gmail.com', 'asek', '2022-10-25 05:51:03'),
(5, 1, 'rozak', 'rozak@gmail.com', 'mantafff', '2022-10-25 05:54:10'),
(6, 2, 'rozy', 'rozy@gmail.com', 'jos', '2022-10-25 05:54:10'),
(7, 2, 'riziq', 'riziq@gmail.com', 'halal', '2022-10-25 05:54:10'),
(8, 1, 'bahar', 'bahar@gmail.com', 'halal', '2022-10-25 05:54:10'),
(9, 1, 'smith', 'smith@gmail.com', 'barokah', '2022-10-25 05:54:10'),
(10, 2, 'shihab', 'shihab@gmail.com', 'auenakkk', '2022-10-25 05:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(1, 1, 1, 'Bakso', '10.000', ''),
(2, 2, 2, 'Es Teh', '2.000', ''),
(3, 1, 1, 'Nasi Goreng', '10.000', 'da'),
(4, 1, 1, 'Bakmie', '25.000', ''),
(5, 2, 2, 'Coffe beer', '10.000', ''),
(7, 1, 2, 'Black Coffe', '5.000', ''),
(8, 2, 2, 'Seafood', '25.000', ''),
(9, 1, 2, 'Bintang', '30.000', ''),
(10, 2, 2, 'Soda', '10.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `ID_PESAN` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `NAMA_PESAN` char(100) DEFAULT NULL,
  `EMAIL_PESAN` char(100) DEFAULT NULL,
  `PESAN_KEINGINAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`ID_PESAN`, `NAMA_PESAN`, `EMAIL_PESAN`, `PESAN_KEINGINAN`) VALUES
(1, 'Molly', 'Molyy@gmail.com', 'Nasi Goreng'),
(2, 'Habib', 'Habib@gmail.com', 'Black Coffe'),
(3, 'Bahar', 'Bahar@gmail.com', 'Nasi Goreng'),
(4, 'Bin', 'Bin@gmail.com', 'Seafood'),
(5, 'Smith', 'Smithh@gmail.com', 'Spagheti'),
(6, 'rizieq', 'rizieq@gmail.com', 'Black Coffe'),
(7, 'Shihab', 'Shihab@gmail.com', 'Soda'),
(8, 'Billy', 'Billy@gmail.com', 'Nasi Goreng'),
(9, 'Morgen', 'Morgen@gmail.com', 'Seafood'),
(10, 'Simbolon', 'Simbolon@gmail.com', 'Coffe');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ID_RATING` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `NAMA_PENGIRIM` char(100) DEFAULT NULL,
  `NILAI_RATING` int(11) DEFAULT NULL,
  `EMAIL_RATING` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ID_RATING`, `ID_KEDAI`, `NAMA_PENGIRIM`, `NILAI_RATING`, `EMAIL_RATING`) VALUES
(1, 1, 'Habib', 5, 'Habib@gmail.com'),
(2, 2, 'Bahar', 5, 'Bahar@gmail.com'),
(3, 1, 'Bin', 3, 'Bin@gmail.com'),
(4, 2, 'smith', 5, 'smith@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  
  ADD UNIQUE KEY `ADMIN_PK` (`ID_ADMIN`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  
  ADD UNIQUE KEY `KATEGORI_MENU_PK` (`ID_KATEGORI`);

--
-- Indexes for table `kedai`
--
ALTER TABLE `kedai`
  
  ADD UNIQUE KEY `KEDAI_PK` (`ID_KEDAI`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  
  ADD UNIQUE KEY `KOMEN_PK` (`ID_KOMEN`),
  ADD KEY `RELATIONSHIP_3_FK` (`ID_KEDAI`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  
  ADD UNIQUE KEY `MENU_PK` (`ID_MENU`),
  ADD KEY `RELATIONSHIP_1_FK` (`ID_KEDAI`),
  ADD KEY `RELATIONSHIP_2_FK` (`ID_KATEGORI`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  
  ADD UNIQUE KEY `PESAN_PK` (`ID_PESAN`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  
  ADD UNIQUE KEY `RATING_PK` (`ID_RATING`),
  ADD KEY `RELATIONSHIP_4_FK` (`ID_KEDAI`);

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

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_RATING_RELATIONS_KEDAI` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
