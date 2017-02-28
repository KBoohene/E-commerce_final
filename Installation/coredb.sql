-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 02:06 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
USE coredb;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `ID` int(4) NOT NULL,
  `Type` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`ID`, `Type`) VALUES
(1, 'Customer'),
(2, 'Employee'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catno` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catno`, `catname`) VALUES
(1, 'Shorts'),
(2, 'T-Shirts'),
(3, 'Sneakers'),
(4, 'Sweat Pants'),
(5, 'Tennis Rackets'),
(6, 'Gloves');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cno` bigint(5) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `zip` bigint(5) NOT NULL,
  `phone` char(12) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `eno` bigint(4) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `zip` bigint(5) NOT NULL,
  `hdate` date NOT NULL,
  `Password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ino` bigint(5) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `qoh` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `olevel` int(11) NOT NULL,
  `catno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ino`, `iname`, `qoh`, `price`, `olevel`, `catno`) VALUES
(1, 'Nike Flanel pants', 50, '50.00', 10, 1),
(2, 'Spalding Long Racket', 50, '25.00', 10, 5),
(3, 'Addidas NMD', 20, '230.00', 5, 3),
(4, 'Nike Air Jordans', 30, '200.00', 5, 3),
(5, 'Spalding 360 Gloves', 40, '25.00', 10, 6),
(6, 'Gildan Plain White Tees', 30, '40.00', 10, 2),
(7, 'Addidas slim fit Joggers', 50, '20.00', 10, 4),
(8, 'Spalding grey sweats', 40, '15.00', 12, 4),
(9, 'Nike Roshes Blue', 60, '20.00', 10, 3),
(10, 'Adidas Barricade', 40, '250.00', 10, 5),
(11, 'Nike Roshes v2', 50, '20.00', 20, 1),
(18, 'Adidas NMDs V2', 50, '20.00', 10, 3),
(19, 'Plim Soles', 40, '20.00', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `ID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `LogInTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `odetails`
--

CREATE TABLE `odetails` (
  `ono` bigint(5) NOT NULL,
  `ino` bigint(5) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ono` bigint(5) NOT NULL,
  `cno` bigint(5) NOT NULL,
  `received` date NOT NULL,
  `shipped` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zipcodes`
--

CREATE TABLE `zipcodes` (
  `zip` bigint(5) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcodes`
--

INSERT INTO `zipcodes` (`zip`, `city`) VALUES
(47852018, 'Accra'),
(52362019, 'Wale Wale'),
(52522017, 'Accra'),
(52732017, 'Accra'),
(54692017, 'Tema'),
(66242018, 'Ho'),
(77542017, 'Accra'),
(85432017, 'Accra'),
(88562017, 'Accra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catno`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cno`),
  ADD KEY `customers_ibfk_1` (`zip`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`eno`),
  ADD KEY `zip` (`zip`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ino`),
  ADD KEY `catno` (`catno`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `odetails`
--
ALTER TABLE `odetails`
  ADD PRIMARY KEY (`ono`,`ino`),
  ADD KEY `pno` (`ino`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ono`),
  ADD KEY `cno` (`cno`);

--
-- Indexes for table `zipcodes`
--
ALTER TABLE `zipcodes`
  ADD PRIMARY KEY (`zip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cno` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eno` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ino` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ono` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`zip`) REFERENCES `zipcodes` (`zip`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`zip`) REFERENCES `zipcodes` (`zip`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`catno`) REFERENCES `categories` (`catno`);

--
-- Constraints for table `odetails`
--
ALTER TABLE `odetails`
  ADD CONSTRAINT `odetails_ibfk_1` FOREIGN KEY (`ono`) REFERENCES `orders` (`ono`),
  ADD CONSTRAINT `odetails_ibfk_2` FOREIGN KEY (`ino`) REFERENCES `items` (`ino`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cno`) REFERENCES `customers` (`cno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
