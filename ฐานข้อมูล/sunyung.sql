-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 08:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunyung`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `typeID` char(5) NOT NULL,
  `nametype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`typeID`, `nametype`) VALUES
('t01', 'รถทั่วไป'),
('t02', 'รถแข่งขัน');

-- --------------------------------------------------------

--
-- Table structure for table `procar`
--

CREATE TABLE `procar` (
  `crID` char(5) NOT NULL,
  `crName` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `imgs` char(40) NOT NULL,
  `typeID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `procar`
--

INSERT INTO `procar` (`crID`, `crName`, `price`, `imgs`, `typeID`) VALUES
('camry', 'Toyota', 650000, 'CAMRY-1.jpg', 't02'),
('naval', 'Nissan', 1200000, 'navala.png', 't01'),
('voroz', 'Toyota', 4000000, 'abc-dsc_0105-copy-750x420.jpg', 't01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `procar`
--
ALTER TABLE `procar`
  ADD PRIMARY KEY (`crID`),
  ADD KEY `typeID` (`typeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `procar`
--
ALTER TABLE `procar`
  ADD CONSTRAINT `fk` FOREIGN KEY (`typeID`) REFERENCES `car_type` (`typeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
