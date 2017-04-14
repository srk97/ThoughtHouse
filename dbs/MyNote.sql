-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2017 at 04:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyNote`
--

-- --------------------------------------------------------

--
-- Table structure for table `Notebook`
--

CREATE TABLE `Notebook` (
  `Notebook_ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `NotePak`
--

CREATE TABLE `NotePak` (
  `Note_ID` int(11) NOT NULL,
  `Notebook_ID` int(11) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User Details`
--

CREATE TABLE `User Details` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Notebook`
--
ALTER TABLE `Notebook`
  ADD PRIMARY KEY (`Notebook_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `NotePak`
--
ALTER TABLE `NotePak`
  ADD PRIMARY KEY (`Note_ID`),
  ADD KEY `Notebook_ID` (`Notebook_ID`);

--
-- Indexes for table `User Details`
--
ALTER TABLE `User Details`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Notebook`
--
ALTER TABLE `Notebook`
  MODIFY `Notebook_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `NotePak`
--
ALTER TABLE `NotePak`
  MODIFY `Note_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User Details`
--
ALTER TABLE `User Details`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Notebook`
--
ALTER TABLE `Notebook`
  ADD CONSTRAINT `Notebook_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User Details` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `NotePak`
--
ALTER TABLE `NotePak`
  ADD CONSTRAINT `NotePak_ibfk_1` FOREIGN KEY (`Notebook_ID`) REFERENCES `Notebook` (`Notebook_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
