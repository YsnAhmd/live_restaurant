-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 07:41 PM
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
-- Database: `live_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `email`, `name`, `message`, `date`) VALUES
(1, 'test@gmail.com', 'test', 'ok..', ''),
(2, 'tanveershuvos@gmail.com', 'Kimberley', 'sss', ''),
(3, 'tanveershuvos@gmail.com', 'Kimberley', 'xxxx', '04-04-2020'),
(4, 'tanveershuvos@gmail.com', 'Kimberley', 'sss', '04-04-2020'),
(5, 'tanveershuvos@gmail.com', 'Kimberley', 'ssssssssss', '04-04-2020'),
(6, 's@g.com', 'ssss', 'wwww', '04-04-2020');

-- --------------------------------------------------------

--
-- Table structure for table `offer_menu_details`
--

CREATE TABLE `offer_menu_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `offer_price` varchar(15) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `end_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_menu_details`
--

INSERT INTO `offer_menu_details` (`id`, `item_id`, `offer_price`, `percentage`, `end_date`) VALUES
(1, 3, '1080', '10', '04/14/2020');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_reviews`
--

CREATE TABLE `ratings_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings_reviews`
--

INSERT INTO `ratings_reviews` (`id`, `user_id`, `rating`, `review`, `item_id`, `created_date`) VALUES
(1, 2, 4, 'Good', 3, '04-04-2020');

-- --------------------------------------------------------

--
-- Table structure for table `regular_menu_details`
--

CREATE TABLE `regular_menu_details` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_type` varchar(20) NOT NULL,
  `item_image` varchar(200) NOT NULL,
  `isOffered` int(11) NOT NULL DEFAULT 0 COMMENT '0=no offer, 1=offered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regular_menu_details`
--

INSERT INTO `regular_menu_details` (`id`, `item_name`, `item_price`, `item_description`, `item_type`, `item_image`, `isOffered`) VALUES
(1, 'Ishmael Christensen', 1100.00, 'Sit cupidatat dolor', 'Dinner', '20200404190117_20200330212255_blog-img-02.jpg', 0),
(2, 'Igor Reese', 599.00, 'Fugiat sed voluptas ', 'Lunch', '20200404190138_blog-img-09.jpg', 0),
(3, 'Dillon Collier', 1200.00, 'Fugiat voluptatem of', 'Lunch', '20200404190151_20200402095557_blog-img-03.jpg', 1),
(4, 'Rosalyn Flowers', 999.00, 'Velit facilis ex eo', 'Lunch', '20200404190213_blog-img-07.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_date` varchar(100) NOT NULL,
  `res_time` varchar(100) NOT NULL,
  `res_person` int(11) NOT NULL,
  `res_amount` varchar(100) NOT NULL,
  `res_contact` varchar(100) NOT NULL,
  `transaction_date` varchar(100) NOT NULL,
  `card_type` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `isCancelled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `res_date`, `res_time`, `res_person`, `res_amount`, `res_contact`, `transaction_date`, `card_type`, `transaction_id`, `isCancelled`) VALUES
(1, 2, '04/04/2020', '9 AM', 4, '2000', '1212122112', '2020-04-04 23:04:00', 'BKASH-BKash', 'reservation_id_5e88bfb96b131', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=customer,0=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_menu_details`
--
ALTER TABLE `offer_menu_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings_reviews`
--
ALTER TABLE `ratings_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regular_menu_details`
--
ALTER TABLE `regular_menu_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offer_menu_details`
--
ALTER TABLE `offer_menu_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings_reviews`
--
ALTER TABLE `ratings_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regular_menu_details`
--
ALTER TABLE `regular_menu_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
