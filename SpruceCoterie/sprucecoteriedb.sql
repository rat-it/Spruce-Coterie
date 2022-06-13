-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2019 at 07:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprucecoteriedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cevents`
--

DROP TABLE IF EXISTS `cevents`;
CREATE TABLE IF NOT EXISTS `cevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `ename` varchar(200) NOT NULL,
  `eabout` varchar(2000) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cevents`
--

INSERT INTO `cevents` (`id`, `cid`, `ename`, `eabout`, `count`) VALUES
(1, 10, 'asdfg', 'jlglhgluhg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cmem`
--

DROP TABLE IF EXISTS `cmem`;
CREATE TABLE IF NOT EXISTS `cmem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `user` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmem`
--

INSERT INTO `cmem` (`id`, `cid`, `user`) VALUES
(2, 10, 'bhavsarsamprat@gmail.com'),
(3, 11, 'bhavsarsamprat@gmail.com'),
(4, 12, 'bhavsarsamprat@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactnumber`
--

DROP TABLE IF EXISTS `contactnumber`;
CREATE TABLE IF NOT EXISTS `contactnumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactnumber`
--

INSERT INTO `contactnumber` (`id`, `user`, `contact`) VALUES
(19, 'bhavsarsamprat@gmail.com', 9999988888);

-- --------------------------------------------------------

--
-- Table structure for table `coterie`
--

DROP TABLE IF EXISTS `coterie`;
CREATE TABLE IF NOT EXISTS `coterie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `date` datetime NOT NULL,
  `head` varchar(200) NOT NULL,
  `phone1` bigint(20) NOT NULL,
  `phone2` bigint(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `inte` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dob`
--

DROP TABLE IF EXISTS `dob`;
CREATE TABLE IF NOT EXISTS `dob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dob`
--

INSERT INTO `dob` (`id`, `user`, `date`) VALUES
(20, 'bhavsarsamprat@gmail.com', '2019-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `etabless`
--

DROP TABLE IF EXISTS `etabless`;
CREATE TABLE IF NOT EXISTS `etabless` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `path` varchar(500) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `eabout` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
CREATE TABLE IF NOT EXISTS `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `familyname` varchar(20) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` bigint(30) NOT NULL,
  `member1` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fevents`
--

DROP TABLE IF EXISTS `fevents`;
CREATE TABLE IF NOT EXISTS `fevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `eabout` varchar(2000) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fid` (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fevents`
--

INSERT INTO `fevents` (`id`, `fid`, `ename`, `eabout`, `count`) VALUES
(4, 13, 'qweq', 'asfafasfdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fmem`
--

DROP TABLE IF EXISTS `fmem`;
CREATE TABLE IF NOT EXISTS `fmem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fullname`
--

DROP TABLE IF EXISTS `fullname`;
CREATE TABLE IF NOT EXISTS `fullname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fullname`
--

INSERT INTO `fullname` (`id`, `user`, `fname`, `mname`, `lname`) VALUES
(1, 'prat@gmail.com', 'Samprat', '', 'Bhavsar'),
(20, 'vkm2306@gmail.com', 'vis', 'adasd', 'malh'),
(17, 'hhdave25@gmail.com', 'Hardik', 'H', 'Dave'),
(4, 'rjs@gmail.com', 'rohan', 'j', 'shah'),
(5, 'userE@gmail.com', 'userFN', '', 'userLN'),
(6, 'a@bc.com', 'a', 'bs', 'km'),
(7, 'hhd@gmail.com', 'Hardik', 'H', 'Dave'),
(8, 'hd@gmail.com', 'Hardik', 'H', 'Dave'),
(9, 'rjs000@gmal.com', 'rohan', 'j', 'shah'),
(10, 'rr@gmail.com', 'gotiuhoi', 'iug', 'oihuho'),
(11, 'rrr@gmail.com', 'sudbu', 'uhuih', 'uibhiu'),
(21, 'bhavsarsamprat@gmail.com', 'Samprat', '', 'Bhavsar'),
(18, 'malvik18@gmail.com', 'Malvi', 'Y', 'bavsar');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE IF NOT EXISTS `interests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `inte` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `user`, `inte`) VALUES
(18, 'bhavsarsamprat@gmail.com', 'management,photograpy,travelling');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_name` (`u_name`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `u_name`, `password`, `date`) VALUES
(38, 'bhavsarsamprat@gmail.com', 'oioioioi', '2019-04-25'),
(36, 'vkm2306@gmail.com', 'abcdefgh', '2019-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `aboutyou` varchar(500) DEFAULT NULL,
  `ccity` varchar(100) DEFAULT NULL,
  `hcity` varchar(100) DEFAULT NULL,
  `wfi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user`, `aboutyou`, `ccity`, `hcity`, `wfi`) VALUES
(8, 'bhavsarsamprat@gmail.com', 'Am new to Spruce Coterie', 'Undefined', 'Undefined', 'Undefined');

-- --------------------------------------------------------

--
-- Table structure for table `tabless`
--

DROP TABLE IF EXISTS `tabless`;
CREATE TABLE IF NOT EXISTS `tabless` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabless`
--

INSERT INTO `tabless` (`id`, `path`, `user`) VALUES
(10, 'uploads/colorful_lights-wallpaper-1920x1200.jpg', 'bhavsarsamprat@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
