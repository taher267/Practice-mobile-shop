-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 07:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(1, 1, 8),
(2, 1, 3),
(3, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 152.00, './assets/products/1.png', '2021-04-17 22:02:58'),
(2, 'Redmi', 'Redmi Note 7', 122.00, './assets/products/2.png', '2021-04-17 22:02:58'),
(3, 'Redmi', 'Redmi Note 6', 122.00, './assets/products/3.png', '2021-04-17 22:02:58'),
(4, 'Redmi', 'Redmi Note 5', 122.00, './assets/products/4.png', '2021-04-17 22:02:58'),
(5, 'Redmi', 'Redmi Note 4', 122.00, './assets/products/5.png', '2021-04-17 22:02:58'),
(6, 'Redmi', 'Redmi Note 8', 122.00, './assets/products/6.png', '2021-04-17 22:02:58'),
(7, 'Redmi', 'Redmi Note 9', 122.00, './assets/products/8.png', '2021-04-17 22:02:58'),
(8, 'Redmi', 'Redmi Note', 122.00, './assets/products/10.png', '2021-04-17 22:02:58'),
(9, 'Samsung', 'Samsung Galaxy S6', 152.00, './assets/products/11.png', '2021-04-17 22:02:58'),
(10, 'Samsung', 'Samsung Galaxy S7', 152.00, './assets/products/12.png', '2021-04-17 22:02:58'),
(11, 'Apple', 'Apple iPhone 5', 152.00, './assets/products/13.png', '2021-04-17 22:02:58'),
(12, 'Apple', 'Apple iPhone 6', 152.00, './assets/products/14.png', '2021-04-17 22:02:58'),
(13, 'Apple', 'Apple iPhone 7', 152.00, './assets/products/15.png', '2021-04-17 22:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `register_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `user_email`, `user_pass`, `register_date`) VALUES
(1, 'Abu', 'Taher', 'taher267', 'taher267@gmail.com', '$2y$07$minimumTwintyTwoDigiteDLak1d2n.eIe3tzIzQ5EXgUz49VzTvS', '2021-04-17 16:02:58'),
(2, 'Akshay', 'Kashyap', '', '', '', '2021-04-17 16:02:58'),
(3, 'Abu', 'Abu', 'abu267', 'abu@gmail.com', '$2y$07$minimumTwintyTwoDigiteDLak1d2n.eIe3tzIzQ5EXgUz49VzTvS', '2021-04-18 06:31:09'),
(4, 'Md. Nazir', 'Hossain Shik', 'nazir', 'nazir@shik.com', '$2y$07$minimumTwintyTwoDigiteDLak1d2n.eIe3tzIzQ5EXgUz49VzTvS', NULL),
(5, 'Md', 'zakaria', 'zakaria', 'zakaria@almahmud.com', '$2y$07$minimumTwintyTwoDigiteDLak1d2n.eIe3tzIzQ5EXgUz49VzTvS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
