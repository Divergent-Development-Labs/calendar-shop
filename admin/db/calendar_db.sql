-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2020 at 01:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(20) NOT NULL,
  `customer` int(20) DEFAULT NULL,
  `calendar_type` varchar(50) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `is_custom_design` varchar(5) NOT NULL,
  `design` varchar(500) DEFAULT NULL,
  `rate` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `cost` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer`, `calendar_type`, `size`, `is_custom_design`, `design`, `rate`, `quantity`, `cost`) VALUES
(26, 2, 'Daily', '10\"x11\"', 'false', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 10, 1, 10),
(27, 2, 'Daily', '10\"x11\"', 'false', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 10, 1, 10),
(28, 2, 'Monthly - 12 Sheet', '10\"x11\"', 'false', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 10, 1, 10),
(29, 2, 'Monthly - 12 Sheet', '10\"x11\"', 'false', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 10, 1, 10),
(30, 2, 'Monthly - 12 Sheet', '10\"x11\"', 'false', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 10, 1, 10),
(31, 2, 'Monthly - 12 Sheet', '20\"x10\"', 'false', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 22, 2, 44),
(37, 1, 'Monthly - 6 Sheet', '10\"x10\"', 'false', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_line` varchar(500) NOT NULL,
  `area` varchar(500) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `mobile_number`, `email`, `address_line`, `area`, `district`, `state`, `pincode`) VALUES
(1, 'new customer by rk', '9043067670', '', '11', 'anna nagar', 'Madurai', 'Tamil Nadu', '625005'),
(2, 'new customer by rk 2', '9043067671', '', '11', '', '', 'Tamil Nadu', '625005'),
(5, 'n', '9', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `design_link` varchar(255) NOT NULL,
  `is_custom_design` varchar(5) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `name`, `design_link`, `is_custom_design`, `user_id`) VALUES
(1, 'new design by rk', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 'false', 0),
(6, 'design 1', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 'false', 0),
(7, 'murugan-1', '1pG3kPQ2jQtu0ZWq6gX-RoETxQn3omspm', 'false', 0),
(8, 'vinayaga-1', '1CcBWNDQuj7Pl_hfiMKLrpLTR517Lgocz', 'false', 0),
(9, 'Elephant_Walking_At_Sunset_Time_4K_Photo', '1CcBWNDQuj7Pl_hfiMKLrpLTR517Lgocz', 'false', 0),
(10, 'Wild_Elephant_5K_Wallpaper', 'public/1/Wild_Elephant_5K_Wallpaper.jpg', 'true', 1),
(11, 'plot', 'public/1/plot.jpg', 'true', 1),
(12, 'house3', 'public/1/house3.jpg', 'true', 1),
(13, 'nature-1599385758922-3886', 'public/2/nature-1599385758922-3886.jpg', 'true', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(2) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `products` varchar(10000) NOT NULL,
  `subtotal` int(15) NOT NULL,
  `gst` int(10) NOT NULL,
  `total` int(15) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `products`, `subtotal`, `gst`, `total`, `payment_status`, `order_date`) VALUES
