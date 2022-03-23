-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 05:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_score`
--

CREATE TABLE `quiz_score` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_score`
--

INSERT INTO `quiz_score` (`id`, `user_id`, `score`, `timestamp`) VALUES
(10, 5, 3, '2022-03-22 04:05:11'),
(11, 2, 1, '2022-03-22 04:06:13'),
(12, 7, 0, '2022-03-22 09:06:36'),
(13, 8, 1, '2022-03-22 11:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `class` varchar(111) NOT NULL,
  `phone_no` varchar(111) NOT NULL,
  `gender` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `timestamp` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'name', 'dscsd', '12', '2022-03-21 04:21:29'),
(2, 'himanshu', 'test@gmail.com', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-21 04:21:57'),
(3, 'himanshu Kumar', 'himanshu1110001@gmail.com', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-21 04:27:22'),
(4, 'test', 'test1@gmail.com', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-21 04:58:36'),
(5, 'himanshu', 'himanshu@gmail.com', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-21 11:40:28'),
(7, 'new user', 'new@gmail.com', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-22 09:05:22'),
(8, 'test user', 'testing@gmail.com', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-22 11:03:05'),
(9, 'himanshu', 'sccds@dscsdc.sd', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-23 02:24:13'),
(10, 'himanshu', 'vs@dsacs.csa', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-23 02:25:40'),
(12, 'csd', 'csdcsd@cds.cds', '$2y$10$csdcACSEcwrwcweCEWCWwOT.vEfM4emzED1PWhSCwJvj7VqsuMaAi', '2022-03-23 02:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_score`
--
ALTER TABLE `quiz_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_score`
--
ALTER TABLE `quiz_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
