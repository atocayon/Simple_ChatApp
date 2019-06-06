-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2018 at 07:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--
CREATE DATABASE chatbox;USE chatbox;
-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `thread_num` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`thread_num`, `user1`, `user2`) VALUES
(367095685, 1, 3),
(1015790616, 2, 3),
(1990243601, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg_logs`
--

CREATE TABLE `msg_logs` (
  `msg_id` int(11) NOT NULL,
  `thread_num` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `msg` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_logs`
--

INSERT INTO `msg_logs` (`msg_id`, `thread_num`, `sender`, `receiver`, `msg`, `time_stamp`) VALUES
(1, 1990243601, 2, 1, 'from client', '2018-03-04 02:36:49'),
(2, 1990243601, 1, 2, 'from admin', '2018-03-04 02:46:21'),
(3, 1990243601, 2, 1, 'from client', '2018-03-04 04:52:36'),
(4, 1015790616, 2, 3, 'from client', '2018-03-04 05:10:16'),
(5, 367095685, 1, 3, 'from admin', '2018-03-04 05:10:52'),
(6, 367095685, 3, 1, 'from client2', '2018-03-04 05:11:33'),
(7, 1015790616, 3, 2, 'from client2', '2018-03-04 05:11:45'),
(8, 367095685, 1, 3, 'from admin', '2018-03-05 15:26:42'),
(9, 367095685, 1, 3, 'ded', '2018-03-05 15:32:46'),
(10, 367095685, 1, 3, 'hi', '2018-03-05 15:37:12'),
(11, 367095685, 1, 3, 'hi', '2018-03-05 15:37:54'),
(12, 367095685, 1, 3, 'hi', '2018-03-05 15:38:48'),
(13, 367095685, 1, 3, 'hi', '2018-03-05 15:39:43'),
(14, 367095685, 1, 3, 'test', '2018-03-05 15:43:57'),
(15, 367095685, 1, 3, 'another test', '2018-03-05 15:45:13'),
(16, 367095685, 1, 3, 'sample', '2018-03-05 15:46:24'),
(17, 367095685, 1, 3, 'sample', '2018-03-05 15:47:27'),
(18, 367095685, 1, 3, 'ex', '2018-03-05 15:47:42'),
(19, 367095685, 1, 3, 'dsa', '2018-03-05 15:49:22'),
(20, 367095685, 1, 3, 'qwe', '2018-03-05 16:03:16'),
(21, 367095685, 1, 3, 'qwe', '2018-03-05 16:04:42'),
(22, 367095685, 1, 3, 'qwe', '2018-03-05 16:05:01'),
(23, 367095685, 1, 3, 'qwe', '2018-03-05 16:05:47'),
(24, 367095685, 1, 3, 'qwe', '2018-03-05 16:06:25'),
(25, 367095685, 1, 3, 'qwe', '2018-03-05 16:07:06'),
(26, 367095685, 1, 3, 'qwe', '2018-03-05 16:07:25'),
(27, 367095685, 1, 3, 'qwe', '2018-03-05 16:07:39'),
(28, 367095685, 1, 3, 'qwe', '2018-03-05 16:09:37'),
(29, 367095685, 1, 3, 'qwe', '2018-03-05 16:10:54'),
(30, 367095685, 1, 3, 'qwe', '2018-03-05 16:13:10'),
(31, 367095685, 1, 3, 'qwe', '2018-03-05 16:13:42'),
(32, 367095685, 1, 3, 'qwe', '2018-03-05 16:13:56'),
(33, 367095685, 1, 3, 'qwe', '2018-03-05 16:21:12'),
(34, 367095685, 1, 3, 'da', '2018-03-05 16:21:38'),
(35, 367095685, 1, 3, 'da', '2018-03-05 16:22:27'),
(36, 367095685, 1, 3, 'ga', '2018-03-05 16:25:56'),
(37, 367095685, 1, 3, 'done\r\n', '2018-03-05 16:26:37'),
(38, 367095685, 1, 3, 'done\r\n', '2018-03-05 16:27:06'),
(39, 367095685, 1, 3, 'done\r\n', '2018-03-05 16:27:18'),
(40, 367095685, 1, 3, 'done\r\n', '2018-03-05 16:27:26'),
(41, 367095685, 1, 3, 'done\r\n', '2018-03-05 16:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'client', 'client'),
(3, 'client2', 'client2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`thread_num`),
  ADD KEY `user1` (`user1`),
  ADD KEY `user2` (`user2`);

--
-- Indexes for table `msg_logs`
--
ALTER TABLE `msg_logs`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `thread_num` (`thread_num`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msg_logs`
--
ALTER TABLE `msg_logs`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `users` (`id`);

--
-- Constraints for table `msg_logs`
--
ALTER TABLE `msg_logs`
  ADD CONSTRAINT `msg_logs_ibfk_1` FOREIGN KEY (`thread_num`) REFERENCES `logs` (`thread_num`),
  ADD CONSTRAINT `msg_logs_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `msg_logs_ibfk_3` FOREIGN KEY (`receiver`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
