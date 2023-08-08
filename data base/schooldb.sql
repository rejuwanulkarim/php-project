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
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `slno` int(11) NOT NULL,
  `id` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `status` varchar(10) NOT NULL,
  `OTP` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`slno`, `id`, `name`, `email`, `phone`, `status`, `OTP`, `create_date`, `last_log`) VALUES
(30, 'JHMKA202374', 'karim', 'rejuwanulkarim@gmail.com', '7478919026', '', '16292', '2023-03-23 13:50:12', '2023-04-24 16:21:05'),
(31, 'JHMSA202374', 'sarfarahj', 'sksarfarajahamed@gmail.com', '7415665', '', '45785', '2023-03-24 20:17:33', '2023-03-24 20:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `slno` int(11) NOT NULL,
  `class` varchar(15) NOT NULL,
  `section` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`slno`, `class`, `section`, `year`) VALUES
(1, 'Class All', 'Sec All', ''),
(2, 'Class I', 'Sec A', ''),
(3, 'Class II', 'Sec B', ''),
(4, 'Class III', 'Sec C', ''),
(5, 'Class IV', 'Sec D', ''),
(6, 'Class V', '', ''),
(7, 'Class VI', '', ''),
(8, 'Class VII', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `slno` int(11) NOT NULL,
  `contacttype` varchar(60) NOT NULL,
  `contactinfo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`slno`, `contacttype`, `contactinfo`) VALUES
(1, 'Phone', '7478919026'),
(2, 'Email', 'adminemain.com'),
(3, 'Facebook', 'https://facebook.com'),
(4, 'Instagram', 'https://instagram.com'),
(5, 'Twitter', 'https://twitter.com'),
(6, 'whatsapp', ' https://wa.me/7478919026'),
(7, 'site', 'http://localhost/karim/school web/');

-- --------------------------------------------------------

--
-- Table structure for table `massages`
--

CREATE TABLE `massages` (
  `slno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nav_item`
--

CREATE TABLE `nav_item` (
  `slno` int(11) NOT NULL,
  `nav_item` varchar(30) NOT NULL,
  `requestname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nav_item`
--

INSERT INTO `nav_item` (`slno`, `nav_item`, `requestname`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Student List', 'studentlist'),
(3, 'Staff List', 'staflist'),
(4, 'Create Admin', 'admincreate'),
(5, 'Announcement', 'announcement'),
(6, 'Setting', 'setting'),
(7, 'Massages', 'massages');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `slno` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `filetype` varchar(5) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`slno`, `title`, `subtitle`, `type`, `filetype`, `date`) VALUES
(81, 'q', 'q', 'q', 'q', 'q'),
(82, 'q', 'q', 'q', '', ''),
(83, 'q', 'q', 'q', 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `slno` int(11) NOT NULL,
  `new_admission` tinyint(1) NOT NULL,
  `readmission` tinyint(1) NOT NULL,
  `student_result` tinyint(1) NOT NULL,
  `home_page` tinyint(1) NOT NULL,
  `teacher_admisssion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`slno`, `new_admission`, `readmission`, `student_result`, `home_page`, `teacher_admisssion`) VALUES
(1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `slno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(60) NOT NULL,
  `OTP` int(6) NOT NULL,
  `address` varchar(155) NOT NULL,
  `joining_date` varchar(14) NOT NULL,
  `id_create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`slno`, `name`, `subject`, `phone`, `email`, `OTP`, `address`, `joining_date`, `id_create_date`) VALUES
