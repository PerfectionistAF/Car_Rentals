-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 01:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `model` smallint(6) NOT NULL,
  `auto` tinyint(1) NOT NULL COMMENT '0 manual, 1 automatic',
  `consumption` varchar(50) NOT NULL,
  `properties` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 unpublished, 1 published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(14, '2023-10-03 06:38:58', 'published', '39be5211d0b76920d1b167f91e6a9ffa.png', 'update c', 15963, 1, '0', 'updated consumption/published/image', 7000, 1);
INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(15, '2023-10-03 17:06:54', 'image', '0bb08c51eb56de98599ecbad4738d2c1.jpeg', 'image', 12345, 1, '0', 'image', 14700, 0);
INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(16, '2023-10-03 17:17:13', 'imagetest', 'c1ceb2dbdfa96635682b505a1b0f507a.jpeg', 'imagetest', 12347, 1, '0', 'imagetest', 14788, 0);
INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(17, '2023-10-07 18:20:38', 'IMAGE CAR', 'aa4b4afead367635ca04ff9505546086.jpeg', 'update', 12489, 1, '0', 'IMAGE CAR4444', 7000, 0);
INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(18, '2023-10-13 13:09:23', 'update published', '731113d2652c385b958b5ad012ef64b2.png', 'update published', 159, 0, '0', 'update published', 0, 0);
INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(19, '2023-10-13 18:03:58', 'Sedan Deluxe', 'adfdb8700f2c40e8a9ec0758eadb93fd.png', 'back car', 2025, 0, '0', '25K', 159, 1);
INSERT INTO `cars` (`id`, `regdate`, `title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`, `price`, `published`) VALUES(20, '2023-10-13 22:58:24', 'Buttonnn Car', '6e5200559f711f56ca43d741b59e7597.jpeg', 'Beautiful buttons', 2001, 1, '0', '2000CC', 1000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `x` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `regdate`, `name`, `position`, `image`, `facebook`, `linkedin`, `x`) VALUES(4, '2023-10-13 21:46:32', 'admin', 'admin', 'f03a7ebd4eb742ce79e6c8117345e2b6.jpeg', 'admin.fb', 'admin.ln', 'admin.xxxx');
INSERT INTO `team` (`id`, `regdate`, `name`, `position`, `image`, `facebook`, `linkedin`, `x`) VALUES(6, '2023-10-13 22:36:54', 'Patrick', 'Manager', '347d9bde4c81cd44ae1876c68102ecb1.jpeg', 'https://www.facebook.com/patrickdempseyofficial', 'manage.com', 'manage.com');
INSERT INTO `team` (`id`, `regdate`, `name`, `position`, `image`, `facebook`, `linkedin`, `x`) VALUES(8, '2023-10-13 22:47:16', 'Sohayla', 'engineer', '41e662fd78dbb92d67d9f34280776dbd.jpeg', 'https://www.facebook.com/sohaila.hamed.940/', 'NA', 'NA');
INSERT INTO `team` (`id`, `regdate`, `name`, `position`, `image`, `facebook`, `linkedin`, `x`) VALUES(9, '2023-10-13 22:59:21', 'Avory', 'Button Management', '87c260b735f23a3791f108ea94792914.jpeg', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `content`, `image`) VALUES(4, 'Sue', 'housewife', 'I carefully maintain my household. Those cars do support my every need. ', '961366ff9eccb45c9eb0a73c4048ef64.jpeg');
INSERT INTO `testimonials` (`id`, `name`, `position`, `content`, `image`) VALUES(6, 'Daniel Lenon', 'Business person', 'Great Value!!', '586c6d857df8c47f9a2810b37c66ef08.jpeg');
INSERT INTO `testimonials` (`id`, `name`, `position`, `content`, `image`) VALUES(7, 'Xi Jinping', 'Salesperson', 'هذا شئ رائع جدا:) ', '16dfd768d815a3cd22f90bd16c36eb8f.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0 female, 1 male',
  `active` tinyint(1) NOT NULL COMMENT '0 inactive, 1 active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(1, '2023-09-30 16:21:41', 'example', 'Sue', '123', 0, 1);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(3, '2023-09-30 16:23:56', 'ex@ample', 'sami', '123', 1, 1);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(4, '2023-09-30 16:25:50', 'dsa', 'saq', '1qa', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(5, '2023-09-30 16:29:16', 'test', 'loop', 'sql', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(6, '2023-09-30 16:36:32', 'as@d', 'test', 'test', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(7, '2023-09-30 16:37:58', 'sue', 'dd', '12345', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(8, '2023-09-30 16:43:57', 'hope@success', 'sql', 'php', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(9, '2023-09-30 16:45:28', 'ihabsohaila@yahoo.com', 'gain', 'AGAAAAIIINNN', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(10, '2023-09-30 16:47:07', 'test@west', 'west', 'noeth', 1, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(11, '2023-09-30 17:44:03', 'pass@enc.com', 'encrypt', '$2y$10$O8ZgwjC1fUXUc.bNZ4nMQu6SjlIOgZxJOWMpv1YkKt4', 1, 1);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(12, '2023-09-30 18:28:38', 'test@test', 'rest', '$2y$10$bxAbhIRGd1CepLLYR/aLV.Ko8QQL6eXA0Kwz/aG4ak6pLEcBR7m2m', 0, 1);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(13, '2023-09-30 18:31:16', 'best@test', 'Sue', '$2y$10$gWEofIoEqa9.Dr7MdA38yefO87epECOt3es4DPOJsozQLSMuIDRD.', 1, 1);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(14, '2023-10-02 21:25:39', 'test2', 'tr', '$2y$10$gLTrCTlYDI8yXY3VcbfcFuWg9FyUUF3WglRiMPxHrWcKg5NgSC5Nm', 1, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(16, '2023-10-03 18:25:10', 'best2@test', 'best2', '$2y$10$Jxi1kYOUb6YWMccdISw/Au8T5u2J3QP3mtQ/Y42XxlI0qK4Y7F5Ma', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(17, '2023-10-06 21:40:58', 'best@test2', 'awardspace', '$2y$10$BriQrInkDl9UpZUZbjLVh.AVjs65Y9CzVS/a.aeJcZhYHqRwpRizG', 0, 0);
INSERT INTO `users` (`id`, `regdate`, `email`, `name`, `password`, `gender`, `active`) VALUES(18, '2023-10-06 21:42:21', 'award@test', 'awardspace', '$2y$10$l5/yMRqRXRaH780.Wta6S.r.Xfbgn1OtSWM14DoUQwVuULenY3Yr2', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX_name` (`name`),
  ADD KEY `INDEX_fb` (`facebook`),
  ADD KEY `INDEX_ln` (`linkedin`),
  ADD KEY `INDEX_x` (`x`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX` (`position`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;
