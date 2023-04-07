-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2023 at 10:57 PM
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
CREATE DATABASE IF NOT EXISTS `isi_site_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `isi_site_db`;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_class.png',
  `color` varchar(50) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `code`, `name`, `description`, `image`, `color`, `start_date`) VALUES
(1, '6xl5pl', 'FrameWork PHP <br>Laravel', 'Php backend framework', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/class1.png', 'gr-4', '2023-01-31 23:00:00'),
(2, 'web123', 'Technologies et programmation Web', 'php and javascript cours', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_class.png', 'gr-5', '2023-02-28 23:00:00'),
(3, 'java235', 'Java Entreprise<br>Edition', 'jee', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/class3.png', 'gr-6', '2023-03-24 23:00:00'),
(10, 'uhpPK2I', 'Indexation', 'rechereche d\'information', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_class.png', 'gr-6', '2023-03-29 23:11:14'),
(14, '7U8f9e9', 'ayoub ', 'test', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_class.png', 'gr-5', '2023-03-29 23:18:00'),
(15, 'r6SfHz', 'Web With JavaScript', 'js ', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_class.png', 'gr-2', '2023-04-01 09:14:31'),
(16, 'GCHAkes', 'test', 'sdsf', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_class.png', 'gr-4', '2023-04-03 22:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `created_at`) VALUES
(1, 'hey i make a comment on larave post ', 4, 22, '2023-03-27 08:09:42'),
(2, 'another comment on the same post ', 4, 22, '2023-03-27 08:12:12'),
(5, 'another comment by other user ', 5, 22, '2023-03-27 08:54:30'),
(6, 'other one ', 5, 22, '2023-03-27 09:13:29'),
(7, 'more dhdgvf', 5, 22, '2023-03-27 09:13:42'),
(8, 'go to this : https://classroom.google.com/u/2/c/NTg1ODgwNTU4ODc5', 5, 22, '2023-03-27 09:16:06'),
(9, 'why jdk 8', 5, 27, '2023-03-27 09:22:06'),
(10, 'what is that sir', 4, 21, '2023-03-28 00:00:10'),
(11, 'cdjhdhd', 4, 28, '2023-04-04 08:59:24'),
(12, 'gdfdd', 4, 29, '2023-04-04 13:10:08'),
(13, 'gsfsfds', 8, 27, '2023-04-04 13:49:08');

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
(1, 1, 4, '2023-03-27 09:39:58'),
(2, 1, 5, '2023-03-27 09:39:58'),
(3, 2, 4, '2023-03-27 09:40:31'),
(4, 3, 4, '2023-03-27 22:26:48'),
(5, 7, 6, '2023-03-29 22:53:59'),
(6, 8, 6, '2023-03-29 22:55:56'),
(7, 9, 6, '2023-03-29 22:58:06'),
(8, 10, 6, '2023-03-29 23:11:15'),
(9, 11, 6, '2023-03-29 23:14:44'),
(10, 12, 6, '2023-03-29 23:15:01'),
(11, 13, 6, '2023-03-29 23:16:13'),
(12, 14, 6, '2023-03-29 23:18:00'),
(13, 15, 6, '2023-04-01 09:14:31'),
(14, 16, 6, '2023-04-03 22:51:13'),
(15, 1, 8, '2023-04-04 13:48:07'),
(16, 2, 8, '2023-04-04 13:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `image`, `date`) VALUES
(1, 'formation laravel', 'learn laravel php framework for backend', '/home/ayoubamer/Workspace/ISI/Web/Warith/imgs/event1.png', '2023-04-01 11:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `class_id` int NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `class_id`, `last_updated`, `user_id`) VALUES
(20, 'CHAPITRE 02\r\n\r\nhttps://docs.google.com/document/d/1j30jxxywXyvFTbJ8w3ErT3ynWfhHPa3K8XPpqcGWDXs/edit?usp=sharing', 1, '2023-03-26 20:52:50', 4),
(21, 'formation Laravel 9: portfolio\r\n\r\nhttps://drive.google.com/drive/folders/1MBoQAjjfC4EErPPRw0ohZQA-jOdQ8KJB?usp=sharing', 1, '2023-03-26 20:53:27', 4),
(22, 'ch03:\r\nhttps://docs.google.com/presentation/d/1ZrzYy9vZFBUm5ZVvnPvxDHdCEL-Fk3fPhleGoLXQ8gU/edit?usp=sharing', 1, '2023-03-26 20:54:02', 4),
(27, 'Vous trouvez ci-joint le support du premier TP. Merci de commencer par installer les outils suivants : \r\n-JDK 8 \r\n-Maven', 2, '2023-03-26 21:18:53', 4),
(28, 'ssdgd\r\n', 1, '2023-04-04 08:59:18', 4),
(29, 'fsfsfcd\r\n', 1, '2023-04-04 13:10:03', 4),
(30, 'hdggd', 1, '2023-04-04 19:27:36', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_user.png',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `account_image`, `email`, `password`, `role`) VALUES
(4, 'Ayoub Amer', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/ayoub.jpg', 'ayoubamerrr290@gmail.com', 'ayoub123', 'student'),
(5, 'Adem Jerbi', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_user.png', 'adem@gmail.com', 'adem1234', 'student'),
(6, 'Islem Jerbi', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_user.png', 'islem@gmail.com', 'islem123', 'teacher'),
(7, 'Hamdi BouAziz ', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_user.png', 'hamdi@gmail.com', 'hamdi123', 'admin'),
(8, 'yathreb', '/home/ayoubamer/Workspace/ISI/Web/Warith/db_imgs/default_user.png', 'samaali@gmail.com', 'yathrebyathreb', 'student');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