(19, 'Md Rejuwanul Karim', 'Bengali', '7478919026', 'rkrejwanulkarim1320@gmail.com', 11994, 'address', '12-12-2000', '2023-04-07 09:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `slno` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `section` varchar(5) NOT NULL,
  `fathers_name` varchar(50) NOT NULL,
  `phone_no` varchar(14) NOT NULL,
  `email` varchar(60) NOT NULL,
  `OTP` int(6) NOT NULL,
  `address` varchar(120) NOT NULL,
  `roll_no` int(5) NOT NULL,
  `year` varchar(6) NOT NULL,
  `admission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bengali_theo` int(4) NOT NULL,
  `english_theo` int(4) NOT NULL,
  `math_theo` int(4) NOT NULL,
  `history_theo` int(4) NOT NULL,
  `geography_theo` int(4) NOT NULL,
  `life_science_theo` int(4) NOT NULL,
  `physical_science_theo` int(4) NOT NULL,
  `work_education` int(4) NOT NULL,
  `bengali_oral` int(4) NOT NULL,
  `english_oral` int(4) NOT NULL,
  `math_oral` int(4) NOT NULL,
  `history_oral` int(4) NOT NULL,
  `geography_oral` int(4) NOT NULL,
  `life_science_oral` int(4) NOT NULL,
  `physical_science_oral` int(4) NOT NULL,
  `arabic_oral` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`slno`, `id`, `name`, `class`, `gender`, `DOB`, `section`, `fathers_name`, `phone_no`, `email`, `OTP`, `address`, `roll_no`, `year`, `admission_date`, `bengali_theo`, `english_theo`, `math_theo`, `history_theo`, `geography_theo`, `life_science_theo`, `physical_science_theo`, `work_education`, `bengali_oral`, `english_oral`, `math_oral`, `history_oral`, `geography_oral`, `life_science_oral`, `physical_science_oral`, `arabic_oral`) VALUES
(19, 'JHM2022020212', 'mizanur', 'II', '', '', 'B', 'Md Khairul Islam', '7478919026', 'killall1040@gmail.com', 19466, 'address', 1, '2023', '2023-04-07 08:16:45', 90, 43, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0),
(64, '', 'karim', 'Class', 'Male', '2000-12-02T00:00', '', 'jhgfdx', '741', 'rkrejwanukarim1320@gmail.com', 0, 'address is empty', 0, '2023', '2023-04-03 20:55:15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, '', 'q', 'Class', 'Male', '2003-12-02T10:10', '', 'q', '7451', 'q@gmail.com', 0, 'address is empty', 0, '2023', '2023-04-20 20:18:55', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `slno` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `transection_id` varchar(100) NOT NULL,
  `card_upi_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_payments`
--

INSERT INTO `student_payments` (`slno`, `student_id`, `payment_mode`, `payment_status`, `payment_type`, `transection_id`, `card_upi_id`, `date`) VALUES
(1, 'JHM20230202', 'online', 'success', 'master card', '848313514588213531', '1234567890@upi', '2023-03-13 03:19:26'),
(2, 'JHM20230202', 'online', 'success', 'master card', '848313514588213531', '1234567890@upi', '2023-03-13 03:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `slno` int(11) NOT NULL,
  `roll_no` varchar(5) NOT NULL,
  `bengali` int(4) NOT NULL,
  `english` int(4) NOT NULL,
  `math` int(4) NOT NULL,
  `history` int(4) NOT NULL,
  `geography` int(4) NOT NULL,
  `life_science` int(4) NOT NULL,
  `physical_science` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`slno`, `roll_no`, `bengali`, `english`, `math`, `history`, `geography`, `life_science`, `physical_science`) VALUES
(1, '5', 1, 2, 3, 4, 5, 6, 7),
(2, '7', 41, 54, 52, 80, 62, 91, 73);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `slno` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`slno`, `subject`) VALUES
(1, 'Bengali'),
(2, 'English'),
(3, 'Math'),
(5, 'Geography'),
(6, 'L.sc.'),
(7, 'Ph.sc.'),
(8, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `slno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`slno`, `name`) VALUES
(1, 'testing'),
(3, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `massages`
--
ALTER TABLE `massages`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `nav_item`
--
ALTER TABLE `nav_item`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `massages`
--
ALTER TABLE `massages`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nav_item`
--
ALTER TABLE `nav_item`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
