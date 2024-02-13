-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 07:45 AM
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
-- Database: `p3_vote`
--

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
  `status_vote` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `tell`, `profile`, `status`, `usg_status`, `status_vote`) VALUES
(3, 'นพรัตน์', 'ผู้ดูเเลระบบ', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65a8350d2118b.jpg', '1', 'admin', '1'),
(4, 'นพรัตน์', 'ผู้ใช้งาน', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '80 หมู่ 100', '0956084285', '../assets/img/65a89b187ec52.jpg', '1', 'user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `vote_number` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `vote_number`, `msg`, `time_start`, `time_end`) VALUES
(1, '1', 'พรรคนี้ต้องเลือก', '2024-01-18 11:04:00', '2024-01-19 11:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `vote_score`
--

CREATE TABLE `vote_score` (
  `sc_id` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `time_vote` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote_score`
--

INSERT INTO `vote_score` (`sc_id`, `vote_id`, `score`, `time_vote`, `user_id`) VALUES
(1, 1, '1', '2024-01-18 04:48:29', 4),
(2, 1, '1', '2024-01-18 04:49:09', 4);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `vote_score`
--
ALTER TABLE `vote_score`
  ADD PRIMARY KEY (`sc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote_score`
--
ALTER TABLE `vote_score`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
