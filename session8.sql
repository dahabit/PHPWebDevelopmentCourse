-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2010 at 07:09 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guestbook`
--
CREATE DATABASE `guestbook` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `guestbook`;

-- --------------------------------------------------------

--
-- Table structure for table `gbook`
--

CREATE TABLE IF NOT EXISTS `gbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gbook`
--

INSERT INTO `gbook` (`id`, `name`, `email`, `message`, `active`) VALUES
(1, 'ahmed', 'dahabit@gmail.com', 'السلام عليكم', 1),
(2, 'Mohamed', 'admin@dahabit.com', 'وعليكم السلام', 1),
(3, 'mahmoud', 'test@test.com', 'comment', 0),
(7, 'أحمد محمد محمود', 'ahmed@dahabit.com', 'بسم الله الرحمن الرحيم', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
