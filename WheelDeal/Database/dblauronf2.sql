-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 06:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblauronf2`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `acctid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `acctid`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_information` text DEFAULT NULL,
  `post_likes` int(11) DEFAULT 0,
  `is_auction` tinyint(1) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `author_id`, `post_image`, `post_information`, `post_likes`, `is_auction`, `is_active`) VALUES
(1, 1, '../images/JEFF.png', 'asdasd', 0, 0, 1),
(2, 2, '../images/WIN_20240126_15_49_09_Pro.jpg', 'idk smthing about my name', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` int(5) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `is_admin`, `is_user`) VALUES
(1, 'ardeltiocojefflauron@gmail.com', 'retroman', '$2y$10$k7skMdUztIFgIDXyCPmyw.w2xDwI0.0ssTHlWVeW0PPB.TaPzqG0C', 0, 1),
(2, 'retrokiddie@gmail.com', 'ardeljeff', '$2y$10$Mzu3rc.vXMZcH1OsTriUP.3gQAREB.GWsHOWLPLrZrk53JPbnA5eS', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` int(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `firstname`, `lastname`, `gender`) VALUES
(1, 'Ardel Tioco Jeff', 'Lauron', 'Male'),
(2, 'Ardel', 'Lauron', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
