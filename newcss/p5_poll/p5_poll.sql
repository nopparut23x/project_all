-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 04:16 AM
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
-- Database: `p5_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE `ans` (
  `ans_id` int(11) NOT NULL,
  `ans_text` varchar(100) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`ans_id`, `ans_text`, `ask_id`, `poll_id`) VALUES
(11, 'ทอง', 7, 3),
(12, 'เหล็ก', 7, 3),
(14, 'อลูมิเนียม', 8, 3),
(15, 'เหล็ก', 8, 3);

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
(7, 'อะไรเอ่ยไม่ลอกไม่ดำจำนำไม่ได้', 3),
(8, 'ผลไม้อะไรมีหลายตา', 3);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL,
  `poll_name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`poll_id`, `poll_name`, `img`, `type_id`, `user_id`) VALUES
(3, 'อาหารไทย', '../assets/img/65b850418a904.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `re_id` int(11) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`re_id`, `ask_id`, `ans_id`, `poll_id`) VALUES
(1, 7, 12, 3),
(2, 8, 14, 3);

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
(1, 'อาหารไทย1');

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
  `usg_status` enum('admin','user') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `tell`, `usg_status`, `status`, `profile`) VALUES
(2, 'นพรัตน์', 'ผู้ดูเเลระบบ', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', 'admin', '1', '../assets/img/65b842b2ef821.png'),
(3, 'นพรัตน์1', 'ผู้ใช้งาน', 'user@gmail.com1', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', 'user', '1', '../assets/img/65b84d1ee0637.png');

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
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
