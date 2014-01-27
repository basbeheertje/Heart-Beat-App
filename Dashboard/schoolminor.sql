-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2014 at 11:25 
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolminor`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE IF NOT EXISTS `alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `device`, `type`, `state`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alertreceivers`
--

CREATE TABLE IF NOT EXISTS `alertreceivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `alert` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `creator` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `alertreceivers`
--

INSERT INTO `alertreceivers` (`id`, `value`, `alert`, `state`, `creator`, `create_date`) VALUES
(1, '0', 1, 1, 1, '2014-01-21 14:43:49'),
(2, '621828563', 2, 1, 1, '2014-01-21 14:43:49'),
(3, 'basvanbeers@hotmail.com', 1, 1, 1, '2014-01-21 14:44:24'),
(4, '0621828563', 2, 1, 1, '2014-01-21 14:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `alerttypes`
--

CREATE TABLE IF NOT EXISTS `alerttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `state` tinyint(4) NOT NULL,
  `creator` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alerttypes`
--

INSERT INTO `alerttypes` (`id`, `title`, `state`, `creator`, `create_date`) VALUES
(1, 'Mail', 1, 1, '2014-01-21 14:43:06'),
(2, 'SMS', 2, 1, '2014-01-21 14:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `creator` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `user`, `type`, `state`, `creator`, `create_date`) VALUES
(1, 1, 1, 1, 1, '2014-01-14 16:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `devicedata`
--

CREATE TABLE IF NOT EXISTS `devicedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `state` tinyint(4) NOT NULL,
  `value` varchar(64) NOT NULL,
  `creator` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `device` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `devicedata`
--

INSERT INTO `devicedata` (`id`, `date`, `time`, `state`, `value`, `creator`, `create_date`, `device`) VALUES
(1, '2014-01-10', '00:00:00', 1, '73', 16, '2014-01-10 11:59:46', 1),
(2, '2014-01-10', '12:00:19', 1, '107', 16, '2014-01-10 12:00:19', 1),
(3, '2014-01-10', '12:08:17', 1, '108', 16, '2014-01-10 12:08:17', 1),
(4, '2014-01-10', '12:09:12', 1, '108', 16, '2014-01-10 12:09:12', 1),
(5, '2014-01-10', '12:09:42', 1, '108', 16, '2014-01-10 12:09:42', 1),
(6, '2014-01-10', '12:10:37', 1, '62', 16, '2014-01-10 12:10:37', 1),
(7, '2014-01-10', '12:18:32', 1, '130', 16, '2014-01-10 12:18:32', 1),
(8, '2014-01-10', '12:20:39', 1, '81', 16, '2014-01-10 12:20:39', 1),
(9, '2014-01-10', '12:34:35', 1, '0', 0, '2014-01-10 12:34:35', 1),
(10, '2014-01-10', '12:44:38', 1, '82', 0, '2014-01-10 12:44:38', 1),
(11, '2014-01-10', '12:50:44', 1, '80', 0, '2014-01-10 12:50:44', 1),
(12, '2014-01-10', '12:54:00', 1, '87', 0, '2014-01-10 12:54:00', 1),
(13, '2014-01-10', '12:56:23', 1, '89', 0, '2014-01-10 12:56:23', 1),
(14, '2014-01-10', '13:00:04', 1, '88', 0, '2014-01-10 13:00:04', 1),
(15, '2014-01-10', '13:04:09', 1, '73', 0, '2014-01-10 13:04:09', 1),
(16, '2014-01-10', '13:12:51', 1, '79', 0, '2014-01-10 13:12:51', 1),
(17, '2014-01-10', '13:20:19', 1, '76', 0, '2014-01-10 13:20:19', 1),
(18, '2014-01-10', '13:22:43', 1, '68', 0, '2014-01-10 13:22:43', 1),
(19, '2014-01-10', '13:32:13', 1, '73', 0, '2014-01-10 13:32:13', 1),
(20, '2014-01-10', '13:46:06', 1, '78', 0, '2014-01-10 13:46:06', 1),
(21, '2014-01-10', '13:48:52', 1, '85', 0, '2014-01-10 13:48:52', 1),
(69, '2014-01-14', '12:32:25', 1, '83', 0, '2014-01-14 12:32:25', 1),
(23, '2014-01-10', '14:07:35', 1, '78', 0, '2014-01-10 14:07:35', 1),
(24, '2014-01-10', '14:09:48', 1, '80', 0, '2014-01-10 14:09:48', 1),
(25, '2014-01-10', '14:17:12', 1, '74', 0, '2014-01-10 14:17:12', 1),
(26, '2014-01-10', '14:19:23', 1, '87', 0, '2014-01-10 14:19:23', 1),
(27, '2014-01-10', '14:25:40', 1, '70', 0, '2014-01-10 14:25:40', 1),
(28, '2014-01-10', '14:33:58', 1, '72', 0, '2014-01-10 14:33:58', 1),
(29, '2014-01-10', '14:45:44', 1, '81', 0, '2014-01-10 14:45:44', 1),
(30, '2014-01-10', '14:46:19', 1, '72', 0, '2014-01-10 14:46:19', 1),
(31, '2014-01-14', '11:46:39', 1, '85', 16, '2014-01-14 11:46:39', 1),
(32, '2014-01-14', '12:06:43', 1, '90', 0, '2014-01-14 12:06:43', 1),
(70, '2014-01-14', '12:32:40', 1, '83', 0, '2014-01-14 12:32:40', 1),
(71, '2014-01-14', '12:32:55', 1, '82', 0, '2014-01-14 12:32:55', 1),
(72, '2014-01-14', '12:33:11', 1, '78', 0, '2014-01-14 12:33:11', 1),
(68, '2014-01-14', '12:32:10', 1, '84', 0, '2014-01-14 12:32:10', 1),
(73, '2014-01-14', '12:33:26', 1, '84', 0, '2014-01-14 12:33:26', 1),
(74, '2014-01-14', '12:33:42', 1, '80', 0, '2014-01-14 12:33:42', 1),
(75, '2014-01-14', '12:33:58', 1, '77', 0, '2014-01-14 12:33:58', 1),
(76, '2014-01-14', '12:34:13', 1, '81', 0, '2014-01-14 12:34:13', 1),
(77, '2014-01-14', '12:34:28', 1, '86', 0, '2014-01-14 12:34:28', 1),
(78, '2014-01-14', '12:34:43', 1, '84', 0, '2014-01-14 12:34:43', 1),
(79, '2014-01-14', '12:34:57', 1, '88', 0, '2014-01-14 12:34:57', 1),
(80, '2014-01-14', '12:35:12', 1, '87', 0, '2014-01-14 12:35:12', 1),
(81, '2014-01-14', '12:35:27', 1, '82', 0, '2014-01-14 12:35:27', 1),
(82, '2014-01-14', '12:35:42', 1, '81', 0, '2014-01-14 12:35:42', 1),
(83, '2014-01-14', '12:35:58', 1, '80', 0, '2014-01-14 12:35:58', 1),
(84, '2014-01-14', '12:36:13', 1, '85', 0, '2014-01-14 12:36:13', 1),
(85, '2014-01-14', '12:36:28', 1, '84', 0, '2014-01-14 12:36:28', 1),
(57, '2014-01-14', '12:28:48', 1, '87', 0, '2014-01-14 12:28:48', 1),
(58, '2014-01-14', '12:29:03', 1, '86', 0, '2014-01-14 12:29:03', 1),
(59, '2014-01-14', '12:29:17', 1, '86', 0, '2014-01-14 12:29:17', 1),
(60, '2014-01-14', '12:30:13', 1, '91', 0, '2014-01-14 12:30:13', 1),
(61, '2014-01-14', '12:30:28', 1, '86', 0, '2014-01-14 12:30:28', 1),
(62, '2014-01-14', '12:30:42', 1, '87', 0, '2014-01-14 12:30:42', 1),
(63, '2014-01-14', '12:30:57', 1, '88', 0, '2014-01-14 12:30:57', 1),
(64, '2014-01-14', '12:31:11', 1, '87', 0, '2014-01-14 12:31:11', 1),
(65, '2014-01-14', '12:31:26', 1, '87', 0, '2014-01-14 12:31:26', 1),
(66, '2014-01-14', '12:31:40', 1, '88', 0, '2014-01-14 12:31:40', 1),
(67, '2014-01-14', '12:31:55', 1, '85', 0, '2014-01-14 12:31:55', 1),
(86, '2014-01-14', '12:36:43', 1, '83', 0, '2014-01-14 12:36:43', 1),
(87, '2014-01-14', '12:36:58', 1, '81', 0, '2014-01-14 12:36:58', 1),
(88, '2014-01-14', '12:37:14', 1, '79', 0, '2014-01-14 12:37:14', 1),
(89, '2014-01-14', '12:37:30', 1, '81', 0, '2014-01-14 12:37:30', 1),
(90, '2014-01-14', '12:38:02', 1, '84', 1, '2014-01-14 12:38:02', 1),
(91, '2014-01-14', '12:38:24', 1, '81', 1, '2014-01-14 12:38:24', 1),
(92, '2014-01-14', '12:38:39', 1, '80', 1, '2014-01-14 12:38:39', 1),
(93, '2014-01-14', '12:38:56', 1, '77', 1, '2014-01-14 12:38:56', 1),
(94, '2014-01-14', '12:39:02', 1, '125', 16, '2014-01-14 12:39:02', 1),
(95, '2014-01-14', '12:39:12', 1, '76', 1, '2014-01-14 12:39:12', 1),
(96, '2014-01-14', '12:39:28', 1, '77', 1, '2014-01-14 12:39:28', 1),
(97, '2014-01-14', '12:39:44', 1, '80', 1, '2014-01-14 12:39:44', 1),
(98, '2014-01-14', '12:39:59', 1, '82', 1, '2014-01-14 12:39:59', 1),
(99, '2014-01-14', '12:40:12', 1, '96', 1, '2014-01-14 12:40:12', 1),
(100, '2014-01-14', '12:40:27', 1, '85', 1, '2014-01-14 12:40:27', 1),
(101, '2014-01-14', '12:40:42', 1, '82', 1, '2014-01-14 12:40:42', 1),
(102, '2014-01-14', '12:40:58', 1, '82', 1, '2014-01-14 12:40:58', 1),
(103, '2014-01-14', '12:41:12', 1, '87', 1, '2014-01-14 12:41:12', 1),
(104, '2014-01-14', '12:41:27', 1, '83', 1, '2014-01-14 12:41:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `devicetypes`
--

CREATE TABLE IF NOT EXISTS `devicetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `state` tinyint(4) NOT NULL,
  `creator` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `devicetypes`
--

INSERT INTO `devicetypes` (`id`, `title`, `state`, `creator`, `create_date`) VALUES
(1, 'expansion', 1, 1, '2014-01-14 16:07:30'),
(2, 'Mobile', 1, 1, '2014-01-27 21:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `device` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`id`, `user`, `device`) VALUES
(3, 2, 1),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authToken` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `phonenumber`, `state`, `create_date`, `authToken`) VALUES
(1, 'basvanbeers@hotmail.com', 'wachtwoord', 'Bas', 'van Beers', 621828563, 1, '2014-01-14 14:31:02', 'ooX5d#fCdpI)gk6e'),
(2, 'dokter@schoolminor.nl', 'wachtwoord', 'Dokter', 'van der Ploeg', 621828563, 1, '2014-01-27 22:45:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `userattributes`
--

CREATE TABLE IF NOT EXISTS `userattributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  `user` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userattributes`
--

INSERT INTO `userattributes` (`id`, `key`, `value`, `user`, `create_date`) VALUES
(1, 'woonplaats', 'rotterdam', 1, '2014-01-14 15:37:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
