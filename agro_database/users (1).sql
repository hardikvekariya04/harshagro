-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 02:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agro`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL DEFAULT '0',
  `create_datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `admin`, `create_datetime`) VALUES
(1, 'hardik0409', 'hardikzz0409@gmail.com', '8e55ecef6a2e2b363e7f56fe00d6cd64', '', '0', 'April 19, 2022 17:17:50'),
(2, 'jaison0409', 'j@gmail.com', 'a753d9fa7294440c6d7a00d873d0c4b2', '', '0', 'April 19, 2022 17:21:12'),
(3, 'nikhil000', 'n@gmail.com', '202cb962ac59075b964b07152d234b70', '', '0', 'April 19, 2022 17:28:35'),
(4, 'agrocast04', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '', '1', 'April 19, 2022 17:30:34'),
(5, 'agrocast04', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '', '0', 'April 19, 2022 17:30:52'),
(6, 'lalit000', 'l@gmail.com', '8f14e45fceea167a5a36dedd4bea2543', 'e89f3a323054e66bee796f6b8f3e078a', '0', ''),
(7, 'pppp000', 'p@gmail.com', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'c912997548b85b24402bb0be26c6f2e4', '0', 'April 26, 2022 10:14:02 pm'),
(8, 'harsh0409', 'h@gmail.com', '202cb962ac59075b964b07152d234b70', 'a3ac0924824ac9e5d838b26b84c2fa47', '0', 'April 27, 2022 4:47:57 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
