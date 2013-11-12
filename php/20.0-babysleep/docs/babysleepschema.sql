-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2013 at 07:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `babysleep`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `babysleepsum`()
SELECT babyname, DATEDIFF(NOW(), sleepstarttime) AS sleepday,   
SUM(sleepduration) AS duration FROM babysleeps, babies 
WHERE DATEDIFF(NOW(), sleepstarttime) < 8 AND babies.id = babysleeps.babyid
GROUP BY 1,2 ORDER BY 1,2$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE IF NOT EXISTS `babies` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'an artificial id for the baby''s name',
  `babyname` varchar(45) DEFAULT NULL COMMENT 'baby''s name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Galina''s daughter actually had twins (Not!)' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `babies`
--

INSERT INTO `babies` (`id`, `babyname`) VALUES
(1, 'Alina'),
(2, 'Joel');

-- --------------------------------------------------------

--
-- Table structure for table `babysleeps`
--

CREATE TABLE IF NOT EXISTS `babysleeps` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this will be auto-incrementing so that it is easy to refer to a row',
  `babyid` int(11) NOT NULL COMMENT 'The number for Alina or Joel',
  `sleepstarttime` datetime NOT NULL COMMENT 'when grandbaby fell asleep',
  `sleepduration` int(11) DEFAULT '0' COMMENT 'number of minutes baby slept',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Duration of sleeping for Galina''s grandbaby' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `babysleeps`
--

INSERT INTO `babysleeps` (`id`, `babyid`, `sleepstarttime`, `sleepduration`) VALUES
(1, 1, '2013-07-01 22:00:00', 360),
(2, 1, '2013-07-02 23:00:00', 240),
(3, 1, '2013-07-03 06:45:00', 176),
(4, 1, '2013-07-03 22:00:00', 360),
(5, 1, '2013-07-04 14:20:00', 129),
(6, 1, '2013-07-04 22:10:00', 420),
(7, 1, '2013-07-05 14:25:00', 120),
(8, 1, '2013-07-05 21:45:00', 420),
(9, 1, '2013-07-06 13:55:00', 75),
(10, 1, '2013-07-06 21:55:00', 397),
(11, 1, '2013-07-07 14:35:00', 72),
(12, 1, '2013-07-07 23:56:00', 240),
(13, 1, '2013-07-08 10:00:00', 70),
(14, 1, '2013-07-08 16:00:00', 50),
(15, 1, '2013-07-08 23:00:00', 400),
(16, 2, '2013-07-02 20:00:00', 480),
(17, 2, '2013-07-03 20:30:00', 470),
(18, 2, '2013-07-04 21:00:00', 540),
(19, 2, '2013-07-05 20:15:00', 520),
(20, 2, '2013-07-06 20:01:00', 431),
(21, 2, '2013-07-07 21:02:00', 421),
(22, 2, '2013-07-08 21:15:00', 501);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
