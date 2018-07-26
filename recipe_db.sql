-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2018 at 12:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `description`) VALUES
('029f94d81d868c11aebaac5aa16ffb51', 'terbaru', 'description sangat baru'),
('157348574317984b70d0367eec6d072c', 'sangat baru lagi', 'terbaru lagi'),
('1d06760e3c1fd8144b8f60b5d5c1d625', 'terbaru', 'description sangat baru'),
('30bf5fad8823e40559bcdffbd76d402a', 'terbaru', 'description sangat baru'),
('39d340ba5f4ad69991b399c798683efd', 'sangat baru', 'terbaru'),
('66a5d0f5efffae092406a795ae1d26c9', '1', ''),
('81a241b620d655f749bba083ad798db1', '2', 'tes dua desc 109'),
('961d9695b65d960e471187199f87a11f', '3', 'tes dua desc 109'),
('a2202ce7acdef18830f4cbe088d7df93', 'sangat baru lagi', 'teranyar lagi'),
('b6abd254126df2475138488877f2aa50', 'sangat baru', 'terbaru'),
('be46f78ccb4321f18dea50d521a2e627', 'sangat baru', 'terbaru'),
('bf7846b22e191dbc94b1887667b8d6ae', 'sangat baru', 'terbaru'),
('c32cb54822f650eb3158a85704375141', 'terbaru', 'description sangat baru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
