-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 08:45 PM
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
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `userId` int(11) NOT NULL,
  `User_Name` varchar(25) NOT NULL,
  `User_Email` varchar(25) NOT NULL,
  `User_Phone` int(11) NOT NULL,
  `User_Password` varchar(20) NOT NULL,
  `User_Role` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`userId`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Role`) VALUES
(31, 'ali zaid', 'saeed736@gmail.com', 2147483647, '312ef844166a326db620', 'User'),
(50, 'ali zaid', 'saeed736@gmail.com', 2147483647, '6961b18957b1ffe04742', 'User'),
(51, 'ali ', 'saeedtutorial786@gmail.co', 2147483647, '994b579fe9db3e4b8b46', 'User'),
(52, 'saeed', 'test@example.com', 2147483647, '873f84e6b0f2d547229e', 'User'),
(53, 'Hassan', 'akkhan101@gmail.com', 2147483647, 'bf10b76af5d45838d314', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