(11, 1, '[{\"calendar_type\":\"Monthly - 12 Sheet\",\"size\":\"10\\\"x11\\\"\",\"design\":\"14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm\",\"rate\":\"10.00\",\"quantity\":\"2.00\",\"cost\":\"20.00\"}]', 20, 1, 22, 'false', '2020-11-10 11:22:31'),
(12, 1, '[{\"calendar_type\":\"Monthly - 12 Sheet\",\"size\":\"10\\\"x11\\\"\",\"design\":\"14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm\",\"rate\":\"10.00\",\"quantity\":\"1.00\",\"cost\":\"10.00\"},{\"calendar_type\":\"Monthly - 12 Sheet\",\"size\":\"10\\\"x11\\\"\",\"design\":\"1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj\",\"rate\":\"10.00\",\"quantity\":\"1.00\",\"cost\":\"10.00\"},{\"calendar_type\":\"Monthly - 6 Sheet\",\"size\":\"20\\\"x10\\\"\",\"design\":\"1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj\",\"rate\":\"5.00\",\"quantity\":\"2.00\",\"cost\":\"10.00\"}]', 30, 2, 34, 'false', '2020-11-18 08:39:00'),
(13, 1, '[{\"calendar_type\":\"Monthly - 6 Sheet\",\"size\":\"10\\\"x10\\\"\",\"is_custom_design\":\"true\",\"design\":\"public/1/plot.jpg\",\"rate\":\"1.00\",\"quantity\":\"1.00\",\"cost\":\"1.00\"},{\"calendar_type\":\"Monthly - 6 Sheet\",\"size\":\"10\\\"x10\\\"\",\"is_custom_design\":\"true\",\"design\":\"public/1/Wild_Elephant_5K_Wallpaper.jpg\",\"rate\":\"1.00\",\"quantity\":\"1.00\",\"cost\":\"1.00\"},{\"calendar_type\":\"Monthly - 6 Sheet\",\"size\":\"20\\\"x10\\\"\",\"is_custom_design\":\"false\",\"design\":\"1CcBWNDQuj7Pl_hfiMKLrpLTR517Lgocz\",\"rate\":\"22.00\",\"quantity\":\"1.00\",\"cost\":\"22.00\"}]', 24, 1, 27, 'false', '2020-11-19 04:43:09'),
(14, 5, '[{\"calendar_type\":\"Monthly - 12 Sheet\",\"size\":\"10\\\"x10\\\"\",\"is_custom_design\":\"true\",\"design\":\"public/1/Wild_Elephant_5K_Wallpaper.jpg\",\"rate\":\"20.00\",\"quantity\":\"2.00\",\"cost\":\"40.00\"},{\"calendar_type\":\"Daily\",\"size\":\"20\\\"x10\\\"\",\"is_custom_design\":\"false\",\"design\":\"1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj\",\"rate\":\"22.00\",\"quantity\":\"12.00\",\"cost\":\"264.00\"}]', 304, 36, 340, 'false', '2020-11-19 07:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `customer` int(20) NOT NULL,
  `calendar_type` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `is_custom_design` varchar(5) NOT NULL,
  `design` varchar(500) NOT NULL,
  `rate` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `order_id`, `customer`, `calendar_type`, `size`, `is_custom_design`, `design`, `rate`, `quantity`, `cost`) VALUES
(16, 11, 1, 'Monthly - 12 Sheet', '10\"x11\"', 'false', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 10, 2, 20),
(17, 12, 1, 'Monthly - 12 Sheet', '10\"x11\"', 'false', '14UEEUis9q0UByJvGuJJb5gKNbKYJoJYm', 10, 1, 10),
(18, 12, 1, 'Monthly - 12 Sheet', '10\"x11\"', 'false', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 10, 1, 10),
(19, 12, 1, 'Monthly - 6 Sheet', '20\"x10\"', 'false', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 5, 2, 10),
(20, 13, 1, 'Monthly - 6 Sheet', '10\"x10\"', 'true', 'public/1/plot.jpg', 1, 1, 1),
(21, 13, 1, 'Monthly - 6 Sheet', '10\"x10\"', 'true', 'public/1/Wild_Elephant_5K_Wallpaper.jpg', 1, 1, 1),
(22, 13, 1, 'Monthly - 6 Sheet', '20\"x10\"', 'false', '1CcBWNDQuj7Pl_hfiMKLrpLTR517Lgocz', 22, 1, 22),
(23, 14, 5, 'Monthly - 12 Sheet', '10\"x10\"', 'true', 'public/1/Wild_Elephant_5K_Wallpaper.jpg', 20, 2, 40),
(24, 14, 5, 'Daily', '20\"x10\"', 'false', '1hQd1VEh_nACVvHy7zNEsVvP7hW8-UvCj', 22, 12, 264);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(2) NOT NULL,
  `size_label` varchar(255) NOT NULL,
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_label`, `width`, `height`, `rate`) VALUES
(1, '10\"x10\"', 10, 10, 20),
(4, '10\"x11\"', 10, 11, 10),
(5, '20\"x10\"', 20, 10, 22),
(7, '10\"x21\"', 10, 21, 21),
(8, '12\"x12\"', 12, 12, 90);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `address_line_1`, `address_line_2`, `city`, `state`, `pin_code`) VALUES
(1, 'admin', 'admin', 'Y2Ry', '', '', '', '', '', 0),
(2, 'new user', 'new user', '9043067670', 'dummy@d.com', '11', 'main road', 'TPK-Madurai', 'Madurai', 625005);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size_label` (`size_label`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
