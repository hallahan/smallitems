-- phpMyAdmin SQL Dump
-- version 3.3.10.2
-- http://www.phpmyadmin.net
--
-- Host: db.cecs.pdx.edu
-- Generation Time: Nov 30, 2011 at 11:41 AM
-- Server version: 5.1.41
-- PHP Version: 5.2.6-3ubuntu4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hallahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `checkout_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `returned` enum('NO','YES') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `checkout_time` datetime DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`checkout_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `client_id`, `returned`, `checkout_time`, `return_time`, `notes`) VALUES
(1, 1, 'NO', '2011-11-15 00:59:52', '2011-11-16 16:58:54', 'test'),
(2, 2, 'YES', '2011-11-15 01:02:47', '2011-11-19 10:01:25', 'test'),
(3, 5, 'NO', '2011-11-08 17:03:42', '2011-11-10 17:03:54', 'test'),
(4, 8, 'NO', '2011-11-02 17:03:42', '2011-11-18 17:55:42', 'In testing, this should be due TODAY!!!');

-- --------------------------------------------------------

--
-- Table structure for table `checkoutitem`
--

CREATE TABLE IF NOT EXISTS `checkoutitem` (
  `checkoutitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `checkout_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`checkoutitem_id`),
  KEY `checkout_id` (`checkout_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `checkoutitem`
--

INSERT INTO `checkoutitem` (`checkoutitem_id`, `checkout_id`, `item_id`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 2, 7),
(4, 2, 2),
(5, 2, 2),
(6, 2, 5),
(7, 3, 8),
(8, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `first_name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `psu_id` char(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`first_name`, `last_name`, `psu_id`, `phone`, `email`, `notes`, `client_id`) VALUES
('Nicholas', 'Hallahan', '945564529', '503-454-6543', '', 'He made this database!', 1),
('Billy', 'Bob', '956648557', '503-665-4986', '', 'test value 1', 2),
('Jill', 'Diamond', '253423533', '(615) 332-4325', '', 'test client', 6),
('Sam', 'Horton', '99324132', '656-343-2553', '', 'test client', 5),
('Billy', 'Bob', '24f', '234', 'asdf', 'asdfasdf', 7),
('David', 'Whittiker', '978546785', '545-5855', 'dw@pdx.edu', 'Diamond Dave (nick name)', 8),
('Ted', 'Bundy', '974353628', '503-827-6753', 'bundy@gmail.com', 'Dont loan out projectors to this guy.', 9),
('Billy', 'Idol', '934-332-5', '(503) 342-8832', 'wwedding@pdx.edu', 'It''s a nice day to... START AGAIN!!!!', 10),
('Jennifer', 'Hensley', '232-523-1', '615-334-2522', 'jenhen@yahoo.com', '', 11),
('Jorgen', 'Morgenson', '223-415-2', '333-333-3333', 'jorgymorgy@mindscape.com', 'What a name? No more SQL problems now... '' Drop table', 12),
('Thomas', 'Miller', '943-232-1', '(312) 768-3342', 'tmiller@depaul.edu', 'wacky guy', 13),
('Jeffrey', 'Dahmer', '343-535-3', '503-252-3325', 'dahmerj@pdx.edu', 'He is hungry.', 14),
('Sam', 'Adams', '434-252-343', '(213) 323-4432', 'mayor@portland.gov', 'the mayor', 15);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci,
  `type` enum('TYPE 1','TYPE 2','TYPE 3','TYPE 4','TYPE 5','TYPE 6') COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`name`, `descr`, `type`, `item_id`) VALUES
('Mac Adapter', 'This is a Type 1 Mac Adapter.', 'TYPE 1', 1),
('SVGA Cable', 'This is the standard analog video transmission cord. Used for: projectors<->computers', NULL, 2),
('Mac Adapter', 'all mac laptops after 2006', 'TYPE 5', 8),
('Mac Adapter', NULL, 'TYPE 2', 5),
('Mac Adapter', NULL, 'TYPE 3', 6),
('Mac Adapter', NULL, 'TYPE 4', 7),
('Mac Adapter', 'used for iPad', 'TYPE 6', 9),
('Box Cutter', NULL, NULL, 10),
('Cell Phone Charger', 'what?', 'TYPE 2', 11),
('Rope', 'very useful', '', 12),
('Bag of Beans', 'gets you through the hard times!', '', 13),
('black trash bag', '', '', 14),
('a green shoe', '', '', 15),
('telephone', '', '', 16),
('chemicals', '', '', 17),
('torch', 'for welding', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `fname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `byear` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`fname`, `lname`, `byear`) VALUES
('bob', 'palmieri', 1952),
('tom', 'miller', 1956),
('laura', 'holloway', 1986);
