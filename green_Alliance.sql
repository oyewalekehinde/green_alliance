-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2024 at 04:50 PM
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
(2, '11b, Oko Awo street, Victoria island', 'SE25 5PU', 1),
(3, 'Room 7, 32 Downs road', 'AL10 9AB', 1),
(4, 'Room 7, 32 Downs road', 'AL10 9AB', 1),
(5, 'Emirate Staduim, Woolwich', 'EW2 2W2', 39),
(8, 'Room 7, 32 Downs road', 'LU1 1QR', 1),
(11, '1, prince sola oyewunmi way, ketu', 'LU1 1QR', 1),
(14, '1, prince sola oyewunmi way, ketu', 'JUNH GFD', 1),
(16, 'Hatfied, London', 'AB12 RED', 1);

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
(131, 'Kenny Oyewale', '08028864914', '1 olushola Adewunmi road Ikeja', 3, 1),
(140, 'Kenny Oyewale', '07477932119', 'Room 7, 32 Downs road', 3, 1),
(142, 'Kenny Oyewale', '07477932119', 'Room 7, 32 Downs road', NULL, 100),
(144, 'Kenny Oyewale', '07477932119', 'GreenWich Stadiumn', NULL, 102),
(145, 'Revolut', '07477932119', 'Room 7, 32 Downs road', NULL, 105),
(146, 'Qwerty Company', '07477932119', 'Room 7, 32 Downs road', 17, 108),
(147, 'Monzo bank', '07477932119', 'Room 7, 32 Downs road', 4, 111);

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
  `vote_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `size`, `benefits`, `pricing_categories`, `class`, `vote_count`) VALUES
(3, 'Water bottle', 100, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Premium', 'Green energies products', 12),
(4, 'Water bottle', 120, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', 7),
(11, 'Water bottle', 120, 'Hey guys! Faramove is now in Lagos. For Lagos users, use the coupon code CeKnttsVOK to get discounted price.', 'Small', 'it is benefitials', 'Affordable', 'Green energies products', 7),
(12, 'Oluwaseun Oyewale', 33, 'gregrgf', 'Large', 'fgfdbdbfdb', 'Moderate', 'Green energies products', 6),
(13, 'Oluwaseun', 3200, 'dvdvvf', 'Large', 'vfddvdfd', 'Moderate', 'Green energies products', 6),
(17, 'AGORA_APP_ID', 1200, 'fegdfudsbjsdbnvufds', 'Small', 'jdvnbduviufsvfs', 'Premium', 'Green energies products', 2);

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
(65, 'Toba', 'Adeoye', 'tobar@red.com', 'qwerty1234', 'resident'),
(66, 'Toba', 'Adeoye', 'tobar@red.com', 'qwerty1234', 'resident'),
(67, 'Monzo', 'Monzo', 'red@red.com', '12345', 'company'),
(68, 'Monzo', 'Monzo', 'red@red.com', '12345', 'company'),
(69, 'Monzo', 'Monzo', 'tayo@green.com', '123456', 'company'),
(72, 'Revolut', 'Revolut', 'svd', 'vdfvsv', 'company'),
(81, 'Oluwaseun', 'Kehinde', 'Oyewalekehinde34@green.com', 'Qwerty1234', 'admin'),
(82, 'Oluwaseun', 'Kehinde', 'Oyewalekehinde34@green.com', 'Qwerty1234', 'council'),
(83, 'Oluwaseun', 'Kehinde', 'Oyewalekehinde34@green.com', 'Qwerty1234', 'council'),
(86, 'Oluwaseun', 'Oyewale', 'Red@green.com', 'Qwerretfd', 'council'),
(88, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '53553', 'council'),
(89, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '557757676', 'council'),
(90, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com44', '33242', 'council'),
(91, 'Revolut', 'Revolut', 'oyewalekehinde94@gmail.com', 'jbjbbjjbbj', 'company'),
(92, 'Revolut', 'Revolut', 'oyewalekehinde64@gmail.com', '888778', 'company'),
(93, 'Revolut', 'Revolut', 'oyewalekehinde39@gmail.com', '886688688', 'company'),
(94, 'Revolut', 'Revolut', 'oyewalekehin34@gmail.com', '666788', 'company'),
(95, 'Monzo', 'Monzo', 'oyewalekehinddffdfsffe34@gmail.com', 'ffwwffw', 'company'),
(96, 'Monzo', 'Monzo', 'oyewalekehindewewedwd34@gmail.com', '332232', 'company'),
(97, 'Revolut', 'Revolut', 'oyewalekehinde3wwewd4@gmail.com', '223232322', 'company'),
(98, 'Revolut', 'Revolut', 'oyewalekehindessdsds34@gmail.com', 'sdewew', 'company'),
(99, 'Revolut', 'Revolut', 'oyewalekehinde454@gmail.com', 'wr4tt3434', 'company'),
(100, 'Kenny Oyewale', 'Kenny Oyewale', 'oyewalekehie34@gmail.com', '56566555', 'company'),
(101, 'Simileoluwa Bolajoko', 'Simileoluwa Bolajoko', 'oyewalekehindfessvde34@gmail.com', 's6trerggrrg', 'company'),
(102, 'Kenny Oyewale', 'Kenny Oyewale', 'oyewalekehindedvdvdv34@gmail.com', '454464364', 'company'),
(103, 'Oluwaseun', 'Oyewale', 'oyewalekehinde365@gmail.com', '664664646', 'resident'),
(104, 'Oluwaseun', 'Oyewale', 'oyewalekehinde343rdc@gmail.com', '54554', 'resident'),
(105, 'Revolut', 'Revolut', 'dsddoyewalekehinde34@gmail.com', '35345trgf', 'company'),
(106, 'dfewfewfewf', 'efewfewfw', 'oyewalekehinde34@gmail.comwefewfew', 'rewrwefewfw', 'council'),
(107, 'Oluwaseun', 'Oyewale', 'oyewalekehindeedac34@gmail.com', '3555', 'resident'),
(108, 'Qwerty Company', 'Qwerty Company', 'oyewalekehinde2021@gmail.com', '12345', 'company'),
(109, 'Patience', 'Kuda', 'patience@gmail.com', '12345', 'resident'),
(110, 'Kevlin', 'Bamboo', 'kelvin34@gmail.com', '12345', 'resident'),
(111, 'Monzo bank', 'Monzo bank', 'oyewalekehinde65@gmail.com', '123456', 'company');

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
(8, 'Ms', 'Oluwaseun', 'Oyewale', 'oyewalekehinde365@gmail.com', '07477932119', 3, 'Teenager (13-19)', 'Non-binary', 'Energy', NULL, 103),
(12, 'Mr', 'Kevlin', 'Bamboo', 'kelvin34@gmail.com', '95050545445', 16, 'Middle-aged adult (40-64)', 'Agender', 'Waste Reduction', NULL, 110);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `vote` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `product`, `user`, `vote`) VALUES
(1, 4, 1, 'FALSE'),
(2, 3, 1, 'TRUE'),
(4, 11, 1, 'TRUE'),
(6, 3, 39, 'TRUE');

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
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident` (`user`),
  ADD KEY `product` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`product`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
