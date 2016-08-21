-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 10:48 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--
CREATE DATABASE `onlinestore`;
-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bayt` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `user_id`, `product_id`, `created_at`, `bayt`) VALUES
(4, 13, 6, '2016-05-10 22:18:19', 0),
(5, 13, 5, '2016-05-10 22:18:23', 0),
(6, 13, 1, '2016-05-10 22:18:30', 0),
(7, 1, 5, '2016-05-11 18:27:51', 0),
(8, 1, 4, '2016-05-11 18:27:56', 0),
(9, 1, 4, '2016-05-11 19:01:28', 0),
(10, 15, 6, '2016-05-11 20:16:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_descriptin` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_descriptin`, `created_at`, `updated_at`) VALUES
(2, 'Computer & Office', 'Some thing about teknologji', '2016-05-08 23:02:52', '0000-00-00 00:00:00'),
(3, 'Men''s Clothing', '', '2016-05-08 23:01:43', '0000-00-00 00:00:00'),
(4, 'Women''s Clothing', '', '2016-05-08 23:01:50', '0000-00-00 00:00:00'),
(5, 'Phones & Accessories', '', '2016-05-08 23:02:32', '0000-00-00 00:00:00'),
(6, 'Consumer Electronics', '', '2016-05-08 23:03:18', '0000-00-00 00:00:00'),
(7, 'Jewelry & Watches', '', '2016-05-08 23:03:44', '0000-00-00 00:00:00'),
(8, 'Home & Garden', '', '2016-05-08 23:03:59', '0000-00-00 00:00:00'),
(9, 'Bags & Shoes', '', '2016-05-08 23:04:08', '0000-00-00 00:00:00'),
(10, 'Toys, Kids & Baby', '', '2016-05-08 23:04:20', '0000-00-00 00:00:00'),
(11, 'Sports & Outdoors', '', '2016-05-08 23:04:30', '0000-00-00 00:00:00'),
(12, 'Automobiles & Motorcycles', '', '2016-05-08 23:04:46', '0000-00-00 00:00:00'),
(13, 'Home Improvement', '', '2016-05-08 23:04:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(7) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `category_id` int(8) NOT NULL,
  `price` varchar(20) NOT NULL,
  `post_price` varchar(20) NOT NULL,
  `shipment_time` varchar(255) NOT NULL,
  `shipment_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `product_description`, `quantity`, `category_id`, `price`, `post_price`, `shipment_time`, `shipment_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'Iphone 6s', 'The iPhone 6S and iPhone 6S Plus (stylized as iPhone 6s and iPhone 6s Plus) are smartphones designed by Apple Inc. The iPhone 6S and iPhone 6S Plus are the current flagship devices of the iPhone series and were announced on September 9, 2015, at the Bill Graham Civic Auditorium in San Francisco by Apple Inc. CEO Tim Cook. The iPhone 6S and iPhone 6S Plus jointly serve as successors to the iPhone 6 and iPhone 6 Plus of 2014.[14]', 100, 2, '650', '0', '30', '111', '2016-05-09 13:58:20', '2016-05-09 13:58:20'),
(2, 2, 'Samsung galaxy S6', 'Something about galaxy s7 ', 100, 2, '500', '0', '30', '111', '2016-05-09 15:01:44', '2016-05-09 15:01:44'),
(4, 2, 'LeEco max 2', 'Leshi Internet Information & Technology, also known as LeEco (Formerly Letv), is a Chinese technology company, and one of the largest online video companies in China. It is headquartered in Chaoyang District, Beijing.\r\n\r\nFounded in November 2004 by Jia Yueting, LeEco Group is building a "Le Ecosystem", an online platform with content, devices and applications. LeEco is engaged in myriad businesses, spanning from Internet TV, video production and distribution, smart gadgets and large-screen applications to e-commerce, eco-agriculture and Internet-linked electric cars, which were announced in late 2014.\r\n\r\nIt has launched four smartphones under its Le brand - the Le 1, Le 1 Pro, Le Max and Le 1S. The four dual-SIM smartphones are claimed to be the first in the world to come with USB Type-C ports. LeEco Group also consists of the film production company called Le Vision Pictures.\r\n\r\nThe company has 5,000 employees, and is expanding to other countries such as the United States[2] and India.[3]', 150, 2, '500', '0', '30', '111', '2016-05-09 15:14:36', '2016-05-09 15:14:36'),
(5, 2, 'HTC ONE M8 ', 'Some thing about Htc ONE m8Some thing about Htc ONE m8Some thing about Htc ONE m8Some thing about Htc ONE m8Some thing about Htc ONE m8Some thing about Htc ONE m8Some thing about Htc ONE m8Some thing about Htc ONE m8', 100, 2, '470', '0', '30', '111', '2016-05-09 15:28:43', '2016-05-09 15:28:43'),
(6, 2, 'Joseph Morgan', 'Adipisci velit, voluptate aute nisi fugiat, deserunt saepe temporibus eum est qui consectetur neque dolor.', 69, 5, '62', '67', '30', '111', '2016-05-09 19:16:49', '2016-05-09 19:16:49'),
(7, 1, 'Mouse Razer', 'some thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razersome thing about mouse razer', 111, 2, '54', '0', '30', '111', '2016-05-10 06:24:06', '2016-05-10 06:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/products/2/1462802300_iphone-6.jpg', '2016-05-09 13:58:20', '2016-05-09 13:58:20'),
(2, 2, 'public/products/2/1462806104_samsung-galaxy-s7-edge-review-verdict.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'public/products/2/1462806533_leeco_le_2_ndtv.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 'public/products/2/1462806876_leeco_le_2_ndtv.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 'public/products/2/1462807723_images.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 'public/products/2/1462821409_girl2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 'public/products/1/1462861446_B00EWEHI5K_img1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `seller_id`, `product_id`, `comment`) VALUES
(1, 2, 2, 1, 'asasass'),
(2, 2, 2, 1, '\nNjë roje perandorake dhe tre miqtë e tij tradhëtarë të fëmijërisë të urdhëruar për ta kapur, varrosen aksidentalisht dhe ngrijnë në kohë. 400 vjet më vonë, ata shkrijnë dhe vazhdojnë betejën që kishin lënë përgjysëm.'),
(3, 2, 2, 0, 'asdasda'),
(4, 2, 2, 1, 'asdqadq'),
(5, 2, 2, 1, 'Përshkrimi\nNjë roje perandorake dhe tre miqtë e tij tradhëtarë të fëmijërisë të urdhëruar për ta kapur, varrosen aksidentalisht dhe ngrijnë në kohë. 400 vjet më vonë, ata shkrijnë dhe vazhdojnë betejën që kishin lënë përgjysëm.'),
(6, 2, 2, 1, 'NjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.'),
(7, 1, 2, 5, 'PÃ«rshkrimi\r\nNjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.\r\n'),
(8, 1, 2, 6, 'PÃ«rshkrimi\r\nNjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.'),
(9, 1, 2, 5, 'PÃ«rshkrimi\r\nNjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.PÃ«rshkrimi\r\nNjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.PÃ«rshkrimi\r\nNjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.'),
(10, 1, 2, 1, 'Test about this '),
(11, 1, 2, 6, 'awkldnmwl we '),
(12, 2, 2, 4, 'Telefoni ma i mir ne bot'),
(13, 1, 1, 7, 'werf we3 4'),
(14, 13, 2, 6, 'PÃ«rshkrimi NjÃ« roje perandorake dhe tre miqtÃ« e tij tradhÃ«tarÃ« tÃ« fÃ«mijÃ«risÃ« tÃ« urdhÃ«ruar pÃ«r ta kapur, varrosen aksidentalisht dhe ngrijnÃ« nÃ« kohÃ«. 400 vjet mÃ« vonÃ«, ata shkrijnÃ« dhe vazhdojnÃ« betejÃ«n qÃ« kishin lÃ«nÃ« pÃ«rgjysÃ«m.'),
(15, 13, 2, 2, 'f;lkwe ;lkf;lk ;l'),
(16, 13, 2, 2, 'f;lkwe ;lkf;lk ;l');

-- --------------------------------------------------------

--
-- Table structure for table `slide_offer`
--

CREATE TABLE `slide_offer` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_offer`
--

