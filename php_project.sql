-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2021 at 09:50 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Username`, `Password`) VALUES
('admin@gmail.com', 'admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Result` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Money` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Game` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Username`, `Result`, `Money`, `Game`, `Time`) VALUES
('guygam', 'LOSE', '-100', 'baccarat', '26/02/20 15-55-25'),
('guygam', 'LOSE', '-100', 'baccarat', '26/02/20 16-04-51'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-05-18'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-05-42'),
('guygam', 'WIN', '+300', 'baccarat', '26/02/20 16-05-47'),
('guygam', 'WIN', '+300', 'baccarat', '26/02/20 16-05-48'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-06-11'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-06-12'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-06-19'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-06-22'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-06-24'),
('guygam', 'WIN', '+1800', 'baccarat', '26/02/20 16-06-25'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-01'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-04'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-05'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-07'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-10'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-11'),
('guygam', 'LOSE', '-300', 'baccarat', '26/02/20 16-07-12'),
('guygam', 'WIN', '+2100', 'baccarat', '26/02/20 16-07-13'),
('guygam', 'LOSE', '-500', 'baccarat', '26/02/20 16-07-33'),
('guygam', 'WIN', '+3500', 'baccarat', '26/02/20 16-07-42'),
('guygam', 'LOSE', '-1000', 'baccarat', '26/02/20 16-08-08'),
('guygam', 'LOSE', '-1000', 'baccarat', '26/02/20 16-08-09'),
('guygam', 'WIN', '+7000', 'baccarat', '26/02/20 16-08-10'),
('guygam', 'LOSE', '-100', 'high-low', '26/02/20 16-16-03'),
('guygam', 'LOSE', '-100', 'high-low', '26/02/20 16-16-39'),
('guygam', 'LOSE', '-100', 'high-low', '26/02/20 16-19-03'),
('guygam', 'WIN', '+500', 'high-low', '26/02/20 16-19-49'),
('guygam', 'WIN', '+500', 'highlow', '26/02/20 16-20-38'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-10'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-16'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-17'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-18'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-20'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-21'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-23'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-24'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-26'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-27'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-28'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-29'),
('guygam', 'WIN', '+1500', 'high-low', '26/02/20 16-27-31'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-27-53'),
('guygam', 'LOSE', '-300', 'high-low', '26/02/20 16-28-05'),
('guygam', 'WIN', '+300', 'high-low', '26/02/20 16-28-06'),
('guygam', 'WIN', '+500', 'high-low', '26/02/20 16-28-38'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-28-49'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-28-53'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-28-54'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-28-55'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-28-57'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-28-59'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-03'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-04'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-05'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-07'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-07'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-09'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 16-29-10'),
('guygam', 'WIN', '+2500', 'high-low', '26/02/20 16-29-11'),
('guygam', 'WIN', '+1000', 'high-low', '26/02/20 16-29-35'),
('guygam', 'LOSE', '-1000', 'high-low', '26/02/20 16-29-41'),
('killernet', 'LOSE', '-500', 'baccarat', '26/02/20 16-49-18'),
('killernet', 'LOSE', '-500', 'baccarat', '26/02/20 16-49-29'),
('killernet', 'LOSE', '-500', 'baccarat', '26/02/20 16-49-29'),
('killernet', 'LOSE', '-500', 'baccarat', '26/02/20 16-49-30'),
('killernet', 'WIN', '+300', 'high-low', '26/02/20 16-55-14'),
('guygam', 'LOSE', '-500', 'high-low', '26/02/20 18-27-44'),
('killernet', 'WIN', '+500', 'baccarat', '16/03/21 15-35-08'),
('killernet', 'WIN', '+500', 'baccarat', '16/03/21 15-35-32'),
('killernet', 'WIN', '5000', 'baccarat', '16/03/21 15-42-31'),
('killernet', 'LOSE', 'null', 'baccarat', '16/03/21 15-57-22'),
('killernet', 'LOSE', '-100', 'baccarat', '16/03/21 17-08-20'),
('killernet', 'LOSE', '-100', 'high-low', '16/03/21 17-11-57'),
('killernet', 'WIN', '+100', 'high-low', '16/03/21 17-12-42'),
('killernet', 'WIN', '+100', 'baccarat', '16/03/21 17-13-27'),
('killernet', 'LOSE', '-100', 'baccarat', '23/03/21 15-49-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Money` int(10) NOT NULL,
  `Status` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Username`, `Password`, `Money`, `Status`) VALUES
('guygam31@gmail.com', 'guygam', '12345678', 21100, 'Online'),
('lunate', 'killernet', '12345678', 43500, 'Online');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
