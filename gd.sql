-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 08:12 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `name` varchar(29) NOT NULL,
  `password` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `landf_info`
--

CREATE TABLE `landf_info` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `lostandfound` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landf_info`
--

INSERT INTO `landf_info` (`id`, `image`, `lostandfound`, `description`) VALUES
(9, 'upload/1492625821.jpg', 'Found', 'A lost madrasha kid have been found From\r\nFront of the EWU university.'),
(10, 'upload/1492626965.jpg', 'Found', 'A lost cat have been found from \r\nBashundhara City , Panthapath.');

-- --------------------------------------------------------

--
-- Table structure for table `usr_info`
--

CREATE TABLE `usr_info` (
  `id` int(11) NOT NULL,
  `name` varchar(29) NOT NULL,
  `nid` varchar(99) NOT NULL,
  `address` varchar(99) NOT NULL,
  `email` varchar(29) NOT NULL,
  `phone` int(29) NOT NULL,
  `password` varchar(99) NOT NULL,
  `date` varchar(29) NOT NULL,
  `perpetrator` varchar(29) NOT NULL,
  `incident` text NOT NULL,
  `description` text NOT NULL,
  `place` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_info`
--

INSERT INTO `usr_info` (`id`, `name`, `nid`, `address`, `email`, `phone`, `password`, `date`, `perpetrator`, `incident`, `description`, `place`, `status`) VALUES
(1, 'Rakib', '10011998412', 'Rampura,Banasree', 'rasel@gmail.com', 1755789213, '123', '10-03-2017', 'Rakib', 'Snatching', '', 'Banasree,Block-D', 'Rejected'),
(3, 'Riazul Islam', '10001988782', 'Mohammadpur', 'Riazul@gmail.com', 161569856, '123', '12-03-2017', 'Motiul Rahman', 'new/old tenants', '', 'Adabor,Shia Masjid', ''),
(4, 'Shakib', 'kiop', 'Mirpur', 'Shakib@yahoo.com', 1928124566, '123456', '23-02-2017', 'Noyon', 'Eveteaser', '', 'Aftabnogor', ''),
(5, 'Masrafi bin Mortuza', '1234597877', 'Banani', 'Mortuza@gmail.com', 1755349198, '123', '12-03-2017', 'Musfikur Rahim', 'Snaching', '', 'Dhanmondi', 'Accepted'),
(6, 'Kamal Hossain', '10078965478952', 'Road#03,Sector:#05,Uttara.', 'kamal@gmail.com', 1789745623, '123', '12-06-2016', 'Rustom', 'Snatching', '', 'Hatirjil', 'Accepted'),
(7, 'Abdullah AL Mamun', '199874598756', 'road#03,house#198,Gulshan,Dhaka', 'mamun@gmail.com', 2147483647, '123', '12-04-2017', 'Tuhin Masud', 'Snacting', '', 'Rampura', 'pending'),
(8, 'Abdullah AL Mamun', '19999955578525552', 'banasree', 'mamun@gmail.in', 2147483647, '1234', '5465465', 'Nazmul Huda', 'Expatriate Problems/Complains', '', 'dsafda', 'Accepted'),
(9, 'Zubyer Hassan', '19987956655', 'road#03,house#198,Gulshan', 'hassan@gmail.com', 1789745623, '123', '29-04-2017', 'Rustom', 'Guard', '', 'Hatirjil', 'Pending'),
(10, 'Sakhawat Hossan', '10078965478952', 'road#03,house#198,Gulshan,Dhaka', 'sakhawat@gmail.com', 1789745623, '123', '29-04-2017', 'Ali Ahmed', 'loss', 'lost something', 'Dhanmondi', 'Accepted'),
(12, 'alam', '199874598756', 'road#03,house#198,Gulshan', 'alam@gmail.com', 1789745623, '123', '2017-04-11', 'Rustom', 'Snatching', 'hjjhashsh', 'Dhanmondi', 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landf_info`
--
ALTER TABLE `landf_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_info`
--
ALTER TABLE `usr_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `landf_info`
--
ALTER TABLE `landf_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usr_info`
--
ALTER TABLE `usr_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
