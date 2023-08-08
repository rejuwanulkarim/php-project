-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 12:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `slno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `OTP` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`slno`, `name`, `username`, `password`, `OTP`) VALUES
(3, '', 'rejuwanulkarim@gmail.com', '$2y$10$LCwYZhvcaaEAo7Ksu8JIaOSzy8z06MYssJtrM8mi3plDqQQfZyum.', 823749);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `slno` int(11) NOT NULL,
  `history` varchar(255) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mystore`
--

CREATE TABLE `mystore` (
  `slno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `print_quantity` int(5) NOT NULL,
  `cost` double NOT NULL,
  `print_type` varchar(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `total_price` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mystore`
--

INSERT INTO `mystore` (`slno`, `name`, `print_quantity`, `cost`, `print_type`, `payment_type`, `total_price`, `date`) VALUES
(133, 'Q', 44, 44, 'bp', 'online', 1936, '2023-06-06 19:29:23'),
(135, 'Md Rejuwanul Karim', 5, 5, 'bp', 'Due', 25, '2023-06-06 21:12:26'),
(136, 'Md Rejuwanul Karim', 44, 1, 'bp', 'Due', 44, '2023-06-06 21:12:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `mystore`
--
ALTER TABLE `mystore`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mystore`
--
ALTER TABLE `mystore`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
