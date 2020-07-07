-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 11:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookrecomendationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`) VALUES
(1, 'school', 'I read 4 books a year'),
(2, 'college', 'I read 4 books a year'),
(3, 'university', 'I read 4 books a year');

-- --------------------------------------------------------

--
-- Table structure for table `category_hobby`
--

CREATE TABLE `category_hobby` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_hobby`
--

INSERT INTO `category_hobby` (`id`, `category_id`, `name`) VALUES
(1, 1, 'physics'),
(2, 1, 'computer science'),
(3, 1, 'english'),
(4, 1, 'mathematics'),
(5, 2, 'physics'),
(6, 2, 'computer science'),
(7, 2, 'chemistry'),
(8, 2, 'mathematics'),
(9, 3, 'operating system'),
(10, 3, 'computer science'),
(11, 3, 'computer network'),
(12, 3, 'mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `hobby_book`
--

CREATE TABLE `hobby_book` (
  `id` int(11) NOT NULL,
  `category_hobby_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobby_book`
--

INSERT INTO `hobby_book` (`id`, `category_hobby_id`, `book_name`) VALUES
(1, 1, 'book.pdf'),
(2, 1, 'book.pdf'),
(3, 5, 'book.pdf'),
(4, 5, 'book.pdf'),
(5, 9, 'book.pdf'),
(6, 9, 'book.pdf'),
(7, 4, 'book.pdf'),
(8, 11, 'book.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`) VALUES
(9, 'test', 'test@gmail.com', '9f191b1e986e07c36e694001bc1117b5');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `ip_address` varchar(100) NOT NULL,
  `choose_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`ip_address`, `choose_category`) VALUES
('::1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_hobby`
--

CREATE TABLE `user_hobby` (
  `ip_address` varchar(100) NOT NULL,
  `choose_hobby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_hobby`
--

INSERT INTO `user_hobby` (`ip_address`, `choose_hobby`) VALUES
('::1', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_hobby`
--
ALTER TABLE `category_hobby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobby_book`
--
ALTER TABLE `hobby_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_hobby`
--
ALTER TABLE `category_hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hobby_book`
--
ALTER TABLE `hobby_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
