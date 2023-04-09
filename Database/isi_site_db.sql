-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2023 at 03:41 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isi_site_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT './db_imgs/default_class.png',
  `color` varchar(50) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `code`, `name`, `description`, `image`, `color`, `start_date`) VALUES
(22, 'M5NEbK', 'Framework PHP\nLaravel', 'learn basic backend concepts with laravel ', './db_imgs/default_class.png', 'gr-4', '2023-04-09 11:45:43'),
(23, 'hMo6N', 'Technologies Et \nProgrammation Web', 'learn js and php technologies', './db_imgs/default_class.png', 'gr-2', '2023-04-09 11:54:46'),
(24, 'OhZyoj', 'Recherche d\' information', 'information et indexation', './db_imgs/default_class.png', 'gr-1', '2023-04-09 12:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int NOT NULL,
  `class_id` int NOT NULL,
  `user_id` int NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `class_id`, `user_id`, `joined_at`) VALUES
(28, 22, 20, '2023-04-09 11:45:43'),
(29, 23, 21, '2023-04-09 11:54:46'),
(30, 23, 19, '2023-04-09 11:57:53'),
(31, 22, 19, '2023-04-09 11:58:42'),
(32, 23, 22, '2023-04-09 12:05:14'),
(33, 24, 20, '2023-04-09 12:21:58'),
(34, 24, 19, '2023-04-09 12:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `image`, `date`) VALUES
(8, 'Formation Laravel', 'come sunday from 20 at 22 at isi kef to this php framework course', 'db_imgs/laravel.png', '2023-04-07 02:40:10'),
(9, 'Formation Javascript', 'learn basics of js + dom manipulation ', 'db_imgs/js.png', '2023-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `content` mediumtext NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `class_id` int NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `file`, `class_id`, `last_updated`, `user_id`) VALUES
(42, 'New Material', 'db_files/pdo_mysql.pdf', 23, '2023-04-09 11:56:35', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_image` varchar(255) NOT NULL DEFAULT './db_imgs/default_user.png',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `account_image`, `email`, `password`, `role`) VALUES
(19, 'Ayoub Amer', 'db_imgs/ayoub amer.png', 'ayoub@isikef.u-jendouba.tn', '$2y$10$yoBu1CPAjW.Oc1CYIVw45OtjVhYL2.40dq3.CPqpuPmk5O2t2VEz.', 'student'),
(20, 'Hamdi Bouaziz', 'db_imgs/hamdi bouaziz.png', 'hamdi@isikef.u-jendouba.tn', '$2y$10$KZGPgBzuMVUpkoZ6hbzuK.whUYrv1AF7IX1K.3w4xiTueqm370ruW', 'teacher'),
(21, 'Adem Jerbi', 'db_imgs/adem jerbi.png', 'adem@isikef.u-jendouba.tn', '$2y$10$C9xa8Xn5rk1yOqfXXiIAje5reN7v60viY6PaZ6Pu2qF4MDijmnNm2', 'teacher'),
(22, 'Islem Jerbi', 'db_imgs/islem jerbi.png', 'islem@isikef.u-jendouba.tn', '$2y$10$/LbKajCHn6NUe..Wg1AiE.V3KJ49rQ/4PAouf53vcfOF8Xcg4W7Fq', 'student'),
(23, 'Admin', 'db_imgs/admin.png', 'admin@isikef.u-jendouba.tn', '$2y$10$WAEfrs7Hf1S5YT6zrT3jpuwF06Fd/.A0LA5fdhx.q3WD.4Ygff9/m', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
