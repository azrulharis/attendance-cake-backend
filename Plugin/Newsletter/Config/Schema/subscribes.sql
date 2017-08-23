-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 05:14 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE IF NOT EXISTS `subscribes` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `unsubscribe` tinyint(1) DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `name`, `email`, `phone`, `status`, `unsubscribe`, `modified`, `created`) VALUES
(41, 'Deepak Chittora', 'c.deepak@iwt.in', 2147483647, 1, 0, '2015-01-12 07:28:08', '2015-01-05 10:48:31'),
(42, 'Deepak Chittora', 'chittoradee@gmail.com', 2147483647, 1, 1, '2015-01-09 14:47:58', '2015-01-05 10:59:16'),
(57, 'Dharmraj Nagar', 'd.raj@iwt.in', 2147483647, 1, 1, '2015-01-09 14:47:14', '2015-01-05 11:42:59'),
(75, 'Kuldeep Vijay', 'kuldeep@iwt.in', 2147483647, 1, 1, '2015-01-09 15:16:09', '2015-01-09 15:05:06'),
(76, NULL, 'piyuk66@gmail.com', NULL, 1, 1, '2015-01-12 07:34:22', '2015-01-12 07:34:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
