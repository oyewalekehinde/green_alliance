-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2024 at 01:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Green Alliance`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `address`, `postcode`, `user_id`) VALUES
(1, 'London, United Kingdom', 'LU1 1QR', 1),
(2, '11b, Oko Awo street, Victoria island', 'se25 5pu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `product` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(15) NOT NULL,
  `benefits` text NOT NULL,
  `pricing_categories` varchar(15) NOT NULL,
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `size`, `benefits`, `pricing_categories`, `votes`) VALUES
(1, 'Water bottle', 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', NULL),
(2, 'Water bottle', 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin@greenalliance.com', '12345', 'admin'),
(2, 'Dolapo', 'Oyewale', 'dolapo@gmail.com', 'qwerty', 'admin'),
(3, 'Oluwaseun', 'Oyewale', 'oyewalekehinde734@gmail.com', 'qwerty1234', 'admin'),
(38, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '5353535353', 'resident'),
(39, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53535', 'resident'),
(40, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '335355', 'resident'),
(41, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '335355', 'resident'),
(42, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '35535', 'resident'),
(43, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '535', 'resident'),
(44, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '535', 'resident'),
(45, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '4242424', 'resident'),
(46, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '4242424', 'resident'),
(47, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '4242424', 'resident'),
(48, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '4464', 'resident'),
(49, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(50, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(51, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(52, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(53, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(54, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(55, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(56, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(57, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(58, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(59, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(60, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(61, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'resident'),
(62, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '334343', 'resident'),
(63, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '334343', 'resident'),
(64, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', 'qwerty1234', 'resident'),
(65, 'Toba', 'Adeoye', 'tobar@red.com', 'qwerty1234', 'resident'),
(66, 'Toba', 'Adeoye', 'tobar@red.com', 'qwerty1234', 'resident');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `title` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `age_group` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `voted_product` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `title`, `first_name`, `last_name`, `email`, `area`, `age_group`, `gender`, `interest`, `voted_product`, `user`) VALUES
(1, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 62),
(2, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 62),
(3, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', 1, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 64),
(4, 'Mr.', 'Toba', 'Adeoye', 'tobar@red.com', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 65),
(5, 'Mr.', 'Toba', 'Adeoye', 'tobar@red.com', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 65),
(6, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', NULL, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 62);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `resident` int(11) NOT NULL,
  `vote` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`),
  ADD KEY `voted_product` (`voted_product`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident` (`resident`),
  ADD KEY `product` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `resident_ibfk_2` FOREIGN KEY (`voted_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `resident_ibfk_3` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`resident`) REFERENCES `resident` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
