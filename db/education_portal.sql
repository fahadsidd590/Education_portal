-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 11:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_portal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees_login`
--

CREATE TABLE `employees_login` (
  `User_ID` int(11) NOT NULL,
  `User_First_Name` varchar(50) NOT NULL,
  `User_Last_Name` varchar(50) NOT NULL,
  `User_Email` varchar(80) NOT NULL,
  `User_language` varchar(200) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Phone_num` varchar(15) NOT NULL,
  `User_Role` varchar(10) NOT NULL,
  `Profile_Pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees_login`
--

INSERT INTO `employees_login` (`User_ID`, `User_First_Name`, `User_Last_Name`, `User_Email`, `User_language`, `User_Password`, `User_Phone_num`, `User_Role`, `Profile_Pic`) VALUES
(1, 'Demo', 'User', 'demo197@gmail.com', 'Select Language', '$2y$10$Lg49GYoF3gKEiJS6f1RaoOq6geIQZrlSX5M3QSW8L6qdIeucFDx2G', '03458309345', 'Admin', 'jaredd-craig-HH4WBGNyltc-unsplash.jpg'),
(2, 'demo', 'demo', 'demo97@gmail.com', '[\"Afrikaans\",\"Albanian - shqip\"]', '$2y$10$SD05aB9di53gR/UcLkFw1u5OyLzViamB9t7vn/Kc9j77Cz2PvUPSK', '0303323321006', 'Admin', 's1 (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Subject_ID` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Subject_ID`, `Subject_Name`) VALUES
(4, 'Biology'),
(2, 'English'),
(1, 'Math'),
(5, 'physics');

-- --------------------------------------------------------

--
-- Table structure for table `subject_levels`
--

CREATE TABLE `subject_levels` (
  `Level_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  `Level_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_levels`
--

INSERT INTO `subject_levels` (`Level_ID`, `Subject_ID`, `Level_Name`) VALUES
(1, 4, 'level 1'),
(4, 5, 'level 6');

-- --------------------------------------------------------

--
-- Table structure for table `subject_levels_units`
--

CREATE TABLE `subject_levels_units` (
  `Units_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  `Level_ID` int(11) NOT NULL,
  `Units_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_levels_units`
--

INSERT INTO `subject_levels_units` (`Units_ID`, `Subject_ID`, `Level_ID`, `Units_name`) VALUES
(1, 4, 1, 'rree'),
(2, 2, 1, 'rree'),
(3, 5, 4, 'rree');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees_login`
--
ALTER TABLE `employees_login`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_Email` (`User_Email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD UNIQUE KEY `Subject_Name` (`Subject_Name`);

--
-- Indexes for table `subject_levels`
--
ALTER TABLE `subject_levels`
  ADD PRIMARY KEY (`Level_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- Indexes for table `subject_levels_units`
--
ALTER TABLE `subject_levels_units`
  ADD PRIMARY KEY (`Units_ID`),
  ADD KEY `Level_ID` (`Level_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees_login`
--
ALTER TABLE `employees_login`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_levels`
--
ALTER TABLE `subject_levels`
  MODIFY `Level_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_levels_units`
--
ALTER TABLE `subject_levels_units`
  MODIFY `Units_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject_levels`
--
ALTER TABLE `subject_levels`
  ADD CONSTRAINT `subject_levels_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_levels_units`
--
ALTER TABLE `subject_levels_units`
  ADD CONSTRAINT `subject_levels_units_ibfk_1` FOREIGN KEY (`Level_ID`) REFERENCES `subject_levels` (`Level_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_levels_units_ibfk_2` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
