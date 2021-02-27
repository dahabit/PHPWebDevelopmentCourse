-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2010 at 08:19 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
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
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `active`) VALUES
(1, 'الصفحة الرئيسية', '<p style="text-align: right;">بسم الله</p><br />\r\n<p style="text-align: right;">&nbsp;</p><br />\r\n<p style="text-align: right;">الحمد لله</p><br />\r\n<p style="text-align: right;">&nbsp;</p><br />\r\n<p style="text-align: right;">&nbsp;</p><br />\r\n<p style="text-align: right;"><img src="http://moxiecode.cachefly.net/tinymce/v2/images/subimage/docs.gif" alt="وصف الصورة" width="520" height="149" /></p>', 1),
(2, 'خدماتنا', 'ما أصله ؟\r\n\r\nخلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد، مما يجعله أكثر من 2000 عام في القدم. قام البروفيسور "ريتشارد ماك لينتوك" (Richard McClintock) وهو بروفيسور اللغة اللاتينية في جامعة هامبدن-سيدني في فيرجينيا بالبحث عن أصول كلمة لاتينية غامضة في نص لوريم إيبسوم وهي "consectetur"، وخلال تتبعه لهذه الكلمة في الأدب اللاتيني اكتشف المصدر الغير قابل للشك. فلقد اتضح أن كلمات نص لوريم إيبسوم تأتي من الأقسام 1.10.32 و 1.10.33 من كتاب "حول أقاصي الخير والشر" (de Finibus Bonorum et Malorum) للمفكر شيشيرون (Cicero) والذي كتبه في عام 45 قبل الميلاد. هذا الكتاب هو بمثابة مقالة علمية مطولة في نظرية الأخلاق، وكان له شعبية كبيرة في عصر النهضة. السطر الأول من لوريم إيبسوم "Lorem ipsum dolor sit amet.." يأتي من سطر في القسم 1.20.32 من هذا الكتاب. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rightmenu`
--

CREATE TABLE IF NOT EXISTS `rightmenu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `link` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rightmenu`
--

INSERT INTO `rightmenu` (`id`, `name`, `title`, `link`, `active`) VALUES
(1, 'الأولى', 'القائمة الرئيسية', 1, 1),
(2, 'إتصل بنا', 'صفحة الإتصال', 2, 1),
(3, 'قائمة يمنى', 'القائمة', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topmenu`
--

CREATE TABLE IF NOT EXISTS `topmenu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `link` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `topmenu`
--

INSERT INTO `topmenu` (`id`, `name`, `title`, `link`, `active`) VALUES
(1, 'الرئيسية', 'القائمة الرئيسية', 1, 1),
(2, 'خدماتنا', 'الخدمات الخاصة بالشركة', 2, 1),
(8, 'منتجاتنا2', 'تجربة', 3, 1),
(7, 'منتجاتنا', 'المنتجات الخاصة بالشركة', 3, 1),
(9, 'معلومات عنا', 'معلومات عن الشركة', 4, 1),
(10, 'الصفحة التجريبية', 'الصفحة التجريبية', 8, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
