-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 06:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benjamin-a-martinez-jr-checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `1st_year_1st_semester`
--

CREATE TABLE `1st_year_1st_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `1st_year_1st_semester`
--

INSERT INTO `1st_year_1st_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(30, 'fil123', 'filipino', '2.1', 'mike'),
(31, 'eng122', 'english ', '2.1', 'mawe');

-- --------------------------------------------------------

--
-- Table structure for table `1st_year_2nd_semester`
--

CREATE TABLE `1st_year_2nd_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `1st_year_2nd_semester`
--

INSERT INTO `1st_year_2nd_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(4, 'fil123', 'oral communication', '1.1', 'lovely'),
(5, 'oral222', 'oral communication 2', '2.3', 'lovely');

-- --------------------------------------------------------

--
-- Table structure for table `2nd_year_1st_semester`
--

CREATE TABLE `2nd_year_1st_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2nd_year_1st_semester`
--

INSERT INTO `2nd_year_1st_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(2, 'it100', 'mobile app ', '2.4', 'paul'),
(3, 'it243', 'web dev', '2.1', 'arzel');

-- --------------------------------------------------------

--
-- Table structure for table `2nd_year_2nd_semester`
--

CREATE TABLE `2nd_year_2nd_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2nd_year_2nd_semester`
--

INSERT INTO `2nd_year_2nd_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(2, 'psych123', 'psychology', '2.1', 'minda'),
(3, 'it652', 'itelec', '2.2', 'michell');

-- --------------------------------------------------------

--
-- Table structure for table `3rd_year_1st_semester`
--

CREATE TABLE `3rd_year_1st_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3rd_year_1st_semester`
--

INSERT INTO `3rd_year_1st_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(1, 'it212', 'bsit', '20', 'john doe'),
(3, 'it203', 'bsit', '2.0', 'paul');

-- --------------------------------------------------------

--
-- Table structure for table `3rd_year_2nd_semester`
--

CREATE TABLE `3rd_year_2nd_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3rd_year_2nd_semester`
--

INSERT INTO `3rd_year_2nd_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(1, 'it111', 'bsit', '2.0', 'jonathan'),
(3, 'it211', 'bsit', '2.5', 'james bond');

-- --------------------------------------------------------

--
-- Table structure for table `4th_year_1st_semester`
--

CREATE TABLE `4th_year_1st_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `4th_year_1st_semester`
--

INSERT INTO `4th_year_1st_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(2, 'it202', 'bsit', '3.0', 'sir max'),
(3, 'it102', 'bsit', '2.2', 'melissa');

-- --------------------------------------------------------

--
-- Table structure for table `4th_year_2nd_semester`
--

CREATE TABLE `4th_year_2nd_semester` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `4th_year_2nd_semester`
--

INSERT INTO `4th_year_2nd_semester` (`id`, `course_code`, `course_name`, `grade`, `instructor`) VALUES
(1, 'it322', 'bsit', '1.1', 'sir mike'),
(3, 'it212', 'bsis', '2.1', 'jason');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `midyear`
--

CREATE TABLE `midyear` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midyear`
--

INSERT INTO `midyear` (`id`, `course_code`, `course_name`, `hours`) VALUES
(3, 'it322', 'bsit', '12'),
(4, 'it099', 'bsa', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1st_year_1st_semester`
--
ALTER TABLE `1st_year_1st_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `1st_year_2nd_semester`
--
ALTER TABLE `1st_year_2nd_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `2nd_year_1st_semester`
--
ALTER TABLE `2nd_year_1st_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `2nd_year_2nd_semester`
--
ALTER TABLE `2nd_year_2nd_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `3rd_year_1st_semester`
--
ALTER TABLE `3rd_year_1st_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `3rd_year_2nd_semester`
--
ALTER TABLE `3rd_year_2nd_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `4th_year_1st_semester`
--
ALTER TABLE `4th_year_1st_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `4th_year_2nd_semester`
--
ALTER TABLE `4th_year_2nd_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_unique` (`course_code`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midyear`
--
ALTER TABLE `midyear`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1st_year_1st_semester`
--
ALTER TABLE `1st_year_1st_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `1st_year_2nd_semester`
--
ALTER TABLE `1st_year_2nd_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `2nd_year_1st_semester`
--
ALTER TABLE `2nd_year_1st_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `2nd_year_2nd_semester`
--
ALTER TABLE `2nd_year_2nd_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `3rd_year_1st_semester`
--
ALTER TABLE `3rd_year_1st_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `3rd_year_2nd_semester`
--
ALTER TABLE `3rd_year_2nd_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4th_year_1st_semester`
--
ALTER TABLE `4th_year_1st_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4th_year_2nd_semester`
--
ALTER TABLE `4th_year_2nd_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `midyear`
--
ALTER TABLE `midyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
