-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 02:16 PM
-- Server version: 5.6.31
-- PHP Version: 5.6.25


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `catno` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
-- Table structure for table `checkout_log`
--

CREATE TABLE IF NOT EXISTS `checkout_log` (
  `ID` int(11) NOT NULL,
  `order_no` bigint(5) NOT NULL,
  `person_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cno` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `zip` bigint(5) NOT NULL,
  `phone` char(12) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'enabled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cno`, `cname`, `street`, `zip`, `phone`, `Username`, `Password`, `status`, `created_at`) VALUES
(10, 'Kwabena', 'hnoome', 52522017, '0265057796', 'kwabena.boohene', 'jumper', 'enabled', '2017-02-28 13:58:08'),
(11, 'Kofi Boamah', 'House Number 7', 52362019, '0265057762', 'kofi.boamah', 'Tsuchikage14', 'enabled', '2017-03-14 10:56:43'),
(12, 'Joel da Silva', '12345', 52362019, '1234567890', 'joel', 'joel', 'enabled', '2017-03-16 12:47:39');


-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `eno` int(11) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `zip` bigint(5) NOT NULL,
  `hdate` date NOT NULL,
  `Password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` set('2','3') NOT NULL DEFAULT '2',
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eno`, `ename`, `zip`, `hdate`, `Password`, `created_at`, `account_type`, `Username`) VALUES
(5, 'qwerty', 52522017, '2017-03-01', 'qwerty', '2017-03-16 11:09:19', 2, 'qwerty'),
(6, 'qazxsw', 52522017, '2017-03-02', 'qazxsw', '2017-03-16 11:19:19', 2, 'qazxsw'),
(7, 'qwerty', 47852018, '2017-03-08', 'qwerrt', '2017-03-16 11:28:07', 3, 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ino` bigint(5) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `idesc` text NOT NULL,
  `qoh` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `olevel` int(11) NOT NULL,
  `catno` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ino`, `iname`, `idesc`, `qoh`, `price`, `olevel`, `catno`) VALUES
(1, 'Nike Flanel pants', 'No description currently available for Nikes', 50, 50.00, 10, 1),
(2, 'Spalding Long Racket', 'No description currently available for Spalding', 50, 25.00, 10, 5),
(3, 'Adidas NMD', 'No description currently available for Adidas', 20, 230.00, 5, 3),
(4, 'Nike Air Jordans', 'No description currently available for Nike Air', 30, 200.00, 5, 3),
(5, 'Spalding 360 Gloves', 'No description currently available for Spalding 360 Gloves', 40, 25.00, 10, 6),
(6, 'Gildan Plain White Tees', 'No description currently available for Gildan', 30, 40.00, 10, 2),
(7, 'Adidas slim fit Joggers', 'No description currently available for Adidas ', 50, 20.00, 10, 4),
(8, 'Spalding grey Sweats', 'No description currently available for Spalding', 40, 15.00, 12, 4),
(9, 'Nike Roshes Blue', 'No description currently available for Nikes Roshes', 60, 20.00, 10, 3),
(10, 'Adidas Barricade', 'No description currently available for Adidas', 40, 250.00, 10, 5),
(11, 'Nike Roshes v2', 'No description currently available for Nike Roshes', 50, 20.00, 20, 1),
(18, 'Adidas NMDs V2', 'No description currently available for Adidas NMDs', 50, 20.00, 10, 3),
(19, 'Plim Soles', 'No description currently available for Plim Soles', 40, 20.00, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
  `ID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `LogInTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` set('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `odetails`
--

CREATE TABLE IF NOT EXISTS `odetails` (
  `ono` bigint(5) NOT NULL,
  `ino` bigint(5) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ono` bigint(5) NOT NULL,
  `cno` int(11) NOT NULL,
  `received` date NOT NULL,
  `shipped` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ono`, `cno`, `received`, `shipped`, `created_at`) VALUES
(1, 10, '2017-03-15', '2017-03-17', '2017-03-12 19:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `visitors_log`
--

CREATE TABLE `visitors_log` (
  `IP_address` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zipcodes`
--

CREATE TABLE IF NOT EXISTS `zipcodes` (
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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catno`);

--
-- Indexes for table `checkout_log`
--
ALTER TABLE `checkout_log`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD UNIQUE KEY `person_id` (`person_id`);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PersonID` (`PersonID`);

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
-- Indexes for table `visitors_log`
--
ALTER TABLE `visitors_log`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `catno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `checkout_log`
--
ALTER TABLE `checkout_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ino` bigint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ono` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visitors_log`
--
ALTER TABLE `visitors_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout_log`
--
ALTER TABLE `checkout_log`
  ADD CONSTRAINT `checkout_log_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `orders` (`ono`),
  ADD CONSTRAINT `checkout_log_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `customers` (`cno`),
  ADD CONSTRAINT `checkout_log_ibfk_3` FOREIGN KEY (`person_id`) REFERENCES `employees` (`eno`);

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
-- Constraints for table `login_log`
--
ALTER TABLE `login_log`
  ADD CONSTRAINT `login_log_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `customers` (`cno`),
  ADD CONSTRAINT `login_log_ibfk_2` FOREIGN KEY (`PersonID`) REFERENCES `employees` (`eno`);

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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cno`) REFERENCES `customers` (`cno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
