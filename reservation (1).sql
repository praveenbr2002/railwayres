-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 06:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `PNR` bigint(11) NOT NULL,
  `Train_No` int(11) NOT NULL,
  `Origin` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `Number_Of_Passengers` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Payment_Status` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`PNR`, `Train_No`, `Origin`, `Destination`, `Number_Of_Passengers`, `Date`, `Payment_Status`, `Name`) VALUES
(12345678912345, 65432, 'CHENNAI', 'DELHI', 6, '2021-04-11', 1, 'xxx'),
(12345678912346, 65432, 'CHENNAI', 'DELHI', 3, '2021-04-22', 1, 'Sam'),
(12345678912349, 65423, 'DELHI', 'CHENNAI', 5, '2021-04-30', 1, 'Sam');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `Train_No` int(11) NOT NULL,
  `Origin` varchar(20) NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `Train_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`Train_No`, `Origin`, `Destination`, `Train_Name`) VALUES
(12345, 'CHENNAI', 'MUMBAI', 'CHENNAI-MUMBAI EXP'),
(12354, 'MUMBAI', 'CHENNAI', 'MUMBAI-CHENNAI EXP'),
(25168, 'DELHI', 'KOLKATA', 'DELHI-KOLKATA EXP'),
(25186, 'KOLKATA', 'DELHI', 'KOLKATA-DELHI EXP'),
(34815, 'KOLKATA', 'MUMBAI', 'KOLKATA-MUMBAI EXP'),
(34851, 'MUMBAI', 'KOLKATA', 'MUMBAI-KOLKATA EXP'),
(45812, 'KOLKATA', 'CHENNAI', 'KOLKATA-CHENNAI EXP'),
(45821, 'CHENNAI', 'KOLKATA', 'CHENNAI-KOLKATA EXP'),
(65423, 'DELHI', 'CHENNAI', 'DELHI-CHENNAI EXP'),
(65432, 'CHENNAI', 'DELHI', 'CHENNAI-DELHI EXP'),
(75846, 'DELHI', 'MUMBAI', 'DELHI-MUMBAI EXP'),
(75864, 'MUMBAI', 'DELHI', 'MUMBAI-DELHI EXP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Password`) VALUES
('admin', 'admin'),
('Kowshik', 'kowshik'),
('Praveen', 'praveen'),
('Rohit', 'rohit'),
('Sam', 'sam'),
('xxx', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`PNR`),
  ADD UNIQUE KEY `PNR_UNIQUE` (`PNR`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`Train_No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `PNR` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345678912350;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
