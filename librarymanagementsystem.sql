-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 11:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@library.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `coverImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `quantity`, `coverImage`) VALUES
(1, 'DIFFERENTIAL CALCULUS', 'Richard S. Hammond', 17, '43559489._SX318_2.jpg'),
(2, 'JAVASCRIPT', 'Andy Vickler', 11, '9781955786225_2.jpg'),
(3, 'ARTIFICIAL INTELLIGENCE', 'Rajashree Rao', 2, 'AI_Ebook_Cover-1_2.jpg'),
(4, 'NEURAL NETWORKS', 'Leonardo De Machi and Laura Mitchell', 7, 'smaller_2.jpg'),
(5, 'SYSTEMS PROGRAMMING', 'D M Dhaamdere ', 20, '41NgB7-TSTL._AC_SY780_2.jpg'),
(6, 'PHYSICS', 'Martin Zinke-Allmang', 14, 'book-cover-nelson-2008_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signup_form`
--

CREATE TABLE `signup_form` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_form`
--

INSERT INTO `signup_form` (`id`, `firstName`, `lastName`, `phoneNumber`, `email`, `password`) VALUES
(1, 'Paula-Petra', 'Ikechukwu', '5338397147', '20185218@std.neu.edu.tr', 'qwerty'),
(2, 'Osatohanmwen', 'Irorere', '59996924524', 'irorereosatoh@gmail.com', '12345'),
(3, 'Omolegho', 'Ohunyon', '6823605685', 'aretehkale@gmail.com', 'garri'),
(4, 'Ruby-Sapphire', 'Ikechukwu', '8087277714', 'rubysapphire281@gmail.com', 'orange'),
(13, 'Emeka', 'Nwabuokei', '36307866168', 'chukwuemeka.manuel@gmail.com', 'eggos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_form`
--
ALTER TABLE `signup_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signup_form`
--
ALTER TABLE `signup_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
