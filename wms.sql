-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 10:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms`
--

-- --------------------------------------------------------

--

--
-- Delete all existing data


-- Reset auto-increment values



-- Table structure for table `adminlogin`

CREATE TABLE `adminlogin` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Id`, `username`, `password`) VALUES
(1, 'admin', 'admintest');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tbl`
--

CREATE TABLE `adminlogin_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin_tbl`
--

INSERT INTO `adminlogin_tbl` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'admin', 'admin@example.com', 'admintest', 0, 'verified');
-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `contactEmail` varchar(20) NOT NULL,
  `contactPhone` varchar(10) NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`fname`, `lname`, `contactEmail`, `contactPhone`, `comment`) VALUES
('John', 'Doe', 'johndoe@example.com', '4354323443', 'nice services');

-- --------------------------------------------------------

--
-- Table structure for table `garbageinfo`
--

CREATE TABLE `garbageinfo` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `wastetype` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `locationdescription` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garbageinfo`
--

INSERT INTO `garbageinfo` (`Id`, `name`, `mobile`, `email`, `wastetype`, `location`, `locationdescription`, `file`, `date`, `status`) VALUES 
(1, 'John doe', '2457859289', 'johndoe@example.com', 'Household,', 'Bktpur', 'near durbar square', 'kalankiwaste.jpg', '9:44am ,\r\n Saturday 24th July 2021', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES 
(1,'User One', 'user1@example.com', 'userpassword', 0, 'Active');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `adminlogin_tbl`
--
ALTER TABLE `adminlogin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garbageinfo`
--
ALTER TABLE `garbageinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adminlogin_tbl`
--
ALTER TABLE `adminlogin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `garbageinfo`
--
ALTER TABLE `garbageinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
