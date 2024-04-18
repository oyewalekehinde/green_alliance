-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2024 at 10:35 PM
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
(2, '11b, Oko Awo street, Victoria island', 'se25 5pu', 1),
(3, 'Room 7, 32 Downs road', 'AL10 9AB', 1),
(4, 'Room 7, 32 Downs road', 'AL10 9AB', 1),
(5, 'Emirate Staduim, Woolwich', 'EW2 2W2', 39);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `product` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `phone`, `address`, `product`, `user`) VALUES
(1, 'Monzo', '', 'Room 7, 32 Downs road', NULL, 67),
(2, 'Monzo', '07477932119', 'Room 7, 32 Downs road', NULL, 69);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `size` varchar(15) NOT NULL,
  `benefits` text NOT NULL,
  `pricing_categories` varchar(15) NOT NULL,
  `class` varchar(50) NOT NULL DEFAULT 'Green energies products',
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `size`, `benefits`, `pricing_categories`, `class`, `votes`) VALUES
(1, 'Water bottle', 200, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', NULL),
(2, 'Water bottle', 150, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', NULL),
(3, 'Water bottle', 100, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', NULL),
(4, 'Water bottle', 120, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', NULL),
(5, 'Water bottle', 75, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', NULL),
(6, 'Water bottle', 800, 'usage limit test 5nL8fRyTWe', 'Medium', 'it is benefitials', 'Moderate', 'Green energies products', NULL);

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
(39, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '12345', 'resident'),
(40, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '335355', 'resident'),
(62, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '334343', 'resident'),
(63, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '334343', 'resident'),
(64, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', 'qwerty1234', 'resident'),
(65, 'Toba', 'Adeoye', 'tobar@red.com', 'qwerty1234', 'resident'),
(66, 'Toba', 'Adeoye', 'tobar@red.com', 'qwerty1234', 'resident'),
(67, 'Monzo', 'Monzo', 'red@red.com', '12345', 'company'),
(68, 'Monzo', 'Monzo', 'red@red.com', '12345', 'company'),
(69, 'Monzo', 'Monzo', 'tayo@green.com', '123456', 'company'),
(70, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '22222', 'resident');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `title` varchar(15) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '',
  `area` int(11) DEFAULT NULL,
  `age_group` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `interest` varchar(100) NOT NULL DEFAULT '',
  `voted_product` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `title`, `first_name`, `last_name`, `email`, `phone`, `area`, `age_group`, `gender`, `interest`, `voted_product`, `user`) VALUES
(1, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 62),
(2, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 62),
(3, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '', 1, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 64),
(4, 'Mr.', 'Toba', 'Adeoye', 'tobar@red.com', '', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 65),
(5, 'Mr.', 'Toba', 'Adeoye', 'tobar@red.com', '', 2, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 65),
(6, 'Mr.', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '', NULL, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 62),
(7, 'Mr', 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '07477932119', 1, 'Child (0-12)', 'Male', 'Renewable Energy', NULL, 70);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`product`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `resident_ibfk_2` FOREIGN KEY (`voted_product`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `resident_ibfk_3` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`resident`) REFERENCES `resident` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`product`) REFERENCES `Product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
