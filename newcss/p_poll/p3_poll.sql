-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 07:51 AM
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
-- Database: `p3_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE `ans` (
  `ans_id` int(11) NOT NULL,
  `ans_name` varchar(100) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`ans_id`, `ans_name`, `ask_id`, `poll_id`) VALUES
(5, 'ทอง', 5, 0),
(6, 'เหล็ก', 5, 0),
(7, 'อลูมิเนียม', 5, 0),
(8, 'สัปรด', 6, 0),
(16, 'ทอง', 14, 4),
(17, 'เหล็ก', 14, 4),
(18, 'อลูมิเนียม', 14, 4),
(26, '123123', 17, 6),
(27, '124124', 17, 6),
(28, '12322', 17, 6),
(31, '123', 19, 6),
(33, '4444', 19, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `ask_id` int(11) NOT NULL,
  `ask_text` varchar(100) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`ask_id`, `ask_text`, `poll_id`) VALUES
(14, 'อะไรเอ่ยไม่ลอกไม่ดำจำนำไม่ได้', 4),
(17, 'อะไรเอ่ยไม่ลอก444ไม่ดำจำนำไม่ได้', 6),
(19, 'อะไรเอ่ยไม่ลอกไม่ดำจำ11นำไม่ได้1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`poll_id`, `profile`, `name`, `user_id`, `type_id`, `time`) VALUES
(4, '../assets/img/65af1037204c4.jpg', 'ของกิน1', 2, 1, '2024-01-23 01:11:34'),
(6, '../assets/img/65b08b7d87cc2.jpg', '123', 2, 1, '2024-01-24 04:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `re_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`re_id`, `ans_id`, `ask_id`, `poll_id`) VALUES
(6, 26, 17, 6),
(7, 33, 19, 6),
(8, 27, 17, 6),
(9, 31, 19, 6),
(10, 27, 17, 6),
(11, 31, 19, 6);

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
(1, 'ประเภทให้ความรุ็');

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
  `usg_status` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `tell`, `profile`, `status`, `usg_status`) VALUES
(1, 'นพรัตน์', 'ผู้ดูเเลระบบ1', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65af3acf432eb.gif', '1', 'admin'),
(2, 'นพรัตน์', 'ผู้ใช้งาน', 'user@gmail.com1', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65af010b652d3.png', '1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans`
--
ALTER TABLE `ans`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`ask_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`re_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans`
--
ALTER TABLE `ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
