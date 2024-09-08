-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 05:05 PM
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
-- Database: `registeration_form_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `stddetail`
--

CREATE TABLE `stddetail` (
  `id` int(11) NOT NULL,
  `student_Name` varchar(15) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Cousre` varchar(15) NOT NULL,
  `Admission_Fees` int(11) NOT NULL,
  `Monthly_fees` int(11) NOT NULL,
  `Days` enum('monday','tuesday','wednesday','thursday','friday','saturday') NOT NULL,
  `slots` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stddetail`
--

INSERT INTO `stddetail` (`id`, `student_Name`, `Email`, `Phone_Number`, `Cousre`, `Admission_Fees`, `Monthly_fees`, `Days`, `slots`) VALUES
(1, 'saeed', 'saeedtutorial786@gma', 2147483647, '202309b', 22000, 7300, '', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stddetail`
--
ALTER TABLE `stddetail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stddetail`
--
ALTER TABLE `stddetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
