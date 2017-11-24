-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 09:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obos`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_no` varchar(30) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `amt` double(5,2) NOT NULL,
  `qty` double(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_no`, `product_id`, `amt`, `qty`) VALUES
('ORD0000000034', 'P000001', 1.00, 1),
('ORD0000000034', 'P000003', 0.60, 1),
('ORD0000000035', 'P000001', 6.00, 6),
('ORD0000000035', 'P000002', 12.00, 6),
('ORD0000000035', 'P000003', 3.00, 5),
('ORD0000000036', 'P000001', 1.00, 1),
('ORD0000000036', 'P000002', 2.00, 1),
('ORD0000000037', 'P000001', 1.00, 1),
('ORD0000000037', 'P000002', 2.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE `ordermaster` (
  `order_no` varchar(30) NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `dateTxt` date NOT NULL,
  `total_amt` double(5,2) NOT NULL,
  `total_qty` double(3,0) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`order_no`, `customer_id`, `dateTxt`, `total_amt`, `total_qty`, `status`) VALUES
('ORD0000000034', 'sham@gmail.com', '2017-11-24', 1.60, 2, '1'),
('ORD0000000035', 'arisa@gmail.com', '2017-11-24', 21.00, 17, '2'),
('ORD0000000036', 'arisa@gmail.com', '2017-11-24', 3.00, 2, '1'),
('ORD0000000037', 'arisa@gmail.com', '2017-11-24', 3.00, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `productID` varchar(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productPrice` decimal(5,2) NOT NULL,
  `productQuantity` decimal(5,0) NOT NULL,
  `productImage` varchar(100) NOT NULL,
  `productCreatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `productID`, `productName`, `productPrice`, `productQuantity`, `productImage`, `productCreatedBy`) VALUES
(1, 'P000001', 'Cakes', '1.00', '60', '', 'admin@gmail.com'),
(9, 'P000002', 'Bread', '2.00', '52', '', 'admin@gmail.com'),
(10, 'P000003', 'Bun', '0.60', '1000', '', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `seqno`
--

CREATE TABLE `seqno` (
  `name` varchar(20) NOT NULL,
  `last_seq_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seqno`
--

INSERT INTO `seqno` (`name`, `last_seq_no`) VALUES
('ORD', 37);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userFName` varchar(100) NOT NULL,
  `userLName` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userAddress` varchar(100) NOT NULL,
  `userPhone` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userEmail`, `userFName`, `userLName`, `userPass`, `userAddress`, `userPhone`, `userType`) VALUES
(1, 'admin@gmail.com', 'The', 'Adminstrator', 'e10adc3949ba59abbe56e057f20f883e', 'Jalan Admin, Taman Admin', '012345678', 'admin'),
(2, 'sham@gmail.com', 'Shammugam', 'Ramasamy', 'e10adc3949ba59abbe56e057f20f883e', 'No 30, Jalan Rumbia 32, Taman Daya', '01116846003', 'customer'),
(3, 'jenny@gmail.com', 'Jenani', 'Kanipar', 'e10adc3949ba59abbe56e057f20f883e', 'No 7, Jalan Kenaga, Taman Kenaga', '01111222333', 'customer'),
(5, 'arisa@gmail.com', 'Arisa', 'Izra', 'e10adc3949ba59abbe56e057f20f883e', 'No 30, Jalan Rumbia 32, Taman Daya', '0123456789', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_no`,`product_id`);

--
-- Indexes for table `ordermaster`
--
ALTER TABLE `ordermaster`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indexes for table `seqno`
--
ALTER TABLE `seqno`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `userEmail_3` (`userEmail`),
  ADD KEY `userEmail` (`userEmail`),
  ADD KEY `userEmail_2` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
