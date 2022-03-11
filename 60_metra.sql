-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 05:18 PM
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
  `Methane(CH4)` decimal(10,0) NOT NULL,
  `Benzene(C6H6)` decimal(10,0) NOT NULL,
  `Smoke` decimal(10,0) NOT NULL,
  `Carbon Monoxide(CO)` decimal(10,0) NOT NULL,
  `Hydrogen(H2)` decimal(10,0) NOT NULL,
  `Flammable gases` decimal(10,0) NOT NULL,
  `Humidity` decimal(10,0) NOT NULL,
  `Temperature` decimal(10,0) NOT NULL,
  `Carbon Dioxide(CO2)` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test 60 metra`
--

INSERT INTO `test 60 metra` (`Methane(CH4)`, `Benzene(C6H6)`, `Smoke`, `Carbon Monoxide(CO)`, `Hydrogen(H2)`, `Flammable gases`, `Humidity`, `Temperature`, `Carbon Dioxide(CO2)`) VALUES
('12', '14', '263', '656', '365', '577', '47', '335', '2545');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