INSERT INTO `slide_offer` (`id`, `product_id`, `created_at`) VALUES
(1, 1, '2016-05-11 19:43:04'),
(2, 4, '2016-05-11 19:43:04'),
(3, 2, '2016-05-11 19:43:04'),
(4, 7, '2016-05-11 19:43:04'),
(5, 6, '2016-05-11 19:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `mbiemri` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `mbiemri`, `email`, `password`, `category`) VALUES
(1, 'VALON', 'HAJREDINI', 'hajredini.valon@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(2, 'Granit', 'Hulaj', 'granit@hajredini.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(3, 'Filan', 'Fisteku', 'f@fisteku.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(4, 'Valon', 'hajredini', 'hajredini.valon1@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(5, 'Test_person', 'Test', 'test@test.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(6, 'Naida Jefferson', 'Whoopi Pickett', 'xopow@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(7, 'Steven Parrish', 'Robin Barker', 'wuzo@yahoo.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(8, 'Steven Parrish', 'Robin Barker', 'wuzo2@yahoo.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(9, 'Clayton Haynes', 'Sydney Phillips', 'tukuvy@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(10, 'September Ramsey', 'Stone Fry', 'xevywa@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(11, 'Simon Bryan', 'Cooper Valdez', 'zecy@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(12, 'Iona Whitney', 'Diana Crawford', 'tila@yahoo.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(13, 'Leigh Carter 1', 'Lois Olson', 'wavep@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(14, 'Rogan Wall', 'Solomon Hardy', 'mepogi@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 1),
(15, 'Kiona Erickson', 'Brian Hamilton', 'ligu@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(16, 'Amber Fulton', 'Magee Casey', 'xikojatar@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_offer`
--
ALTER TABLE `slide_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `slide_offer`
--
ALTER TABLE `slide_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
