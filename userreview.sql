-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 05:54 PM
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
-- Table structure for table `userreview`
--

CREATE TABLE `userreview` (
  `review_Id` int(11) NOT NULL,
  `user_review` varchar(1000) NOT NULL,
  `user_Image` varchar(50) NOT NULL,
  `user_signId` int(11) NOT NULL,
  `review_ProId` int(11) DEFAULT NULL,
  `userRatings` int(1) DEFAULT NULL,
  `review_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userreview`
--
ALTER TABLE `userreview`
  ADD PRIMARY KEY (`review_Id`),
  ADD KEY `userSignId` (`user_signId`),
  ADD KEY `reviewProId` (`review_ProId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userreview`
--
ALTER TABLE `userreview`
  MODIFY `review_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userreview`
--
ALTER TABLE `userreview`
  ADD CONSTRAINT `reviewProId` FOREIGN KEY (`review_ProId`) REFERENCES `products` (`Product_Id`),
  ADD CONSTRAINT `userSignId` FOREIGN KEY (`user_signId`) REFERENCES `signin` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
