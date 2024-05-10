-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitallaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `firsttable`
--

CREATE TABLE `firsttable` (
  `NameOfCrime` varchar(255) NOT NULL,
  `ConcernedInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firsttable`
--

INSERT INTO `firsttable` (`NameOfCrime`, `ConcernedInformation`) VALUES
('Tinted Windows', 'In Pakistan, using tinted windows on vehicles is considered a traffic violation. The Provincial Motor Vehicles Ordinance, 1965 and Pakistan Motor Vehicles Rules, 1969 prohibit tinted glass. Police can pull you over and issue a fine for exceeding the legal'),
('Displaying Armaments', 'In Pakistan, publicly displaying firearms is an offense under the Arms Ordinance 1965. It can lead to confiscation of the weapons, arrest, and a fine.'),
('Theft', 'This is a crime under the Pakistan Penal Code (PPC). The penalty varies depending on the severity of the theft, but can include imprisonment and a fine'),
('Hello', 'Hi, How can I help you?'),
('Hi, Can you help me with this legal issue?', 'Sure, let me know and I\'ll try my best!'),
('Thank you', 'No worries :)'),
('Bye', 'Goodbye and take care ! :)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
