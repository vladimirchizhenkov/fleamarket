-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2019 at 02:32 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.22-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleaphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(64) NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `category_parent` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fast_trade`
--

CREATE TABLE `fast_trade` (
  `ftrade_id` int(11) NOT NULL,
  `ftrade_user` varchar(128) NOT NULL,
  `ftrade_contact` varchar(512) NOT NULL,
  `ftrade_city` varchar(128) NOT NULL,
  `ftrade_product` varchar(256) NOT NULL,
  `ftrade_price` int(11) NOT NULL,
  `ftrade_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ftrade_photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fast_trade`
--

INSERT INTO `fast_trade` (`ftrade_id`, `ftrade_user`, `ftrade_contact`, `ftrade_city`, `ftrade_product`, `ftrade_price`, `ftrade_date`, `ftrade_photo`) VALUES
(1, 'Чиженков Владимир', '8 995 335 21 15', 'Самарская Область, Тольятти', 'Кошки мягкие Vento (б/у)', 3500, '2019-09-23 19:23:41', ''),
(2, 'Дуденко Александр', '8 998 321 15 35', 'Самарская область, Бахилово', 'Туфли скальные', 5000, '2019-09-23 19:23:41', ''),
(3, 'test', 'test', 'test', 'test', 5000, '2019-10-21 19:31:14', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(128) NOT NULL,
  `product_price` int(64) NOT NULL,
  `product_user` varchar(128) NOT NULL,
  `product_photo` varchar(512) NOT NULL,
  `product_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(512) NOT NULL,
  `user_city` varchar(512) NOT NULL,
  `user_tel` int(24) NOT NULL,
  `user_password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `fast_trade`
--
ALTER TABLE `fast_trade`
  ADD PRIMARY KEY (`ftrade_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(64) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fast_trade`
--
ALTER TABLE `fast_trade`
  MODIFY `ftrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
