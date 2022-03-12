-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 04:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `ID` int(100) NOT NULL,
  `States` varchar(30) NOT NULL,
  `Disaster_Type` varchar(30) NOT NULL,
  `People_Affected` int(255) NOT NULL,
  `Resource_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`ID`, `States`, `Disaster_Type`, `People_Affected`, `Resource_Type`) VALUES
(1, 'Arunachal Pradesh', 'Landslides', 250, 'Food'),
(2, 'Assam', 'Floods', 1000, 'Food'),
(3, 'Bihar', 'Floods', 1200, 'Goods and Services'),
(4, 'Chhattisgarh', 'Earthquakes', 250, 'Goods and services'),
(5, 'Goa', 'Landslides', 500, 'Food'),
(6, 'Gujrat', 'Rainfalls', 500, 'Food'),
(7, 'Haryana', 'Landslides', 150, 'Food'),
(8, 'HImachal Pradesh', 'Landslides', 1500, 'Services'),
(9, 'Jammu & Kashmir', 'Unseasonable Snowfalls', 1500, 'Food'),
(10, 'Jharkhand', 'Cyclones', 1400, 'Goods and Services'),
(11, 'Madhya Pradesh', 'Floods', 500, 'Food'),
(12, 'Odisha', 'Cyclones', 1500, 'Goods and Services'),
(13, 'West Bengal', 'Drought', 5000, 'Goods and Services'),
(14, 'Hyderabad ', 'Floods', 1500, 'Goods and services'),
(15, 'Kerala', 'Floods', 1200, 'Food'),
(16, 'Andhra Pradesh', 'Storm', 2000, 'Food'),
(17, 'Uttarranchal', 'Floods', 1200, 'Goods and Services'),
(18, 'Andhra Pradesh', 'Floods', 1900, 'Goods and Services'),
(19, 'Maharashtra', 'Floods', 2100, 'Goods and services'),
(20, 'Manipur', 'Floods', 1600, 'Food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
