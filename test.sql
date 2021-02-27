-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2010 at 04:03 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahmed`
--

CREATE TABLE IF NOT EXISTS `ahmed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ahmed`
--

INSERT INTO `ahmed` (`id`, `name`, `age`) VALUES
(2, 'ibrahim', 23),
(3, 'hebo', 30),
(10, 'heb35o', 30);

-- --------------------------------------------------------

--
-- Table structure for table `divrem`
--

CREATE TABLE IF NOT EXISTS `divrem` (
  `amount` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divrem`
--

INSERT INTO `divrem` (`amount`, `qty`) VALUES
(100, 3),
(200, 7),
(300, 7),
(400, 3),
(500, 9);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `fname` varchar(12) DEFAULT NULL,
  `Lastname` varchar(12) DEFAULT NULL,
  `Sector` varchar(12) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `aleave` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`fname`, `Lastname`, `Sector`, `Salary`, `aleave`) VALUES
('amir', 'Fahmy', 'Training', 1500, 2),
('ahmed', 'Mohammad', 'Training', 2500, 6),
('Israa', 'Mohammad', 'Finance', 1200, 3),
('badr ', 'Moon', 'Admin', 1000, 2),
('Kareem', 'Ramadan', 'Finance', 1300, 0),
('Medo', 'Yakoub', 'Admin', 3300, 9),
('Hayam', 'Helmy', 'Training', 6000, 5),
('Rasha', 'Ali', 'Finance', 5000, 4),
('Hajar', 'Hamed', 'Admin', 2400, 8),
('Hazem', 'Hassan', 'Finance', 4200, 3),
('Heba', 'Yakoub', 'Admin', 6800, 5);

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE IF NOT EXISTS `letters` (
  `FIRTSNAME` varchar(15) DEFAULT NULL,
  `LASTNAME` varchar(15) DEFAULT NULL,
  `LTR` char(1) DEFAULT NULL,
  `CODE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`FIRTSNAME`, `LASTNAME`, `LTR`, `CODE`) VALUES
('AHMED', 'ALI', 'A', 32),
('ASSAD', 'HELMY', 'J', 67),
('RANIA', 'MOKHTAR', 'C', 65),
('HAJAR', 'MOHAMMAD', 'M', 87),
('HEBA', 'MOHAMMAD', 'A', 77),
('ISRAA', 'MOHAMMAD', 'G', 52);

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE IF NOT EXISTS `numbers` (
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numbers`
--

INSERT INTO `numbers` (`x`, `y`) VALUES
(3, 4),
(-45, -787),
(5, 9),
(-68, 42),
(15, 55),
(-7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `fname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birth` varchar(12) DEFAULT NULL,
  `salary` decimal(6,0) DEFAULT NULL,
  `marital` decimal(1,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`fname`, `lastname`, `gender`, `birth`, `salary`, `marital`) VALUES
('medo', 'jakoub', 'm', '4-Oct-77', 2500, 2),
('hoba', 'yakoub', 'f', '2-Oct-80', 3200, 1),
('nona', 'ahmed', 'f', '10-Jun-73', 4500, 2),
('ali', 'hasan', 'm', '11-Nov-80', 4500, 3),
('saad', 'saeed', 'm', '23-Nov-85', 5000, 3),
('gamal', 'gameel', 'm', '5-Jun-67', 6000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `precedence`
--

CREATE TABLE IF NOT EXISTS `precedence` (
  `v1` int(11) DEFAULT NULL,
  `v2` int(11) DEFAULT NULL,
  `v3` int(11) DEFAULT NULL,
  `v4` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `precedence`
--

INSERT INTO `precedence` (`v1`, `v2`, `v3`, `v4`) VALUES
(8, 4, 5, 4),
(7, 8, 9, 3),
(12, 14, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `item` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`item`, `price`) VALUES
('256MB RAM', 160),
('80GB HDD', 300),
('15 Monitor', 500),
('NIC 10/100', 40),
('Speakers', 30),
('Keyboard', 25),
('16 Ports Switch', 200),
('ADSL Router', 400);

-- --------------------------------------------------------

--
-- Table structure for table `retails`
--

CREATE TABLE IF NOT EXISTS `retails` (
  `item` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retails`
--

INSERT INTO `retails` (`item`, `price`) VALUES
('256MB RAM', 160),
('80GB HDD', 300),
('15 Monitor', 500),
('NIC 10/100', 40),
('Speakers', 30),
('Keyboard', 25),
('16 Ports Switch', 200),
('ADSL Router', 400);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `item` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`item`, `price`, `sold`) VALUES
('256MB RAM', 160, 170),
('80GB HDD', 300, 310),
('15 Monitor', 500, 510),
('NIC 10/100', 40, 50),
('Speakers', 30, 40),
('Keyboard', 25, 35),
('16 Ports Switch', 200, 210),
('ADSL Router', 400, 410);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `Class` char(1) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Day` varchar(8) DEFAULT NULL,
  `Session` decimal(1,0) DEFAULT NULL,
  `Subject` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Class`, `Capacity`, `Day`, `Session`, `Subject`) VALUES
('A', 20, 'Monday', 1, 'French'),
('A', 20, 'Monday', 2, 'Computer'),
('A', 20, 'Tuesday', 1, 'English'),
('A', 20, 'Tuesday', 2, 'Math'),
('B', 18, 'Wed', 1, 'Math'),
('B', 18, 'Wed', 2, 'English'),
('B', 18, 'Thu', 1, 'Computer'),
('B', 18, 'Thu', 2, 'French'),
('C', 15, 'Sat', 1, 'Computer'),
('C', 15, 'Sat', 2, 'English'),
('C', 15, 'Sun', 1, 'French'),
('C', 15, 'Sun', 2, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE IF NOT EXISTS `sectors` (
  `fname` varchar(12) DEFAULT NULL,
  `Lastname` varchar(12) DEFAULT NULL,
  `Sector` varchar(12) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`fname`, `Lastname`, `Sector`, `Salary`) VALUES
('amir', 'Fahmy', 'Training', 1500),
('ahmed', 'Mohammad', 'Training', 2500),
('Israa', 'Mohammad', 'Finance', 1200),
('badr ', 'Moon', 'Admin', 1000),
('Kareem', 'Ramadan', 'Finance', 1300),
('Farida', 'Samir', 'Admin', 2000),
('Medo', 'Yakoub', 'Admin', 3300),
('Rania', 'Mokhtar', 'Training', 1500),
('Hayam', 'Helmy', 'Training', 6000),
('Rasha', 'Ali', 'Finance', 5000),
('Hajar', 'Hamed', 'Admin', 2400),
('Hazem', 'Hassan', 'Finance', 4200),
('Khaled', 'Sobhy', 'Admin', 2100),
('Heba', 'Yakoub', 'Admin', 6800);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `Part_No` char(4) DEFAULT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Balance` decimal(4,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Part_No`, `Description`, `Balance`) VALUES
('MB01', 'Mother Board Giga', 120),
('MB02', 'Mother Board Accorp', 300),
('MO01', 'LG 15 Monitor', 200),
('MO02', 'LG 17 Monitor', 80),
('MO03', 'Samsong 15', 100),
('MO04', 'Samsong 17', 85),
('P001', '1.7GHz ', 40),
('P002', '2GHz', 65),
('P003', '2.4GHz', 110),
('P004', '2.8GHz', 220),
('HD01', 'HDD 40GB', 75),
('HD02', 'HDD 80GB', 175),
('HD03', 'HDD 115GB', 275);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task` varchar(14) DEFAULT NULL,
  `startdate` varchar(12) DEFAULT NULL,
  `enddate` varchar(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task`, `startdate`, `enddate`) VALUES
('delivery', '01-APR-2004', '28-APR-2004'),
('installaton', '29-APR-2004', '15-MAY-2004'),
('testing', '01-MAY-2004', '15-JUN-2004'),
('training', '01-JUL-2004', '31-JUL-2004'),
('OJT', '01-AUG-2004', '31-DEC-2004'),
('handover', '05-JAN-2005', '20-JAN-2005');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `age` decimal(2,0) DEFAULT NULL,
  `gyear` decimal(10,0) DEFAULT NULL,
  `speciality` varchar(20) DEFAULT NULL,
  `rem` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `age`, `gyear`, `speciality`, `rem`) VALUES
(1, 'Ali Hassan', 30, 1995, 'Math', 'Senior'),
(2, 'Hassan Ali', 35, 1990, 'English', 'Senior'),
(3, 'Mohssen', 28, 1997, 'Arabic', 'Prof'),
(4, 'Amir', 27, 2000, 'Computer', 'Engineer'),
(5, 'Mohammad', 25, 2003, 'Physics', 'Junior'),
(6, 'Assad', 26, 2000, 'French', 'Level II');
