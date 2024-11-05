-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 05:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_orderid`
--

CREATE TABLE `invoice_orderid` (
  `invoice_OrderId` int(11) DEFAULT NULL,
  `OrderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_orderid`
--
ALTER TABLE `invoice_orderid`
  ADD KEY `invoice_OrderId` (`invoice_OrderId`),
  ADD KEY `orderid` (`OrderId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_orderid`
--
ALTER TABLE `invoice_orderid`
  ADD CONSTRAINT `invoice_orderid_ibfk_1` FOREIGN KEY (`invoice_OrderId`) REFERENCES `invoice` (`invoice_Id`),
  ADD CONSTRAINT `orderid` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`Order_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
