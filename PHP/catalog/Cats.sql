-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2020 at 11:22 PM
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
-- Table structure for table `Cats`
--

CREATE TABLE `Cats` (
  `cid` int(11) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `coat` varchar(255) NOT NULL,
  `body` varchar(255) DEFAULT NULL,
  `weight` int(10) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `pattern` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cats`
--

INSERT INTO `Cats` (`cid`, `breed`, `origin`, `image`, `coat`, `body`, `weight`, `colour`, `pattern`) VALUES
(13, 'Abyssinian', 'Asia', 'image_5e97cac20c6ce.jpg', 'Short', 'Semi-foreign ', 10, 'Orange', 'Ticked'),
(14, 'Arabian Mau', 'Middle East', 'image_5e97cbb2380e7.jpg', 'Short', 'muscular', 9, 'White or Orange', 'All'),
(15, 'Balinese', 'North America', 'image_5e97cca5eab61.jpg', 'Long', 'Semi-foreign', 12, 'Colorpoint', 'Colorpoint'),
(16, 'Chartreux', 'Europe', 'image_5e97cd2a4b29d.jpg', 'Short', 'Muscular but cobby', 11, 'Black or blue', 'Solid blue'),
(17, 'Cyprus', 'Europe', 'image_5e97cd7c2da3b.jpg', 'Mixed', 'Lean and muscular', 6, 'All', 'All'),
(18, 'Maine Coon', 'North America', 'image_5e97cdf6cd4e5.jpg', 'Long', 'Large', 14, 'All', 'All'),
(19, 'Munchkin', 'North America', 'image_5e97ce7e5a717.jpg', 'Mixed', 'Dwarf', 5, 'All', 'All'),
(20, 'Scottish Fold', 'Europe', 'image_5e97cedb1db52.jpg', 'Mixed', 'Cobby', 9, 'Black or blue', 'All'),
(21, 'Sphynx', 'North America', 'image_5e97cf95be8a9.jpg', 'Hairless', 'Oriental', 10, 'Pink or beige', 'All'),
(22, 'Napoleon', 'North America', 'image_5e97da37e71d2.jpg', 'Mixed', 'Dwarf', 6, 'All', ' All'),
(23, 'Bombay', 'North America', 'image_5e97e208f0399.jpg', 'Short', 'Cobby', 12, 'Black', 'Black'),
(25, 'Australian Mist', 'Oceania', 'image_5ea3b83d3b15c.jpg', 'Short', '', 8, 'Colorpoint', ''),
(26, 'Brazilian Shorthair', 'South America', 'image_5ea3ba3650e12.jpg', 'Short', '', 12, 'All', ''),
(27, 'Dragon Li', 'Asia', 'image_5ea3bb94c9dab.jpg', 'Short', 'Moderate', 8, 'brown', ''),
(28, 'Kurilian Bobtail', 'Asia', 'image_5ea3bc2ee7318.jpg', 'Mixed', '', 14, 'All', ''),
(29, 'Serrade Petit', 'Europe', 'image_5ea3bd27db235.jpg', 'Short', 'Tabby', 11, 'White with spots', ''),
(30, 'German Rex', 'Europe', 'image_5ea3bdb030121.jpg', 'Mixed', '', 7, 'All', ''),
(31, 'Raas', 'Asia', 'image_5ea3be7a34351.jpg', 'Medium', '', 10, 'Black or blue', ''),
(32, 'Sokoke', 'Africa', 'image_5ea3bf106556d.jpg', 'Short', '', 10, 'Tiger like', ''),
(33, 'Japanese Bobtail', 'Asia', 'image_5ea3bf9f9a9e2.jpg', 'Mixed', '', 14, 'All', ''),
(34, 'Suphalak', 'Asia', 'image_5ea3c51f97bdc.jpg', 'Short', 'Moderate', 10, 'Solid reddish-brown', ''),
(35, 'York Chocolate', 'North America', 'image_5ea3c5b6250ae.jpg', 'Long', 'Cobby', 14, 'Black', ''),
(36, 'Peterbald', 'Asia', 'image_5ea3c5f3635b7.jpg', 'Hairless', 'Moderate', 12, 'Solid Blue', ''),
(37, 'Ukrainian Levkoy', 'Europe', 'image_5ea3c635e9c4e.jpg', 'Hairless', '', 10, 'Solid Gray', ''),
(38, 'My Cat', 'North America', 'image_5ea3c6f2e93c0.jpg', 'Medium', 'Chubby Kitty', 14, 'Gray, White and Orange', 'Mix');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cats`
--
ALTER TABLE `Cats`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cats`
--
ALTER TABLE `Cats`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
