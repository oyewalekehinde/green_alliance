-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2024 at 02:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
(1, ' 32 Downs road', 'LU1 1QR', 3);

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
(2, 'Qwerty Company', '07477932119', 'Room 7, 32 Downs road', 13, 8),
(3, 'Revolut', '07477932119', 'Room 7, 32 Downs road', 2, 15),
(4, 'Revolut', '07477932119', 'Room 7, 32 Downs road', 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
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
(1, 'Reduce, Reuse, Recyle', 200, 'To reduce waste in the community', 'Small', 'it is very Good', 'Affordable', 'Green energies products', 1),
(2, 'Implementing waste reduction strategies', 100, 'Implementing waste reduction strategies', 'Medium', 'Implementing waste reduction strategies', 'Affordable', 'Green energies products', 1),
(3, 'Recycling materials like paper, plastic, glass, and metal.', 200, 'Recycling materials like paper, plastic, glass, and metal.', 'Small', 'Recycling materials like paper, plastic, glass, and metal.', 'Moderate', 'Green energies products', 1),
(4, 'Composting', 20, 'Composting', 'Small', 'Composting', 'Premium', 'Green energies products', 1),
(5, 'Turning organic waste into nutrient-rich compost for gardens', 20, 'Turning organic waste into nutrient-rich compost for gardens', 'Medium', 'Turning organic waste into nutrient-rich compost for gardens', 'Affordable', 'Green energies products', 0),
(6, 'Energy Conservation:', 10, 'Energy Conservation:', 'Medium', 'Energy Conservation:', 'Affordable', 'Green energies products', 0),
(7, 'Using energy-efficient appliances and lighting.', 200, 'Using energy-efficient appliances and lighting.', 'Medium', 'Using energy-efficient appliances and lighting.', 'Affordable', 'Green energies products', 0),
(8, 'Turning off lights and electronics when not in use', 30, 'Turning off lights and electronics when not in use', 'Small', 'Turning off lights and electronics when not in use', 'Moderate', 'Green energies products', 0),
(9, 'Water Conservation', 200, 'Water Conservation', 'Medium', 'Water Conservation', 'Affordable', 'Green energies products', 0),
(10, 'Fixing leaks and using low-flow fixtures', 200, 'Fixing leaks and using low-flow fixtures', 'Medium', 'Fixing leaks and using low-flow fixtures', 'Premium', 'Green energies products', 0),
(11, 'Collecting rainwater for watering plants', 20, 'Collecting rainwater for watering plants', 'Medium', 'Collecting rainwater for watering plants', 'Moderate', 'Green energies products', 1),
(12, 'Reusable Water Bottles', 200, 'Stainless steel or glass bottles to reduce single-use plastic', 'Small', 'for drinking Water', 'Affordable', 'Green energies products', 0),
(13, 'Bamboo Products', 100, 'Biodegradable and sustainable alternative to plastic', 'Medium', 'it is use for building', 'Moderate', 'Green energies products', 0),
(14, 'LED Bulbs', 200, 'Energy-efficient lighting solutions with a longer lifespan.', 'Medium', 'it is use for lighting', 'Moderate', 'Green energies products', 1),
(15, 'Cloth Shopping Bags', 200, 'Reusable fabric bags to reduce reliance on plastic bags', 'Medium', 'it is use for shopping', 'Moderate', 'Green energies products', 1);

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
(3, 'Oluwaseun', 'Oyewale', 'oyewalekehinde34@gmail.com', '12345', 'council'),
(4, 'Oluwaseun', 'Oyewale', 'oyewalekehinde35@gmail.com', '12345', 'resident'),
(5, 'Oluwaseun', 'Oyewale', 'oyewalekehinde74@gmail.com', '12345', 'resident'),
(6, 'Oluwaseun', 'Oyewale', 'oyewalekehinde434@gmail.com', '12345', 'resident'),
(8, 'Qwerty Company', 'Qwerty Company', 'oyewalekehinde44@gmail.com', '12345', 'company'),
(9, 'Taiwo', 'Oyewale', 'oyewaletaiwo34@gmail.com', '12345', 'resident'),
(15, 'Revolut', 'Revolut', 'oyewalekehindee34@gmail.com', '12345', 'company'),
(16, 'Revolut', 'Revolut', 'oyewalekehinde134@gmail.com', '12345', 'company');

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
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `title`, `first_name`, `last_name`, `email`, `phone`, `area`, `age_group`, `gender`, `interest`, `user`) VALUES
(1, 'Dr', 'Oluwaseun', 'Oyewale', 'oyewalekehinde35@gmail.com', '07477932119', 1, 'Middle-aged adult (40-64)', 'Non-binary', 'Waste Reduction', 4),
(2, 'Ms', 'Oluwaseun', 'Oyewale', 'oyewalekehinde74@gmail.com', '07477932119', 1, 'Teenager (13-19)', 'Female', 'Waste Reduction', 5),
(3, 'Dr', 'Oluwaseun', 'Oyewale', 'oyewalekehinde434@gmail.com', '07477932119', 1, 'Teenager (13-19)', 'Male', 'Waste Reduction', 6),
(4, 'Prof', 'Taiwo', 'Oyewale', 'oyewaletaiwo34@gmail.com', '07477932119', 1, 'Young Adult (20-39)', 'Male', 'Waste Reduction', 9);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `vote` varchar(5) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `product`, `user`, `vote`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 'TRUE', '2024-04-24', '2024-04-24'),
(2, 3, 9, 'TRUE', '2024-04-24', '2024-04-24'),
(3, 4, 9, 'TRUE', '2024-04-24', '2024-04-24'),
(4, 1, 9, 'TRUE', '2024-04-24', '2024-04-24'),
(5, 15, 9, 'TRUE', '2024-04-24', '2024-04-24'),
(6, 14, 9, 'TRUE', '2024-04-24', '2024-04-24'),
(7, 11, 9, 'TRUE', '2024-04-24', '2024-04-24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `resident_ibfk_2` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`user`) REFERENCES `registration` (`id`);
COMMIT;
