-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2020 at 03:17 PM
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
-- Table structure for table `tgo_Image`
--

CREATE TABLE `tgo_Image` (
  `id` int(11) NOT NULL,
  `tgo_file` varchar(255) NOT NULL,
  `tgo_title` varchar(255) NOT NULL,
  `tgo_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgo_Image`
--

INSERT INTO `tgo_Image` (`id`, `tgo_file`, `tgo_title`, `tgo_description`) VALUES
(35, 'image_5dcc4b29bd3b0.jpg', 'Leftovers', 'A simple plate of leftovers. I had chicken, broccoli salad, cheese garlic bread, and spicy corn salad.'),
(36, 'image_5dccdd40515de.jpg', 'Piano', 'Just a close up of my piano which I dont know how to play. Maybe one day I\'ll learn.'),
(37, 'image_5dccdfdd2b9f1.jpg', 'Bluzen', 'Color changing oil diffuser creates peaceful environment.  Operates quietly in the background.'),
(38, 'image_5dcce2633cc75.jpg', 'Clown', 'Here is a photo of a disgruntled clown. We all feel that way sometimes clown buddy.'),
(39, 'image_5dcce70feebc8.jpg', 'Emergency ', 'Incase anyone wanted to know, here are the emergency codes heard throughout hospitals.'),
(42, 'image_5dccef6283264.jpg', 'College', 'The only way to survive as a student and save money. Mr. Noodle is a staple in many students diet.'),
(43, 'image_5dccf3917b038.jpg', 'Red Pillow', 'Need to take pictures of everything in site...maybe I\'ll just take a nap instead.'),
(44, 'image_5dccf4c3ab8fe.jpg', 'Mountains', 'Beautiful photo of mountains.'),
(45, 'image_5dccf5236545a.jpg', 'Desserts', 'Chocolate flower and hedgehog dessert. '),
(48, 'image_5dccf89798678.jpg', 'Dog Walk', 'Walking a dog in a park in the evening. This is not my dog...not cute enough.'),
(49, 'image_5dccf8b52a720.jpg', 'Music', 'Fairly useless book of songs considering I dont know how to play piano. One day.....'),
(50, 'image_5dccf915a7380.jpg', 'Desert', 'Not to be mistaken with dessert. A glimpse of land without snow.'),
(51, 'image_5dccf91f93f4c.jpg', 'Bird', 'This is a nice picture of a tropical bird.'),
(52, 'image_5dccf9ad20e86.jpg', 'Sunset', 'A beautiful summer sunset.'),
(53, 'image_5dccfa83d41c6.jpg', 'Sushi', 'You\'re on a roll!\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgo_Image`
--
ALTER TABLE `tgo_Image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgo_Image`
--
ALTER TABLE `tgo_Image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
