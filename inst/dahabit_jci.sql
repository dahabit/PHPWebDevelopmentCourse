-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2010 at 04:16 AM
-- Server version: 5.0.90
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dahabit_jci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `group` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `group`) VALUES
(1, 'ahmed', '123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_word`
--

CREATE TABLE IF NOT EXISTS `admin_word` (
  `id` int(10) default '0',
  `word` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_word`
--

INSERT INTO `admin_word` (`id`, `word`) VALUES
(0, '');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `desc` text,
  `contact` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `desc`, `contact`) VALUES
(1, 'معهد الجبيل الثقافي', 'يعتبر معهد الجبيل الثقافي بالجبيل أحد الصروح التعليمية الهامة بالجبيل حيث يقوم بتقديم الدورات التأهليه في المجالات المختلفه مثل الإدارة والمحاسبة وكذلك دورات متخصصة في الحاسب الآلي معتمدة من الوزارة ودورات في اللغة الإنجليزية', 'ص.ب 1200 الجبيل 31951\r\nهاتف: 3621300       فاكس 3624441'),
(2, 'معهد الجبيل الثقافي بالدمام', 'يعتبر فرع معهد الجبيل الثقافي بالدمام أحد أهم الفروع التابعة لمعهد الجبيل الثقافي حيث يقوم بتقديم الخدمات التعليميه لمنطقة الدمام\r\n\r\n', 'الدمام - 123456\r\n\r\nهاتف :5555555  فاكس 6666666');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(10) NOT NULL auto_increment,
  `c_code` varchar(50) default NULL,
  `c_cat_id` int(10) NOT NULL default '0',
  `c_name` varchar(255) NOT NULL default '',
  `c_about` text,
  `c_require` text,
  `c_time` varchar(255) default NULL,
  `c_have` text,
  `c_targets` text,
  `c_place` varchar(255) default NULL,
  `c_content` text,
  `course` text,
  `c_rems` text,
  `c_active` enum('1','0') default '1',
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_code`, `c_cat_id`, `c_name`, `c_about`, `c_require`, `c_time`, `c_have`, `c_targets`, `c_place`, `c_content`, `course`, `c_rems`, `c_active`) VALUES
(71, 'T212', 62, 'دورة مجمعة ثلاثة شهور', 'تحتوي هذه الدورة علي \r\n1- مقدمة \r\n2- دوس وندوز\r\n3- برنامج وورد\r\n4- برنامج بوروبينت', 'لا يوجد متطلبات سابقة', '3 شهور', 'من يريد الحصول علي وظيفة مناسبة أو الترقي في عمله', '1- هدف1 \r\n2- هدف 2\r\n3- هدف 3', 'معهد الجبيل الثقافي بالجبيل', 'وورد \r\nاكسل\r\nاكسس\r\nبوربوينت', NULL, 'الدراسة في الفترة المسائية من 4 الي 6 مساءا يومياً عدا الخميس والجمعة', '1');

-- --------------------------------------------------------

--
-- Table structure for table `courses_cat`
--

CREATE TABLE IF NOT EXISTS `courses_cat` (
  `c_cat_id` int(10) NOT NULL auto_increment,
  `c_cat_name` varchar(255) NOT NULL default '',
  `c_cat_active` enum('0','1') NOT NULL default '1',
  `c_cat_des` text,
  PRIMARY KEY  (`c_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `courses_cat`
--

INSERT INTO `courses_cat` (`c_cat_id`, `c_cat_name`, `c_cat_active`, `c_cat_des`) VALUES
(62, 'دورات الحاسب الآلي', '1', 'قسم مخصصص لدورات الحاسب الآلي '),
(63, 'دورات اللغة الإنجليزية', '1', 'قسم مخصص لدورات اللغة الإنجليزيه'),
(64, 'الدورات الإدارية', '1', 'قسم مخصص للدورات الإدارية'),
(65, 'دورات التنمية البشرية', '1', 'قسم مخصص لدورات التنمية البشرية');

-- --------------------------------------------------------

--
-- Table structure for table `courses_fill`
--

CREATE TABLE IF NOT EXISTS `courses_fill` (
  `c_fill_id` int(10) NOT NULL auto_increment,
  `c_cat_id` int(10) NOT NULL default '0',
  `c_id` int(10) NOT NULL default '0',
  `s_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`c_fill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8033 ;

--
-- Dumping data for table `courses_fill`
--

INSERT INTO `courses_fill` (`c_fill_id`, `c_cat_id`, `c_id`, `s_id`) VALUES
(8017, 62, 71, 507),
(8018, 62, 71, 507),
(8019, 62, 71, 507),
(8020, 62, 71, 507),
(8021, 62, 71, 507),
(8022, 62, 71, 507),
(8023, 62, 71, 507),
(8024, 62, 71, 507),
(8025, 62, 71, 507),
(8026, 62, 71, 507),
(8027, 0, 0, 507),
(8028, 62, 71, 507),
(8029, 62, 71, 507),
(8030, 62, 71, 507),
(8031, 62, 71, 507),
(8032, 62, 71, 507);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `j_id` int(10) NOT NULL auto_increment,
  `j_cat_id` int(10) NOT NULL default '0',
  `j_title` varchar(255) NOT NULL default '',
  `j_code` varchar(50) default NULL,
  `j_details` text,
  `j_company` varchar(255) default NULL,
  `j_require` varchar(255) default NULL,
  `j_exp_require` int(10) default NULL,
  `j_contract_time` double default NULL,
  `j_learn_require` varchar(255) default NULL,
  `j_add_date` date default NULL,
  `j_start_date` date default NULL,
  `j_end_date` date default NULL,
  `j_rems` text,
  `j_w_gender` enum('male','female') default 'male',
  `j_active` enum('1','0') NOT NULL default '0',
  `j_salary` double default NULL,
  PRIMARY KEY  (`j_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`j_id`, `j_cat_id`, `j_title`, `j_code`, `j_details`, `j_company`, `j_require`, `j_exp_require`, `j_contract_time`, `j_learn_require`, `j_add_date`, `j_start_date`, `j_end_date`, `j_rems`, `j_w_gender`, `j_active`, `j_salary`) VALUES
(69, 58, 'مراجع حسابات', NULL, 'مراجع حسابات ومدير', 'معهد الجبيل', 'دبلومة حسابات عامة', 15, 5, 'بكالريوس تجارة', '2007-07-14', '2007-07-16', '2007-07-30', 'مطلوب مراج ذو خبرة', 'male', '1', 5000),
(68, 58, 'محاسب', NULL, 'مطلوب محاسب طوال الوقت', 'معهد الجبيل', 'بكالريوس تجارة', 5, 2, 'بكالريوس تجارة', '2007-07-14', '2007-07-16', '2007-07-28', 'مطلوب محاسب دوامين', 'male', '1', 2000),
(70, 57, 'مبرمج', NULL, 'مطلوب مبرمج', 'معهد الجبيل', 'بكالريوس هندسه', 3, 1, 'بكالريوس هندسه', '2007-07-14', '2007-07-15', '2007-07-30', NULL, 'male', '0', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_cat`
--

CREATE TABLE IF NOT EXISTS `jobs_cat` (
  `j_cat_id` int(10) NOT NULL auto_increment,
  `j_cat_name` varchar(255) NOT NULL default '',
  `j_cat_active` enum('0','1') NOT NULL default '1',
  `j_cat_des` text,
  PRIMARY KEY  (`j_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `jobs_cat`
--

INSERT INTO `jobs_cat` (`j_cat_id`, `j_cat_name`, `j_cat_active`, `j_cat_des`) VALUES
(57, 'برمجة', '1', 'قسم خاص بوظائف البرمجة   قسم خاص بوظائف البرمجة   قسم خاص بوظائف البرمجة     '),
(58, 'حسابات', '1', 'قسم خاص بوظائف الحسابات'),
(59, 'مبيعات', '1', 'قسم خاص بوظائف المبيعات'),
(60, 'إدارة', '1', 'قسم خاص بالوظائف الإدارية'),
(61, 'تجربة القسم', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_fill`
--

CREATE TABLE IF NOT EXISTS `jobs_fill` (
  `fill_id` int(10) NOT NULL auto_increment,
  `j_cat_id` int(10) NOT NULL default '0',
  `j_id` int(10) NOT NULL default '0',
  `w_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`fill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8017 ;

--
-- Dumping data for table `jobs_fill`
--

INSERT INTO `jobs_fill` (`fill_id`, `j_cat_id`, `j_id`, `w_id`) VALUES
(8000, 58, 69, 1),
(8001, 58, 69, 1),
(8002, 58, 69, 1),
(8003, 58, 69, 1),
(8004, 58, 69, 1),
(8005, 58, 69, 1),
(8006, 58, 69, 1),
(8007, 58, 69, 1),
(8008, 58, 69, 1),
(8009, 58, 69, 1),
(8010, 58, 69, 1),
(8011, 58, 69, 1),
(8012, 58, 69, 1),
(8013, 58, 69, 2),
(8014, 58, 69, 2),
(8015, 58, 69, 2),
(8016, 58, 69, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kader`
--

CREATE TABLE IF NOT EXISTS `kader` (
  `kader` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kader`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_page`
--

CREATE TABLE IF NOT EXISTS `main_page` (
  `main_title` varchar(255) default NULL,
  `main_body` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_page`
--

INSERT INTO `main_page` (`main_title`, `main_body`) VALUES
('أهلا بكم في معهد الجبيل الثقافي', 'أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم أهلا بكم ');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) character set utf8 collate utf8_bin default NULL,
  `img` varchar(255) default NULL,
  `details` text,
  `brief` text,
  `active` int(11) default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `author` varchar(255) default NULL,
  `viewnum` int(10) default '0',
  `remlink` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `img`, `details`, `brief`, `active`, `date`, `author`, `viewnum`, `remlink`) VALUES
(33, 'بسم الله', NULL, 'بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   ', 'بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   بسم الله الرحمن الرحيم وبه نستعين هذه تجربة أول خبر في قاعدة البيانات   ', 1, '2007-07-11 16:22:50', NULL, 87, NULL),
(34, 'الخبر الثاني', '66.jpg', 'تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   ررر', 'تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   تجربة إدراج خبر ثاني   ', 1, '2007-07-11 17:01:57', NULL, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL auto_increment,
  `visitor` varchar(100) collate utf8_bin default NULL,
  `timevisit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12688 ;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `visitor`, `timevisit`) VALUES
(12687, 'localhost', 1184052549);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) NOT NULL auto_increment,
  `img` varchar(255) NOT NULL default '',
  `des` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `img`, `des`, `title`) VALUES
(1, '1.jpg', 'تجربة', 'تجربة'),
(2, '5.jpg', 'هذه تجربة للنص الذي يظهر عند الوقوف علي الصورة ويمكن عمل وصف مختصر للصورة', 'تجربة 2'),
(3, '6.jpg', 'تجربة 3', 'تجربة 3'),
(4, '7.jpg', 'تجربة4', 'تجربة 4'),
(5, '8.jpg', 'تجربة5', 'تجربة 5');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `about` tinytext,
  `link` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `about`, `link`) VALUES
(14, 'معهد الجبيل الثقافي', 'يعتبر موقع معهد الجبيل الثقافي من المواقع الإلكترونية التي تقدم خدمات التعليم والتوظيف الإلكترونيه وهو من أفضل المواقع بالمملكة', 'http://www.jci.com.sa'),
(15, 'موقع وزارة التعليم العالي', 'موقع وزارة التعليم العالي بالمملكة العربية السعودية ', 'http://www.mohe.gov.sa'),
(16, 'وزارة التربية والتعليم', 'موقع وزارة التربيه والتعليم بالمملكة العربية السعودية', 'http://www.moe.gov.sa'),
(17, 'المديرية العامة للجوازات', 'موقع المديرية العامة للجوازات التابع لوزارة الداخلية بالمملكة العربية السعودية', 'http://www.gdp.gov.sa/arabic/arabic-index.html'),
(18, 'وزارة المياه والكهرباء', 'موقع وزارة المياه والكهرباء', 'http://www.gdp.gov.sa/arabic/arabic-index.html');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(10) NOT NULL auto_increment,
  `s_login` varchar(50) NOT NULL default '',
  `s_password` varchar(255) NOT NULL default '',
  `s_gender` enum('female','male') NOT NULL default 'male',
  `s_email` varchar(255) default NULL,
  `s_name` varchar(255) default NULL,
  `s_live_city` varchar(50) default NULL,
  `s_tell` varchar(50) default NULL,
  `s_mobile` varchar(50) default NULL,
  `s_age` int(10) default NULL,
  `s_more_info` text,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=508 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_login`, `s_password`, `s_gender`, `s_email`, `s_name`, `s_live_city`, `s_tell`, `s_mobile`, `s_age`, `s_more_info`) VALUES
(507, 'ahmed', '123456789', 'male', 'ahmed_hebo@hotmail.com', 'أحمد محمد محمود إبراهيم', 'الجبيل', '0558803595', '0558803595', 26, 'أحب البرمجة كثيراً');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(10) NOT NULL auto_increment,
  `visitnum` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `visitnum`) VALUES
(1, 15517);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `w_id` int(10) NOT NULL auto_increment,
  `w_login` varchar(50) NOT NULL default '',
  `w_password` varchar(255) NOT NULL default '',
  `w_email` varchar(255) default NULL,
  `w_name` varchar(255) default NULL,
  `w_gender` enum('male','female') default 'male',
  `w_family_status` enum('single','married','widower','divorced') default 'single',
  `w_live_city` varchar(50) default NULL,
  `w_tell` varchar(50) default NULL,
  `w_mobile` varchar(50) default NULL,
  `w_drive_linc` enum('no','yes') default 'no',
  `w_have_car` enum('yes','no') default 'no',
  `w_college_city` varchar(255) default NULL,
  `w_tall` varchar(50) default NULL,
  `w_weight` varchar(50) default NULL,
  `w_age` int(10) default NULL,
  `w_work_exp` int(10) default NULL,
  `w_college` varchar(50) default NULL,
  `w_college_country` varchar(50) default NULL,
  `w_degree` varchar(100) default NULL,
  `w_work_spec` varchar(100) default NULL,
  `w_grad_date` date default NULL,
  `w_degree_desc` varchar(255) default NULL,
  `w_more_info` text,
  PRIMARY KEY  (`w_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=512 ;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`w_id`, `w_login`, `w_password`, `w_email`, `w_name`, `w_gender`, `w_family_status`, `w_live_city`, `w_tell`, `w_mobile`, `w_drive_linc`, `w_have_car`, `w_college_city`, `w_tall`, `w_weight`, `w_age`, `w_work_exp`, `w_college`, `w_college_country`, `w_degree`, `w_work_spec`, `w_grad_date`, `w_degree_desc`, `w_more_info`) VALUES
(1, 'abu_eldahab', '123456', 'dahabit@gmail.com', 'أحمد أبو الدهب', 'male', 'single', 'jubail', '0558803595', '0558803595', 'no', 'yes', 'zagazig', '180', '70', 26, 5, 'جامعة الزقازيق', 'مصر', 'بكالريوس حاسب آلي', 'حاسب آلي', '2002-07-20', 'بكالريوس معلم حاسب آلي', 'بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    بكالريوس معلم حاسب آلي    '),
(2, 'ahmed', '123456789', 'ahmed_hebo@hotmail.com', 'أحمد محمد محمود إبراهيم', 'male', 'single', 'القاهرة', '0558803595', '0558803595', 'yes', 'no', 'القاهرة', '180', '70', 26, 5, 'القاهرة', 'مصر', 'بكالوريوس', 'حاسب آلي', '2002-07-18', 'وصف', 'وصف');
