-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 11:41 AM
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
-- Database: `schoolsystem`
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
(1, 'adminname', 'admin@gmail.com', '9f191b1e986e07c36e694001bc1117b5');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `section` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `section`, `location`, `student`, `timing`) VALUES
(1, '9th Evening', 'A', 'hall', '15', 'evening'),
(2, '10th Evening', 'B', 'Iqbal Aditutorim', '20', 'evening'),
(3, '1st Year Morning', 'C', 'room 5', '25', 'evening');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`id`, `class_name`, `teacher_id`, `subject`, `start_time`, `end_time`, `shift`) VALUES
(12, '10th Evening', 1, 'chemistry', '7:30 am', '8:15 am', 'morning'),
(13, '1st Year Morning', 4, 'biology', '5:00 pm', '5:45 pm', 'evening'),
(15, '10th Evening', 4, 'biology', '5:45 pm', '6:30 pm', 'evening'),
(16, '9th Evening', 4, 'biology', '6:30 pm', '7:15 pm', 'evening'),
(18, '10th Evening', 2, 'physics', '3:00 pm', '3:45 pm', 'evening'),
(46, '9th Evening', 3, 'mathematics', '8:00 pm', '8:45 pm', 'evening'),
(47, '10th Evening', 3, 'mathematics', '6:30 pm', '7:15 pm', 'evening');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `week` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `teacher_id`, `student_id`, `class_name`, `comment`, `year`, `month`, `week`, `rating`, `shift`, `location`, `subject`, `result`) VALUES
(22, 4, 1, '9th Evening', 'he is a good teacher', '2020', 'Jul', 'Second Week', '4', 'evening', 'hall', 'biology', 50),
(23, 3, 1, '9th Evening', 'he is a good teacher', '2020', 'Jul', 'Second Week', '5', 'evening', 'hall', 'mathematics', 75);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `roll_no`, `name`, `email`, `pass`, `class_id`, `admission_date`, `status`) VALUES
(1, '', 1, 'bilal', 'bilal@gmail.com', '9f191b1e986e07c36e694001bc1117b5', 1, '2018-11-30', 1),
(2, '', 2, 'umar', 'umar@gmail.com', '9f191b1e986e07c36e694001bc1117b5', 2, '2020-07-07', 0),
(3, '', 3, 'mubeen', 'mubeen@gmail.com', 'bdd774ff9f70f616e8bb06c41ebf5de4', 3, '2020-07-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `name`, `email`, `pass`, `cnic`, `phone`, `salary`, `education`, `experience`, `img`, `subject`, `status`) VALUES
(1, 'usmanaftab', 'Usman Aftab', 'usman@gmail.com', '9f191b1e986e07c36e694001bc1117b5', '3433333333333', '54444444444', '35000', '16', '4 years', 'jDU90MmhOA.png', 'chemistry', 1),
(2, 'muhammadatif', 'Muhammad Atif', 'atif@gmail.com', '9f191b1e986e07c36e694001bc1117b5', '4545455555555', '45454545454', '35000', '16', '3 years', 'iskBEfr0aX.png', 'physics', 0),
(3, 'muhammadwaseem', 'Muhammad Waseem', 'waseem@gmail.com', '9f191b1e986e07c36e694001bc1117b5', '454545455455', '45454444444', '35000', '16', '4 years', 'ijJSFn8opP.png', 'mathematics', 1),
(4, 'muhammadhusnain', 'Muhammad Husnain', 'husnain@gmail.com', '9f191b1e986e07c36e694001bc1117b5', '5656666666666', '54444444444', '35000', '16', '3 years', 'jDU90MmhOA.png', 'biology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_time` varchar(100) NOT NULL,
  `from_time` varchar(100) NOT NULL,
  `to_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `teacher_id`, `class_name`, `class_time`, `from_time`, `to_time`) VALUES
(1, '4', '9th', '45 minutes', '10 am', '10:45 am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
