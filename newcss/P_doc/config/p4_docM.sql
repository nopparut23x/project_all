-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 01:31 AM
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
-- Database: `p4_doc`
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
(7, 'เเผนกเทคโนโลยีสารสนเทศ'),
(8, 'เเผนกคอมพิวเตอร์ธุรกิจ'),
(9, 'เเผนกช่างโยธา'),
(10, 'เเผนกการบัญชี'),
(11, 'เเผนกช่างไฟฟ้ากำลัง'),
(12, 'เเผนกช่างเชื่อมโลหะ');

-- --------------------------------------------------------

--
-- Table structure for table `send_department`
--

CREATE TABLE `send_department` (
  `send_de_id` int(11) NOT NULL,
  `user_id_se` int(11) NOT NULL,
  `de_id_se` int(11) NOT NULL,
  `de_id_re` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `time_send` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type_id` int(11) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `send_department`
--

INSERT INTO `send_department` (`send_de_id`, `user_id_se`, `de_id_se`, `de_id_re`, `file`, `time_send`, `type_id`, `text`) VALUES
(3, 5, 7, 8, '../assets/file/65b6edc9cfe8c.pdf', '2024-01-29 00:14:01', 3, 'ทดสอบระบบ'),
(4, 6, 8, 8, '../assets/file/65b6edf91c1b8.pdf', '2024-01-29 00:14:49', 5, 'ทดสอบระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `send_user`
--

CREATE TABLE `send_user` (
  `send_id_user` int(11) NOT NULL,
  `user_id_se` int(11) NOT NULL,
  `user_id_re` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `time_send` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `send_user`
--

INSERT INTO `send_user` (`send_id_user`, `user_id_se`, `user_id_re`, `file`, `text`, `type_id`, `time_send`) VALUES
(3, 5, 6, '../assets/file/65b6edb8d2383.pdf', 'ทดสอบระบบ', 2, '2024-01-29 00:13:44'),
(4, 6, 5, '../assets/file/65b6edeb42635.pdf', 'ทดสอบระบบ', 4, '2024-01-29 00:14:35');

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
(2, 'เอกสารการเงิน'),
(3, 'เอกสารงานทะเบียน'),
(4, 'เอกสารงานกิจกรรม'),
(5, 'เอกสารงานวัดผลเเละประเมินผล');

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
(2, 'นพรัตน์', '0', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65b6ba8a39edc.png', '1', 'admin', 0),
(5, 'นพรัตน์', 'ผู้ใช้งาน', 'user@gmail.com1', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65b6ece8a4fb0.png', '1', 'user', 7),
(6, 'วริศ', 'ผู้ใช้งาน', 'user@gmail.com2', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65b6ecfb5063e.png', '1', 'user', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `send_department`
--
ALTER TABLE `send_department`
  ADD PRIMARY KEY (`send_de_id`);

--
-- Indexes for table `send_user`
--
ALTER TABLE `send_user`
  ADD PRIMARY KEY (`send_id_user`);

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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `send_department`
--
ALTER TABLE `send_department`
  MODIFY `send_de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `send_user`
--
ALTER TABLE `send_user`
  MODIFY `send_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
