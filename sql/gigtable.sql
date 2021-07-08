-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 12:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gigdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gigtable`
--

CREATE TABLE `gigtable` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `owner` varchar(30) NOT NULL,
  `role` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `min_salary` decimal(11,2) NOT NULL,
  `max_salary` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gigtable`
--

INSERT INTO `gigtable` (`id`, `date`, `owner`, `role`, `company`, `location`, `address`, `country`, `region`, `tag`, `min_salary`, `max_salary`) VALUES
(6, '2021-07-08', 'Chidiebere', 'Software Developer', 'KDNS', 'west, nigeria', 'This is a test street for my application in the scene.', 'nigeria', 'west', 'Freelance', '1000.00', '2000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gigtable`
--
ALTER TABLE `gigtable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gigtable`
--
ALTER TABLE `gigtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
