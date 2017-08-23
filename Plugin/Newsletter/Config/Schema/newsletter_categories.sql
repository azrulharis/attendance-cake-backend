-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 05:13 AM
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
-- Table structure for table `newsletter_categories`
--

CREATE TABLE IF NOT EXISTS `newsletter_categories` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `newsletter_categories`
--

INSERT INTO `newsletter_categories` (`id`, `title`, `slug`, `description`, `status`, `modified`, `created`) VALUES
(8, 'Business', 'business', 'This Newsletter is used for business\r\n', NULL, '2014-12-29 12:30:56', '2014-12-25 10:37:50'),
(10, 'Company', 'company', 'This  Newsletter is for companies', NULL, '2014-12-29 11:18:00', '2014-12-25 10:39:58'),
(11, 'Festival', 'festival', 'This Newsletter for festival', NULL, '2014-12-25 10:41:11', '2014-12-25 10:41:11'),
(12, 'Holiday Special', 'holiday-special', 'This Newsletter for holiday', NULL, '2014-12-25 10:41:53', '2014-12-25 10:41:53'),
(13, 'School', 'school', 'This newsletter for school functions', NULL, '2014-12-25 10:43:31', '2014-12-25 10:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter_categories`
--
ALTER TABLE `newsletter_categories`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter_categories`
--
ALTER TABLE `newsletter_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
