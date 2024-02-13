-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 10:42 PM
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
-- Database: `p5_vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `time_vote` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `user_id`, `vote_id`, `score`, `time_vote`) VALUES
(1, 4, 1, '1', '2024-01-30 21:25:42'),
(2, 4, 1, '1', '2024-01-30 21:29:39'),
(3, 5, 1, '1', '2024-01-30 21:40:13');

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
  `profile` varchar(100) NOT NULL,
  `vote_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `tell`, `usg_status`, `status`, `profile`, `vote_status`) VALUES
(3, 'นพรัตน์', 'ผู้ดูเเลระบบ', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', 'admin', '1', '../assets/img/65b94d1f23f73.png', '0'),
(4, 'นพรัตน์', 'ผู้ใช้งาน', 'user@gmail.com1', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', 'user', '1', '../assets/img/65b95a9f5e099.png', '0'),
(5, 'นพรัตน์', 'ผู้ใช้งาน', 'user@gmail.com2', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', 'user', '1', '../assets/img/65b96cb4c4ef1.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `vote_number` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `policy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `vote_number`, `fullname`, `img`, `time_start`, `time_end`, `policy`) VALUES
(1, '1', 'ก้าวไกล', '../assets/img/65b961dd0d3cc.jpg', '2024-01-31 03:44:00', '2024-02-01 03:44:00', 'ไม่สบายไปหาหมอฟรี'),
(2, '2', 'ก้าวไกล2', '../assets/img/65b96cde8227f.jpg', '2024-01-31 04:40:00', '2024-02-01 04:40:00', 'ไม่สบายไปหาหมอฟรี2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
