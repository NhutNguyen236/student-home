-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 05:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Test', '0000000001', 'test@local.com', '123 Local');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `time` datetime NOT NULL,
  `id_nha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `time`, `id_nha`) VALUES
(1, 'hello', '2020-12-22 10:53:23', 2),
(2, 'hello', '2020-12-22 11:02:20', 2),
(3, 'hello', '2020-12-22 11:02:21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nha`
--

CREATE TABLE `nha` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varbinary(50) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `priceElectric` int(20) NOT NULL,
  `priceWater` int(20) NOT NULL,
  `size` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nha`
--

INSERT INTO `nha` (`id`, `address`, `category`, `price`, `description`, `image`, `id_contact`, `priceElectric`, `priceWater`, `size`) VALUES
(1, 'My House', 'house', 4444, 'This is test house', 0x75706c6f6164732f41535553204135313055412e6a7067, 1, 0, 0, 0),
(2, '123 lê văn lương q7', 'apartment', 666, 'Nha cua be quy', 0x75706c6f6164732f6368756e6763752e6a7067, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nha` (`id_nha`);

--
-- Indexes for table `nha`
--
ALTER TABLE `nha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contact` (`id_contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nha`
--
ALTER TABLE `nha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_nha`) REFERENCES `nha` (`id`);

--
-- Constraints for table `nha`
--
ALTER TABLE `nha`
  ADD CONSTRAINT `nha_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
