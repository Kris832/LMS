-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2025 at 04:20 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `is_available` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `available_copies` int NOT NULL DEFAULT '0',
  `publisher` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rack_number` int NOT NULL DEFAULT '1',
  `shelf_number` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `category`, `is_available`, `created_at`, `available_copies`, `publisher`, `year`, `quantity`, `price`, `rack_number`, `shelf_number`) VALUES
(18, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 1, '2025-02-18 15:29:43', 8, 'Harlequin Enterprises', 2004, 10, 1200.00, 1, 1),
(19, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 1, '2025-02-18 15:29:43', 10, 'Harlequin Enterprises', 2003, 10, 1200.00, 1, 1),
(20, 'Pride and Prejudice', 'Jane Austen', 'Fiction', 1, '2025-02-18 15:29:43', 10, 'Harlequin Enterprises', 2003, 10, 1200.00, 1, 1),
(21, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 1, '2025-02-18 15:29:43', 10, 'Harlequin Enterprises', 2003, 10, 1200.00, 1, 1),
(22, 'Little Women', 'Louisa May Alcott', 'Fiction', 1, '2025-02-18 15:29:43', 10, 'Harlequin Enterprises', 2003, 10, 1200.00, 1, 1),
(23, 'Dune', 'Frank Herbert', 'Science Fiction', 1, '2025-02-18 15:29:43', 10, 'Tor Books', 2006, 10, 1200.00, 1, 2),
(24, '1984', 'George Orwell', 'Science Fiction', 1, '2025-02-18 15:29:43', 10, 'Tor Books', 2006, 10, 1200.00, 1, 2),
(25, 'Brave New World', 'Aldous Huxley', 'Science Fiction', 1, '2025-02-18 15:29:43', 10, 'Tor Books', 2006, 10, 1200.00, 1, 2),
(26, 'The War of the Worlds', 'H.G. Wells', 'Science Fiction', 1, '2025-02-18 15:29:43', 10, 'Tor Books', 2006, 10, 1200.00, 1, 2),
(27, 'Neuromancer', 'William Gibson', 'Science Fiction', 1, '2025-02-18 15:29:43', 10, 'Tor Books', 2006, 10, 1200.00, 1, 2),
(28, 'Gone Girl', 'Gillian Flynn', 'Mystery & Thriller', 1, '2025-02-18 15:29:43', 10, 'Brash Books', 2005, 10, 1200.00, 1, 3),
(29, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'Mystery & Thriller', 1, '2025-02-18 15:29:43', 10, 'Brash Books', 2005, 10, 1200.00, 1, 3),
(30, 'Sherlock Holmes: A Study in Scarlet', 'Arthur Conan Doyle', 'Mystery & Thriller', 1, '2025-02-18 15:29:43', 10, 'Brash Books', 2005, 10, 1200.00, 1, 3),
(31, 'The Da Vinci Code', 'Dan Brown', 'Mystery & Thriller', 1, '2025-02-18 15:29:43', 10, 'Brash Books', 2005, 10, 1200.00, 1, 3),
(32, 'Big Little Lies', 'Liane Moriarty', 'Mystery & Thriller', 1, '2025-02-18 15:29:43', 10, 'Brash Books', 2005, 10, 1200.00, 1, 3),
(33, 'Harry Potter and the Sorcerer’s Stone', 'J.K. Rowling', 'Fantasy', 1, '2025-02-18 15:29:43', 10, 'DAW Books', 2001, 10, 1200.00, 1, 4),
(34, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 1, '2025-02-18 15:29:43', 10, 'DAW Books', 2001, 10, 1200.00, 1, 4),
(35, 'A Game of Thrones', 'George R.R. Martin', 'Fantasy', 1, '2025-02-18 15:29:43', 10, 'DAW Books', 2001, 10, 1200.00, 1, 4),
(36, 'The Name of the Wind', 'Patrick Rothfuss', 'Fantasy', 1, '2025-02-18 15:29:43', 10, 'DAW Books', 2001, 10, 1200.00, 1, 4),
(37, 'The Golden Compass', 'Philip Pullman', 'Fantasy', 1, '2025-02-18 15:29:43', 10, 'DAW Books', 2001, 10, 1200.00, 1, 4),
(38, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Non-Fiction', 1, '2025-02-18 15:29:43', 10, 'HarperCollins', 2005, 10, 1200.00, 1, 5),
(39, 'Educated', 'Tara Westover', 'Non-Fiction', 1, '2025-02-18 15:29:43', 10, 'HarperCollins', 2005, 10, 1200.00, 1, 5),
(40, 'The Power of Habit', 'Charles Duhigg', 'Non-Fiction', 1, '2025-02-18 15:29:43', 10, 'HarperCollins', 2005, 10, 1200.00, 1, 5),
(41, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Non-Fiction', 1, '2025-02-18 15:29:43', 10, 'HarperCollins', 2005, 10, 1200.00, 1, 5),
(42, 'Atomic Habits', 'James Clear', 'Non-Fiction', 1, '2025-02-18 15:29:43', 10, 'HarperCollins', 2005, 10, 1200.00, 1, 5),
(45, 'The Underground Man', 'Ross Macdonald', 'Fiction', 1, '2025-03-03 15:45:13', 10, 'Knopf', 1971, 10, 1200.00, 1, 1),
(46, 'Perdido Street Station', 'China Miéville', 'Science Fiction', 1, '2025-03-03 16:15:08', 10, 'Science Fiction', 0, 10, 1200.00, 1, 2),
(47, 'The Rim of the Unknown', 'Frank Belknap Long', 'Fantasy', 1, '2025-03-03 16:23:30', 10, ' Arkham House', 1972, 10, 1200.00, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_records`
--

