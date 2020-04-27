-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 11:25 PM
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
-- Table structure for table `tgo_Contacts`
--

CREATE TABLE `tgo_Contacts` (
  `cid` int(11) NOT NULL,
  `tgo_company` varchar(30) NOT NULL,
  `tgo_fname` varchar(25) DEFAULT NULL,
  `tgo_lname` varchar(25) DEFAULT NULL,
  `tgo_email` varchar(40) NOT NULL,
  `tgo_website` varchar(40) NOT NULL,
  `tgo_phone` varchar(20) NOT NULL,
  `tgo_address` varchar(70) DEFAULT NULL,
  `tgo_city` varchar(20) DEFAULT NULL,
  `tgo_province` varchar(20) DEFAULT NULL,
  `tgo_description` text DEFAULT NULL,
  `tgo_resume` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgo_Contacts`
--

INSERT INTO `tgo_Contacts` (`cid`, `tgo_company`, `tgo_fname`, `tgo_lname`, `tgo_email`, `tgo_website`, `tgo_phone`, `tgo_address`, `tgo_city`, `tgo_province`, `tgo_description`, `tgo_resume`) VALUES
(1, 'DevFacto', 'Justin', 'Parkhill', 'justin.parkhill@devfacto.com', 'https://www.devfacto.com/', '877-323-3832', '#2250, Scotia Place Tower 1 10060 Jasper Ave NW', 'Edmonton', 'AB', '', 0),
(16, 'Winding River', 'Dawn', 'Terry', 'dawnt@windingriver.ca', 'https://www.windingriver.ca', '780-466-0709', '7707 - 104 Street', 'Edmonton', 'AB', 'A software development and consulting company.', 1),
(17, 'Silver Creek Software Ltd.', '', '', 'contact@silvercreeksoftware.com', 'http://www.silvercreeksoftware.com/', '780-989-5055', '#520 Highfield Place, 10010 - 106 Steet', 'Edmonton', 'AB', 'A company that focuses on Business Intelligence and Application Development.', 0),
(18, 'Insignia Software', '', '', 'InsigniaSupport@insigniasoftware.com', 'http://www.insigniasoftware.com/', '780-428-3997', '201 2544 Ellwood Dr', 'Edmonton', 'AB', '', 1),
(19, 'Intuit', '', '', 'contact@intuit.com', 'https://www.intuit.com/ca', '888-843-5449', 'Address: 5100 Spectrum Way', 'Mississauga', 'ON', 'A large trans-national corporation that has many different products.', 0),
(20, 'Iomer', '', '', 'contactus@iomer.com', 'https://www.iomer.com/', '780-424-3122', '#202, 10110-107 Street', 'Edmonton', 'AB', 'A company that does front-end development, share-point and consulting.', 1),
(21, 'Jobber', 'Elana', 'Ziluk', 'elana.z@getjobber.com', 'https://getjobber.com', '416-317-2633', '10520 Jasper Ave NW', 'Edmonton', 'AB', 'A software development firm.', 1),
(22, 'Giant Byte Software', '', '', 'info@giantbyte.com', 'http://giantbyte.com/', '780-554-4401', '11404 93 Street Northwest', 'Edmonton', 'AB', 'A consultation firm and a website development company', 0),
(23, 'CGI', '', '', 'conactus@cgi.com', 'https://www.cgi.com/', '514-841-3200', '10303 Jasper Avenue Suite 800', 'Edmonton', 'AB', 'CGI is one of the few end-to-end consulting firms with the scale, reach, capabilities and commitment to meet clientsâ€™ enterprise digital transformation needs', 1),
(24, 'Drivewyze Inc.', '', '', 'support@drivewyze.com', 'https://drivewyze.com/', '888-988-1590', '6325 Gateway Blvd NW, Suite 170', 'Edmonton', 'AB', 'Geo-location software company', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgo_Contacts`
--
ALTER TABLE `tgo_Contacts`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgo_Contacts`
--
ALTER TABLE `tgo_Contacts`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
