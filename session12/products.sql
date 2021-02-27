-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2010 at 08:29 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(3, 'ahmed', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'ayman', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_des` text CHARACTER SET utf8,
  `cat_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_active` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`cat_id`, `cat_name`, `cat_des`, `cat_img`, `cat_active`) VALUES
(1, 'كمبيوتر وملحقاته', 'قسم مخصص للمنتجات التي تتعلق بأجهزة الحاسب الآلي وملحقاتها', '', '1'),
(2, 'كتب ومجلات', 'قسم مخصص للكتب والمجلات', '', '1'),
(3, 'حبوب وبقوليات', 'قسم مخصص للحبوب والبقوليات', '', '1'),
(4, 'خضروات وفواكه', 'قسم مخصص للخضروات ', '', '1'),
(5, 'اللحوم والمجمدات', 'قسم مخصص للحوم والمجمدات', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `cat_id` int(10) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `details` text,
  `shortdesc` mediumtext NOT NULL,
  `price` double DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewnum` int(10) DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`cat_id`, `product_id`, `title`, `img`, `details`, `shortdesc`, `price`, `active`, `date`, `viewnum`) VALUES
(1, 2, 'فول', 'http://localhost/session13/products/images/fool.jpg', 'فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه ', 'فول مدمس بالخلطة المصرية', 100, 1, '2010-04-17 00:00:00', 0),
(1, 3, 'فلافل', 'http://localhost/session13/products/images/falafel_small.jpg', 'فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه فول مدمس درجة أولى حاجة آخر طعامه ', 'فلافل مصرية واسمها طعميه', 100, 1, '2010-04-17 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
