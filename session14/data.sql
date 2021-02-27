-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2010 at 12:01 �
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ahmed', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_cat_id` int(10) NOT NULL DEFAULT '0',
  `c_name` varchar(255) NOT NULL DEFAULT '',
  `c_about` text,
  `c_active` enum('1','0') DEFAULT '1',
  `c_view_num` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_cat_id`, `c_name`, `c_about`, `c_active`, `c_view_num`) VALUES
(71, 62, 'دورة مجمعة ثلاثة شهور', 'تحتوي هذه الدورة علي \r\n1- مقدمة \r\n2- دوس وندوز\r\n3- برنامج وورد\r\n4- برنامج بوروبينت', '1', 17),
(72, 63, 'انجليزي', 'بليبليل', '1', 17);

-- --------------------------------------------------------

--
-- Table structure for table `courses_cat`
--

CREATE TABLE IF NOT EXISTS `courses_cat` (
  `c_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_cat_name` varchar(255) NOT NULL DEFAULT '',
  `c_cat_active` enum('0','1') NOT NULL DEFAULT '1',
  `c_cat_des` text,
  PRIMARY KEY (`c_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `courses_cat`
--

INSERT INTO `courses_cat` (`c_cat_id`, `c_cat_name`, `c_cat_active`, `c_cat_des`) VALUES
(62, 'دورات الحاسب الآلي', '1', 'قسم مخصصص لدورات الحاسب الآلي'),
(63, 'دورات اللغة الإنجليزية', '1', 'قسم مخصص لدورات اللغة الإنجليزيه2'),
(65, 'دورات التنمية البشرية', '1', 'قسم مخصص لدورات التنمية البشرية'),
(66, 'دورات اللغات', '1', 'دورات خاصة بلغات البرمجة المختلفة');

-- --------------------------------------------------------

--
-- Table structure for table `courses_fill`
--

CREATE TABLE IF NOT EXISTS `courses_fill` (
  `c_fill_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL DEFAULT '0',
  `s_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_fill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8033 ;

--
-- Dumping data for table `courses_fill`
--

INSERT INTO `courses_fill` (`c_fill_id`, `c_id`, `s_id`) VALUES
(8017, 71, 507),
(8018, 71, 507),
(8019, 71, 507),
(8021, 71, 507),
(8026, 62, 507),
(8027, 0, 507);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_login` varchar(50) NOT NULL DEFAULT '',
  `s_password` varchar(255) NOT NULL DEFAULT '',
  `s_email` varchar(255) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=508 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_login`, `s_password`, `s_email`, `s_name`) VALUES
(507, 'ahmed', '123456789', 'ahmed_hebo@hotmail.com', 'أحمد محمد محمود إبراهيم');
