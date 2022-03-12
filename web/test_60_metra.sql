-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 08:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `60 metra`
--

-- --------------------------------------------------------

--
-- Table structure for table `test 60 metra`
--

CREATE TABLE `test 60 metra` (
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Humidity` float(10,0) NOT NULL,
  `Temperature` float(10,0) NOT NULL,
  `Hydrogen(H2)` float(10,0) NOT NULL,
  `LPG` float NOT NULL,
  `Methane(CH4)` float(10,0) NOT NULL,
  `Smoke` float(10,0) NOT NULL,
  `Alchohol` float(10,0) NOT NULL,
  `Carbon Dioxide(CO2)` float(10,0) NOT NULL,
  `Carbon Monoxide(CO)` float(10,0) NOT NULL,
  `Flammable gases` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test 60 metra`
--

INSERT INTO `test 60 metra` (`time`, `Humidity`, `Temperature`, `Hydrogen(H2)`, `LPG`, `Methane(CH4)`, `Smoke`, `Alchohol`, `Carbon Dioxide(CO2)`, `Carbon Monoxide(CO)`, `Flammable gases`) VALUES
('2022-03-12 19:11:49', 39, 26, 209, 0, 0, 0, 0, 9, 933, 909),
('2022-03-12 19:11:55', 39, 26, 209, 0, 0, 0, 4, 626, 106, 138),
('2022-03-12 19:12:01', 39, 26, 209, 0, 0, 0, 0, 5, 981, 947),
('2022-03-12 19:12:08', 39, 26, 209, 0, 0, 0, 2, 581, 24, 46),
('2022-03-12 19:12:14', 39, 26, 210, 0, 0, 0, 0, 2, 1023, 1023),
('2022-03-12 19:12:20', 39, 26, 209, 0, 0, 0, 2, 567, 2, 30),
('2022-03-12 19:12:26', 39, 26, 208, 0, 0, 0, 0, 2, 1023, 1023),
('2022-03-12 19:12:32', 39, 26, 209, 0, 0, 0, 0, 464, 0, 0),
('2022-03-12 19:12:38', 39, 26, 209, 0, 0, 0, 0, 0, 1023, 1023),
('2022-03-12 19:12:44', 39, 26, 208, 0, 0, 0, 148, 706, 0, 0),
('2022-03-12 19:12:50', 39, 26, 208, 0, 0, 0, 0, 0, 357, 389),
('2022-03-12 19:12:56', 39, 26, 207, 0, 0, 0, 0, 103, 981, 977),
('2022-03-12 19:13:02', 39, 26, 206, 0, 0, 0, 0, 61, 306, 341),
('2022-03-12 19:13:08', 39, 26, 204, 0, 0, 0, 148, 315, 985, 976),
('2022-03-12 19:13:14', 39, 26, 205, 0, 0, 0, 0, 180, 284, 307),
('2022-03-12 19:13:20', 39, 26, 203, 0, 0, 0, 0, 31, 949, 950),
('2022-03-12 19:13:26', 38, 26, 202, 0, 0, 0, 0, 524, 35, 58),
('2022-03-12 19:13:32', 38, 25, 202, 0, 0, 0, 0, 2, 1023, 1023),
('2022-03-12 19:13:38', 38, 26, 200, 0, 0, 0, 0, 418, 0, 0),
('2022-03-12 19:13:44', 38, 25, 199, 0, 0, 0, 0, 1, 1023, 1023);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
