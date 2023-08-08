-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 08:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_info`
--

CREATE TABLE `all_info` (
  `slno` int(11) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NickName` varchar(15) NOT NULL,
  `LastLogin` varchar(10) NOT NULL,
  `LastLogout` varchar(10) NOT NULL,
  `VaultUName` varchar(50) NOT NULL,
  `VaultPassword` varchar(500) NOT NULL,
  `VaultStatus` varchar(10) NOT NULL,
  `AdminPower` varchar(10) NOT NULL,
  `AccountCreateDateTime` datetime NOT NULL,
  `VaultValue` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_info`
--

INSERT INTO `all_info` (`slno`, `Gmail`, `Password`, `Name`, `NickName`, `LastLogin`, `LastLogout`, `VaultUName`, `VaultPassword`, `VaultStatus`, `AdminPower`, `AccountCreateDateTime`, `VaultValue`) VALUES
(3, 'rejuwanulkarim@gmail.com', '$2y$10$szt8TMD9fZlH7wW2IurvbuOs/sk5cDBHmuubfugKy1yW881dgq8/C', 'Md Rejuwanul Karim', 'Rejuwan', 'null', 'null', 'Rejuwanul_Karim', '$2y$10$CN3pfbSXLSnxss2W30z7Yu/bWhCGogCBUYXUoNeTe5c8Ew.d/s7UC', 'active', '1', '2022-12-11 11:34:16', 1),
(4, 'nasifasahadat@gmail.com', '$2y$10$E0CvffwsaBlWhAzkDBBhjuijXOE8T.nrGZmbOAekx5/w733VTHQF2', 'Nasifa sahadat', 'Nasifa', 'null', 'null', 'nasifasahadat@gmail.com', '$2y$10$VcF4I7/jCv22qujUQNzm8eAr8cuCaBoOppKL13IlQHTIv2g1hwmbu', 'active', '0', '2022-12-16 17:54:38', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_info`
--
ALTER TABLE `all_info`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_info`
--
ALTER TABLE `all_info`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
