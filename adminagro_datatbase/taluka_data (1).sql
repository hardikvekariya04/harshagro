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
-- Table structure for table `taluka_data`
--

CREATE TABLE `taluka_data` (
  `id` int(11) NOT NULL,
  `taluka_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `rainfall` float NOT NULL,
  `max_temp` float NOT NULL,
  `min_temp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taluka_data`
--

INSERT INTO `taluka_data` (`id`, `taluka_id`, `date`, `rainfall`, `max_temp`, `min_temp`) VALUES
(1, 0, '0000-00-00', 0, 0, 0),
(2, 1981, '0000-00-00', 0, 0.038073, 22.386),
(3, 1981, '0000-00-00', 1, 0.35529, 24.662),
(4, 1981, '0000-00-00', 10, 0.16033, 25.974),
(5, 1981, '0000-00-00', 100, 0.33524, 25.183),
(6, 1981, '0000-00-00', 102, 0.40778, 20.683),
(7, 1981, '0000-00-00', 103, 0.45253, 19.979),
(8, 1981, '0000-00-00', 104, 0.4119, 22.06),
(9, 1981, '0000-00-00', 105, 0.37711, 21.482),
(10, 1981, '0000-00-00', 106, 0.34306, 23.433),
(11, 1981, '0000-00-00', 107, 0.444, 22.026),
(12, 1981, '0000-00-00', 109, 0.43543, 21.067),
(13, 1981, '0000-00-00', 11, 0.32841, 24.517),
(14, 1981, '0000-00-00', 110, 0.43133, 22.198),
(15, 1981, '0000-00-00', 111, 0.35683, 19.835),
(16, 1981, '0000-00-00', 112, 0.43557, 21.936),
(17, 1981, '0000-00-00', 113, 0.35806, 22.559),
(18, 1981, '0000-00-00', 114, 0.34458, 23.986),
(19, 1981, '0000-00-00', 115, 0.30814, 23.653),
(20, 1981, '0000-00-00', 116, 0.33111, 23.394),
(21, 1981, '0000-00-00', 117, 0.3195, 23.054),
(22, 1981, '0000-00-00', 118, 0.33713, 24.402),
(23, 1981, '0000-00-00', 119, 0.336, 23.86),
(24, 1981, '0000-00-00', 12, 0.34843, 23.943),
(25, 1981, '0000-00-00', 120, 0.26767, 25.533),
(26, 1981, '0000-00-00', 121, 0.24257, 26.17),
(27, 1981, '0000-00-00', 122, 0.19824, 26.212),
(28, 1981, '0000-00-00', 123, 0.16667, 27.585),
(29, 1981, '0000-00-00', 124, 0.12995, 26.921),
(30, 1981, '0000-00-00', 125, 0.14281, 27.55),
(31, 1981, '0000-00-00', 126, 0.13098, 26.524),
(32, 1981, '0000-00-00', 127, 0.23033, 24.938),
(33, 1981, '0000-00-00', 128, 0.30396, 24.918),
(34, 1981, '0000-00-00', 129, 0.14675, 22.14),
(35, 1981, '0000-00-00', 13, 0.33379, 24.15),
(36, 1981, '0000-00-00', 130, 0.2924, 27.15),
(37, 1981, '0000-00-00', 131, 0.23834, 25.927),
(38, 1981, '0000-00-00', 132, 0.23751, 26.514),
(39, 1981, '0000-00-00', 133, 0.32861, 25.544),
(40, 1981, '0000-00-00', 134, 0.34956, 27.15),
(41, 1981, '0000-00-00', 135, 0.31677, 27.412),
(42, 1981, '0000-00-00', 136, 0.33508, 27.778),
(43, 1981, '0000-00-00', 137, 0.3312, 26.573),
(44, 1981, '0000-00-00', 138, 0.33606, 28.118),
(45, 1981, '0000-00-00', 139, 0.28992, 28.098),
(46, 1981, '0000-00-00', 14, 0.10845, 19.52),
(47, 1981, '0000-00-00', 140, 0.21173, 26.961),
(48, 1981, '0000-00-00', 141, 0.33447, 27.27),
(49, 1981, '0000-00-00', 142, 0.24225, 26.945),
(50, 1981, '0000-00-00', 143, 0.30183, 23.59),
(51, 1981, '0000-00-00', 144, 0.31131, 23.617),
(52, 1981, '0000-00-00', 145, 0.39559, 24.4),
(53, 1981, '0000-00-00', 146, 0.44412, 24.286),
(54, 1981, '0000-00-00', 147, 0.3445, 24.92),
(55, 1981, '0000-00-00', 148, 0.29887, 23.5),
(56, 1981, '0000-00-00', 149, 0.37726, 24.561),
(57, 1981, '0000-00-00', 15, 0.35281, 23.621),
(58, 1981, '0000-00-00', 150, 0.44124, 22.517),
(59, 1981, '0000-00-00', 151, 0.30085, 22.917),
(60, 1981, '0000-00-00', 152, 0.38652, 21.97),
(61, 1981, '0000-00-00', 153, 0.28719, 21.519),
(62, 1981, '0000-00-00', 154, 0.41668, 22.01),
(63, 1981, '0000-00-00', 155, 0.41891, 21.924),
(64, 1981, '0000-00-00', 156, 0.35398, 20.76),
(65, 1981, '0000-00-00', 157, 0.29168, 21.722),
(66, 1981, '0000-00-00', 158, 0.29406, 24.486),
(67, 1981, '0000-00-00', 159, 0.40546, 21.827),
(68, 1981, '0000-00-00', 16, 0.37825, 23.863),
(69, 1981, '0000-00-00', 160, 0.44507, 19.996),
(70, 1981, '0000-00-00', 161, 0.17281, 27.073),
(71, 1981, '0000-00-00', 162, 0.13854, 27.407),
(72, 1981, '0000-00-00', 164, 0.19112, 28.168),
(73, 1981, '0000-00-00', 165, 0.1402, 26.874),
(74, 1981, '0000-00-00', 166, 0.11193, 25.398),
(75, 1981, '0000-00-00', 167, 0.19108, 28.587),
(76, 1981, '0000-00-00', 168, 0.15793, 27.597),
(77, 1981, '0000-00-00', 169, 0.20712, 27.179),
(78, 1981, '0000-00-00', 17, 0.22422, 24.743),
(79, 1981, '0000-00-00', 170, 0.1505, 27.495),
(80, 1981, '0000-00-00', 171, 0.37012, 19.552),
(81, 1981, '0000-00-00', 172, 0.3928, 18.683),
(82, 1981, '0000-00-00', 173, 0.39494, 18.935),
(83, 1981, '0000-00-00', 174, 0.29782, 23.88),
(84, 1981, '0000-00-00', 175, 0.27969, 24.626),
(85, 1981, '0000-00-00', 176, 0.2996, 24.843),
(86, 1981, '0000-00-00', 177, 0.2102, 22.909),
(87, 1981, '0000-00-00', 178, 0.28531, 23.684),
(88, 1981, '0000-00-00', 179, 0.27495, 23.771),
(89, 1981, '0000-00-00', 18, 0.27583, 23.406),
(90, 1981, '0000-00-00', 180, 0.28725, 24.515),
(91, 1981, '0000-00-00', 181, 0.26603, 23.455),
(92, 1981, '0000-00-00', 182, 0.43275, 21.978),
(93, 1981, '0000-00-00', 183, 0.38677, 19.276),
(94, 1981, '0000-00-00', 184, 0.38956, 19.739),
(95, 1981, '0000-00-00', 185, 0.42845, 20.89),
(96, 1981, '0000-00-00', 186, 0.48968, 22.39),
(97, 1981, '0000-00-00', 187, 0.4283, 20.29),
(98, 1981, '0000-00-00', 188, 0.3475, 23.062),
(99, 1981, '0000-00-00', 189, 0.36121, 20.488),
(100, 1981, '0000-00-00', 19, 0.38106, 23.972),
(101, 1981, '0000-00-00', 190, 0.36292, 22.219),
(102, 1981, '0000-00-00', 191, 0.36108, 21.496),
(103, 1981, '0000-00-00', 192, 0.37896, 20.258),
(104, 1981, '0000-00-00', 195, 0.31012, 26.672),
(105, 1981, '0000-00-00', 196, 0.26586, 24.937),
(106, 1981, '0000-00-00', 197, 0.22455, 25.874),
(107, 1981, '0000-00-00', 198, 0.16925, 24.05),
(108, 1981, '0000-00-00', 199, 0.20976, 28.033),
(109, 1981, '0000-00-00', 2, 0.12029, 24.401),
(110, 1981, '0000-00-00', 20, 0.205, 28.414),
(111, 1981, '0000-00-00', 200, 0.2552, 28.548),
(112, 1981, '0000-00-00', 201, 0.21315, 28.222),
(113, 1981, '0000-00-00', 202, 0.18744, 28.318),
(114, 1981, '0000-00-00', 203, 0.22736, 27.308),
(115, 1981, '0000-00-00', 204, 0.32738, 25.494),
(116, 1981, '0000-00-00', 205, 0.37059, 24.321),
(117, 1981, '0000-00-00', 206, 0.3201, 25.002),
(118, 1981, '0000-00-00', 207, 0.40271, 24.943),
(119, 1981, '0000-00-00', 208, 0.36917, 25.079),
(120, 1981, '0000-00-00', 209, 0.32972, 24.769),
(121, 1981, '0000-00-00', 21, 0.37319, 24.119),
(122, 1981, '0000-00-00', 210, 0.32157, 23.009),
(123, 1981, '0000-00-00', 211, 0.29537, 24.145),
(124, 1981, '0000-00-00', 212, 0.3103, 23.036),
(125, 1981, '0000-00-00', 213, 0.425, 22.517),
(126, 1981, '0000-00-00', 214, 0.42747, 22.728),
(127, 1981, '0000-00-00', 215, 0.33146, 24.539),
(128, 1981, '0000-00-00', 216, 0.33095, 25.539),
(129, 1981, '0000-00-00', 217, 0.33959, 27.755),
(130, 1981, '0000-00-00', 218, 0.34343, 26.745),
(131, 1981, '0000-00-00', 219, 0.37791, 24.593),
(132, 1981, '0000-00-00', 22, 0.3298, 25.437),
(133, 1981, '0000-00-00', 220, 0.12973, 18.732),
(134, 1981, '0000-00-00', 221, 0.37345, 24.734),
(135, 1981, '0000-00-00', 222, 0.37746, 24.942),
(136, 1981, '0000-00-00', 223, 0.30478, 26.757),
(137, 1981, '0000-00-00', 224, 0.33985, 26.565),
(138, 1981, '0000-00-00', 225, 0.2304, 22.568),
(139, 1981, '0000-00-00', 226, 0.28946, 24.821),
(140, 1981, '0000-00-00', 227, 0.43744, 23.715),
(141, 1981, '0000-00-00', 228, 0.2992, 19.661),
(142, 1981, '0000-00-00', 229, 0.19354, 18.738),
(143, 1981, '0000-00-00', 23, 0.29957, 25.466),
(144, 1981, '0000-00-00', 230, 0.43077, 24.559),
(145, 1981, '0000-00-00', 231, 0.26518, 20.955),
(146, 1981, '0000-00-00', 232, 0.21778, 18.62),
(147, 1981, '0000-00-00', 233, 0.3187, 25.28),
(148, 1981, '0000-00-00', 234, 0.40481, 24.572),
(149, 1981, '0000-00-00', 235, 0.41938, 25.107),
(150, 1981, '0000-00-00', 236, 0.36952, 24.207),
(151, 1981, '0000-00-00', 237, 0.4015, 24.095),
(152, 1981, '0000-00-00', 238, 0.37741, 24.368),
(153, 1981, '0000-00-00', 239, 0.23651, 24.612),
(154, 1981, '0000-00-00', 24, 0.23856, 25.838),
(155, 1981, '0000-00-00', 240, 0.31771, 25.827),
(156, 1981, '0000-00-00', 241, 0.3581, 25.231),
(157, 1981, '0000-00-00', 242, 0.33, 24.853),
(158, 1981, '0000-00-00', 243, 0.28526, 20.907),
(159, 1981, '0000-00-00', 244, 0.29569, 24.707),
(160, 1981, '0000-00-00', 245, 0.32807, 26.259),
(161, 1981, '0000-00-00', 246, 0.32887, 23.059),
(162, 1981, '0000-00-00', 247, 0.30507, 26.761),
(163, 1981, '0000-00-00', 248, 0.27273, 27.234),
(164, 1981, '0000-00-00', 249, 0.22563, 27.836),
(165, 1981, '0000-00-00', 25, 0.30177, 25.664),
(166, 1981, '0000-00-00', 250, 0.2061, 26.802),
(167, 1981, '0000-00-00', 251, 0.28838, 27.469),
(168, 1981, '0000-00-00', 252, 0.19517, 27.724),
(169, 1981, '0000-00-00', 26, 0.22481, 26.798),
(170, 1981, '0000-00-00', 27, 0.26369, 26.427),
(171, 1981, '0000-00-00', 28, 0.31334, 24.988),
(172, 1981, '0000-00-00', 29, 0.19248, 28.879),
(173, 1981, '0000-00-00', 3, 0.34724, 24.309),
(174, 1981, '0000-00-00', 30, 0.27338, 26.215),
(175, 1981, '0000-00-00', 31, 0.29906, 25.496),
(176, 1981, '0000-00-00', 32, 0.26856, 28.038),
(177, 1981, '0000-00-00', 33, 0.253, 25.641),
(178, 1981, '0000-00-00', 34, 0.22059, 24.681),
(179, 1981, '0000-00-00', 35, 0.25486, 25.293),
(180, 1981, '0000-00-00', 36, 0.2878, 25.762),
(181, 1981, '0000-00-00', 37, 0.15057, 24.173),
(182, 1981, '0000-00-00', 38, 0.32202, 24.632),
(183, 1981, '0000-00-00', 39, 0.35566, 20.419),
(184, 1981, '0000-00-00', 4, 0.22882, 25.236),
(185, 1981, '0000-00-00', 40, 0.15716, 25.26),
(186, 1981, '0000-00-00', 41, 0.32867, 22.772),
(187, 1981, '0000-00-00', 42, 0.35464, 23.496),
(188, 1981, '0000-00-00', 43, 0.36205, 22.689),
(189, 1981, '0000-00-00', 44, 0.39252, 21.721),
(190, 1981, '0000-00-00', 45, 0.42217, 24.476),
(191, 1981, '0000-00-00', 46, 0.39664, 22.295),
(192, 1981, '0000-00-00', 47, 0.38717, 23.272),
(193, 1981, '0000-00-00', 48, 0.4558, 23.6),
(194, 1981, '0000-00-00', 49, 0.39227, 23.666),
(195, 1981, '0000-00-00', 5, 0.11249, 25.716),
(196, 1981, '0000-00-00', 51, 0.31614, 24.824),
(197, 1981, '0000-00-00', 52, 0.33241, 25.012),
(198, 1981, '0000-00-00', 53, 0.31657, 25.35),
(199, 1981, '0000-00-00', 54, 0.33132, 24.355),
(200, 1981, '0000-00-00', 55, 0.20192, 25.87),
(201, 1981, '0000-00-00', 56, 0.21216, 27.566),
(202, 1981, '0000-00-00', 57, 0.28551, 26.708),
(203, 1981, '0000-00-00', 58, 0.24666, 28.624),
(204, 1981, '0000-00-00', 59, 0.25598, 27.248),
(205, 1981, '0000-00-00', 6, 0.068724, 23.229),
(206, 1981, '0000-00-00', 60, 0.18562, 26.476),
(207, 1981, '0000-00-00', 61, 0.33083, 23.75),
(208, 1981, '0000-00-00', 62, 0.32716, 26.337),
(209, 1981, '0000-00-00', 63, 0.37853, 24.821),
(210, 1981, '0000-00-00', 64, 0.43758, 25.661),
(211, 1981, '0000-00-00', 65, 0.35208, 23.369),
(212, 1981, '0000-00-00', 66, 0.36798, 26.055),
(213, 1981, '0000-00-00', 67, 0.28026, 22.219),
(214, 1981, '0000-00-00', 68, 0.41317, 22.905),
(215, 1981, '0000-00-00', 69, 0.37433, 24.669),
(216, 1981, '0000-00-00', 7, 0.13601, 24.005),
(217, 1981, '0000-00-00', 70, 0.44698, 23.225),
(218, 1981, '0000-00-00', 71, 0.18715, 24.785),
(219, 1981, '0000-00-00', 72, 0.15478, 25.539),
(220, 1981, '0000-00-00', 73, 0.13705, 25.374),
(221, 1981, '0000-00-00', 74, 0.18744, 26.894),
(222, 1981, '0000-00-00', 75, 0.099083, 22.383),
(223, 1981, '0000-00-00', 76, 0.23029, 26.304),
(224, 1981, '0000-00-00', 77, 0.1657, 23.761),
(225, 1981, '0000-00-00', 78, 0.10185, 21.828),
(226, 1981, '0000-00-00', 79, 0.23024, 26.601),
(227, 1981, '0000-00-00', 8, 0.18283, 25.547),
(228, 1981, '0000-00-00', 80, 0.18674, 27.769),
(229, 1981, '0000-00-00', 81, 0.34326, 24.187),
(230, 1981, '0000-00-00', 82, 0.28374, 24.545),
(231, 1981, '0000-00-00', 83, 0.3162, 24.41),
(232, 1981, '0000-00-00', 84, 0.33404, 23.994),
(233, 1981, '0000-00-00', 85, 0.36206, 23.944),
(234, 1981, '0000-00-00', 86, 0.36325, 23.645),
(235, 1981, '0000-00-00', 87, 0.36882, 24.461),
(236, 1981, '0000-00-00', 88, 0.37922, 24.454),
(237, 1981, '0000-00-00', 89, 0.30315, 23.031),
(238, 1981, '0000-00-00', 9, 0.26258, 25.043),
(239, 1981, '0000-00-00', 90, 0.41156, 23.561),
(240, 1981, '0000-00-00', 91, 0.31177, 25.844),
(241, 1981, '0000-00-00', 92, 0.24671, 25.637),
(242, 1981, '0000-00-00', 93, 0.2786, 25.703),
(243, 1981, '0000-00-00', 94, 0.27642, 25.844),
(244, 1981, '0000-00-00', 95, 0.30427, 25.691),
(245, 1981, '0000-00-00', 96, 0.28105, 24.574),
(246, 1981, '0000-00-00', 97, 0.29717, 24.567),
(247, 1981, '0000-00-00', 98, 0.28386, 23.688),
(248, 1981, '0000-00-00', 99, 0.32379, 24.117),
(249, 1981, '0000-00-00', 0, 0.040557, 22.873),
(250, 1981, '0000-00-00', 1, 0.36694, 25.026),
(251, 1981, '0000-00-00', 10, 0.16449, 26.336),
(252, 1981, '0000-00-00', 100, 0.34288, 26.032),
(253, 1981, '0000-00-00', 102, 0.41775, 21.127),
(254, 1981, '0000-00-00', 103, 0.45656, 20.303),
(255, 1981, '0000-00-00', 104, 0.41441, 22.383),
(256, 1981, '0000-00-00', 105, 0.37796, 21.814),
(257, 1981, '0000-00-00', 106, 0.34128, 23.411),
(258, 1981, '0000-00-00', 107, 0.44582, 22.085),
(259, 1981, '0000-00-00', 109, 0.44047, 21.167),
(260, 1981, '0000-00-00', 11, 0.33004, 24.806),
(261, 1981, '0000-00-00', 110, 0.43276, 22.369),
(262, 1981, '0000-00-00', 111, 0.36172, 19.988),
(263, 1981, '0000-00-00', 112, 0.43529, 21.893),
(264, 1981, '0000-00-00', 113, 0.36891, 23.069),
(265, 1981, '0000-00-00', 114, 0.35471, 24.495),
(266, 1981, '0000-00-00', 115, 0.31168, 24.218),
(267, 1981, '0000-00-00', 116, 0.33356, 24.017),
(268, 1981, '0000-00-00', 117, 0.33417, 24.038),
(269, 1981, '0000-00-00', 118, 0.3513, 24.972),
(270, 1981, '0000-00-00', 119, 0.34927, 24.557),
(271, 1981, '0000-00-00', 12, 0.35121, 24.343),
(272, 1981, '0000-00-00', 120, 0.27143, 26.31),
(273, 1981, '0000-00-00', 121, 0.24283, 26.61),
(274, 1981, '0000-00-00', 122, 0.19853, 26.606),
(275, 1981, '0000-00-00', 123, 0.16574, 27.991),
(276, 1981, '0000-00-00', 124, 0.12987, 27.423),
(277, 1981, '0000-00-00', 125, 0.141, 28.136),
(278, 1981, '0000-00-00', 126, 0.13258, 27.024),
(279, 1981, '0000-00-00', 127, 0.2359, 25.629),
(280, 1981, '0000-00-00', 128, 0.30744, 25.662),
(281, 1981, '0000-00-00', 129, 0.14454, 22.101),
(282, 1981, '0000-00-00', 0, 0.038073, 22.386),
(283, 1981, '0000-00-00', 1, 0.35529, 24.662),
(284, 1981, '0000-00-00', 10, 0.16033, 25.974),
(285, 1981, '0000-00-00', 100, 0.33524, 25.183),
(286, 1981, '0000-00-00', 102, 0.40778, 20.683),
(287, 1981, '0000-00-00', 103, 0.45253, 19.979),
(288, 1981, '0000-00-00', 104, 0.4119, 22.06),
(289, 1981, '0000-00-00', 105, 0.37711, 21.482),
(290, 1981, '0000-00-00', 106, 0.34306, 23.433),
(291, 1981, '0000-00-00', 107, 0.444, 22.026),
(292, 1981, '0000-00-00', 109, 0.43543, 21.067),
(293, 1981, '0000-00-00', 11, 0.32841, 24.517),
(294, 1981, '0000-00-00', 110, 0.43133, 22.198),
(295, 1981, '0000-00-00', 111, 0.35683, 19.835),
(296, 1981, '0000-00-00', 112, 0.43557, 21.936),
(297, 1981, '0000-00-00', 113, 0.35806, 22.559),
(298, 1981, '0000-00-00', 114, 0.34458, 23.986),
(299, 1981, '0000-00-00', 115, 0.30814, 23.653),
(300, 1981, '0000-00-00', 116, 0.33111, 23.394),
(301, 1981, '0000-00-00', 117, 0.3195, 23.054),
(302, 1981, '0000-00-00', 118, 0.33713, 24.402),
(303, 1981, '0000-00-00', 119, 0.336, 23.86),
(304, 1981, '0000-00-00', 12, 0.34843, 23.943),
(305, 1981, '0000-00-00', 120, 0.26767, 25.533),
(306, 1981, '0000-00-00', 121, 0.24257, 26.17),
(307, 1981, '0000-00-00', 122, 0.19824, 26.212),
(308, 1981, '0000-00-00', 123, 0.16667, 27.585),
(309, 1981, '0000-00-00', 124, 0.12995, 26.921),
(310, 1981, '0000-00-00', 125, 0.14281, 27.55),
(311, 1981, '0000-00-00', 126, 0.13098, 26.524),
(312, 1981, '0000-00-00', 127, 0.23033, 24.938),
(313, 1981, '0000-00-00', 128, 0.30396, 24.918),
(314, 1981, '0000-00-00', 129, 0.14675, 22.14),
(315, 1981, '0000-00-00', 13, 0.33379, 24.15),
(316, 1981, '0000-00-00', 130, 0.2924, 27.15),
(317, 1981, '0000-00-00', 131, 0.23834, 25.927),
(318, 1981, '0000-00-00', 132, 0.23751, 26.514),
(319, 1981, '0000-00-00', 133, 0.32861, 25.544),
(320, 1981, '0000-00-00', 134, 0.34956, 27.15),
(321, 1981, '0000-00-00', 135, 0.31677, 27.412),
(322, 1981, '0000-00-00', 136, 0.33508, 27.778),
(323, 1981, '0000-00-00', 137, 0.3312, 26.573),
(324, 1981, '0000-00-00', 138, 0.33606, 28.118),
(325, 1981, '0000-00-00', 139, 0.28992, 28.098),
(326, 1981, '0000-00-00', 14, 0.10845, 19.52),
(327, 1981, '0000-00-00', 140, 0.21173, 26.961),
(328, 1981, '0000-00-00', 141, 0.33447, 27.27),
(329, 1981, '0000-00-00', 142, 0.24225, 26.945),
(330, 1981, '0000-00-00', 143, 0.30183, 23.59),
(331, 1981, '0000-00-00', 144, 0.31131, 23.617),
(332, 1981, '0000-00-00', 145, 0.39559, 24.4),
(333, 1981, '0000-00-00', 146, 0.44412, 24.286),
(334, 1981, '0000-00-00', 147, 0.3445, 24.92),
(335, 1981, '0000-00-00', 148, 0.29887, 23.5),
(336, 1981, '0000-00-00', 149, 0.37726, 24.561),
(337, 1981, '0000-00-00', 15, 0.35281, 23.621),
(338, 1981, '0000-00-00', 150, 0.44124, 22.517),
(339, 1981, '0000-00-00', 151, 0.30085, 22.917),
(340, 1981, '0000-00-00', 152, 0.38652, 21.97),
(341, 1981, '0000-00-00', 153, 0.28719, 21.519),
(342, 1981, '0000-00-00', 154, 0.41668, 22.01),
(343, 1981, '0000-00-00', 155, 0.41891, 21.924),
(344, 1981, '0000-00-00', 156, 0.35398, 20.76),
(345, 1981, '0000-00-00', 157, 0.29168, 21.722),
(346, 1981, '0000-00-00', 158, 0.29406, 24.486),
(347, 1981, '0000-00-00', 159, 0.40546, 21.827),
(348, 1981, '0000-00-00', 16, 0.37825, 23.863),
(349, 1981, '0000-00-00', 160, 0.44507, 19.996),
(350, 1981, '0000-00-00', 161, 0.17281, 27.073),
(351, 1981, '0000-00-00', 162, 0.13854, 27.407),
(352, 1981, '0000-00-00', 164, 0.19112, 28.168),
(353, 1981, '0000-00-00', 165, 0.1402, 26.874),
(354, 1981, '0000-00-00', 166, 0.11193, 25.398),
(355, 1981, '0000-00-00', 167, 0.19108, 28.587),
(356, 1981, '0000-00-00', 168, 0.15793, 27.597),
(357, 1981, '0000-00-00', 169, 0.20712, 27.179),
(358, 1981, '0000-00-00', 17, 0.22422, 24.743),
(359, 1981, '0000-00-00', 170, 0.1505, 27.495),
(360, 1981, '0000-00-00', 171, 0.37012, 19.552),
(361, 1981, '0000-00-00', 172, 0.3928, 18.683),
(362, 1981, '0000-00-00', 173, 0.39494, 18.935),
(363, 1981, '0000-00-00', 174, 0.29782, 23.88),
(364, 1981, '0000-00-00', 175, 0.27969, 24.626),
(365, 1981, '0000-00-00', 176, 0.2996, 24.843),
(366, 1981, '0000-00-00', 177, 0.2102, 22.909),
(367, 1981, '0000-00-00', 178, 0.28531, 23.684),
(368, 1981, '0000-00-00', 179, 0.27495, 23.771),
(369, 1981, '0000-00-00', 18, 0.27583, 23.406),
(370, 1981, '0000-00-00', 180, 0.28725, 24.515),
(371, 1981, '0000-00-00', 181, 0.26603, 23.455),
(372, 1981, '0000-00-00', 182, 0.43275, 21.978),
(373, 1981, '0000-00-00', 183, 0.38677, 19.276),
(374, 1981, '0000-00-00', 184, 0.38956, 19.739),
(375, 1981, '0000-00-00', 185, 0.42845, 20.89),
(376, 1981, '0000-00-00', 186, 0.48968, 22.39),
(377, 1981, '0000-00-00', 187, 0.4283, 20.29),
(378, 1981, '0000-00-00', 188, 0.3475, 23.062),
(379, 1981, '0000-00-00', 189, 0.36121, 20.488),
(380, 1981, '0000-00-00', 19, 0.38106, 23.972),
(381, 1981, '0000-00-00', 190, 0.36292, 22.219),
(382, 1981, '0000-00-00', 191, 0.36108, 21.496),
(383, 1981, '0000-00-00', 192, 0.37896, 20.258),
(384, 1981, '0000-00-00', 195, 0.31012, 26.672),
(385, 1981, '0000-00-00', 196, 0.26586, 24.937),
(386, 1981, '0000-00-00', 197, 0.22455, 25.874),
(387, 1981, '0000-00-00', 198, 0.16925, 24.05),
(388, 1981, '0000-00-00', 199, 0.20976, 28.033),
(389, 1981, '0000-00-00', 2, 0.12029, 24.401),
(390, 1981, '0000-00-00', 20, 0.205, 28.414),
(391, 1981, '0000-00-00', 200, 0.2552, 28.548),
(392, 1981, '0000-00-00', 201, 0.21315, 28.222),
(393, 1981, '0000-00-00', 202, 0.18744, 28.318),
(394, 1981, '0000-00-00', 203, 0.22736, 27.308),
(395, 1981, '0000-00-00', 204, 0.32738, 25.494),
(396, 1981, '0000-00-00', 205, 0.37059, 24.321),
(397, 1981, '0000-00-00', 206, 0.3201, 25.002),
(398, 1981, '0000-00-00', 207, 0.40271, 24.943),
(399, 1981, '0000-00-00', 208, 0.36917, 25.079),
(400, 1981, '0000-00-00', 209, 0.32972, 24.769),
(401, 1981, '0000-00-00', 21, 0.37319, 24.119),
(402, 1981, '0000-00-00', 210, 0.32157, 23.009),
(403, 1981, '0000-00-00', 211, 0.29537, 24.145),
(404, 1981, '0000-00-00', 212, 0.3103, 23.036),
(405, 1981, '0000-00-00', 213, 0.425, 22.517),
(406, 1981, '0000-00-00', 214, 0.42747, 22.728),
(407, 1981, '0000-00-00', 215, 0.33146, 24.539),
(408, 1981, '0000-00-00', 216, 0.33095, 25.539),
(409, 1981, '0000-00-00', 217, 0.33959, 27.755),
(410, 1981, '0000-00-00', 218, 0.34343, 26.745),
(411, 1981, '0000-00-00', 219, 0.37791, 24.593),
(412, 1981, '0000-00-00', 22, 0.3298, 25.437),
(413, 1981, '0000-00-00', 220, 0.12973, 18.732),
(414, 1981, '0000-00-00', 221, 0.37345, 24.734),
(415, 1981, '0000-00-00', 222, 0.37746, 24.942),
(416, 1981, '0000-00-00', 223, 0.30478, 26.757),
(417, 1981, '0000-00-00', 224, 0.33985, 26.565),
(418, 1981, '0000-00-00', 225, 0.2304, 22.568),
(419, 1981, '0000-00-00', 226, 0.28946, 24.821),
(420, 1981, '0000-00-00', 227, 0.43744, 23.715),
(421, 1981, '0000-00-00', 228, 0.2992, 19.661),
(422, 1981, '0000-00-00', 229, 0.19354, 18.738),
(423, 1981, '0000-00-00', 23, 0.29957, 25.466);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taluka_data`
--
ALTER TABLE `taluka_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taluka_data`
--
ALTER TABLE `taluka_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;