-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 02:48 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faith_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_fname` varchar(50) NOT NULL,
  `cus_uname` varchar(50) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_pwd` varchar(100) NOT NULL,
  `cus_address` varchar(100) NOT NULL,
  `cus_tel` varchar(15) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_fname`, `cus_uname`, `cus_email`, `cus_pwd`, `cus_address`, `cus_tel`, `date_registered`) VALUES
(6, 'Samuel Owusu', 'sowusu', 'owususamuel12@gmail.com', '$2y$10$ayvlsfNyjV5JQBycocw4DOcljJYPieIOqrNmduyWSONIOpx1f2mBC', 'oxford street', '0547576916', '2018-01-09 21:31:06'),
(7, 'Peter Ayambire', 'payam', 'payam@gmail.com', '$2y$10$WiIDDQfspy5nhPqRZbU/oOPbkud1tVnY5EUwYIuiar2dHfN7FwsCC', 'Bawku', '0123456789', '2018-01-09 23:03:59'),
(8, 'Kelly Mahola', 'Kelly123', 'kels@yahoo.com', '$2y$10$/OsS9R0k4OJDYx3SVhY8pORjZTfEOJ9nzF2rI3Xt8MZn/lxRaTvAa', 'Ho', '9874563210', '2018-01-09 23:05:12'),
(9, 'Peter', 'Manu', 'pete@gmail.com', '$2y$10$s3BOyRUp0vS51tCcb2R9w.080c3P792H4TiUHzd8mpBVxxhn.5PXu', 'Bolgatanga', '0242309290', '2018-01-24 21:35:21'),
(10, 'Joseph Sena', 'jsena', 'jsena@yahoo.com', '$2y$10$tOzRxGmC7fXUqqJfP33hqeiFAN5FX.BDLPgmJU6KN0e2lmmTTZtzi', 'Teshie Nungua', '0202651247', '2018-01-24 21:43:32'),
(11, 'Emmanuel Owusu', 'eowusu', 'eowusu@gmail.com', '$2y$10$bPu8nTn6xCdb8bQGmivHm.7mTzvKIrE/IFSUKfXk.8JALSVIXpUJe', 'Adanseman', '0242309290', '2018-04-14 16:06:30'),
(12, 'Dora Sarfoah', 'dora', 'dora@b.com', '$2y$10$C0bM4g20P5AzRahGvPHlL..xsxcVxhNEm6eAuQec7MVeq5dN8Znwy', 'adanseman', '0214569876', '2018-04-14 21:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_img` varchar(60) NOT NULL,
  `menu_category` varchar(30) NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_img`, `menu_category`, `menu_price`, `date_added`) VALUES
(1, 'Waakye', '8.jpg', 'Lunch', '8.50', '2018-01-08 16:41:31'),
(9, 'Porridge', 'product-image-3.jpg', 'Breakfast', '3.00', '2018-01-08 23:00:29'),
(14, 'Banku with Tilapia', '5.jpg', 'Lunch', '15.00', '2018-01-09 15:47:00'),
(16, 'Jollof Rice With Chicken', 'jollof.jpg', 'Lunch', '15.00', '2018-01-11 23:32:22'),
(17, 'Beans with ripe plantain', 'images.jpg', 'Lunch', '8.00', '2018-01-11 23:33:01'),
(18, 'Boiled Yam with Kontomire Stew', 'cooked-yam.jpg', 'Lunch', '7.50', '2018-01-11 23:33:40'),
(19, 'Fried Plantain', '4.jpg', 'Lunch', '5.00', '2018-01-24 22:17:26'),
(20, 'Rice and Stew', '9.jpg', 'Lunch', '8.00', '2018-01-24 22:18:07'),
(21, 'Gari', '9.jpg', 'Lunch', '10.00', '2018-02-20 09:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_sender` varchar(50) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `message_details` varchar(255) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_sender`, `sender_email`, `message_details`, `date_sent`) VALUES
(2, 'Peter Ayambire', 'ow@hdd.com', 'poor Service', '2018-01-15 22:42:11'),
(3, 'Samuel Owusu', 'owususamuel12@gmail.com', 'Kindly put in much work.', '2018-01-15 22:42:35'),
(4, 'Nana Kwame', 'nak@jam.com', 'Keep it up', '2018-01-15 22:43:04'),
(6, 'Peter Okoye', 'owc@gh.com', 'i am coming to school', '2018-01-24 18:43:42'),
(7, 'Petr', 'kan@h.com', 'keep it up', '2018-01-24 21:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `orderlineID` int(11) NOT NULL,
  `trans_code` varchar(50) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`orderlineID`, `trans_code`, `menu_id`, `quantity`, `total_price`, `date`) VALUES
(18, 'CJ79TF', 16, 1, '15.00', '2018-01-23'),
(19, 'CJ79TF', 14, 1, '15.00', '2018-01-23'),
(20, 'CJ79TF', 9, 1, '3.00', '2018-01-23'),
(21, 'WSZS75', 14, 1, '15.00', '2018-01-24'),
(22, 'WSZS75', 9, 1, '3.00', '2018-01-24'),
(23, 'WSZS75', 1, 2, '17.00', '2018-01-24'),
(24, 'WSZS75', 17, 2, '16.00', '2018-01-24'),
(30, 'MFIOTQ', 18, 1, '7.50', '2018-01-24'),
(31, 'MFIOTQ', 16, 1, '15.00', '2018-01-24'),
(33, 'O51H6A', 14, 1, '15.00', '2018-01-24'),
(34, 'O51H6A', 16, 2, '30.00', '2018-01-24'),
(35, 'O51H6A', 9, 1, '3.00', '2018-01-24'),
(36, 'J58TSS', 14, 1, '15.00', '2018-01-24'),
(37, 'J58TSS', 9, 2, '6.00', '2018-01-24'),
(38, 'J58TSS', 1, 1, '8.50', '2018-01-24'),
(39, 'J58TSS', 16, 1, '15.00', '2018-01-24'),
(40, 'P02IJM', 14, 1, '15.00', '2018-01-24'),
(41, 'P02IJM', 9, 1, '3.00', '2018-01-24'),
(42, '3JYPQI', 16, 2, '30.00', '2018-01-24'),
(44, '3JYPQI', 14, 1, '15.00', '2018-01-24'),
(46, 'AB9TEF', 16, 1, '15.00', '2018-02-12'),
(47, 'AB9TEF', 16, 1, '15.00', '2018-02-12'),
(48, 'AB9TEF', 9, 3, '9.00', '2018-02-12'),
(49, 'XUK0UC', 9, 2, '6.00', '2018-04-14'),
(50, 'XUK0UC', 16, 1, '15.00', '2018-04-14'),
(51, 'XUK0UC', 17, 2, '16.00', '2018-04-14'),
(53, 'XUK0UC', 19, 3, '15.00', '2018-04-14'),
(54, 'XUK0UC', 20, 4, '32.00', '2018-04-14'),
(55, 'XUK0UC', 18, 5, '37.50', '2018-04-14'),
(56, 'KINZHV', 17, 2, '16.00', '2018-04-14'),
(57, 'KINZHV', 14, 1, '15.00', '2018-04-14'),
(58, 'KINZHV', 1, 2, '17.00', '2018-04-14'),
(59, 'KINZHV', 20, 1, '8.00', '2018-04-14'),
(60, 'KINZHV', 19, 3, '15.00', '2018-04-14'),
(61, 'KINZHV', 18, 4, '30.00', '2018-04-14'),
(62, 'I0JH8M', 21, 1, '10.00', '2018-04-16'),
(63, 'I0JH8M', 1, 2, '17.00', '2018-04-16'),
(64, 'I0JH8M', 19, 3, '15.00', '2018-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `delivery_address` varchar(50) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `status` varchar(12) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `order_code`, `cus_id`, `name`, `delivery_address`, `payment_method`, `status`, `notes`, `total_amount`, `order_date`) VALUES
(11, 'CJ79TF', 6, 'Samuel Owusu', 'bncvdshvsdj', 'Cash on delivery', 'delivered', 'dgtrght', '33.00', '2018-01-23 21:13:54'),
(12, 'WSZS75', 6, 'Samuel Owusu', 'jhbvkudu', 'Cash on delivery', 'pending', 'vjkhshcvv', '51.00', '2018-01-24 09:26:21'),
(15, 'MFIOTQ', 6, 'Samuel Owusu', 'sdsdcd', 'Cash on delivery', 'delivered', 'wwwwcdcv', '22.50', '2018-01-24 18:21:41'),
(16, 'O51H6A', 6, 'Samuel Owusu', 'Banku Avenue', 'Cash on delivery', 'delivered', 'I dont like beans.', '48.00', '2018-01-24 21:37:14'),
(17, 'J58TSS', 10, 'Joseph Sena', 'Baileys Ltd.', 'Cash on delivery', 'delivered', 'cash change of 5.50', '44.50', '2018-01-24 21:45:40'),
(18, 'P02IJM', 10, 'Joseph Sena', 'Sapeiman', 'Cash on delivery', 'delivered', 'yh', '18.00', '2018-01-24 22:20:36'),
(20, 'AB9TEF', 6, 'Samuel Owusu', 'NDV XK SDJD', 'Cash on delivery', 'delivered', 'CSDNV DSCBSDJC SJCS', '39.00', '2018-02-12 20:30:51'),
(21, 'XUK0UC', 11, 'Emmanuel Owusu', 'Bortianor', 'Cash on delivery', 'delivered', 'cash change of 20.00 cedis', '121.50', '2018-04-14 16:10:45'),
(22, 'KINZHV', 12, 'Dora Sarfoah', 'adanseman', 'Cash on delivery', 'delivered', '', '101.00', '2018-04-14 21:03:41'),
(23, 'I0JH8M', 6, 'Samuel Owusu', 'vnbdvhgv', 'Cash on delivery', 'delivered', '', '42.00', '2018-04-16 12:39:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`orderlineID`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orders_ibfk_1` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `orderlineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
