-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2013 at 05:56 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mrts`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'artificial id for the categories',
  `name` varchar(45) NOT NULL COMMENT 'name of the category',
  `description` varchar(1024) DEFAULT NULL COMMENT 'description of category',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='The categories of things that we sell' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 't-shirts', 't shirts for the superhero in everyone'),
(2, 'caps', 'it takes a superhero to really keep the sun out of your eyes'),
(3, 'boardshorts', 'superhero boardshorts are even cooler');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'artificial id for items',
  `categoryid` int(11) NOT NULL COMMENT 'the category the item will be in',
  `name` varchar(45) NOT NULL COMMENT 'the name of the item',
  `description` varchar(1024) DEFAULT NULL COMMENT 'description of item',
  `image` varchar(255) DEFAULT NULL COMMENT 'url of the picture of the item',
  `price` decimal(10,2) NOT NULL COMMENT 'the price of the item',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='the items that will appear in our catalogue' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `categoryid`, `name`, `description`, `image`, `price`) VALUES
(1, 1, 'Batman T-shirt', 'biff! boom! a great t-shirt', 'batman.jpg', 29.99),
(2, 3, 'Batman Shorts', 'kapow! these shorts can give you super powers', 'batmanshorts.jpg', 39.99),
(3, 2, 'Captain America Hat', 'no one keeps the sun out of your eyes like the Captain!', 'captain-america-hat.jpg', 19.99),
(4, 2, 'Mickey Mouse Cap', 'M-I-C-K-E-Y M-O-U-S-E keeps you in the shade because he''s cool', 'mickeymousecap.jpg', 19.99),
(5, 1, 'Spiderman T-Shirt', 'with great power comes great responsibility', 'spiderman.jpg', 29.99),
(6, 2, 'Spiderman hat', 'Even Peter Parker needs shade', 'spider-man-hat.jpg', 19.99),
(7, 3, 'Spiderman Shorts', 'with great power comes great reponsibility', 'spidermanshorts.jpg', 39.99),
(8, 1, 'Superman Shirt', 'even kryptonite can''t take away from this great shirt', 'superman.jpg', 29.99),
(9, 1, 'Super Soldier Shirt', 'our SALUTE to summer', 'supersoldier.jpg', 29.00),
(10, 3, 'Super Soldier Shorts', 'our SALUTE to summer', 'supersoldiershorts.jpg', 39.99);

-- --------------------------------------------------------

--
-- Table structure for table `item_colors`
--

CREATE TABLE IF NOT EXISTS `item_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'artificial primary key',
  `itemid` int(11) NOT NULL COMMENT 'the item that this refers to',
  `color` varchar(45) NOT NULL COMMENT 'color choice for item',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='color options for the items' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `item_colors`
--

INSERT INTO `item_colors` (`id`, `itemid`, `color`) VALUES
(1, 1, 'black'),
(2, 2, 'black'),
(3, 3, 'blue'),
(4, 4, 'white and black'),
(5, 5, 'white'),
(6, 5, 'blue'),
(7, 5, 'red'),
(8, 6, 'red and blue'),
(9, 7, 'red yellow and blue'),
(10, 8, 'black'),
(11, 8, 'white'),
(12, 8, 'blue'),
(13, 9, 'white on blue'),
(14, 10, 'red and white on blue');

-- --------------------------------------------------------

--
-- Table structure for table `item_sizes`
--

CREATE TABLE IF NOT EXISTS `item_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL COMMENT 'the item that this is a size option for',
  `size` varchar(45) NOT NULL COMMENT 'like small medium large or one size fits all',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='the sizes that an item comes in' AUTO_INCREMENT=25 ;

--
-- Dumping data for table `item_sizes`
--

INSERT INTO `item_sizes` (`id`, `itemid`, `size`) VALUES
(1, 1, 'small'),
(2, 1, 'medium'),
(3, 1, 'large'),
(4, 2, 'small'),
(5, 2, 'medium'),
(6, 2, 'large'),
(7, 3, 'one size fits all'),
(8, 4, 'one size fits all'),
(9, 5, 'small'),
(10, 5, 'medium'),
(11, 5, 'large'),
(12, 6, 'one size fits all'),
(13, 7, 'small'),
(14, 7, 'medium'),
(15, 7, 'large'),
(16, 8, 'small'),
(17, 8, 'medium'),
(18, 8, 'large'),
(19, 9, 'small'),
(20, 9, 'medium'),
(21, 9, 'large'),
(22, 10, 'small'),
(23, 10, 'medium'),
(24, 10, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this will be the order id that we return to the customer when we say thank''s for the order',
  `customername` varchar(45) NOT NULL COMMENT 'from the shipping form',
  `address1` varchar(45) NOT NULL COMMENT 'from the shipping form',
  `address2` varchar(45) DEFAULT NULL COMMENT 'from the shipping form',
  `city` varchar(45) NOT NULL COMMENT 'from the shipping form',
  `stateprovince` varchar(45) NOT NULL COMMENT 'from the shipping form',
  `postcode` varchar(45) NOT NULL COMMENT 'from the shipping form',
  `specialinstructions` varchar(45) DEFAULT NULL COMMENT 'from the shipping form',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='the tshirt orders from our website' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this is the primary key so that we can have multiple order_items for items of different sizes',
  `item_id` int(11) NOT NULL COMMENT 'the item id',
  `order_id` int(11) NOT NULL COMMENT 'the order id - also part of the primary key',
  `color` varchar(45) DEFAULT NULL COMMENT 'from the shopping cart (session)',
  `size` varchar(45) DEFAULT NULL COMMENT 'from the shopping cart (session)',
  `qty` int(11) DEFAULT NULL COMMENT '(from the shopping cart)\n',
  `price` decimal(10,2) DEFAULT NULL COMMENT 'current price from the database',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this will be the items that are shipped to the customer in the order record';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
