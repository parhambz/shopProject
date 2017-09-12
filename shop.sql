-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 11:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categury`
--

CREATE TABLE `categury` (
  `id` int(11) NOT NULL,
  `laptop` int(11) NOT NULL,
  `printer` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `other` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productId` int(11) NOT NULL,
  `replyId` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `userId`, `dt`, `productId`, `replyId`, `status`) VALUES
(1, 'aasdljasdkljadas', 1, '2017-08-24 08:31:20', 1, 0, 1),
(2, '51', 1, '2017-08-24 13:12:19', 1, 0, 0),
(3, 'dfsdjkf', 1, '2017-08-25 02:02:30', 2, 0, 1),
(4, 'zdljclklkjlk', 1, '2017-08-25 02:08:34', 4, 0, 0),
(6, 'iuowdfo', 1, '2017-08-27 06:30:59', 5, 0, 0),
(7, 'asdasd', 1, '2017-08-27 12:39:55', 0, 0, 0),
(8, 'asdasd', 1, '2017-08-27 12:41:00', 0, 0, 0),
(9, 'dasda', 1, '2017-08-27 12:41:37', 0, 0, 0),
(10, 'asdas', 1, '2017-08-27 12:41:44', 0, 0, 0),
(11, 'asd', 1, '2017-08-27 12:43:53', 0, 0, 0),
(12, 'asdfas', 1, '2017-08-27 12:44:05', 0, 0, 0),
(13, 'adfasd', 1, '2017-08-27 12:45:09', 4, 0, 0),
(14, 'asdasd', 1, '2017-08-27 12:45:12', 4, 0, 0),
(15, 'asdasd', 1, '2017-08-27 12:45:14', 4, 0, 0),
(16, 'asdasd', 1, '2017-08-27 12:49:51', 5, 0, 0),
(17, 'asdasd', 1, '2017-08-27 12:49:54', 5, 0, 0),
(18, 'asd', 1, '2017-08-27 12:50:31', 5, 0, 0),
(19, 'asdasd', 1, '2017-08-27 12:50:33', 5, 0, 0),
(20, 'asdasd', 1, '2017-08-27 12:51:36', 5, 0, 0),
(21, 'asdasd', 1, '2017-08-27 12:53:08', 5, 0, 0),
(22, 'asdfasd', 1, '2017-08-27 12:53:10', 5, 0, 0),
(23, 'asdasd', 1, '2017-08-27 12:54:08', 5, 0, 0),
(24, 'dasdasd', 1, '2017-08-27 12:54:49', 5, 0, 0),
(25, 'asdasd', 1, '2017-08-27 12:54:52', 5, 0, 0),
(26, 'Sasd', 1, '2017-08-27 12:55:22', 5, 0, 0),
(27, 'sdasd', 1, '2017-08-27 12:56:29', 5, 0, 0),
(28, 'asd', 1, '2017-08-27 12:57:25', 5, 0, 0),
(29, 'asdasd', 1, '2017-08-27 12:58:43', 5, 0, 0),
(30, 'asdasd', 1, '2017-08-27 13:00:21', 5, 0, 0),
(31, 'fgsdfsdf', 1, '2017-08-27 13:50:11', 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(90) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `sku` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `sku`, `userid`) VALUES
(4, 'productsds', 2000, 'a very bad product', 12345, 1),
(5, 'product', 2500, 'a very bad product', 12346, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'parham', 'bagherzadeh', 'parham@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categury`
--
ALTER TABLE `categury`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categury`
--
ALTER TABLE `categury`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
