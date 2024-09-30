-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 12:35 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(25) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_Description` varchar(100) NOT NULL,
  `Product_Image` varchar(50) NOT NULL,
  `Product_CatId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Price`, `Product_Quantity`, `Product_Description`, `Product_Image`, `Product_CatId`) VALUES
(12, 'food', 5000, 12, 'any nutritious substance that people or animals eat or drink or that plants absorb in order to maint', 'banner(3).jpg', 15),
(13, 'food', 5000, 12, 'any nutritious substance that people or animals eat or drink or that plants absorb in order to maint', 'Boss-1 (1).jpg', 12),
(14, 'food Eating', 5000, 12, 'any nutritious substance that people or animals eat or drink or that plants absorb in order to maint', 'Silver Tufted.jpg', 12),
(15, 'food Eating', 345000, 12, 'any nutritious substance that people or animals eat or drink or that plants absorb in order to maint', 'banner.jpg', 16),
(16, 'food Eating', 345000, 12, 'any nutritious substance that people or animals eat or drink or that plants absorb in order to maint', 'about2.jpg', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `product_cateid` (`Product_CatId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_cateid` FOREIGN KEY (`Product_CatId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
