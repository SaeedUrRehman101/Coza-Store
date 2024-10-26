-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 06:41 PM
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `product_Name` varchar(25) NOT NULL,
  `product_Price` int(11) NOT NULL,
  `product_Quantity` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `user_Email` varchar(35) NOT NULL,
  `user_Address` varchar(100) NOT NULL,
  `order_Date` varchar(50) NOT NULL,
  `order_Time` varchar(20) NOT NULL,
  `user_Name` varchar(25) NOT NULL,
  `product_Image` varchar(50) NOT NULL,
  `user_Phone` varchar(11) NOT NULL,
  `Confirmation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `product_Id`, `product_Name`, `product_Price`, `product_Quantity`, `user_Id`, `user_Email`, `user_Address`, `order_Date`, `order_Time`, `user_Name`, `product_Image`, `user_Phone`, `Confirmation`) VALUES
(1, 2, 'ASUS ROG Strix G17 (2022)', 895, 1, 68, 'ali101@gmail.com', 'H No 580,Sec B, St No 10,Akhtar Colony Karachi Pakistan', 'Sat, Oct 26, 2024 ', '09:38 PM', 'ali ', 'image_2.jpg', '2147483647', '79794'),
(2, 9, 'Amazon Essentials Women', 27, 5, 68, 'ali101@gmail.com', 'H No 580,Sec B, St No 10,Akhtar Colony Karachi Pakistan', 'Sat, Oct 26, 2024 ', '09:38 PM', 'ali ', 'image_8.jpg', '2147483647', '79794');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
