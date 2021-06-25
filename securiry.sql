-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:localhost:3344
-- Generation Time: Feb 10, 2021 at 06:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `securiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `No` int(11) NOT NULL,
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dept` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`No`, `id`, `name`, `password`, `email`, `phone`, `dept`) VALUES
(10, '1', 'Mohan', 'a4d3b161ce1309df1c4e25df28694b7b', 'Mohan@mohan.com', '7093957199', 'CSE'),
(11, '2', 'Emp2', 'e034fb6b66aacc1d48f445ddfb08da98', 'a@a.com', '1111111111', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `security_officers`
--

CREATE TABLE `security_officers` (
  `No` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_officers`
--

INSERT INTO `security_officers` (`No`, `id`, `name`, `password`, `email`, `contact`) VALUES
(12, '1', 'Sec1', 'e034fb6b66aacc1d48f445ddfb08da98', 'test@test.com', '1234567890'),
(13, '2', 'Se2', 'c81e728d9d4c2f636f067f89cc14862c', 'Mohan@mohan.com', '1111111111'),
(14, '3', 'sec3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'm@m.in', '2222222222');

-- --------------------------------------------------------

--
-- Table structure for table `time_Stamp`
--

CREATE TABLE `time_Stamp` (
  `No` bigint(20) NOT NULL,
  `employeeId` varchar(20) NOT NULL,
  `checkOut` datetime NOT NULL DEFAULT current_timestamp(),
  `checkIn` datetime DEFAULT '0000-00-00 00:00:00',
  `verifiedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_Stamp`
--

INSERT INTO `time_Stamp` (`No`, `employeeId`, `checkOut`, `checkIn`, `verifiedBy`) VALUES
(26, '1', '2019-09-25 15:24:59', '2019-09-25 08:09:30', 'Sec1'),
(27, '1', '2019-09-25 21:58:12', '2019-09-26 12:07:30', 'Sec1'),
(28, '1', '2019-09-26 00:29:28', '2019-09-26 09:44:33', 'Sec1'),
(29, '1', '2019-09-26 21:40:01', '2019-09-26 09:40:12', 'sec3'),
(30, '1', '2019-09-26 21:41:47', '2019-09-26 09:42:04', 'sec3'),
(31, '1', '2019-09-26 23:47:02', '2019-09-26 11:50:25', 'sec3'),
(32, '2', '2019-09-26 23:50:28', '2019-09-26 11:50:30', 'sec3'),
(33, '2', '2019-09-26 23:50:51', '2019-09-26 11:50:54', 'sec3'),
(34, '1', '2019-09-26 23:50:57', '2019-09-26 11:50:59', 'sec3'),
(35, '2', '2019-09-26 23:51:01', '2019-09-26 11:51:03', 'sec3'),
(36, '1', '2019-10-22 21:08:12', '2019-10-22 09:08:48', 'Sec1'),
(37, '2', '2019-10-22 21:08:36', '2019-10-22 09:12:50', 'Sec1'),
(38, '1', '2019-10-22 21:11:52', '2019-10-22 09:11:58', 'Sec1'),
(39, '1', '2019-10-23 23:55:03', '2019-10-23 11:55:16', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `security_officers`
--
ALTER TABLE `security_officers`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `time_Stamp`
--
ALTER TABLE `time_Stamp`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `security_officers`
--
ALTER TABLE `security_officers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `time_Stamp`
--
ALTER TABLE `time_Stamp`
  MODIFY `No` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
