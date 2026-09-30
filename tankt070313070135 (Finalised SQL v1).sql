-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 11:28 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tankt070313070135`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahlikelab`
--

CREATE TABLE `ahlikelab` (
  `IDahli` varchar(10) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Jantina` varchar(10) NOT NULL,
  `Kodkelas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahlikelab`
--

INSERT INTO `ahlikelab` (`IDahli`, `Nama`, `Jantina`, `Kodkelas`) VALUES
('19420', 'Fang Fang', 'Perempuan', 'K1'),
('20069', 'Olivia', 'Perempuan', 'K2'),
('20313', 'Jia Wei', 'Lelaki', 'K3');

-- --------------------------------------------------------

--
-- Table structure for table `infoaktiviti`
--

CREATE TABLE `infoaktiviti` (
  `IDaktiviti` varchar(20) NOT NULL,
  `Kodaktiviti` varchar(20) NOT NULL,
  `Tempat` varchar(20) NOT NULL,
  `Tarikh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infoaktiviti`
--

INSERT INTO `infoaktiviti` (`IDaktiviti`, `Kodaktiviti`, `Tempat`, `Tarikh`) VALUES
('KAB0101', 'J1', 'Kelas 1C', '2023-01-22'),
('KAB0202', 'J2', 'Dewan', '2023-04-22'),
('KAB0303', 'J3', 'BG2', '2023-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `jenisaktiviti`
--

CREATE TABLE `jenisaktiviti` (
  `Kodaktiviti` varchar(20) NOT NULL,
  `Jenisaktiviti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisaktiviti`
--

INSERT INTO `jenisaktiviti` (`Kodaktiviti`, `Jenisaktiviti`) VALUES
('J1', 'Biasa'),
('J2', 'Ajaran Sami'),
('J3', 'Permainan');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `IDahli` varchar(5) NOT NULL,
  `IDaktiviti` varchar(7) NOT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`IDahli`, `IDaktiviti`, `status`) VALUES
('19420', 'KAB0101', 'YA'),
('19420', 'KAB0202', 'YA'),
('19420', 'KAB0303', 'YA'),
('20069', 'KAB0101', 'YA'),
('20069', 'KAB0202', 'TIDAK'),
('20069', 'KAB0303', 'YA'),
('20313', 'KAB0101', 'YA'),
('20313', 'KAB0202', 'YA'),
('20313', 'KAB0303', 'TIDAK');

-- --------------------------------------------------------

--
-- Table structure for table `kodkelas`
--

CREATE TABLE `kodkelas` (
  `Kodkelas` varchar(3) NOT NULL,
  `Kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodkelas`
--

INSERT INTO `kodkelas` (`Kodkelas`, `Kelas`) VALUES
('K1', '4S1'),
('K2', '5S2'),
('K3', '4T2');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IDahli` varchar(20) NOT NULL,
  `KataLaluan` varchar(20) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IDahli`, `KataLaluan`, `Nama`) VALUES
('19420', 'Fang Fang', 'Fang Fang'),
('20069', 'Olivia', 'Olivia'),
('20313', 'Jia Wei', 'Jia Wei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahlikelab`
--
ALTER TABLE `ahlikelab`
  ADD PRIMARY KEY (`IDahli`),
  ADD UNIQUE KEY `Nama` (`Nama`),
  ADD KEY `Kodkelas` (`Kodkelas`);

--
-- Indexes for table `infoaktiviti`
--
ALTER TABLE `infoaktiviti`
  ADD PRIMARY KEY (`IDaktiviti`),
  ADD KEY `Kodaktiviti` (`Kodaktiviti`);

--
-- Indexes for table `jenisaktiviti`
--
ALTER TABLE `jenisaktiviti`
  ADD PRIMARY KEY (`Kodaktiviti`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`IDahli`,`IDaktiviti`),
  ADD KEY `IDaktiviti` (`IDaktiviti`);

--
-- Indexes for table `kodkelas`
--
ALTER TABLE `kodkelas`
  ADD PRIMARY KEY (`Kodkelas`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IDahli`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ahlikelab`
--
ALTER TABLE `ahlikelab`
  ADD CONSTRAINT `Kodkelas` FOREIGN KEY (`Kodkelas`) REFERENCES `kodkelas` (`Kodkelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `infoaktiviti`
--
ALTER TABLE `infoaktiviti`
  ADD CONSTRAINT `Kodaktiviti` FOREIGN KEY (`Kodaktiviti`) REFERENCES `jenisaktiviti` (`Kodaktiviti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `IDahli` FOREIGN KEY (`IDahli`) REFERENCES `ahlikelab` (`IDahli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDaktiviti` FOREIGN KEY (`IDaktiviti`) REFERENCES `infoaktiviti` (`IDaktiviti`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
