-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 05:38 PM
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
  `User_Email` varchar(35) NOT NULL,
  `User_Phone` varchar(11) NOT NULL,
  `User_Password` varchar(60) NOT NULL,
  `User_Role` varchar(20) NOT NULL DEFAULT 'User',
  `User_Image` varchar(50) NOT NULL DEFAULT 'Null',
  `User_Bio` varchar(50) NOT NULL DEFAULT 'Null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`userId`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Role`, `User_Image`, `User_Bio`) VALUES
(63, 'Admin baloch', 'admin01@gmail.com', '12345678910', '76f3aec01a3254b252550eb11d178016431e8a11', 'Admin', 'Long Sleeve.jpg', 'Creativity Solves Everything.'),
(64, 'Saeed Ur Rehman', 'saeedtutorial786@gmail.com', '2147483647', 'bf10b76af5d45838d3147aca1729938d218347e7', 'User', 'Null', 'Null'),
(66, 'Admin Khan', 'admin001@gmail.com', '03094749930', '867890d9242834f375f524239976c7168cc3129c', 'Admin', 'WhatsApp Image 2024-10-02 at 11.28.57 PM.jpeg', 'Full Stack Web Developer'),
(68, 'ali ', 'ali101@gmail.com', '2147483647', '651cba93d7646e8253bcd308b683d4fc91663c4d', 'User', 'Null', 'Null');

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
