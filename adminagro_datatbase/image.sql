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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `weather_max_heat` varchar(255) NOT NULL,
  `weather_min_heat` varchar(255) NOT NULL,
  `weather_rain_heat` varchar(11) NOT NULL,
  `crop_ndvi` varchar(11) NOT NULL,
  `crop_vci` varchar(255) NOT NULL,
  `crop_vhi` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT '2018-05-03',
  `week` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `weather_max_heat`, `weather_min_heat`, `weather_rain_heat`, `crop_ndvi`, `crop_vci`, `crop_vhi`, `date`, `week`) VALUES
(1, 'db65.PNG', 'db66.PNG', '0', '0', '', '', '2022-04-22', '0'),
(2, 'db65.PNG', 'db66.PNG', '0', '0', '', '', '2022-04-22', '0'),
(3, 'db65.PNG', 'db66.PNG', '0', '0', '', '', '2022-04-22', '0'),
(4, 'db65.PNG', 'db66.PNG', '0', '0', '', '', '2020-01-23', '0'),
(5, '', 'db66.PNG', '0', '0', '', '', '2022-04-17', '0'),
(6, '', 'db66.PNG', '0', '0', '', '', '2022-04-17', '0'),
(7, 'db65.PNG', 'db66.PNG', '0', '0', '', '', '2022-04-10', '0'),
(9, 'tmax_2021_09_09.gif', 'p_2021_09_09.gif', '0', '0', '', '', '2019-02-02', '0'),
(11, 'home-decor-1.jpg', 'home-decor-2.jpg', 'home-decor-', 'kal-visuals', 'team-4.jpg', 'product-12.jpg', '2019-02-12', '0'),
(12, 'home-decor-1.jpg', 'home-decor-2.jpg', 'home-decor-', 'meeting.jpg', 'office-dark.jpg', 'vr-bg.jpg', '2019-02-03', '0'),
(13, 'home-decor-1.jpg', 'home-decor-2.jpg', 'home-decor-', 'vr-bg.jpg', 'bg-smart-home-2.jpg', 'bg-smart-home-1.jpg', '2019-02-04', '0'),
(14, 'team-5.jpg', 'team-4.jpg', 'team-3.jpg', 'team-2.jpg', 'team-1.jpg', 'product-12.jpg', '2019-02-05', '0'),
(15, 'team-1.jpg', 'team-2.jpg', 'team-3.jpg', 'team-4.jpg', 'team-5.jpg', 'vr-bg.jpg', '2022-04-05', '0'),
(16, 'bruce-mars.jpg', 'drake.jpg', 'favicon.png', 'marie.jpg', 'meeting.jpg', 'office-dark.jpg', '2019-02-06', '0'),
(17, 'image1.jpg', 'image3.jpg', 'imag2.jpg', 'D.PNG', 'gym1.webp', 'logo.jpg', '2022-04-30', '2018'),
(21, 'imag2.jpg', 'image1.jpg', 'image3.jpg', 'imag2.jpg', 'image3.jpg', 'image1.jpg', '2022-04-15', '2022-W15'),
(23, '', '', '', '', '', '', '0000-00-00', '2022-W16'),
(24, '', '', '', '', '', '', '0000-00-00', '2022-W14'),
(25, '', '', '', '', '', '', '0000-00-00', '2022-W14'),
(26, '', '', '', '', '', '', '0000-00-00', '2022-W14'),
(27, '', '', '', '', '', '', '0000-00-00', '2022-W14'),
(28, '', '', '', '', '', '', '0000-00-00', '2022-W14'),
(29, '', '', '', '', '', '', '0000-00-00', '2022-W14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
