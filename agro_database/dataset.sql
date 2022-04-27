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
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `title`, `content`) VALUES
(1, 'Gujarat’s Weather and Vegetation Outlook', '<h5>&nbsp;</h5>\r\n<p><strong>Gujarat&rsquo;s Weather and Vegetation Outlook provides rainfall, minimum temperature, maximum temperature, vegetation growth, and health information at the Taluka and District level through an interactive dashboard with spatial and temporal maps. The platform uses daily observed weather data from India Meteorological Department in near-real-time. The previous 7 days, past 6 months, and last 3 years weather variables can be analyzed through the platform. Whereas weekly vegetation indexes are derived from the Advanced Very High-Resolution Radiometer. Vegetation indexes can be compared for the past seven weeks and the last three years. Currenly data is available from 2018 onwards.</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>For any query, please contact us on our email id: <a href=\"mailto:sharsh4949@gmail.com\">sharsh4949@gmail.com</a>. To know more about us, you can visit www.agrocastanalytics.com</strong></p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
