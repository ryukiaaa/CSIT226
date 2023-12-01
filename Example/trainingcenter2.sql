-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 09:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingcenter2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `username` varchar(15) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateCompleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `moduleID` int(11) NOT NULL,
  `modulename` varchar(200) NOT NULL,
  `noofhours` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleID`, `modulename`, `noofhours`) VALUES
(1, 'Java for Beginners', 1),
(2, 'SQL', 10),
(3, 'test', 40),
(12, 'db2', 30),
(33, 'java 2', 1),
(34, 'PHP', 30),
(78, '78', 78),
(99, '99', 99);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `endDate` date NOT NULL,
  `maxParticipants` int(11) NOT NULL DEFAULT 10,
  `moduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleID`, `startdate`, `endDate`, `maxParticipants`, `moduleID`) VALUES
(1, '2023-10-14', '2023-10-26', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tra`
--

CREATE TABLE `tra` (
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`username`,`scheduleID`),
  ADD KEY `fk3` (`scheduleID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `fk1` (`moduleID`);

--
-- Indexes for table `tra`
--
ALTER TABLE `tra`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`username`) REFERENCES `tra` (`username`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`scheduleID`) REFERENCES `schedule` (`scheduleID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`moduleID`) REFERENCES `module` (`moduleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
