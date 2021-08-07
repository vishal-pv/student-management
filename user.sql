-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 02:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adduserproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_no` int(255) NOT NULL,
  `dob` date NOT NULL,
  `percentage` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `roll_no`, `dob`, `percentage`, `created_at`) VALUES
(4, 'Shivani soni', 50, '2021-05-07', 889, '2021-05-17 15:51:51'),
(6, 'Rupali', 143, '2021-05-07', 75, '2021-05-18 05:17:12'),
(8, 'Sonal', 22, '2021-05-13', 85, '2021-05-18 09:41:45'),
(9, 'Bhavana', 15, '1996-01-19', 80, '2021-05-18 12:20:31'),
(10, 'Shyam', 12, '2016-02-12', 60, '2021-05-18 12:26:42'),
(11, 'Pratik', 11, '1998-11-14', 90, '2021-05-18 16:16:29'),
(12, 'Aakash', 21, '1998-07-18', 80, '2021-05-18 16:17:18'),
(13, 'Shubham', 55, '1998-02-18', 70, '2021-05-18 16:20:44'),
(15, 'Kalyani', 5, '1996-06-18', 65, '2021-05-18 16:23:28'),
(16, 'Devyani', 6, '1998-05-05', 75, '2021-05-18 16:27:04'),
(17, 'sonal', 45, '0000-00-00', 90, '2021-05-19 09:43:59'),
(25, 'Sonali', 45, '2021-05-01', 75, '2021-05-19 10:32:12'),
(26, 'akashay', 45, '2021-05-06', 90, '2021-05-19 10:41:06'),
(28, 'Bhavika', 11, '2021-04-29', 60, '2021-05-19 11:24:47'),
(29, 'purva', 12, '2004-02-11', 85, '2021-05-19 14:04:26'),
(32, 'jagruti', 56, '2021-05-14', 50, '2021-05-20 05:03:18'),
(33, 'namrata', 50, '2021-05-08', 60, '2021-05-20 05:06:54'),
(35, 'Gitansh', 50, '2021-05-05', 50, '2021-05-20 05:43:26'),
(36, 'komal', 12, '2021-05-05', 90, '2021-05-20 06:49:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
