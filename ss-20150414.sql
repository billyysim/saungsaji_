-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2015 at 09:48 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saungsaji`
--
CREATE DATABASE `saungsaji` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `saungsaji`;

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1364 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1353, 1429015490, '127.0.0.1', '148906'),
(1352, 1429015016, '127.0.0.1', '138383'),
(1363, 1429018662, '127.0.0.1', '772396'),
(1362, 1429018662, '127.0.0.1', '499406'),
(1361, 1429018484, '127.0.0.1', '367646'),
(1360, 1429016767, '127.0.0.1', '954503'),
(1359, 1429016025, '127.0.0.1', '369149'),
(1358, 1429016006, '127.0.0.1', '888728'),
(1357, 1429015606, '127.0.0.1', '336868'),
(1356, 1429015583, '127.0.0.1', '840808'),
(1355, 1429015542, '127.0.0.1', '627132'),
(1354, 1429015505, '127.0.0.1', '398344');

-- --------------------------------------------------------

--
-- Table structure for table `msalamats`
--

CREATE TABLE IF NOT EXISTS `msalamats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `cAlamat` text,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `msalamats`
--

INSERT INTO `msalamats` (`id`, `idRestoran`, `cAlamat`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(10, 5, 'Jl. Jend. Sudirman No. 96', 'Y', '2015-01-11 22:44:51', NULL, NULL, NULL),
(12, 5, 'Jl. Jend. Sudirman No. 34', 'Y', '2015-01-11 22:45:00', NULL, NULL, NULL),
(13, 6, 'Jl. Yusuf Singadikane 51', 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mscharges`
--

CREATE TABLE IF NOT EXISTS `mscharges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iCharge` int(11) DEFAULT NULL,
  `dStartBerlaku` date DEFAULT NULL,
  `dEndBerlaku` date DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mscharges`
--

INSERT INTO `mscharges` (`id`, `iCharge`, `dStartBerlaku`, `dEndBerlaku`, `cStatus`, `dCreated`, `cCreated`, `dLastUpdated`, `cLastUpdated`) VALUES
(1, 10, '2015-01-01', '2015-12-31', 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mscustprofiles`
--

CREATE TABLE IF NOT EXISTS `mscustprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iUsers` int(11) NOT NULL,
  `cAlamat` text,
  `cWilayah` varchar(100) DEFAULT NULL,
  `cHp` varchar(50) DEFAULT NULL,
  `cTelp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `mscustprofiles`
--

INSERT INTO `mscustprofiles` (`id`, `iUsers`, `cAlamat`, `cWilayah`, `cHp`, `cTelp`) VALUES
(1, 1, 'Jl. Jend. Sudirman \r\nRt. 14 Rw. 001 No. 965', '1', '085266042042', '23247'),
(2, 2, 'Jakarta Selatan', '2', '085266042042', '23247'),
(3, 3, 'Hendi Hendi', '3', '085266042042', '23247'),
(4, 4, 'Jambi Timur', '4', '085266042042', '23247'),
(7, 8, 'Jambi Slena fj', '5', '9324802394', '23840923'),
(8, 9, 'Jl. Dr. Sutomo No. 48', '1', '085266042042', ''),
(9, 10, 'Jl. Jend. Sudirman No. 90 A', '2', '085217440440', ''),
(10, 11, 'Jl. hahahahahahah hahahah', '5', '085266042042', '');

-- --------------------------------------------------------

--
-- Table structure for table `msemail`
--

CREATE TABLE IF NOT EXISTS `msemail` (
  `cEmail` varchar(100) NOT NULL,
  `iPoin` int(11) NOT NULL,
  `cStatus` varchar(5) NOT NULL,
  `cCreated` varchar(50) NOT NULL,
  `dCreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msemail`
--

INSERT INTO `msemail` (`cEmail`, `iPoin`, `cStatus`, `cCreated`, `dCreated`) VALUES
('internisti1908@yahoo.com', 50, 'Y', '', '0000-00-00 00:00:00'),
('silviana.jonathan@gmail.com', 50, 'Y', 'system', '2015-02-10 21:56:35'),
('hendi0509@gmail.com', 50, 'Y', 'system', '2015-02-10 22:02:56'),
('xx@gmail.com', 50, 'Y', 'system', '2015-03-01 00:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `msevents`
--

CREATE TABLE IF NOT EXISTS `msevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cEvent` varchar(250) DEFAULT NULL,
  `iPoin` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `msevents`
--


-- --------------------------------------------------------

--
-- Table structure for table `msgroupaccesses`
--

CREATE TABLE IF NOT EXISTS `msgroupaccesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cGroupName` varchar(20) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `msgroupaccesses`
--

INSERT INTO `msgroupaccesses` (`id`, `cGroupName`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'customer', 'Y', '2013-11-11 18:31:31', 'system', NULL, NULL),
(2, 'restaurant', 'Y', '2013-11-11 18:32:15', 'system', NULL, NULL),
(3, 'admin', 'Y', '2013-11-12 21:01:50', 'system', NULL, NULL),
(4, 'superadmin', 'Y', '2015-03-07 11:54:09', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msharga`
--

CREATE TABLE IF NOT EXISTS `msharga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iStartHarga` bigint(20) DEFAULT NULL,
  `iEndHarga` bigint(20) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `msharga`
--

INSERT INTO `msharga` (`id`, `iStartHarga`, `iEndHarga`, `cStatus`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(1, 0, 10000, 'Y', 'system', '2014-04-02 19:41:11', NULL, NULL),
(2, 10001, 20000, 'Y', 'system', '2014-04-02 19:41:11', NULL, NULL),
(3, 20001, 30000, 'Y', 'system', '2014-04-02 19:41:11', NULL, NULL),
(4, 30001, 40000, 'Y', 'system', '2014-04-02 19:41:11', NULL, NULL),
(5, 40001, 50000, 'Y', 'system', '2014-04-20 21:01:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mshargamenus`
--

CREATE TABLE IF NOT EXISTS `mshargamenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) DEFAULT NULL,
  `iHarga` int(11) DEFAULT NULL,
  `dStartBerlaku` date DEFAULT NULL,
  `dEndBerlaku` date DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mshargamenus`
--

INSERT INTO `mshargamenus` (`id`, `idMenu`, `iHarga`, `dStartBerlaku`, `dEndBerlaku`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 50000, '2014-01-01', '9999-12-31', 'Y', '2014-01-11 10:36:26', 'admin', '2014-01-11 10:36:26', 'admin'),
(2, 2, 5000, '2014-01-11', '9999-12-31', 'Y', '2014-01-11 10:36:26', 'admin', '2014-01-11 10:36:26', 'admin'),
(3, 3, 20000, '2014-01-01', '9999-12-31', 'Y', '2014-01-11 10:36:26', 'admin', '2014-01-11 10:36:26', 'admin'),
(4, 4, 25000, '2014-01-01', '9999-12-31', 'Y', '2014-01-11 10:36:26', 'admin', '2014-01-11 10:36:26', 'admin'),
(5, 5, 20000, '2014-01-01', '9999-12-31', 'Y', '2014-01-11 10:36:26', 'admin', '2014-01-11 10:36:26', 'admin'),
(6, 6, 30000, '2014-01-11', '9999-12-31', 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msmenuaccesses`
--

CREATE TABLE IF NOT EXISTS `msmenuaccesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iGroupId` int(11) DEFAULT NULL,
  `iMenuId` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `msmenuaccesses`
--

INSERT INTO `msmenuaccesses` (`id`, `iGroupId`, `iMenuId`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 1, 'Y', '2013-11-12 21:02:17', 'system', NULL, NULL),
(2, 1, 2, 'Y', '2013-11-12 21:02:33', 'system', NULL, NULL),
(3, 1, 3, 'Y', '2013-11-12 21:02:47', 'system', NULL, NULL),
(4, 1, 4, 'Y', '2013-11-12 21:03:09', 'system', NULL, NULL),
(5, 1, 8, 'Y', '2013-11-12 21:06:28', 'system', NULL, NULL),
(6, 2, 5, 'Y', '2013-11-12 21:06:47', 'system', NULL, NULL),
(7, 2, 6, 'Y', '2013-11-12 21:07:02', 'system', NULL, NULL),
(8, 2, 7, 'Y', '2013-11-12 21:07:22', 'system', NULL, NULL),
(9, 2, 8, 'Y', '2013-11-12 21:07:32', 'system', NULL, NULL),
(13, 3, 11, 'Y', '2015-01-23 22:41:20', NULL, NULL, NULL),
(12, 2, 10, 'Y', '2014-11-25 19:27:40', NULL, NULL, NULL),
(14, 3, 12, 'Y', '2015-01-23 22:41:31', NULL, NULL, NULL),
(15, 3, 13, 'Y', '2015-01-23 22:42:06', NULL, NULL, NULL),
(16, 3, 14, 'Y', '2015-01-23 22:42:06', NULL, NULL, NULL),
(17, 3, 15, 'Y', '2015-01-23 22:42:06', NULL, NULL, NULL),
(18, 3, 8, 'Y', '2015-01-23 22:42:06', NULL, NULL, NULL),
(20, 3, 18, 'Y', '2015-03-11 06:04:07', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msmenurestos`
--

CREATE TABLE IF NOT EXISTS `msmenurestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `cNama` varchar(100) DEFAULT NULL,
  `iKategori` int(11) DEFAULT NULL,
  `cStatusNew` varchar(2) DEFAULT NULL,
  `cImageThumb` text,
  `cImageLarge` text,
  `cDesc` text,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `msmenurestos`
--

INSERT INTO `msmenurestos` (`id`, `idRestoran`, `cNama`, `iKategori`, `cStatusNew`, `cImageThumb`, `cImageLarge`, `cDesc`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 'Sayur Asam', 1, 'Y', 'sayur asem.jpg', 'picfood.jpg', 'Today blog post will show you how to make a background layer half transparent, but keep the text on top as a solid color. A common problem occurs in browsers if you set a background opacity to transparent, all of the children will also become transparent. One solution in the older days was to use a png image, but we can also implement a pure CSS solution thanks to RBGa colors.', 'Y', '2013-11-13 20:11:44', 'system', NULL, NULL),
(2, 1, 'Bebek Goreng', 1, 'Y', 'ayam-bebek-dada.jpg', 'picfood.jpg', 'For IE6+, we must used Microsofts implementation of their gradient and filter properties. By using gradients combined with an 8 color HEX value, we can achieve the same semi-transparent white background as other browsers.', 'Y', '2013-11-13 20:12:23', 'system', NULL, NULL),
(3, 1, 'Nasi Putih', 2, NULL, '', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:12:47', 'system', NULL, NULL),
(4, 1, 'Burger King', 1, 'Y', 'pempek10.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:13:18', 'system', NULL, NULL),
(5, 1, 'Chicken Corden Blue', 1, 'N', 'French-fries.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:13:48', 'system', NULL, NULL),
(6, 1, 'Steak Sapi', 1, 'N', 'tempe.jpg', '6860059908_0829eedb3a_b.jpg', NULL, 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msmenus`
--

CREATE TABLE IF NOT EXISTS `msmenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cMenuItem` varchar(50) DEFAULT NULL,
  `cLink` varchar(100) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `msmenus`
--

INSERT INTO `msmenus` (`id`, `cMenuItem`, `cLink`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'my Profile', 'home/myProfile', 'Y', '2013-11-12 20:55:44', 'system', NULL, NULL),
(2, 'my Order', 'home/myOrder/1/1', 'Y', '2013-11-12 20:56:26', 'system', NULL, NULL),
(3, 'my Wallet', 'home/myWallet', 'Y', '2013-11-12 20:57:05', 'system', NULL, NULL),
(4, 'my Point', 'home/myPoint', 'Y', '2013-11-12 20:57:24', 'system', NULL, NULL),
(5, 'my Profile', 'r/home/', 'Y', '2013-11-12 20:58:00', 'system', NULL, NULL),
(6, 'my Menu', 'r/home/myMenu', 'Y', '2013-11-12 20:58:50', 'system', NULL, NULL),
(7, 'my Report', 'r/home/myReport', 'N', '2013-11-12 20:59:27', 'system', NULL, NULL),
(8, 'logout', 'home/logout', 'Y', '2013-11-12 20:59:51', 'system', NULL, NULL),
(10, 'my Transaction', 'r/home/myTransaction', 'Y', '2014-11-25 19:27:00', NULL, NULL, NULL),
(12, 'User', 'a/home/users/user', 'N', '2015-01-23 22:37:43', NULL, NULL, NULL),
(13, 'Restaurant', 'a/home/restorans/restaurant', 'N', '2015-01-23 22:37:43', NULL, NULL, NULL),
(14, 'Recent Order', 'a/home/recent_order/recentorder', 'Y', '2015-01-23 22:39:17', NULL, NULL, NULL),
(15, 'New Order', 'a/home/new_order/neworder', 'N', '2015-01-23 22:39:28', NULL, NULL, NULL),
(11, 'Home', 'a/home', 'N', '2015-01-23 22:47:14', NULL, NULL, NULL),
(18, 'Report Transaction', 'a/home/report_transaction/reporttransaction', 'Y', '2015-03-11 06:03:17', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msonestop_cust`
--

CREATE TABLE IF NOT EXISTS `msonestop_cust` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cSession` varchar(50) DEFAULT NULL,
  `cNama` varchar(100) DEFAULT NULL,
  `cEmail` varchar(100) DEFAULT NULL,
  `cHp` varchar(20) DEFAULT NULL,
  `cTelp` varchar(10) DEFAULT NULL,
  `cAlamat` text,
  `cStatus` varchar(2) DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `msonestop_cust`
--

INSERT INTO `msonestop_cust` (`id`, `cSession`, `cNama`, `cEmail`, `cHp`, `cTelp`, `cAlamat`, `cStatus`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(9, '', 'Silviana', 'silviana.jonathan@gmail.com', '085793110092', '23247', 'Jambi', 'Y', NULL, '2014-04-26 13:57:27', NULL, NULL),
(17, ' ', '', '', '', '', '', 'Y', NULL, '2014-04-30 21:53:22', NULL, NULL),
(18, ' ', '1', '2', '3', '4', '5', 'Y', NULL, '2014-05-03 09:18:29', NULL, NULL),
(19, ' ', 'Jeffry', 'jeffry@gmail.com', '0899090090', '23567', 'Jl. OKP No 98', 'Y', NULL, '2014-05-04 07:48:22', NULL, NULL),
(20, ' ', '', '', '', '', '', 'Y', NULL, '2014-05-06 20:22:24', NULL, NULL),
(21, ' ', '', '', '', '', '', 'Y', NULL, '2014-05-10 10:56:09', NULL, NULL),
(22, ' ', '', '', '', '', '', 'Y', NULL, '2014-05-10 11:00:27', NULL, NULL),
(23, ' ', '', '', '', '', '', 'Y', NULL, '2014-05-10 11:35:06', NULL, NULL),
(24, ' ', '1', '2', '3', '4', '5', 'Y', NULL, '2014-05-11 10:21:39', NULL, NULL),
(25, ' ', 'Hendra', 'hendra01@yahoo.com', '0000000000', '0000000000', 'Jambi Selatan', 'Y', NULL, '2014-05-15 14:17:49', NULL, NULL),
(26, ' ', 'hj', 'hj@hj.com', '1823u9u102', 'njndkjnqka', 'sadnlkksldnkc', 'Y', NULL, '2014-05-15 14:20:24', NULL, NULL),
(27, ' ', 'itok', 'itok@itok.com', '9802349230', '9230492309', 'nskdflksdnf ksldf', 'Y', NULL, '2014-05-17 17:05:04', NULL, NULL),
(28, ' ', 'Silviana', 'Silviana.Jonathan@gmail.com', '085793110092', '021-23247', 'Sentani, Jayapura', 'Y', NULL, '2014-05-18 11:17:54', NULL, NULL),
(29, ' ', 'Silvi', 'Silviana.Jonathan@gmail.com', '085793110092', '', 'Jambi Selatan', 'Y', NULL, '2014-05-22 10:05:32', NULL, NULL),
(30, ' ', 'hENDI', '', '23298374932489', '', 'Ja;losdk;ofb skidjflsdn lsdf', 'Y', NULL, '2014-09-15 17:17:28', NULL, NULL),
(31, ' ', 'Silviana', 'silviana.jonathan@gmail.com', '085793110092', '23247', 'Jl. Dr. Sutomo No.48-51 Jambi', 'Y', NULL, '2014-09-16 19:43:15', NULL, NULL),
(32, ' ', 'Hans', 'silviana.jonathan@gmail.com', '085369750121', '', 'Jl. Panglima Polim No 96', 'Y', NULL, '2014-12-27 20:21:23', NULL, NULL),
(33, ' ', 'Theresia', 'theresia@gmail.com', '085266042042', '', 'kls sldf slkdf sldf lsfds - 2', 'Y', NULL, '2015-01-18 14:53:59', NULL, NULL),
(34, ' ', 'Theresia', 'theresia@gmail.com', '085266042042', '', 'kikasf ianfl afnlk askfnl - Selincah', 'Y', NULL, '2015-01-18 14:57:10', NULL, NULL),
(35, ' ', 'xx', '', '085266042042', '23247', 'Jl. Jend. Sudirman - Selincah', 'Y', NULL, '2015-01-27 09:10:58', NULL, NULL),
(36, ' ', '1', 'theresia@gmail.com', '085266042042', '', 'Jl. jend. sul; s;ldfmsl;fds al - Jelutung', 'Y', NULL, '2015-01-31 17:35:04', NULL, NULL),
(37, ' ', 'AA', 'aa@gmail.com', '085266042042', '23247', 'Jl. AA AA AA - Jelutung', 'Y', NULL, '2015-01-31 19:08:15', NULL, NULL),
(38, ' ', 'aa', 'aa@gmail.com', '085266042042', '', 'jl. aa. aa aa a - Jelutung', 'Y', NULL, '2015-01-31 19:11:10', NULL, NULL),
(40, ' ', 'CC', 'cc@gmail.com', '085266042042', '234247', 'Jl. jneld a;lsd alsd - Jelutung', 'Y', NULL, '2015-01-31 21:06:31', NULL, NULL),
(41, ' ', 'Hendi', 'hendi@gmail.com', '085266042042', '23247', 'Jl. Jend. Sudirman No 96 A - Talang Banjar', 'Y', NULL, '2015-02-01 12:21:58', NULL, NULL),
(42, ' ', 'Hendi', 'hendi@gmail.com', '085266042042', '', 'Jl skldf  sklf  fg;ls - Selincah', 'Y', NULL, '2015-02-01 13:37:56', NULL, NULL),
(48, 'd247d91c1a700397199aa893c45d88bd', 'Silviana Than', 'silviana@gmail.com', '085369750121', '23247', 'Jl. Aa BB CC DD - Jelutung', 'Y', NULL, '2015-02-01 14:18:01', NULL, NULL),
(45, ' ', 'Santi', 'santi@gmail.com', '085266042042', '23247', '1234565678790 - Jelutung', 'Y', NULL, '2015-02-01 14:05:14', NULL, NULL),
(49, ' ', 'Apin', 'apin@gmail.com', '085217440440', '', 'Jl. AA AA BB BB - Talang Banjar', 'Y', NULL, '2015-02-01 14:30:36', NULL, NULL),
(50, '04ce2a3444c35c9d10e517ca4f3a421c', '123', '123@gmail.com', '085217440440', '12523', 'jl. alf a;e fsw;emls eg;lsmefs g - Jelutung', 'Y', NULL, '2015-02-01 14:46:54', NULL, NULL),
(52, '94be2624756f39a0dc5e34a4727f94bc', 'Hendi', 'hendi@gmail.com', '085266042042', '23248', 'Jl. Aa Bb Cc Dd - Jelutung', 'Y', NULL, '2015-02-01 14:59:15', NULL, NULL),
(54, 'f23285db69e52046766b6b45a8a1fbf1', 'hu', 'hu@gmail.com', '085266042042', '', 'Jl. oas ;pa po apdnka dop - Selincah', 'Y', NULL, '2015-02-01 15:04:07', NULL, NULL),
(55, '724ebcbe25a7b3b546a962d6031807b5', 'hu', 'hu@gmail.com', '085793110097', '10097', 'Jl. AA BB CC DD EE - Simp. Kawat', 'Y', NULL, '2015-02-01 15:12:08', NULL, NULL),
(56, ' ', 'Hendi', '', '085266042042', '', 'Jl. Kol Pol M. Taher No 96 - Talang Banjar', 'Y', NULL, '2015-03-02 22:12:09', NULL, NULL),
(57, '819a46faf1ca00cdec3dc6f2437adc17', 'Hendi', '', '085266042042', '', 'Jl. Jend. Sudirman Noo 123 - Jelutung', 'Y', NULL, '2015-04-14 20:54:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msopenings`
--

CREATE TABLE IF NOT EXISTS `msopenings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `cHari` varchar(20) DEFAULT NULL,
  `dOpenHour` time DEFAULT NULL,
  `dCloseHour` time DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `msopenings`
--

INSERT INTO `msopenings` (`id`, `idRestoran`, `cHari`, `dOpenHour`, `dCloseHour`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 5, 'Senin', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:08:17', 'system', '2015-01-30 03:10:36', NULL),
(2, 5, 'Selasa', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:09:49', 'system', '2014-12-07 20:24:53', NULL),
(3, 5, 'Rabu', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:10:03', 'system', '2015-01-11 22:28:35', NULL),
(4, 5, 'Kamis', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:10:28', 'system', '2015-01-07 20:26:48', NULL),
(5, 5, 'Jumat', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:10:41', 'system', '2015-01-07 21:07:33', NULL),
(6, 5, 'Sabtu', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:11:01', 'system', NULL, NULL),
(7, 5, 'Minggu', '09:00:00', '21:00:00', 'Y', '2013-11-15 20:11:36', 'system', NULL, NULL),
(8, 6, 'Senin', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL),
(9, 6, 'Selasa', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL),
(10, 6, 'Rabu', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL),
(11, 6, 'Kamis', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL),
(12, 6, 'Jumat', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL),
(13, 6, 'Sabtu', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL),
(14, 6, 'Minggu', '09:00:00', '21:00:00', 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mspaymentmethods`
--

CREATE TABLE IF NOT EXISTS `mspaymentmethods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cPayment` varchar(50) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mspaymentmethods`
--

INSERT INTO `mspaymentmethods` (`id`, `cPayment`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'Cash', 'Y', '2013-12-07 14:03:18', 'system', NULL, NULL),
(2, 'My Wallet', 'Y', '2013-12-07 14:03:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mspengantarans`
--

CREATE TABLE IF NOT EXISTS `mspengantarans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `idWilayah` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `mspengantarans`
--

INSERT INTO `mspengantarans` (`id`, `idRestoran`, `idWilayah`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(32, 5, 2, 'Y', '2015-01-11 22:44:32', NULL, NULL, NULL),
(33, 5, 5, 'Y', '2015-01-11 22:44:34', NULL, NULL, NULL),
(34, 5, 1, 'Y', '2015-01-11 22:44:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msrestprofiles`
--

CREATE TABLE IF NOT EXISTS `msrestprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iUsers` int(11) NOT NULL,
  `cHp` varchar(50) DEFAULT NULL,
  `cTelp` varchar(50) DEFAULT NULL,
  `iMinOrder` int(11) DEFAULT '0',
  `iCharge` int(11) DEFAULT '0',
  `iDeliveryTime` int(11) DEFAULT NULL,
  `cStatusOpen` varchar(2) DEFAULT NULL,
  `cStatusAntar` varchar(2) DEFAULT NULL,
  `cStatusTax` varchar(2) DEFAULT NULL,
  `cDescription` text,
  `cImage` text,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `msrestprofiles`
--

INSERT INTO `msrestprofiles` (`id`, `iUsers`, `cHp`, `cTelp`, `iMinOrder`, `iCharge`, `iDeliveryTime`, `cStatusOpen`, `cStatusAntar`, `cStatusTax`, `cDescription`, `cImage`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 5, '085266042042', '074123247', 60000, 0, 60, 'Y', 'N', 'N', 'asdas', 'thumb_warungtekko_876858606.jpg', '2013-11-13 20:27:14', 'system', '2015-01-23 14:46:51', NULL),
(2, 6, '0811208129', '0741.5912541', 0, 0, 15, 'Y', 'N', 'N', NULL, 'bebek-goreng.jpg', '2014-03-23 14:39:21', 'admin', '2014-03-23 14:39:24', 'admin'),
(3, 15, NULL, NULL, 0, 0, NULL, 'N', NULL, NULL, NULL, 'logo-sriwijaya.jpg', NULL, NULL, '2015-01-24 18:31:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msrewards`
--

CREATE TABLE IF NOT EXISTS `msrewards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cNama` varchar(100) DEFAULT NULL,
  `cVendor` varchar(100) DEFAULT NULL,
  `iPoin` int(11) DEFAULT NULL,
  `cImage` text,
  `cLargeImage` varchar(100) NOT NULL,
  `cJenis` varchar(50) DEFAULT NULL,
  `iValue` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `msrewards`
--

INSERT INTO `msrewards` (`id`, `cNama`, `cVendor`, `iPoin`, `cImage`, `cLargeImage`, `cJenis`, `iValue`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'Tiket 21 - Guardian of the Galaxy', 'Cineplex 21', 500, '9864254_orig.jpg', 'ticket_invite.jpg', NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(2, 'Voucher Pizza Hut - Rp. 20.000', 'Pizza Hut', 200, '9864254_orig.jpg', 'ticket_invite.jpg', 'Voucher', NULL, 'Y', '2014-09-09 19:20:32', NULL, NULL, NULL),
(3, 'Voucher Tiket Pesawat - Rp. 10.000', 'PT. Nata Buana', 50, '9864254_orig.jpg', 'ticket_invite.jpg', 'Voucher', NULL, 'Y', '2014-09-09 19:21:00', NULL, NULL, NULL),
(4, 'Voucher SaungSaji - Rp. 1.000', 'SaungSaji', 100, 'voucher_thumb-ss-1000.jpg', 'voucher-ss-1000.jpg', 'Voucher Online', 1000, 'Y', NULL, NULL, NULL, NULL),
(5, 'Voucher Paket Data 3 - 5GB', 'Polaris', 350, '9864254_orig.jpg	', 'ticket_invite.jpg', 'Voucher', NULL, 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mssystables`
--

CREATE TABLE IF NOT EXISTS `mssystables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cMasterCode` varchar(10) DEFAULT NULL,
  `cChildCode` varchar(20) DEFAULT NULL,
  `cValue` varchar(50) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mssystables`
--

INSERT INTO `mssystables` (`id`, `cMasterCode`, `cChildCode`, `cValue`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'Bank', 'BCA', '119.147.6251', 'Y', '2013-12-01 10:37:53', 'system', NULL, NULL),
(2, 'Bank', 'Mandiri', '880.90.10.11', 'Y', '2013-12-01 10:38:25', 'system', NULL, NULL),
(3, 'Delivery', 'Service', '10', 'Y', '2013-12-08 13:35:59', 'system', NULL, NULL),
(4, 'PointOrder', '1000', '1', 'Y', '2014-08-18 20:50:44', 'system', NULL, NULL),
(5, 'Open_SS', 'Opening Time', '09:00', 'Y', NULL, NULL, NULL, NULL),
(6, 'Close_SS', 'Closing Time', '21:00', 'Y', NULL, NULL, NULL, NULL),
(7, 'Minimal', 'Order', '25000', 'Y', NULL, NULL, NULL, NULL),
(8, 'Delivery', 'Time', '60', 'Y', NULL, NULL, NULL, NULL),
(9, 'Delivery', 'Max', '15000', 'Y', NULL, NULL, NULL, NULL),
(10, 'Email', 'Forward', 'hendi0509@gmail.com', 'Y', NULL, NULL, NULL, NULL),
(11, 'Email', 'Forward', 'rewissinaga@yahoo.com', 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msusers`
--

CREATE TABLE IF NOT EXISTS `msusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cNama` varchar(100) DEFAULT NULL,
  `cEmail` varchar(100) DEFAULT NULL,
  `cEmailNew` varchar(100) DEFAULT NULL,
  `cActivateCode` varchar(100) DEFAULT NULL,
  `cPassword` varchar(50) DEFAULT NULL,
  `iGroupAccess` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `msusers`
--

INSERT INTO `msusers` (`id`, `cNama`, `cEmail`, `cEmailNew`, `cActivateCode`, `cPassword`, `iGroupAccess`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'Hendi', 'internisti1908@yahoo.com', 'kalvin@gmail.com', '2d65ad1f397921e6c0f220b19bac4dbf', 'e3ee24baff1468a3f0d04453288c9cf0', 1, 'Y', '2013-11-07 20:48:26', NULL, '2015-01-15 17:32:28', NULL),
(2, 'Hendi Chen', 'hendi@satukomu.com', NULL, NULL, 'bfc505fa2cec1e477d320cc04081e12c', 1, 'Y', '2013-11-07 21:14:34', NULL, NULL, NULL),
(3, 'Hendi C.', 'hendi0509@gmail.com', NULL, NULL, '6d0ac39e609c6b2784fad64c894e423d', 1, 'Y', '2013-11-11 19:17:58', NULL, NULL, NULL),
(4, 'Silviana', 'silviana.jonathan@gmail.com', NULL, NULL, '6950a44cf9f45a3239f93b3c364392e1', 1, 'Y', '2013-11-11 19:24:48', NULL, NULL, NULL),
(5, 'Warung Tekko', 'xx@gmail.com', 'xx@gmail.com', '0e9448a1a6732441937b0ff87a4a0b10', 'ad02d83affa356de88f78629b818d186', 2, 'Y', '2013-11-13 20:28:15', 'system', '2015-01-30 03:06:03', NULL),
(6, 'Bebek Goreng H. Slamet', 'andri.syahriza@gmail.com', NULL, NULL, 'e3ee24baff1468a3f0d04453288c9cf0', 2, 'Y', '2013-11-26 21:36:49', NULL, NULL, NULL),
(8, 'Hendi Chen', 'hendi.chen.1983@gmail.com', NULL, NULL, '71f0162b94578c130f81675bbde1c194', 1, 'Y', '2014-05-15 11:24:09', NULL, NULL, NULL),
(9, 'Hendi', 'hendi.chen@gmail.com', NULL, NULL, '750e2380e8ca91ca349ceb6d43f90b07', 1, 'Y', '2014-10-11 17:23:18', NULL, NULL, NULL),
(10, 'Santi', 'shan.sue.85@gmail.com', NULL, NULL, 'ecb0c07a4bd98a41256045bdf436f4d8', 1, 'Y', '2014-12-27 20:38:25', NULL, NULL, NULL),
(11, 'Kalvin Hardy 12', 'kalvin.hardy@gmail.com', 'kalvin.hardy@gmail.com', 'e0680d0c1a0e77cf44e5e8f97b662c08', 'e3ee24baff1468a3f0d04453288c9cf0', 1, 'Y', '2015-01-17 20:31:39', NULL, '2015-01-17 21:01:12', NULL),
(14, 'Hendi', 'admin@saungsaji.com', NULL, NULL, 'e3ee24baff1468a3f0d04453288c9cf0', 3, 'Y', NULL, NULL, NULL, NULL),
(15, 'Ayam Penyet Jakarta', 'ayam@penyet.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'Y', '2015-01-24 18:30:05', NULL, '2015-01-24 18:32:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msvendors`
--

CREATE TABLE IF NOT EXISTS `msvendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cVendor` varchar(50) DEFAULT NULL,
  `cEmail` varchar(100) DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `msvendors`
--

INSERT INTO `msvendors` (`id`, `cVendor`, `cEmail`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(1, 'Cineplex 21', NULL, NULL, NULL, NULL, NULL),
(2, 'Pizza Hut', NULL, NULL, NULL, NULL, NULL),
(3, 'Nata Buana', NULL, NULL, NULL, NULL, NULL),
(4, 'SaungSaji', NULL, NULL, NULL, NULL, NULL),
(5, 'Polaris', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msvouchers`
--

CREATE TABLE IF NOT EXISTS `msvouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cCode` varchar(10) DEFAULT NULL,
  `iNominal` int(11) DEFAULT NULL,
  `cJenisVoucher` varchar(10) DEFAULT NULL,
  `idRestoran` int(11) DEFAULT NULL,
  `dStartBerlaku` date DEFAULT NULL,
  `dEndBerlaku` date DEFAULT NULL,
  `cStatusUsed` varchar(2) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `msvouchers`
--

INSERT INTO `msvouchers` (`id`, `cCode`, `iNominal`, `cJenisVoucher`, `idRestoran`, `dStartBerlaku`, `dEndBerlaku`, `cStatusUsed`, `cStatus`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(1, 'ABC123D', 25000, 'Resto', 5, '2014-05-01', '2014-12-10', 'N', 'Y', 'system', '2014-02-21 15:59:50', '', '0000-00-00 00:00:00'),
(2, '123D456', 20000, 'Saung', NULL, '2014-08-01', '2014-08-05', 'N', 'Y', 'system', '2014-02-21 16:00:09', '', '0000-00-00 00:00:00'),
(5, 'B6ECBCC', 10000, 'Saung', NULL, '2014-09-15', '2014-10-15', 'N', 'Y', 'system', '2014-09-15 11:22:57', NULL, NULL),
(6, '9E44A61', 10000, 'Saung', NULL, '2014-09-15', '2014-12-15', 'Y', 'Y', 'system', '2014-09-15 11:26:35', NULL, NULL),
(10, '44F760E', 10000, 'Saung', 0, '2014-11-09', '2015-01-31', 'Y', 'Y', 'system', '2014-11-09 13:43:36', NULL, NULL),
(11, 'B4794CA', 10000, 'Resto', 5, '2015-01-22', '2015-02-21', 'N', 'Y', 'system', '2015-01-22 22:54:14', NULL, NULL),
(12, '8FB0A00', 10000, 'Saung', NULL, '2015-03-01', '2015-03-31', 'Y', 'Y', 'system', '2015-03-01 21:01:33', NULL, NULL),
(13, '856D61C', 1000, 'Saung', NULL, '2015-03-03', '2015-04-02', 'N', 'Y', 'system', '2015-03-03 21:10:27', NULL, NULL),
(23, '0E1C7D8', 1000, 'Saung', NULL, '2015-03-03', '2015-04-02', 'N', 'Y', 'system', '2015-03-03 21:22:25', NULL, NULL),
(22, 'FB01216', 1000, 'Saung', NULL, '2015-03-03', '2015-04-02', 'N', 'Y', 'system', '2015-03-03 21:22:25', NULL, NULL),
(21, '58CB2A7', 1000, 'Saung', NULL, '2015-03-03', '2015-04-02', 'N', 'Y', 'system', '2015-03-03 21:22:25', NULL, NULL),
(20, '45BEC3A', 1000, 'Saung', NULL, '2015-03-03', '2015-04-02', 'N', 'Y', 'system', '2015-03-03 21:22:25', NULL, NULL),
(19, 'B3A8DB', 1000, 'Saung', NULL, '2015-03-03', '2015-04-02', 'N', 'Y', 'system', '2015-03-03 21:22:25', NULL, NULL),
(24, '34674E2', 10000, 'Saung', NULL, '2015-03-07', '2015-04-06', 'N', 'Y', 'system', '2015-03-07 12:42:41', NULL, NULL),
(25, '4C2A773', 1000, 'Saung', NULL, '2015-03-07', '2015-04-06', 'N', 'Y', 'system', '2015-03-07 12:43:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mswilayahs`
--

CREATE TABLE IF NOT EXISTS `mswilayahs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cWilayah` varchar(50) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mswilayahs`
--

INSERT INTO `mswilayahs` (`id`, `cWilayah`, `cStatus`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(1, 'Talang Banjar', 'Y', 'system', '2014-04-02 19:24:13', NULL, NULL),
(2, 'Jelutung', 'Y', 'system', '2014-04-02 19:24:13', NULL, NULL),
(3, 'Thehok', 'Y', 'system', '2014-04-02 19:24:13', NULL, NULL),
(4, 'Selincah', 'Y', 'system', '2014-04-02 19:24:13', NULL, NULL),
(5, 'Pasar Jambi', 'Y', 'system', '2014-04-02 19:24:13', NULL, NULL),
(6, 'Simp. Kawat', 'Y', 'system', '2014-04-02 19:24:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paginate`
--

CREATE TABLE IF NOT EXISTS `paginate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `paginate`
--

INSERT INTO `paginate` (`id`, `name`, `message`) VALUES
(1, 'Addison', 'Suspendisse id felis mi. Quisque blandit mattis nisl eu volutpat. Duis viverra lacus quis arcu mattis ac varius ligula convallis. Maecenas magna enim, molestie ac ultrices sed, convallis vel dolor. Vestibulum sed hendrerit massa. Integer consequat odio vitae est rutrum et egestas nibh sodales. Sed adipiscing nisl vel massa bibendum molestie.'),
(2, 'Aditya', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus. Nulla eget tempor dolor. Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor. Ut nec dui vitae nisl suscipit volutpat vel eu sapien. Donec suscipit massa ut sapien faucibus pellentesque. Proin eu sapien diam. Nulla facilisi. Etiam adipiscing molestie sapien, sit amet viverra metus hendrerit ut. Vestibulum non laoreet arcu.'),
(3, 'Derrick', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(4, 'Jefferson', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(5, 'Deonte', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(6, 'Aden', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(7, 'Joey', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(8, 'Paul', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(9, 'Alex', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(10, 'Devante', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(11, 'Derrick', 'Duis et gravida lacus. Ut scelerisque ante eu mi tristique dignissim. Maecenas nec augue non dolor tempor viverra eget non felis. Nam posuere laoreet tellus, at commodo massa auctor quis. Maecenas tempus volutpat posuere. Donec in adipiscing libero. Proin viverra, mi blandit scelerisque fringilla, turpis nunc ultrices turpis, vitae malesuada turpis orci non felis. Suspendisse interdum consectetur sem et accumsan. Proin eleifend laoreet ligula, a placerat lorem volutpat ut. Duis sagittis dapibus tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fa'),
(12, 'Jefferson', 'Etiam ac augue elementum enim ornare molestie. Vestibulum et hendrerit massa. Donec sit amet turpis elit, non pretium risus. Vivamus varius eros sagittis augue posuere pellentesque. Curabitur eu nunc vel erat ultricies eleifend et nec tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(13, 'Deonte', 'Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. Sed suscipit nibh eget tellus tempus gravida sed quis nibh. In euismod porta vehicula. Nulla aliquet, tortor eu tempus aliquet, massa enim placerat enim, et ornare libero ante sed orci. Aenean cursus nulla et lorem bibendum iaculis. Nam lobortis scelerisque vulputate. Sed in leo lorem, eu pharetra lectus. Nunc quis leo dui. Fusce nisi est, hendrerit interdum consequat mollis, vulputate quis est.Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(14, 'Aden', 'enean ut enim ligula, quis rhoncus tellus. Nullam quam tortor, mattis eu cursus nec, placerat a leo. Pellentesque lacinia eros quis justo varius aliquet. Sed quis lacus nec dolor sollicitudin porttitor. Suspendisse elementum, mi ut accumsan eleifend, leo mi auctor tellus, in tristique magna libero at augue. Donec in tellus metus. Curabitur eget metus lorem, at bibendum nisl.Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(15, 'Joey', 'Morbi non nisl sed lorem vehicula lobortis ut vel diam. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra auctor velit, et faucibus ipsum volutpat a. Curabitur est sem, tempus a imperdiet et, convallis id erat. Proin ac nunc nulla. Praesent ac justo eget urna pretium molestie id a lacus. Curabitur a tortor urna,  Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(16, 'Oliver', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(17, 'Archibald', 'Sed non sapien lacus, non consectetur diam. Vestibulum erat neque, dapibus quis consectetur ut, aliquam et magna. Sed sodales iaculis justo et molestie. Etiam quis odio elementum elit convallis dignissim. Donec semper hendrerit nunc sed luctus. Suspendisse potenti. In placerat urna nulla. Suspendisse potenti. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(18, 'Derrick', 'Duis et gravida lacus. Ut scelerisque ante eu mi tristique dignissim. Maecenas nec augue non dolor tempor viverra eget non felis. Nam posuere laoreet tellus, at commodo massa auctor quis. Maecenas tempus volutpat posuere. Donec in adipiscing libero. Proin viverra, mi blandit scelerisque fringilla, turpis nunc ultrices turpis, vitae malesuada turpis orci non felis. Suspendisse interdum consectetur sem et accumsan. Proin eleifend laoreet ligula, a placerat lorem volutpat ut. Duis sagittis dapibus tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fa'),
(19, 'Jefferson', 'Etiam ac augue elementum enim ornare molestie. Vestibulum et hendrerit massa. Donec sit amet turpis elit, non pretium risus. Vivamus varius eros sagittis augue posuere pellentesque. Curabitur eu nunc vel erat ultricies eleifend et nec tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(20, 'Deonte', 'Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. Sed suscipit nibh eget tellus tempus gravida sed quis nibh. In euismod porta vehicula. Nulla aliquet, tortor eu tempus aliquet, massa enim placerat enim, et ornare libero ante sed orci. Aenean cursus nulla et lorem bibendum iaculis. Nam lobortis scelerisque vulputate. Sed in leo lorem, eu pharetra lectus. Nunc quis leo dui. Fusce nisi est, hendrerit interdum consequat mollis, vulputate quis est.Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(21, 'Aden', 'enean ut enim ligula, quis rhoncus tellus. Nullam quam tortor, mattis eu cursus nec, placerat a leo. Pellentesque lacinia eros quis justo varius aliquet. Sed quis lacus nec dolor sollicitudin porttitor. Suspendisse elementum, mi ut accumsan eleifend, leo mi auctor tellus, in tristique magna libero at augue. Donec in tellus metus. Curabitur eget metus lorem, at bibendum nisl.Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(22, 'Joey', 'Morbi non nisl sed lorem vehicula lobortis ut vel diam. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra auctor velit, et faucibus ipsum volutpat a. Curabitur est sem, tempus a imperdiet et, convallis id erat. Proin ac nunc nulla. Praesent ac justo eget urna pretium molestie id a lacus. Curabitur a tortor urna,  Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(23, 'Oliver', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(24, 'Archibald', 'Sed non sapien lacus, non consectetur diam. Vestibulum erat neque, dapibus quis consectetur ut, aliquam et magna. Sed sodales iaculis justo et molestie. Etiam quis odio elementum elit convallis dignissim. Donec semper hendrerit nunc sed luctus. Suspendisse potenti. In placerat urna nulla. Suspendisse potenti. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(25, 'Chinmay', 'Nunc eget velit tortor, quis tincidunt nibh. Vestibulum eget est elit, a accumsan nunc. Aenean ac tortor justo, at pulvinar quam. Proin in enim quis libero vehicula iaculis sit amet eu ante. Phasellus diam justo, elementum eu rutrum sit amet, molestie vitae magna. Aliquam erat volutpat. Fusce scelerisque libero sit amet erat facilisis pretium.'),
(26, 'Addison', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In faucibus ligula interdum felis porta in ultrices purus auctor. Curabitur consectetur lacinia metus. Vivamus ultrices, lectus ac pharetra laoreet, tellus quam placerat erat, posuere laoreet diam elit at neque. Aliquam semper scelerisque mollis. Phasellus tempus laoreet molestie.'),
(27, 'Aditya', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed tortor sed turpis lobortis vestibulum blandit sit amet arcu. Curabitur tempus pretium faucibus. Phasellus in urna non velit cursus semper eu et dolor. Suspendisse nulla libero, ultricies id lacinia sit amet, sagittis sed neque. Donec volutpat congue velit vel ullamcorper. Quisque quis est leo, in semper nunc. Phasellus gravida placerat risus, nec commodo lectus adipiscing nec.'),
(28, 'Derrick', 'Etiam eu tortor eu nibh aliquet feugiat. Integer at dolor nec libero elementum faucibus quis ut ante. Fusce ut orci erat. Nulla facilisi. Aenean est justo, dignissim eu congue sed, tempor egestas orci. Suspendisse porttitor ligula tempus sapien facilisis vel tempus mi fringilla. Donec varius, dui ac semper fermentum, nunc risus interdum nisi, at ultricies dolor purus vel massa.'),
(29, 'Jefferson', 'Pellentesque facilisis mattis semper. Donec aliquam, quam non hendrerit pellentesque, urna quam placerat nunc, quis molestie leo risus nec ipsum. Vestibulum ut ligula malesuada justo adipiscing molestie nec in eros. Sed id sapien quis sapien rhoncus sollicitudin. Sed est metus, vehicula ut dictum at, semper eu lacus. Curabitur congue, ante vel commodo laoreet, enim purus venenatis velit, in tincidunt odio ante vitae sem. Sed ut massa et '),
(30, 'Deonte', 'purus blandit euismod eu sit amet lorem. Pellentesque tempor, erat quis vehicula vulputate, magna ante elementum tortor, ac feugiat lacus metus vitae ante. Vivamus tellus lorem, porta nec vestibulum ut, mollis sed augue. Sed sed condimentum leo. Curabitur tempor est scelerisque risus pulvinar varius. Mauris eros dui, dignissim at cursus sed, bibendum at elit. Donec gravida ornare sapien vel tempus.'),
(31, 'Aden', 'Etiam vulputate nisi in eros consequat non elementum justo consectetur. Etiam quis laoreet ante. Nulla eget nibh arcu. In gravida enim sit amet leo pretium commodo id at eros. Praesent vitae erat neque. Aenean non quam mauris. Etiam ut eros dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(32, 'Joey', 'Etiam imperdiet tortor in ipsum posuere eget pharetra velit dapibus. Nullam imperdiet molestie ligula a vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec venenatis ipsum et mi consectetur faucibus. Praesent elementum, mi sit amet sodales tincidunt, mi ipsum cursus lorem, sed feugiat ligula arcu id nibh. '),
(33, 'Paul', 'Curabitur venenatis purus lectus. In sed lacus iaculis dolor dignissim gravida congue vitae massa. Phasellus nec tellus in lacus cursus ornare ut quis lectus. Phasellus elementum, mi vel scelerisque varius, neque elit hendrerit elit, eget eleifend elit ipsum in ligula. Morbi in nunc diam, in viverra lectus. Sed interdum est a diam placerat ut sodales neque mollis. '),
(34, 'Alex', 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In tortor arcu, blandit id elementum et, ultricies in velit. Sed gravida magna a lacus accumsan sollicitudin nec in sem. Nullam tempus felis faucibus odio fringilla dapibus. Ut nec elit eget augue imperdiet pharetra et id quam. Mauris eget mauris est. '),
(35, 'Devante', 'Mauris mauris lacus, ultricies quis consectetur id, dictum quis odio. Nunc turpis erat, ultrices et porta eu, adipiscing eget felis. Sed suscipit convallis egestas. Sed id tortor in diam euismod facilisis sed vel libero.'),
(36, 'Derrick', 'DLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam malesuada quam at enim luctus nec tincidunt odio tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc ornare, tellus sed dapibus fermentum, leo mi lobortis nisi, a scelerisque nulla sem vitae ante.'),
(37, 'Jefferson', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse mollis gravida erat, eget dapibus est cursus at. Sed pulvinar bibendum leo, eget gravida lorem vestibulum pharetra. In hac habitasse platea dictumst. Nam at neque metus.'),
(38, 'Deonte', 'Integer a erat sit amet leo rutrum dictum at in sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec vehicula justo. Mauris urna arcu, molestie a cursus at, fringilla non orci. Duis pellentesque porta massa, eu ultricies ipsum pharetra quis. Aliquam at nulla a nunc accumsan congue at et eros. Donec velit orci, tempor eget tempor id, aliquet in nisi.'),
(39, 'Aden', 'Phasellus fermentum elementum massa sit amet auctor. Suspendisse nec sapien felis. Ut rhoncus sapien a mauris porta interdum. In hac habitasse platea dictumst. Donec ac diam felis. Proin in dolor sem, ut luctus est. Aenean dictum libero sed tellus molestie eu porta elit porta. Proin mattis imperdiet aliquam.'),
(40, 'Joey', 'Duis placerat vulputate sapien ut vehicula. Pellentesque molestie ultricies orci, ac ornare nunc fermentum in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed mattis felis non nibh scelerisque vel luctus libero hendrerit. Nam sed nibh sapien. Donec at sapien quis massa luctus pharetra cursus id neque. '),
(41, 'Oliver', 'Suspendisse massa mauris, lobortis nec gravida non, lobortis ut risus. Nam ut libero et lorem hendrerit suscipit nec vitae neque. Aenean congue aliquet condimentum. Mauris massa odio, mattis at pellentesque at, fringilla ac sem. Vestibulum scelerisque dui ut eros ultrices non tristique nibh imperdiet. Ut faucibus luctus aliquet.'),
(42, 'Archibald', 'Sed ac blandit ligula. Morbi interdum tempus lectus, quis varius ligula facilisis et. Vivamus gravida diam ac enim mattis nec eleifend felis pulvinar. Aenean at velit felis, quis porttitor risus. Proin eros erat, consectetur varius dictum eu, ullamcorper ac tortor. '),
(43, 'Derrick', 'Etiam iaculis eros ut quam mattis cursus. Aliquam a nisi sem. Proin sapien mauris, porttitor id pretium ultricies, tincidunt at orci. Quisque adipiscing mi a leo aliquam eu cursus nisi vulputate. Aliquam id porttitor risus. Quisque in tempus est. Praesent eu arcu vitae lorem mollis vehicula facilisis sit amet nulla. Aenean nisl magna, consequat vitae fermentum sed, aliquam ac elit. Cras consectetur eleifend massa. Phasellus porta nibh at ligula sagittis ut ornare elit accumsan. '),
(44, 'Jefferson', 'Sed non nisl elit. Cras mollis ligula nec tortor pretium eu luctus dolor mollis. Aliquam erat volutpat. Cras malesuada, nulla sed vulputate accumsan, velit leo sagittis nulla, in commodo enim nisi at diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer dapibus egestas dolor'),
(45, 'Deonte', 'Sed lorem arcu, auctor vel egestas eu, ultricies vitae felis. Sed massa magna, placerat a blandit vel, suscipit quis urna. Sed malesuada dignissim eros, quis congue urna tempus sit amet. Morbi eu ligula ac leo tincidunt faucibus. Suspendisse vel lobortis diam. Quisque sodales pretium orci, et blandit lectus volutpat et. Curabitur non ipsum ligula, sit amet placerat nisi. Praesent eget tempus orci.'),
(46, 'Aden', 'Vivamus a augue sed neque varius lobortis vitae a mauris. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque lacinia odio libero, vel bibendum quam. Nunc mattis, orci id dignissim tempor, urna libero feugiat lorem, a dapibus nisi urna vitae libero. Nulla laoreet feugiat rhoncus. Sed tempus magna sed eros pellentesque in dictum erat vestibulum. Aliquam at magna nulla, quis varius ligula. '),
(47, 'Joey', 'Proin volutpat congue blandit. Etiam id risus turpis. Ut elit tortor, volutpat semper porttitor ut, adipiscing ut odio. Vivamus quis leo neque, sed pellentesque libero. Etiam sagittis placerat quam vel bibendum. Curabitur quis mollis felis.'),
(48, 'Oliver', 'Maecenas nec interdum nibh. Suspendisse facilisis semper tellus sed lacinia. Mauris tristique nulla non massa congue pretium. Donec vel sem a massa ultrices fermentum quis et neque. Pellentesque auctor auctor imperdiet. '),
(49, 'Archibald', 'Morbi elementum sem commodo massa ultrices convallis. Aenean condimentum iaculis leo at tristique. Nunc vel nisi at felis semper eleifend. Nam eleifend, sem ac vehicula pellentesque, massa elit ultrices dolor, sit amet interdum neque felis rutrum augue.'),
(50, 'Chinmay', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam metus mauris, vehicula sed ultricies vel, fermentum a purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec et justo et mauris tincidunt elementum at at dui. Phasellus vitae ipsum lorem, non interdum ante. Q');

-- --------------------------------------------------------

--
-- Table structure for table `trcontact`
--

CREATE TABLE IF NOT EXISTS `trcontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cNama` varchar(100) NOT NULL,
  `cEmail` varchar(100) NOT NULL,
  `cHp` varchar(20) NOT NULL,
  `cDescription` text NOT NULL,
  `dCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trcontact`
--

INSERT INTO `trcontact` (`id`, `cNama`, `cEmail`, `cHp`, `cDescription`, `dCreated`) VALUES
(1, 'Hendi', 'internisti1908@yahoo.com', '085266042042', 'Bagaimana menjadi restoran ?', '2015-01-13 20:02:42'),
(2, 'Hendi', 'internisti1908@yahoo.com', '085266042042', 'jhdsfnls', '2015-01-13 20:04:34'),
(3, 'Hendi', 'internisti1908@yahoo.com', '085266042042', 'kiskdf', '2015-01-13 20:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `trdeals`
--

CREATE TABLE IF NOT EXISTS `trdeals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iMenuId` int(11) DEFAULT NULL,
  `iHargaDeal` int(11) DEFAULT NULL,
  `cStatusCharge` varchar(2) DEFAULT NULL,
  `cDealBy` varchar(50) NOT NULL,
  `dStartBerlaku` date DEFAULT NULL,
  `dEndBerlaku` date DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trdeals`
--

INSERT INTO `trdeals` (`id`, `iMenuId`, `iHargaDeal`, `cStatusCharge`, `cDealBy`, `dStartBerlaku`, `dEndBerlaku`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(1, 1, 8000, 'Y', 'Resto', '2015-04-08', '2015-04-08', 'admin', '2015-04-06 21:12:15', NULL, NULL),
(2, 5, 10000, NULL, 'SaungSaji', '2015-04-12', '2015-04-18', 'admin', '2015-04-06 21:32:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trdiskons`
--

CREATE TABLE IF NOT EXISTS `trdiskons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iMenuId` int(11) DEFAULT NULL,
  `iDiskon` int(11) DEFAULT NULL,
  `dStartBerlaku` date DEFAULT NULL,
  `dEndBerlaku` date DEFAULT NULL,
  `cJenis` varchar(20) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `cCreated` varchar(50) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cLastUpdated` varchar(50) DEFAULT NULL,
  `dLastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trdiskons`
--

INSERT INTO `trdiskons` (`id`, `iMenuId`, `iDiskon`, `dStartBerlaku`, `dEndBerlaku`, `cJenis`, `cStatus`, `cCreated`, `dCreated`, `cLastUpdated`, `dLastUpdated`) VALUES
(1, 1, 50, '2014-05-01', '2015-12-31', 'Resto', 'Y', 'system', '2014-05-18 14:05:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tremail`
--

CREATE TABLE IF NOT EXISTS `tremail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cemail` varchar(100) DEFAULT NULL,
  `idorder` int(11) DEFAULT NULL,
  `ccreated` varchar(50) DEFAULT NULL,
  `dcreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tremail`
--

INSERT INTO `tremail` (`id`, `cemail`, `idorder`, `ccreated`, `dcreated`) VALUES
(1, 'silviana.jonathan@gmail.com', 67, 'system', '2014-09-16 19:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `trgetpoins`
--

CREATE TABLE IF NOT EXISTS `trgetpoins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `idEvent` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trgetpoins`
--


-- --------------------------------------------------------

--
-- Table structure for table `trorderdetails`
--

CREATE TABLE IF NOT EXISTS `trorderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOrders` int(11) DEFAULT NULL,
  `iRestoId` int(11) DEFAULT NULL,
  `iMenuId` int(11) DEFAULT NULL,
  `iJumlah` int(11) DEFAULT NULL,
  `iHarga` int(11) DEFAULT NULL,
  `iDiskon` int(11) DEFAULT NULL,
  `cDiskonBy` varchar(50) DEFAULT NULL,
  `iHargaDeal` int(11) DEFAULT NULL,
  `cDealBy` varchar(50) DEFAULT NULL,
  `cDesc` text,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `trorderdetails`
--

INSERT INTO `trorderdetails` (`id`, `idOrders`, `iRestoId`, `iMenuId`, `iJumlah`, `iHarga`, `iDiskon`, `cDiskonBy`, `iHargaDeal`, `cDealBy`, `cDesc`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(142, 120, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-26 09:24:54', NULL, NULL, NULL),
(141, 120, NULL, 1, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-26 09:24:54', NULL, NULL, NULL),
(143, 121, NULL, 1, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-27 09:10:58', NULL, NULL, NULL),
(144, 121, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-27 09:10:58', NULL, NULL, NULL),
(145, 121, NULL, 3, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-27 09:10:58', NULL, NULL, NULL),
(146, 122, NULL, 1, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-28 08:26:36', NULL, NULL, NULL),
(147, 122, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-28 08:26:36', NULL, NULL, NULL),
(148, 123, NULL, 1, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-28 08:29:16', NULL, NULL, NULL),
(149, 123, NULL, 3, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-28 08:29:16', NULL, NULL, NULL),
(150, 124, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-28 08:38:10', NULL, NULL, NULL),
(151, 125, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-28 08:52:56', NULL, NULL, NULL),
(152, 126, NULL, 6, 1, 30000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-29 05:45:55', NULL, NULL, NULL),
(153, 127, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-29 05:51:18', NULL, NULL, NULL),
(154, 127, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-29 05:51:18', NULL, NULL, NULL),
(155, 128, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-30 09:43:50', NULL, NULL, NULL),
(156, 129, NULL, 3, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-31 16:29:07', NULL, NULL, NULL),
(157, 130, NULL, 3, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-31 17:35:04', NULL, NULL, NULL),
(158, 131, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-31 19:08:15', NULL, NULL, NULL),
(159, 132, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-31 19:11:10', NULL, NULL, NULL),
(160, 133, NULL, 3, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-01-31 21:04:37', NULL, NULL, NULL),
(161, 134, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-01-31 21:06:46', NULL, NULL, NULL),
(162, 135, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 12:34:55', NULL, NULL, NULL),
(163, 136, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 13:06:01', NULL, NULL, NULL),
(164, 137, NULL, 2, 5, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 13:38:17', NULL, NULL, NULL),
(165, 138, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 14:06:11', NULL, NULL, NULL),
(166, 138, NULL, 3, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 14:06:11', NULL, NULL, NULL),
(167, 139, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 14:33:20', NULL, NULL, NULL),
(168, 139, NULL, 3, 2, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-01 14:33:20', NULL, NULL, NULL),
(169, 140, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-02-01 15:19:52', NULL, NULL, NULL),
(170, 141, NULL, 1, 1, 60000, 50, NULL, NULL, NULL, '', 'Y', '2015-02-23 19:28:37', NULL, NULL, NULL),
(171, 141, NULL, 2, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-02-23 19:28:37', NULL, NULL, NULL),
(173, 143, NULL, 1, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-01 21:26:56', NULL, NULL, NULL),
(174, 144, NULL, 1, 3, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-02 22:05:25', NULL, NULL, NULL),
(175, 145, NULL, 1, 3, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-02 22:12:21', NULL, NULL, NULL),
(176, 146, NULL, 1, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:51:49', NULL, NULL, NULL),
(177, 146, NULL, 4, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:51:49', NULL, NULL, NULL),
(178, 146, NULL, 5, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:51:49', NULL, NULL, NULL),
(179, 147, NULL, 4, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 22:17:15', NULL, NULL, NULL),
(180, 147, NULL, 5, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 22:17:15', NULL, NULL, NULL),
(181, 148, NULL, 1, 1, 50000, 50, NULL, NULL, NULL, '', 'Y', '2015-04-09 00:16:48', NULL, NULL, NULL),
(182, 149, NULL, 4, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-09 00:44:52', NULL, NULL, NULL),
(183, 150, NULL, 4, 2, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-14 20:45:51', NULL, NULL, NULL),
(184, 151, NULL, 2, 5, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-14 20:50:28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trorderdetails_tmp`
--

CREATE TABLE IF NOT EXISTS `trorderdetails_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cSession` varchar(50) DEFAULT NULL,
  `iMenuId` int(11) DEFAULT NULL,
  `iRestoId` int(11) DEFAULT NULL,
  `iJumlah` int(11) DEFAULT NULL,
  `iHarga` int(11) DEFAULT NULL,
  `iDiskon` int(11) DEFAULT NULL,
  `cDiskonBy` varchar(50) DEFAULT NULL,
  `iHargaDeal` int(11) DEFAULT NULL,
  `cDealBy` varchar(50) DEFAULT NULL,
  `cDesc` varchar(500) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=999 ;

--
-- Dumping data for table `trorderdetails_tmp`
--

INSERT INTO `trorderdetails_tmp` (`id`, `cSession`, `iMenuId`, `iRestoId`, `iJumlah`, `iHarga`, `iDiskon`, `cDiskonBy`, `iHargaDeal`, `cDealBy`, `cDesc`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(964, 'ea9beb4428de41ed4b9aaafe4f9035d0', 6, 5, 1, 30000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-04 10:19:25', NULL, NULL, NULL),
(955, 'c76cb4dece94b30b88157de66aa4439e', 2, 6, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:52:47', NULL, NULL, NULL),
(958, '20c5b5fe0217bab73cabd0489db3acbc', 4, 5, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:56:11', NULL, NULL, NULL),
(957, '20c5b5fe0217bab73cabd0489db3acbc', 2, 6, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:56:04', NULL, NULL, NULL),
(956, 'c76cb4dece94b30b88157de66aa4439e', 5, 5, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-24 21:52:55', NULL, NULL, NULL),
(947, '2b2b1003392c6ae81388f919173479ae', 1, 6, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-07 11:51:08', NULL, NULL, NULL),
(946, '2faca04f299cc1e0ac0a5c4eba9cfb51', 1, 6, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-06 06:20:05', NULL, NULL, NULL),
(945, '059afae5bef8239dc9780c4d7727df83', 1, 6, 1, 60000, 0, NULL, NULL, NULL, '', 'Y', '2015-03-04 08:09:24', NULL, NULL, NULL),
(963, 'ea9beb4428de41ed4b9aaafe4f9035d0', 6, 5, 1, 30000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-04 10:06:44', NULL, NULL, NULL),
(962, 'ea9beb4428de41ed4b9aaafe4f9035d0', 1, 6, 1, 50000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-04 10:02:33', NULL, NULL, NULL),
(996, '819a46faf1ca00cdec3dc6f2437adc17', 4, 5, 2, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-14 20:53:32', NULL, NULL, NULL),
(986, '5ca934928a53071d2231340460675bdd', 2, 5, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-09 00:28:35', NULL, NULL, NULL),
(988, 'a4361d55041c594fa2d8aecdbe301bed', 4, 5, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-11 12:02:39', NULL, NULL, NULL),
(989, '06e452197201bb8abe6f6826d03e6f7d', 5, 5, 1, 20000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-11 16:13:38', NULL, NULL, NULL),
(990, '6c341f4a5950e75885ee76c09c48fd85', 2, 5, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-12 19:59:17', NULL, NULL, NULL),
(995, '819a46faf1ca00cdec3dc6f2437adc17', 2, 5, 1, 5000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-14 20:53:26', NULL, NULL, NULL),
(984, '5ca934928a53071d2231340460675bdd', 4, 5, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-09 00:22:12', NULL, NULL, NULL),
(985, '5ca934928a53071d2231340460675bdd', 1, 5, 1, 50000, 50, NULL, NULL, NULL, '', 'Y', '2015-04-09 00:26:53', NULL, NULL, NULL),
(997, '819a46faf1ca00cdec3dc6f2437adc17', 4, 5, 1, 25000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-14 21:06:06', NULL, NULL, NULL),
(998, 'b647e02a668f7d7a7438e4cfdb535052', 6, 5, 1, 30000, 0, NULL, NULL, NULL, '', 'Y', '2015-04-14 21:34:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trorders`
--

CREATE TABLE IF NOT EXISTS `trorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cSession` varchar(100) DEFAULT NULL,
  `idOneStop` int(11) DEFAULT '0',
  `idCust` int(11) DEFAULT '0',
  `idRestoran` int(11) DEFAULT NULL,
  `dTglOrder` date DEFAULT NULL,
  `iTax` int(11) DEFAULT '0',
  `cAntarBy` varchar(50) DEFAULT NULL,
  `iBiayaAntar` int(11) DEFAULT '0',
  `cJenisTerimaMakanan` varchar(50) DEFAULT NULL,
  `dJamTerima` datetime DEFAULT NULL,
  `cJam` time DEFAULT NULL,
  `iPaymentId` int(11) DEFAULT NULL,
  `cVoucherCode` varchar(50) DEFAULT NULL,
  `iJenisLokasiAntar` int(11) DEFAULT NULL,
  `cAlamatAntar` text,
  `cDesc` text,
  `iStatusAntar` int(11) DEFAULT NULL,
  `cStatusTarik` varchar(2) NOT NULL,
  `dTglTarik` date DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `trorders`
--

INSERT INTO `trorders` (`id`, `cSession`, `idOneStop`, `idCust`, `idRestoran`, `dTglOrder`, `iTax`, `cAntarBy`, `iBiayaAntar`, `cJenisTerimaMakanan`, `dJamTerima`, `cJam`, `iPaymentId`, `cVoucherCode`, `iJenisLokasiAntar`, `cAlamatAntar`, `cDesc`, `iStatusAntar`, `cStatusTarik`, `dTglTarik`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(121, 'fde3a13bfcb400dea25d932d2394c898', 35, 0, 5, '2015-01-27', 8500, 'SaungSaji', 8500, '1', '2015-01-27 17:30:00', NULL, 1, '', NULL, NULL, '123', 1, '3', NULL, 'Y', '2015-01-27 09:10:58', NULL, NULL, NULL),
(120, '76388e95a7ec6b8e302462691b4cf125', 0, 1, 5, '2015-01-26', 6500, 'SaungSaji', 6500, '1', '2015-01-26 20:00:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-01-26 09:24:54', NULL, NULL, NULL),
(122, 'ebacc5e0ad578c5cf69c905739f0f5d9', 0, 1, 5, '2015-01-28', 6500, 'SaungSaji', 6500, '1', '2015-01-28 17:00:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-01-28 08:26:36', NULL, NULL, NULL),
(123, 'ebacc5e0ad578c5cf69c905739f0f5d9', 0, 1, 5, '2015-01-28', 8000, 'SaungSaji', 8000, '1', '2015-01-28 18:00:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-01-28 08:29:16', NULL, NULL, NULL),
(124, 'ebacc5e0ad578c5cf69c905739f0f5d9', 0, 1, 5, '2015-01-28', 3000, 'SaungSaji', 3000, '1', '2015-01-28 17:00:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-01-28 08:38:10', NULL, NULL, NULL),
(125, '22bee5e711520dca22e213ba6599f107', 0, 1, 5, '2015-01-28', 3000, 'SaungSaji', 3000, '1', '2015-01-28 16:30:00', NULL, 1, '44F760E', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-01-28 08:52:56', NULL, NULL, NULL),
(126, '6c3a6b49f9badd28d8529e562395c891', 0, 1, 6, '2015-01-29', 0, 'SaungSaji', 3000, '1', '2015-01-29 14:30:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-01-29 05:45:55', NULL, NULL, NULL),
(127, '6c3a6b49f9badd28d8529e562395c891', 0, 1, 5, '2015-01-29', 3500, 'SaungSaji', 3500, '1', '2015-01-29 18:30:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-01-29 05:51:18', NULL, NULL, NULL),
(128, '1895fe13cd1a3529bbc6dfb28a1bb9c1', 0, 1, 5, '2015-01-30', 0, 'SaungSaji', 3000, '1', '2015-01-30 18:30:00', NULL, 1, '', 2, 'Jl. Akabari No 96 A - Simp. Kawat', '', 1, '3', NULL, 'Y', '2015-01-30 09:43:50', NULL, NULL, NULL),
(129, 'fdd34acd4ebd111cb6de11ba799b1e57', 0, 1, 5, '2015-01-31', 0, 'SaungSaji', 2000, '1', '2015-01-31 17:45:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-01-31 16:29:07', NULL, NULL, NULL),
(130, '130b661a1be76c268d26a7f40f3b5745', 36, 0, 5, '2015-01-31', 0, 'SaungSaji', 2000, '1', '2015-01-31 18:30:00', NULL, 1, '', NULL, NULL, '', 1, '3', NULL, 'Y', '2015-01-31 17:35:04', NULL, NULL, NULL),
(131, '185c80ba8c24ce171ace5f4e9bfa646f', 37, 0, 5, '2015-01-31', 0, 'SaungSaji', 3000, '1', '2015-01-31 20:30:00', NULL, 1, '', NULL, NULL, 'testing saja', 1, '3', NULL, 'Y', '2015-01-31 19:08:15', NULL, NULL, NULL),
(132, '185c80ba8c24ce171ace5f4e9bfa646f', 38, 0, 5, '2015-01-31', 0, 'SaungSaji', 3000, '1', '2015-01-31 20:30:00', NULL, 1, '', NULL, NULL, '', 1, '3', NULL, 'Y', '2015-01-31 19:11:10', NULL, NULL, NULL),
(133, '6c361586b69ed2cd078e38b56201931b', NULL, 0, 5, '2015-01-31', 0, 'SaungSaji', 2000, '1', '2015-02-01 14:00:00', NULL, 1, '', NULL, NULL, '0', 1, '3', NULL, 'Y', '2015-01-31 21:04:37', NULL, NULL, NULL),
(134, '6c361586b69ed2cd078e38b56201931b', 40, 0, 5, '2015-01-31', 0, 'SaungSaji', 3000, '1', '2015-02-01 12:30:00', NULL, 1, '', NULL, NULL, '0', 1, '3', NULL, 'Y', '2015-01-31 21:06:46', NULL, NULL, NULL),
(135, '310aaee251afe9cf2bfde0e6c919c375', 41, 0, 5, '2015-02-01', 0, 'SaungSaji', 500, '1', '2015-02-01 14:00:00', NULL, 1, '', NULL, NULL, 'Tidak pakai lama', 1, '3', NULL, 'Y', '2015-02-01 12:34:55', NULL, NULL, NULL),
(136, '310aaee251afe9cf2bfde0e6c919c375', 0, 1, 5, '2015-02-01', 0, 'SaungSaji', 500, '1', '2015-02-01 16:45:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-02-01 13:06:01', NULL, NULL, NULL),
(137, 'c5e98dee0361a855108e6df41433f9bb', 42, 0, 5, '2015-02-01', 0, 'SaungSaji', 2500, '1', '2015-02-01 15:45:00', NULL, 1, '', NULL, NULL, '', 1, '3', NULL, 'Y', '2015-02-01 13:38:17', NULL, NULL, NULL),
(138, 'd247d91c1a700397199aa893c45d88bd', 45, 0, 5, '2015-02-01', 0, 'SaungSaji', 2500, '1', '2015-02-01 15:15:00', NULL, 1, '', NULL, NULL, '', 3, '3', NULL, 'Y', '2015-02-01 14:06:11', NULL, '2015-03-07 12:15:38', 'admin@saungsaji.com'),
(139, 'c6e49280fbc131d60282b3a2a9513717', 49, 0, 5, '2015-02-01', 0, 'SaungSaji', 4500, '1', '2015-02-01 15:45:00', NULL, 1, '', NULL, NULL, '', 2, '3', NULL, 'Y', '2015-02-01 14:33:20', NULL, '2015-03-07 12:15:32', 'admin@saungsaji.com'),
(140, '724ebcbe25a7b3b546a962d6031807b5', 0, 1, 5, '2015-02-01', 0, 'SaungSaji', 3000, '1', '2015-02-01 17:30:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-02-01 15:19:51', NULL, '2015-03-07 12:15:23', 'admin@saungsaji.com'),
(141, 'a49438edd522422056ac009f9ac6751a', 0, 1, 5, '2015-02-23', 0, 'SaungSaji', 3500, '1', '2015-02-23 20:45:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-02-23 19:28:37', NULL, '2015-03-07 12:15:05', 'admin@saungsaji.com'),
(143, '504dd86613562e0441465a52957d367c', 0, 1, 5, '2015-03-01', 0, 'SaungSaji', 6000, '1', '2015-03-02 15:30:00', NULL, 1, '8FB0A00', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-03-01 21:26:56', NULL, '2015-03-07 12:14:05', 'admin@saungsaji.com'),
(144, '18f83ee83ade8d8f09f8aac5496d4b04', 0, 1, 5, '2015-03-02', 0, 'SaungSaji', 15000, '1', '2015-03-03 13:00:00', NULL, 1, '', 1, ' - ', '', 2, '3', NULL, 'Y', '2015-03-02 22:05:25', NULL, NULL, NULL),
(145, '68a1dd28ffed02305891aac1bbbcc602', 56, 0, 5, '2015-03-02', 0, 'SaungSaji', 15000, '1', '2015-03-03 12:30:00', NULL, 1, '', NULL, NULL, '', 2, '3', NULL, 'Y', '2015-03-02 22:12:21', NULL, NULL, NULL),
(146, 'c76cb4dece94b30b88157de66aa4439e', 0, 1, NULL, '2015-03-24', 0, 'SaungSaji', 10500, '1', '2015-03-25 14:00:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-03-24 21:51:49', NULL, NULL, NULL),
(147, '095e57008ad167bbd2fa2d08b7e45616', 0, 1, 5, '2015-03-24', 0, 'SaungSaji', 4500, '1', '2015-03-25 13:00:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-03-24 22:17:15', NULL, NULL, NULL),
(148, '678d0ed6e26a7e8c623b99e6648da01b', 0, 1, 5, '2015-04-09', 0, 'SaungSaji', 2500, '2', '2015-04-09 00:03:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-04-09 00:16:48', NULL, NULL, NULL),
(149, '28f2460c3f92472c4a5b12ae9a4dd40a', 0, 1, 5, '2015-04-09', 0, 'SaungSaji', 2500, '2', '2015-04-09 00:42:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-04-09 00:44:52', NULL, NULL, NULL),
(150, '6e4508580589e9919c839ec4ef4f72bd', 0, 1, 5, '2015-04-14', 0, 'SaungSaji', 5000, '2', '2015-04-14 20:45:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-04-14 20:45:51', NULL, NULL, NULL),
(151, '6e4508580589e9919c839ec4ef4f72bd', 0, 1, 5, '2015-04-14', 0, 'SaungSaji', 2500, '2', '2015-04-14 20:46:00', NULL, 1, '', 1, ' - ', '', 1, '3', NULL, 'Y', '2015-04-14 20:50:28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trorders_tmp`
--

CREATE TABLE IF NOT EXISTS `trorders_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `idRestoran` int(11) DEFAULT NULL,
  `dTglOrder` date DEFAULT NULL,
  `iTax` int(11) DEFAULT NULL,
  `cAntarBy` varchar(50) DEFAULT NULL,
  `iBiayaAntar` int(11) DEFAULT NULL,
  `cJenisTerimaMakanan` varchar(50) DEFAULT NULL,
  `dJamTerima` datetime DEFAULT NULL,
  `iPaymentId` int(11) DEFAULT NULL,
  `cVoucherCode` varchar(50) DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cSession` varchar(50) DEFAULT NULL,
  `cDesc` text,
  `iJenisLokasiAntar` int(11) DEFAULT NULL,
  `cAlamatAntar` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

--
-- Dumping data for table `trorders_tmp`
--

INSERT INTO `trorders_tmp` (`id`, `idCust`, `idRestoran`, `dTglOrder`, `iTax`, `cAntarBy`, `iBiayaAntar`, `cJenisTerimaMakanan`, `dJamTerima`, `iPaymentId`, `cVoucherCode`, `cCreated`, `dCreated`, `cUpdated`, `dUpdated`, `cSession`, `cDesc`, `iJenisLokasiAntar`, `cAlamatAntar`) VALUES
(250, 1, NULL, '2015-03-24', 0, 'SaungSaji', 2500, '1', '2015-03-25 12:00:00', 1, '', NULL, NULL, NULL, NULL, 'c76cb4dece94b30b88157de66aa4439e', NULL, NULL, NULL),
(251, 1, NULL, '2015-03-24', 0, 'SaungSaji', 3000, '1', '2015-03-25 11:30:00', 1, '', NULL, NULL, NULL, NULL, '20c5b5fe0217bab73cabd0489db3acbc', NULL, NULL, NULL),
(258, 0, 5, '2015-04-14', 0, 'SaungSaji', 5500, '2', '2015-04-14 20:53:00', 1, '', NULL, NULL, NULL, NULL, '819a46faf1ca00cdec3dc6f2437adc17', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trredeempoints`
--

CREATE TABLE IF NOT EXISTS `trredeempoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `idReward` int(11) DEFAULT NULL,
  `cCode` varchar(50) DEFAULT NULL,
  `iJumlah` int(11) DEFAULT NULL,
  `dStartBerlaku` date DEFAULT NULL,
  `dEndBerlaku` date DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `cStatusUsed` varchar(2) DEFAULT NULL,
  `dTglRedeem` date DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `trredeempoints`
--

INSERT INTO `trredeempoints` (`id`, `idCust`, `idReward`, `cCode`, `iJumlah`, `dStartBerlaku`, `dEndBerlaku`, `cStatus`, `cStatusUsed`, `dTglRedeem`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(34, 1, 4, '8FB0A00', 1, '2015-03-01', '2015-03-31', 'Y', NULL, '2015-03-01', '2015-03-01 21:01:33', NULL, NULL, NULL),
(35, 1, 4, '34674E2', 1, '2015-03-07', '2015-04-06', 'Y', NULL, '2015-03-07', '2015-03-07 12:42:42', NULL, NULL, NULL),
(36, 1, 4, '4C2A773', 1, '2015-03-07', '2015-04-06', 'Y', NULL, '2015-03-07', '2015-03-07 12:43:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trtopups`
--

CREATE TABLE IF NOT EXISTS `trtopups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `cRekCompany` varchar(50) DEFAULT NULL,
  `dTglTransfer` date DEFAULT NULL,
  `cBankUser` varchar(100) DEFAULT NULL,
  `cRekeningUser` varchar(100) DEFAULT NULL,
  `cNamaUser` varchar(100) DEFAULT NULL,
  `iJumlah` int(11) DEFAULT NULL,
  `cStatusVerified` varchar(2) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `trtopups`
--

INSERT INTO `trtopups` (`id`, `idCust`, `cRekCompany`, `dTglTransfer`, `cBankUser`, `cRekeningUser`, `cNamaUser`, `iJumlah`, `cStatusVerified`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(6, 1, 'BCA-119.147.6251', '2014-10-11', 'BCA', '119.147.6251', 'Hendi', 100000, 'Y', 'Y', '2014-10-11 16:36:24', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
