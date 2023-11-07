-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 11:29 AM
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
-- Database: `cars_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars_table`
--

DROP TABLE IF EXISTS `cars_table`;
CREATE TABLE `cars_table` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(100) NOT NULL,
  `luggage` varchar(50) NOT NULL,
  `doors` varchar(50) NOT NULL,
  `passengers` int(11) NOT NULL,
  `price` float NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT '	active = 1 , yes ; active = 0 , no',
  `image` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `categorytype` tinyint(1) NOT NULL COMMENT '1---sedan;0---crossover'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars_table`
--

INSERT INTO `cars_table` (`id`, `title`, `content`, `luggage`, `doors`, `passengers`, `price`, `active`, `image`, `cat_id`, `categorytype`) VALUES
(2, 'rest', 'Corrrntents', '3', '5', 5, 432, 0, '81ae08e3918208d8e40a55f641aca078.jpeg', 0, 0),
(4, 'ggg', 'Contents', '5', '5', 4, 32, 1, '0ca362b773ad95cfda1e53c264b1c871.jpeg', 0, 0),
(6, 'test', 'Conterrrnts', '3', '4', 4, 2, 1, 'dc2430f6b593016057423192149cd698.jpeg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_table`
--

DROP TABLE IF EXISTS `categories_table`;
CREATE TABLE `categories_table` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories_table`
--

INSERT INTO `categories_table` (`id`, `categoryname`) VALUES
(4, 'crossover'),
(7, 'Fiat'),
(8, 'Jaguar'),
(3, 'sedan');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT 'active = 1 , yes ; active = 0 , no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `regdate`, `fullname`, `username`, `email`, `password`, `active`) VALUES
(3, '2023-11-03 00:59:16', 'Email_format_inactive', 'test', 'full@test.net', 'test', 0),
(4, '2023-10-29 10:34:50', 'Sohayla Ihab ', 'sue_hamed', 'ihabsohaila@example.com', '$2y$10$E.fO9drNIvJq4HCGzCTwH.A7qAhiTs6xT.dseLBtUo8NabrjqKbv.', 1),
(6, '2023-10-29 10:56:53', 'Ali Ayman', 'ali', 'ali@ayman.com', '$2y$10$hBE2EXEGCf3bgsDH/h9gJuMldcL.ErIP9PjAlIUg8epNaMUff/3Jq', 0),
(7, '2023-11-03 02:17:45', 'Denise Franchise', 'added', 'added@yahoo.com', 'added', 1),
(8, '2023-11-03 02:21:42', 'Avory Deven', 'avory', 'avory@admin2.com', 'admin2', 0),
(9, '2023-11-03 02:22:59', 'Final Test', 'final test', 'test@west.com', 'test', 0),
(10, '2023-11-06 23:41:13', 'Smithson', 'admin', 'admin@rentals.com', '$2y$10$QtsINXxdXSVB5cQMZg.bDODGBQvYPg6qfjq5xlJVogu4pONxvocl6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars_table`
--
ALTER TABLE `cars_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Index_title` (`title`),
  ADD KEY `cat_id_index` (`cat_id`);

--
-- Indexes for table `categories_table`
--
ALTER TABLE `categories_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Index_cat` (`categoryname`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_index` (`username`),
  ADD KEY `email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars_table`
--
ALTER TABLE `cars_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories_table`
--
ALTER TABLE `categories_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
