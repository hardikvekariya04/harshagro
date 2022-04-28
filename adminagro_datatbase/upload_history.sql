-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 02:26 PM
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
-- Database: `admin_agro`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload_history`
--

CREATE TABLE `upload_history` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_history`
--

INSERT INTO `upload_history` (`id`, `type`, `timestamp`, `filename`) VALUES
(1, 'taluka_crop', '', 'Array'),
(2, 'taluka_crop', 'April 22, 2022 6:26:54', 'Array'),
(3, 'taluka_crop', 'April 22, 2022 6:27:29', 'Array'),
(4, 'taluka_crop', 'April 22, 2022 6:29:39', 'taluka_crop'),
(5, 'taluka_crop', 'April 22, 2022 6:31:26', 'taluka_crop'),
(6, 'taluka_crop', 'April 22, 2022 6:32:41', 'taluka_crop'),
(7, 'district_crop', 'April 22, 2022 6:41:34', 'taluka_crop'),
(8, 'taluka_crop', 'April 22, 2022 6:41:34', 'taluka_crop'),
(9, 'district_data', 'April 24, 2022 17:02:38', ''),
(10, 'district_data', 'April 25, 2022 6:55:15', 'district'),
(11, 'taluka_data', 'April 25, 2022 6:55:59', 'district'),
(12, 'district_data', 'April 25, 2022 7:02:59', 'districtcsv'),
(13, 'district_data', 'April 25, 2022 7:04:01', 'district.csv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload_history`
--
ALTER TABLE `upload_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload_history`
--
ALTER TABLE `upload_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
