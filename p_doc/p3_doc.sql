-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 08:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p3_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `de_id` int(11) NOT NULL,
  `de_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`de_id`, `de_name`) VALUES
(2, 'เเผนกคอมพิวเตอร์'),
(3, 'เเผนกไอที');

-- --------------------------------------------------------

--
-- Table structure for table `department_send`
--

CREATE TABLE `department_send` (
  `de_se_id` int(11) NOT NULL,
  `user_id_se` int(11) NOT NULL,
  `department_id_se` int(11) NOT NULL,
  `department_id_re` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `time_send` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_send`
--

INSERT INTO `department_send` (`de_se_id`, `user_id_se`, `department_id_se`, `department_id_re`, `text`, `file`, `type_id`, `time_send`) VALUES
(1, 3, 3, 2, 'ส่งให้เเค่นี้ก่อน', '../assets/file/65ae1830d9a53.jpg', 1, '2024-01-22 07:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'เอกสารการเงิน'),
(2, 'เอกสารงานทะเบียน');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tell` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `usg_status` enum('user','admin') NOT NULL,
  `de_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `tell`, `profile`, `status`, `usg_status`, `de_id`) VALUES
(1, 'นพรัตน์1', 'ผู้ดูเเลระบบ', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65ade3f015141.jpg', '1', 'admin', 2),
(2, 'นพรัตน์', 'บัญชี', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65ade617714dd.jpg', '1', 'user', 2),
(3, 'นพรัตน์', 'ผู้ใช้งาน', 'user@gmail.com2', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65adf03a1db27.jpg', '1', 'user', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_send`
--

CREATE TABLE `user_send` (
  `use_se_id` int(11) NOT NULL,
  `user_id_se` int(11) NOT NULL,
  `user_id_re` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `time_send` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_send`
--

INSERT INTO `user_send` (`use_se_id`, `user_id_se`, `user_id_re`, `type_id`, `text`, `file`, `time_send`) VALUES
(2, 2, 3, 1, '112', '../assets/file/65ae11f60825f.jpg', '2024-01-22 06:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `department_send`
--
ALTER TABLE `department_send`
  ADD PRIMARY KEY (`de_se_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_send`
--
ALTER TABLE `user_send`
  ADD PRIMARY KEY (`use_se_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_send`
--
ALTER TABLE `department_send`
  MODIFY `de_se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_send`
--
ALTER TABLE `user_send`
  MODIFY `use_se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
