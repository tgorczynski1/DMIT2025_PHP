-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2020 at 12:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgorczynski1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tgo_Blog`
--

CREATE TABLE `tgo_Blog` (
  `bid` int(11) NOT NULL,
  `tgo_title` varchar(45) NOT NULL,
  `tgo_message` text NOT NULL,
  `tgo_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgo_Blog`
--

INSERT INTO `tgo_Blog` (`bid`, `tgo_title`, `tgo_message`, `tgo_date`) VALUES
(12, 'wow great!', 'I had a really fun day!', '2020-03-13 04:25:56'),
(13, 'Woohoo!', ':S fun day  8)  8)', '2020-03-13 04:26:40'),
(20, 'I met a friend today', 'Wow it was swell and great and good  8)  8)', '2020-03-13 04:42:34'),
(21, 'PHP is the best!', 'If you like $ that is :D', '2020-03-13 04:42:56'),
(22, 'Saw a Ghost', 'it flew by me  :S  :S READ MORE: www.ghost.com', '2020-03-13 04:43:31'),
(23, 'Wow! I love paging', 'its pretty great :D  ;)', '2020-03-13 04:43:53'),
(24, 'I can do this all day!', 'well not really all day :S', '2020-03-13 04:44:19'),
(25, 'Another One!', 'have to meet the quota of blog entries! :S  :D  ;)  :S  8)', '2020-03-13 04:44:42'),
(26, 'Yeahaw!', 'this is just a filler message in order to meet quota  :D  :D', '2020-03-13 04:51:29'),
(27, 'Solid Day!', 'http://google.com is my favourite search engine!  8)', '2020-03-13 04:52:08'),
(28, 'Went to a bar today', '8)  8) I love whyte ave!', '2020-03-13 04:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgo_Blog`
--
ALTER TABLE `tgo_Blog`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgo_Blog`
--
ALTER TABLE `tgo_Blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
