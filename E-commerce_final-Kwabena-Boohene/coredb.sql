-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2017 at 08:19 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cno` bigint(5) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `zip` bigint(5) NOT NULL,
  `phone` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cno`, `cname`, `street`, `zip`, `phone`) VALUES
(4, 'Kwabena', 'House Number 8', 85432017, '0265057796'),
(5, 'David Okyere', 'House Number 9', 77542017, '0244632228'),
(6, 'Youssouf DaSilva', 'House Number 10', 52732017, '0253321456'),
(7, 'Nana Kwadwo', 'House Number 20', 52522017, '0235568963');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `eno` bigint(4) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `zip` bigint(5) NOT NULL,
  `hdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eno`, `ename`, `zip`, `hdate`) VALUES
(1, 'Kofi Okyere', 54692017, '2017-01-27'),
(2, 'Kwadwo Ntiamoah', 66242018, '2017-01-24'),
(3, 'Kwame Boamah', 47852018, '2017-02-27'),
(4, 'Yaa Doku', 52362019, '2017-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `odetails`
--

CREATE TABLE `odetails` (
  `ono` bigint(5) NOT NULL,
  `pno` bigint(5) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ono` bigint(5) NOT NULL,
  `cno` bigint(5) NOT NULL,
  `eno` bigint(4) NOT NULL,
  `received` date NOT NULL,
  `shipped` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `pno` bigint(5) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `qoh` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `olevel` int(11) NOT NULL
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
-- Indexes for table `odetails`
--
ALTER TABLE `odetails`
  ADD PRIMARY KEY (`ono`,`pno`),
  ADD KEY `pno` (`pno`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ono`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`pno`);

--
-- Indexes for table `zipcodes`
--
ALTER TABLE `zipcodes`
  ADD PRIMARY KEY (`zip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cno` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eno` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ono` bigint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `pno` bigint(5) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `odetails`
--
ALTER TABLE `odetails`
  ADD CONSTRAINT `odetails_ibfk_1` FOREIGN KEY (`ono`) REFERENCES `orders` (`ono`),
  ADD CONSTRAINT `odetails_ibfk_2` FOREIGN KEY (`pno`) REFERENCES `parts` (`pno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
