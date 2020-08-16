-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 07:49 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'adminName', 'admin@gmail.com', '9f191b1e986e07c36e694001bc1117b5');

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE `book_review` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `book_review` text NOT NULL,
  `review_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_review`
--

INSERT INTO `book_review` (`id`, `ip_address`, `book_id`, `book_review`, `review_date`) VALUES
(5, '::1', '38', 'it is very helpful for me', '1597491337'),
(6, '::1', '41', 'it is somehow beneficial for me\r\nit is somehow beneficial for me.it is somehow beneficial for meit is somehow beneficial for me.it is somehow beneficial for me.it is somehow beneficial for me.it is somehow beneficial for me.it is somehow beneficial for me.it is somehow beneficial for me.it is somehow beneficial for me', '1597491413'),
(7, '::1', '41', 'this is good book', '1597553896');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `img`) VALUES
(1, 'English Novels', 'I read 4 books a year', '1-1.png'),
(2, 'Urdu Novels', 'I read 4 books a year', '1-2.png'),
(3, 'Physics', 'I read 4 books a year', '1-3.png'),
(8, 'Computer Science', 'this is description of computer science', '1-1.png');

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
(1, 1, 'horror stories'),
(2, 1, 'dramatic stories'),
(5, 2, 'horror stories'),
(6, 2, 'dramatic stories'),
(9, 3, 'matric'),
(10, 3, 'under gratudate'),
(12, 3, 'Inter'),
(16, 8, 'matric'),
(17, 8, 'under gratudate'),
(18, 8, 'post grauate');

-- --------------------------------------------------------

--
-- Table structure for table `category_hobby_writer`
--

CREATE TABLE `category_hobby_writer` (
  `id` int(11) NOT NULL,
  `category_hobby_id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_hobby_writer`
--

INSERT INTO `category_hobby_writer` (`id`, `category_hobby_id`, `name`) VALUES
(1, '1', 'author1'),
(2, '1', 'author2'),
(3, '6', 'author1'),
(4, '6', 'author2'),
(5, '10', 'author1'),
(6, '10', 'william jhon'),
(7, '17', 'author1'),
(8, '17', 'author2');

-- --------------------------------------------------------

--
-- Table structure for table `hobby_book`
--

CREATE TABLE `hobby_book` (
  `id` int(11) NOT NULL,
  `category_hobby_writer_id` varchar(100) NOT NULL,
  `category_hobby_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobby_book`
--

INSERT INTO `hobby_book` (`id`, `category_hobby_writer_id`, `category_hobby_id`, `book_name`, `book_img`, `book_description`) VALUES
(34, '1', 1, 'electronic-devices-9th-edition-by-floyd (1).pdf', '8GwindgjOB.png', 'this is description'),
(35, '2', 1, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'iskBEfr0aX.png', 'this description'),
(36, '3', 6, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'ijJSFn8opP.png', 'this is description'),
(37, '4', 6, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'jDU90MmhOA.png', 'this is description'),
(38, '5', 10, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'iskBEfr0aX.png', 'this is description'),
(39, '6', 10, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'jDU90MmhOA.png', 'this is description'),
(40, '7', 17, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'ijJSFn8opP.png', 'this is description'),
(41, '8', 17, 'electronic-devices-9th-edition-by-floyd (1).pdf', 'jDU90MmhOA.png', 'this is description');

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
(9, 'test', 'test@gmail.com', '9f191b1e986e07c36e694001bc1117b5'),
(22, 'final', 'final@gmail.com', '9f191b1e986e07c36e694001bc1117b5'),
(23, 'te', 'nabeel@gmail.com', '9f191b1e986e07c36e694001bc1117b5');

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
('::1', '8');

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
('::1', '17');

-- --------------------------------------------------------

--
-- Table structure for table `user_hobby_writer`
--

CREATE TABLE `user_hobby_writer` (
  `ip_address` varchar(255) NOT NULL,
  `choose_category_hobby_id` varchar(100) NOT NULL,
  `choose_category_hobby_writer_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_hobby_writer`
--

INSERT INTO `user_hobby_writer` (`ip_address`, `choose_category_hobby_id`, `choose_category_hobby_writer_id`) VALUES
('::1', '17', 'anyone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `category_hobby_writer`
--
ALTER TABLE `category_hobby_writer`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_review`
--
ALTER TABLE `book_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category_hobby`
--
ALTER TABLE `category_hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category_hobby_writer`
--
ALTER TABLE `category_hobby_writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hobby_book`
--
ALTER TABLE `hobby_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
