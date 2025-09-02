-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018, at 11:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `store`

-- Check if the table exists before creating it
DROP TABLE IF EXISTS `users_items`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `del_boys`;
DROP TABLE IF EXISTS `shops`;
DROP TABLE IF EXISTS `shop_fruits`;

-- Table structure for table `items`
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `items`
INSERT INTO `items` (`id`, `name`, `price`) VALUES
(1, 'Banana', 100),
(2, 'rapple', 210),
(3, 'orange', 150),
(4, 'pineapple', 120),
(5, 'rawmangoes', 80),
(6, 'cherry', 290),
(7, 'pomegranate', 120),
(8, 'greenapples', 250),
(9, 'strawberry', 320),
(10, 'kiwi', 150),
(11, 'watermelon', 30),
(12, 'greengrapes', 100),
(13, 'mango', 150),
(14, 'blackgrapes', 80),
(15, 'sapota', 60),
(16, 'pear', 70),
(17, 'avocado', 120),
(18, 'cucumber', 30),
(19, 'periyanellikai', 120),
(20, 'papaya', 30),
(21, 'PINK', 1200);

-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(4, 'yugesh verma', 'yugeshverma32@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '6263056779', 'bhilai', '25 commercial complex, nehru nagar, east near vijaya bank, bhilai C.G.'),
(5, 'yugesh', 'yugeshverma@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9165063741', 'bhilai', 'bhilai');

-- Table structure for table `users_items`
CREATE TABLE `users_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL,
  PRIMARY KEY (`id`),  -- Primary key definition
  KEY `user_id` (`user_id`,`item_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `users_items`
INSERT INTO `users_items` (`user_id`, `item_id`, `status`) VALUES
(4, 2, 'Confirmed'),
(5, 11, 'Added to cart'),
(5, 5, 'Added to cart');

-- Table structure for table `shop_fruits`
CREATE TABLE `shop_fruits` (
  `fruit_id` INT AUTO_INCREMENT PRIMARY KEY,
  `fruit_name` VARCHAR(255) NOT NULL,
  `quantity` INT NOT NULL
);

-- Dumping data for table `shop_fruits`
INSERT INTO `shop_fruits` (`fruit_name`, `quantity`) VALUES
('Apple', 10),
('Banana', 20),
('Orange', 15);

-- Table structure for table `shops`
CREATE TABLE `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `shops`
INSERT INTO `shops` (`id`, `shopname`, `email`, `password`, `contact`, `city`, `address`) VALUES
(4, 'raju&co', 'raj32@gmail.com', 'hashed_password_here', '6263056779', 'delhi', '6/546,dubai kurukkusanthu,delhi'),
(5, 'yugeshkart', 'yugeshverma@gmail.com', 'hashed_password_here', '9165063741', 'kolkata', 'kolkata');

-- Table structure for table `del_boys`
CREATE TABLE `del_boys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `del_boys`
INSERT INTO `del_boys` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(4, 'yugesh verma', 'yugeshverma32@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '6263056779', 'bhilai', '25 commercial complex, nehru nagar, east near vijaya bank, bhilai C.G.'),
(5, 'yugesh', 'yugeshverma@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9165063741', 'bhilai', 'bhilai');

-- Indexes for dumped tables

-- Indexes for table `items`
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `users_items`
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

-- Indexes for table `shop_fruits`
ALTER TABLE `shop_fruits`
  ADD PRIMARY KEY (`fruit_id`);

-- Indexes for table `shops`
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `del_boys`
ALTER TABLE `del_boys`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `items`
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;  -- Increased AUTO_INCREMENT value to ensure no conflicts

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- AUTO_INCREMENT for table `users_items`
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;  -- Increased AUTO_INCREMENT value to ensure no conflicts

-- AUTO_INCREMENT for table `shop_fruits`
ALTER TABLE `shop_fruits`
  MODIFY `fruit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- AUTO_INCREMENT for table `shops`
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- AUTO_INCREMENT for table `del_boys`
ALTER TABLE `del_boys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- Constraints for dumped tables

-- Constraints for table `users_items`
ALTER TABLE `users_items`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