DROP TABLE IF EXISTS `borrow_records`;
CREATE TABLE IF NOT EXISTS `borrow_records` (
  `record_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `borrow_date` datetime NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `price` float NOT NULL,
  `actual_return_date` datetime DEFAULT NULL,
  `fine` float DEFAULT '0',
  PRIMARY KEY (`record_id`),
  KEY `borrow_records_ibfk_1` (`user_id`),
  KEY `borrow_records_ibfk_2` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow_records`
--

INSERT INTO `borrow_records` (`record_id`, `user_id`, `book_id`, `borrow_date`, `return_date`, `price`, `actual_return_date`, `fine`) VALUES
(25, 24, 42, '2025-02-18 21:09:37', '2025-02-18 21:09:43', 0, NULL, 0),
(26, 24, 28, '2025-02-18 21:18:50', '2025-02-18 21:19:03', 0, NULL, 0),
(27, 24, 21, '2025-02-18 21:19:28', '2025-02-18 21:19:57', 0, NULL, 0),
(28, 24, 32, '2025-02-19 12:44:44', '2025-02-19 12:47:16', 0, NULL, 0),
(29, 24, 42, '2025-02-23 18:02:43', '2025-02-23 18:02:50', 0, NULL, 0),
(30, 24, 42, '2025-02-23 19:13:50', '2025-02-23 19:19:05', 0, NULL, 0),
(31, 24, 18, '2025-02-23 19:47:04', '2025-02-24 12:35:18', 400, NULL, 0),
(32, 24, 23, '2025-03-02 20:23:06', '2025-03-02 20:23:18', 400, NULL, 0),
(33, 24, 45, '2025-03-03 21:47:15', '2025-03-03 21:47:37', 400, NULL, 0),
(34, 24, 45, '2025-03-03 22:01:06', '2025-03-03 22:04:00', 400, NULL, 0),
(35, 25, 32, '2025-02-15 00:00:00', '2025-03-03 22:09:08', 400, NULL, 10),
(36, 25, 39, '2025-02-15 00:00:00', '2025-03-03 22:11:56', 400, NULL, 90),
(37, 25, 32, '2025-02-15 00:00:00', '2025-03-03 22:16:54', 400, '2025-03-03 22:16:54', 10),
(38, 25, 42, '2025-02-15 00:00:00', '2025-03-03 22:17:54', 400, '2025-03-03 22:17:54', 10),
(39, 25, 46, '2025-03-03 22:20:25', '2025-03-03 22:20:29', 400, '2025-03-03 22:20:29', 0),
(40, 25, 34, '2025-02-15 00:00:00', '2025-03-03 22:21:18', 400, '2025-03-03 22:21:18', 10),
(41, 24, 20, '2025-02-15 00:00:00', '2025-03-05 12:51:34', 400, '2025-03-05 12:51:34', 30),
(42, 24, 18, '2025-04-06 14:11:22', '2025-04-06 14:13:41', 400, '2025-04-06 14:13:41', 0),
(43, 24, 38, '2025-04-06 14:49:39', '2025-04-06 14:50:30', 400, '2025-04-06 14:50:30', 0),
(44, 24, 25, '2025-04-07 08:28:52', '2025-04-07 08:29:11', 400, '2025-04-07 08:29:11', 0),
(45, 27, 19, '2025-04-07 09:25:44', '2025-04-07 09:26:03', 400, '2025-04-07 09:26:03', 0),
(46, 28, 19, '2025-04-07 09:48:08', '2025-04-07 09:48:22', 400, '2025-04-07 09:48:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_managers`
--

DROP TABLE IF EXISTS `inventory_managers`;
CREATE TABLE IF NOT EXISTS `inventory_managers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory_managers`
--

INSERT INTO `inventory_managers` (`id`, `name`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'John Doe', 'inventory_admin', '$2y$10$XvE.j1JGTbp9VY5W7LTyYuuJ5EgzjF2GlY7FfO5K3qC5ZbOPR4SeW', 'inventory_m@gmail.com\r\n', '2025-02-09 16:57:16'),
(2, 'invent', 'invent1', '$2y$10$dUBPimHkIApGSUE34.aY5O1Nzy.DWMmcyeLXk17Q1e6Ko6rmXOneu', 'inventory@gmail.com', '2025-02-12 13:18:38'),
(3, 'int', 'int1', '$2y$10$kYQNKmOsBd8akyzdRZhnwunV/d6ix1xLOlr2.TNsWGgCwDhtD0tqm', 'int1@gmail.com', '2025-02-12 13:19:18'),
(4, 'int', 'int', '$2y$10$Qg5jDXt1RogOWXW7L4OwW.KqAd3kdTcEt1Z3zzJzzFyy3bQbSdS0u', 'invent1@gmail.com', '2025-02-24 07:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

DROP TABLE IF EXISTS `issued_books`;
CREATE TABLE IF NOT EXISTS `issued_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `user_id` int NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `returned` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

DROP TABLE IF EXISTS `librarians`;
CREATE TABLE IF NOT EXISTS `librarians` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'password123', '2025-01-10 14:08:20'),
(2, 'Jane Smith', 'jane.smith@example.com', 'securepass', '2025-01-10 14:08:20'),
(3, 'xyz', 'alice.brown@example.com', '$2y$10$AavV9vRCz6XwAYJ4H8lZSeP4uif9Vo5251pj7mkwxNAHhIAUHw9Ou', '2025-01-10 15:28:58'),
(4, '12', '1@email.com', '$2y$10$5ScmKpjSjJn6nDLUkmYibuGDjhniuHjCOk0r7bIYnIWq/HipMIpAG', '2025-01-10 15:29:37'),
(5, 'demo', 'd@email.com', '$2y$10$hXoxmPX9RzhLdmQdY2c7letSMFncbY.UwsQT18vh.KtEqU8//G7FW', '2025-01-11 04:23:03'),
(6, 'demo1', 'd1@email.com', '$2y$10$dabBmY4uUi1z5T37.lakAuQzEFwE/iUM2wGOK9kKjr9r5gnV.uo6i', '2025-01-11 04:23:45'),
(7, 'lib', 'lib@email.com', '$2y$10$plupAgOYD3e8VPCkF/4wF.D1GOhDqfuIQILxPpLq/VVlsODDLzSmy', '2025-01-17 15:36:10'),
(8, 'krrish', 'krrishmevada34@gmail.com', '$2y$10$VJy6jRdVZ8UQNKehEndq0OTpizEW/ywxmV92QQeE8yg6qydXpd1k2', '2025-01-27 06:55:19'),
(9, 'final', 'final@gmail.com', '$2y$10$unzZN9Vp8IBs336MUnmofuz7uXHAFklhfcWkp7NiGVQ2dN99SY07u', '2025-01-27 07:26:20'),
(10, 'try', 'try@gmail.com', '$2y$10$m9pyFqN3FvaCXqpB26AIY.k.d/l29n0wf8VSC0JK9wZH5KHMyDdve', '2025-02-10 07:48:58'),
(11, 'lib1', 'lib1@gmail.com', '$2y$10$uriCkil6zvYk7lfs3qB4Z.N2C4PDODvD0B0HVojJe0.seQ2l9c8K2', '2025-02-13 07:09:16'),
(12, 'lms', 'lms@gmail.com', '$2y$10$rwjC/GtbkMvOLvXn8p8gwuWnl7rvm3OEjZZwxTXU5aZxzHXDTgddm', '2025-02-18 15:24:35'),
(13, 'lib2', 'lib2@gmail.com', '$2y$10$iCWsCarE3r4iqbayAeI3auGKqVxn7hvVOpCbUO5o/25N.EG21qtna', '2025-02-19 07:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_type` enum('Fine','Purchase') DEFAULT NULL,
  `payment_status` enum('Pending','Paid') DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `payment_type`, `payment_status`, `payment_date`) VALUES
(1, 1, 12.00, 'Fine', 'Paid', '2025-02-08 14:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `purchase_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `price` int NOT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `book_id`, `purchase_date`, `price`) VALUES
(21, 24, 18, '2025-02-18 21:32:36', 0),
(22, 24, 31, '2025-02-18 21:42:23', 0),
(23, 24, 18, '2025-02-18 21:43:34', 0),
(24, 24, 33, '2025-02-19 12:47:45', 0),
(25, 24, 18, '2025-03-02 20:23:27', 1200),
(26, 24, 45, '2025-04-06 14:14:56', 1200),
(27, 27, 18, '2025-04-07 09:26:49', 1200),
(28, 28, 18, '2025-04-07 09:48:44', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(3, 'K1 ', 'kris1@gmail.com', '$2y$10$crF6pi/dC/eQgUYBSOdCeezXkVj3OIOEjYIfmikua9iNDeGmwHCpi', '2025-01-10 15:40:36', 'admin'),
(5, 'xyz1', 'xyz1@email.com', '$2y$10$ryXac2vWcwbdPxEnx6puruuEuX4Rq1zQHuy6Gt1z05qN5M5wIVW2O', '2025-01-10 16:34:22', 'student'),
(7, 'xyz3', 'xyz3@email.com', '$2y$10$RFC3RY3oeS1hw.Y2WmP4nuR1MaNHxWf3.s0gPN2W0zAZSSZg901Xi', '2025-01-10 16:38:05', 'inventory_manager'),
(8, 'xyz3', 'xyz4@email.com', '$2y$10$ShR56ymxEnyZlAJCtt5ExuSbHL/CKVGUZGcXtFgctMTxCZ4SsofEK', '2025-01-10 16:38:16', 'student'),
(9, 'xyz4', 'xy4@email.com', '$2y$10$5KlYH3vh.NldgOOJx8pQsuuEXP.nTKrrBoP9lWf4GuBcZIUehktRW', '2025-01-10 16:38:32', 'student'),
(10, 'xy3', 'xz@email.com', '$2y$10$mUJur7GtUpPOdjVD1hhU2uQN7vczvpYAkwYGOzOIvU8uxJ4z4mWLa', '2025-01-10 16:39:15', 'student'),
(11, 'xy', 'x@email.com', '$2y$10$2vAIjQ8lxGbZ.ja9h5qGL.9xvhTE5BsNreSNxXuILNEMKrs9Bzgoy', '2025-01-10 16:39:38', 'student'),
(12, 'x', 'y@email.com', '$2y$10$S6OFsG4tlPwpDlYiimhE2.EGwreh2Yckc6gK2XpjEhYQ6wf7NUJdS', '2025-01-10 16:40:08', 'student'),
(13, 'a', 'a@email.com', '$2y$10$J4Ba1FfwUJfsJdIFyDtA9Ob/lXwQ.yfeYPHl8pzMqR0gY4kAu.TWa', '2025-01-10 16:40:33', 'student'),
(16, 'boot', 'boot@email.com', '$2y$10$M0r.VZYwe.Y2EYASE5P14.JnohPPFGnKGbvAM5m5iwXXEhXzXlG0G', '2025-01-18 03:16:40', 'student'),
(17, 'demo12', 'deep1@email.com', '$2y$10$Y.bL/0nAoCynAZGb8CgJTeQzTBrMD7331W2dSCYKUHZwpgRxN3SrK', '2025-01-18 04:38:48', 'librarian'),
(18, 'dhruv', 'dhruv@gmail.com', '$2y$10$bJ4YINUILcBxJQcI5rDrauKKQdYBzjU2OOMx8XWsHT3OI/dbYOnI.', '2025-01-27 06:59:25', 'user'),
(19, 'krrish12', 'krrish12@gmail.com', '$2y$10$gCp9SntbqM1.wMRISy32yuMQlEBrc4DYVF40jCauhl/XgO.qpJSZK', '2025-02-09 13:28:45', 'user'),
(20, 'inven', 'inventory@gmail.com', '$2y$10$hURiAR0lByyZkd5QaSr3G..d35fVwD3jW79hsz.t/AqzQswBSsIcG', '2025-02-09 16:24:48', 'inventory_manager'),
(21, 'ip', 'ip@gmail.com', '$2y$10$OJXHxZq5/wEM3ss6seNRRegJaQElaqc/qJCmA/jSSoXs6fhPsg1qi', '2025-02-12 13:56:34', 'user'),
(22, 'mk', 'mk1@gmail.com', '$2y$10$V7iPQbpsiySoSPnIXIREoO1k72mleywiz.83bn7p8mbeHDnjpePkC', '2025-02-13 07:10:08', 'user'),
(24, 'runn', 'runn1@gmail.com', '$2y$10$MCL7uPcLbx2aHn9D4vxGFe4ieplkC3IT5EAyFyajc0EIH1J5Yz.Fu', '2025-02-18 15:31:38', 'user'),
(25, 'late', 'late@gmail.com', '$2y$10$NnOPSBzB6/cw0ouaTXYe3e33yu4IDjBQaMfe2EWJoGBXBoSvv7OPC', '2025-03-03 16:34:18', 'user'),
(26, 'run', 'run@gmail.com', '$2y$10$aFfDfmKU2bVUdfor9B1AFOhU8J6Ej2tS3lzEmW/FWBpevmdnz9ZtS', '2025-04-07 03:51:45', 'user'),
(27, 'dh', 'dy@gmail.com', '$2y$10$3bdNLezL0.WZvyMn4rk97OyP9cJUvBtoMVRMVEjfnZSTRjx/lZuhG', '2025-04-07 03:54:02', 'user'),
(28, 'user1', 'user1@gmail.com', '$2y$10$LsjsWbetqJCZ.OY/FtIHzub0ymlTOFDcnZdcBSwRvicaWJV5ei5lu', '2025-04-07 04:17:01', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_records`
--
ALTER TABLE `borrow_records`
  ADD CONSTRAINT `borrow_records_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrow_records_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constraints for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD CONSTRAINT `issued_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issued_books_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
