-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 12:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_type` varchar(255) NOT NULL DEFAULT 'admin',
  `admin_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_type`, `admin_created_at`) VALUES
(5, 'MAHMOOD REDA', 'mahmood2002reda@yahoo.com', '$2y$10$r/64u00mBvyhmgA8eknvJuQE00ACfpZp.3.z2c5oNQTyxYb6syPnW', 'admin', '2022-11-01 19:00:25'),
(8, 'mahmood reda', 'mahmood33reda33@gmail.com', '$2y$10$V2T4b6yyN8U22qZ6gx3P9Otow0sm7MdmUkoy1SHNzmmIjuXei0DVy', 'admin', '2022-11-13 14:56:12'),
(10, 'Abdullh Gaber', 'abdullhhacks@gmail.com', '$2y$10$mSVGXpQaGy8sYS9ezNCl5.mzOcfq/KFz8PmqaVmfomn1qCvtkOMEK', 'admin', '2022-12-02 13:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `city_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_created_at`) VALUES
(2, 'mansoura', '2022-10-31 19:45:14'),
(3, 'elmoqata', '2022-11-01 19:37:26'),
(4, 'wabn', '2022-12-02 13:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `doctor_password` varchar(200) NOT NULL,
  `doctor_email` varchar(200) NOT NULL,
  `medical_specialty` varchar(200) NOT NULL,
  `doctor_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `doctor_password`, `doctor_email`, `medical_specialty`, `doctor_created_at`) VALUES
(1, 'mahmood reda', '$2y$10$r/64u00mBvyhmgA8eknvJuQE00ACfpZp.3.z2c5oNQTyxYb6syPnW', 'mahmood2002reda@yahoo.com', 'General Surgery', '2022-11-14 21:28:56'),
(3, 'ahmed elsayed', '$2y$10$eP5/tZrpTXL6U0Cuh2Zdku7AgKZ5yDjknTUkxvrJ.bQUVGgQ5Cwlm', 'ahmed@gmail.com', 'orthopedic_specialty', '2022-12-02 13:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_user_messages`
--

CREATE TABLE `doctor_user_messages` (
  `message_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_user_messages`
--

INSERT INTO `doctor_user_messages` (`message_id`, `doctor_id`, `user_id`, `message`, `status`, `sender`) VALUES
(8, 1, 1, 'take care of yourself', 'replied', 'doctor'),
(9, 1, 1, 'ok everything is alright', 'replied', 'user'),
(12, 1, 1, 'ok we are done here', 'replied', 'doctor'),
(14, 1, 1, 'you should take care of yourself', 'replied', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_mobile` varchar(100) NOT NULL,
  `orders_email` varchar(150) NOT NULL,
  `orders_notes` text NOT NULL,
  `orders_serve_id` int(11) NOT NULL,
  `orders_city_id` int(11) NOT NULL,
  `doctor_major` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pending` tinyint(1) NOT NULL,
  `orders_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_mobile`, `orders_email`, `orders_notes`, `orders_serve_id`, `orders_city_id`, `doctor_major`, `status`, `pending`, `orders_created_at`) VALUES
(7, '01010440206', 'mahmood2002reda@yahoo.com', 'some notes for me', 2, 2, '1', 'sent', 0, '2022-12-04 22:45:36'),
(8, '01010440206', 'mahmood2002reda@yahoo.com', 'some random notes', 2, 2, '1', 'sent', 0, '2022-12-17 23:58:41'),
(12, '01010440206', 'mahmood2002reda@yahoo.com', 'I need some help', 5, 2, '1', 'sent', 0, '2022-12-18 08:49:30'),
(13, '01010440206', 'mahmood2002reda@yahoo.com', 'I need some conslu', 5, 2, '1', 'sent', 1, '2022-12-18 09:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` int(11) NOT NULL,
  `serv_name` varchar(100) NOT NULL,
  `serves_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `serv_name`, `serves_created_at`) VALUES
(2, 'blood pressure', '2022-10-31 22:55:12'),
(4, 'Medical tests', '2022-11-01 21:23:49'),
(5, 'Medical consultation', '2022-11-06 15:54:50'),
(6, 'x-rays', '2022-12-02 13:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `useruser_creat_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`, `useruser_creat_at`) VALUES
(1, 'ala', '$2y$10$r/64u00mBvyhmgA8eknvJuQE00ACfpZp.3.z2c5oNQTyxYb6syPnW', 'mahmood2002reda@yahoo.com', '2022-11-07 21:17:16'),
(2, 'MAHMOOD', '$2y$10$6ylEWvzh.IZW3xppE5.ISO7hWcSzJmcoEF2ln7FXGRG6B3DxMJvV2', 'mahmood33reda33@gmail.com', '2022-11-11 13:44:40'),
(3, 'ahmed elsayed', '$2y$10$nOB1pTzuVwnL/ifo7ORgcOxV0AeOA6skH2UjiaBGQ6g7SrCW2xuga', 'ahmed@gmail.com', '2022-11-26 17:06:54'),
(4, 'Abdullh Gaber', '$2y$10$TGkE5KELQ4miAdBRVYKmIuUKNQqym5PsJfPjpq0GLd9ngEiTJbPFK', 'abdullhhacks@gmail.com', '2022-12-02 13:40:48'),
(5, 'Abdullh', '$2y$10$yavxtjSQc9doqIVRJ/UzperLWdYAjQDXke5yU9uLu4lpdXHvZF82y', 'drabdullh2002.1@gmail.com', '2022-12-02 13:41:58'),
(6, 'test', '$2y$10$v/Edgif5ztSyMBf0ppuu5OY/gybWta4B/.6MgzVSYQfs0us3fqhiW', 'test@gmail.com', '2022-12-02 13:44:28'),
(7, 'abdullhGaber', '$2y$10$3GWCipZ9ax1kknJe.qSDhuozJ8Joig.Keq5F3Y1ecEmQs5ItnFtv.', 'abdu@lara.com', '2022-12-02 13:47:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_user_messages`
--
ALTER TABLE `doctor_user_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `doctor_message_FK` (`doctor_id`),
  ADD KEY `user_message_FK` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orders_serve_id` (`orders_serve_id`),
  ADD KEY `orders_city_id` (`orders_city_id`),
  ADD KEY `order_email_FK` (`orders_email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_password` (`user_password`),
  ADD UNIQUE KEY `user_password_2` (`user_password`),
  ADD KEY `user_email_2` (`user_email`),
  ADD KEY `user_email_3` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_user_messages`
--
ALTER TABLE `doctor_user_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_user_messages`
--
ALTER TABLE `doctor_user_messages`
  ADD CONSTRAINT `doctor_message_FK` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_message_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_email_FK` FOREIGN KEY (`orders_email`) REFERENCES `user` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orders_serve_id`) REFERENCES `services` (`serv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`orders_city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
