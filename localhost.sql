-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 04:27 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(114, 1385470791, '127.0.0.1', 'JtF51ow7'),
(113, 1385470791, '127.0.0.1', 'EOwa6bH2'),
(130, 1385559744, '127.0.0.1', 'G3eiH56N'),
(129, 1385559739, '127.0.0.1', 'nwzdKSHA'),
(128, 1385559739, '127.0.0.1', 'O9FgCmHo'),
(127, 1385559735, '127.0.0.1', 'nMZgN8JR'),
(126, 1385559728, '127.0.0.1', '4Fc3a0vC'),
(125, 1385559637, '127.0.0.1', 'cwZwXhB4'),
(124, 1385559575, '127.0.0.1', '8kkIrxdy'),
(123, 1385559575, '127.0.0.1', 'by5Vxduk'),
(122, 1385559273, '127.0.0.1', '3BndPGvH'),
(121, 1385559273, '127.0.0.1', 'TzqKHLLq'),
(120, 1385476649, '127.0.0.1', 'd03yyNT9'),
(119, 1385476649, '127.0.0.1', 'Pxm1h9fj'),
(118, 1385476609, '127.0.0.1', 'Ec7sapDV'),
(115, 1385476523, '127.0.0.1', 'o5G7RoD4'),
(116, 1385476523, '127.0.0.1', '8ZxjElSz'),
(117, 1385476565, '127.0.0.1', 'v5RYyjvZ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `msalamats`
--

INSERT INTO `msalamats` (`id`, `idRestoran`, `cAlamat`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 'Jl. Jend. Sudirman No. 45', 'Y', '2013-11-15 20:18:28', 'system', NULL, NULL),
(2, 1, 'Jl. Dr. Sutomo 48-51', 'Y', '2013-11-15 20:18:48', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mscustprofiles`
--

CREATE TABLE IF NOT EXISTS `mscustprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iUsers` int(11) NOT NULL,
  `cAlamat` text,
  `cHp` varchar(50) DEFAULT NULL,
  `cTelp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mscustprofiles`
--

INSERT INTO `mscustprofiles` (`id`, `iUsers`, `cAlamat`, `cHp`, `cTelp`) VALUES
(1, 1, 'Jakarta selatan', '085266042042', '23247'),
(2, 2, 'Jakarta Selatan', '085266042042', '23247'),
(3, 3, 'Hendi Hendi', '085266042042', '23247'),
(4, 4, 'Jambi Timur', '085266042042', '23247'),
(5, 6, 'Keluarahan', '1234567890', '123456');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `msgroupaccesses`
--

INSERT INTO `msgroupaccesses` (`id`, `cGroupName`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'customer', 'Y', '2013-11-11 18:31:31', 'system', NULL, NULL),
(2, 'restaurant', 'Y', '2013-11-11 18:32:15', 'system', NULL, NULL),
(3, 'admin', 'Y', '2013-11-12 21:01:50', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mshargamenus`
--

CREATE TABLE IF NOT EXISTS `mshargamenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) DEFAULT NULL,
  `iHarga` int(11) DEFAULT NULL,
  `dStartBerlaku` datetime DEFAULT NULL,
  `dEndBerlaku` datetime DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mshargamenus`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(9, 2, 8, 'Y', '2013-11-12 21:07:32', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msmenurestos`
--

CREATE TABLE IF NOT EXISTS `msmenurestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `cNama` varchar(100) DEFAULT NULL,
  `iHarga` int(11) DEFAULT NULL,
  `cImageThumb` text,
  `cImageLarge` text,
  `cDesc` text,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `msmenurestos`
--

INSERT INTO `msmenurestos` (`id`, `idRestoran`, `cNama`, `iHarga`, `cImageThumb`, `cImageLarge`, `cDesc`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 'Sayur Asam', 54000, 'thumbfood.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:11:44', 'system', NULL, NULL),
(2, 1, 'Nasi Hainam', 25000, 'thumbfood.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:12:23', 'system', NULL, NULL),
(3, 1, 'Nasi Goreng', 15000, 'thumbfood.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:12:47', 'system', NULL, NULL),
(4, 1, 'Burger King', 10000, 'thumbfood.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:13:18', 'system', NULL, NULL),
(5, 1, 'Baso Malang', 12500, 'thumbfood.jpg', 'picfood.jpg', NULL, 'Y', '2013-11-13 20:13:48', 'system', NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `msmenus`
--

INSERT INTO `msmenus` (`id`, `cMenuItem`, `cLink`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'my Profile', 'home/myProfile', 'Y', '2013-11-12 20:55:44', 'system', NULL, NULL),
(2, 'my Order', 'home/myOrder', 'Y', '2013-11-12 20:56:26', 'system', NULL, NULL),
(3, 'my Wallet', 'home/myWallet', 'Y', '2013-11-12 20:57:05', 'system', NULL, NULL),
(4, 'my Point', 'home/myPoint', 'Y', '2013-11-12 20:57:24', 'system', NULL, NULL),
(5, 'my Profile', 'r/home/', 'Y', '2013-11-12 20:58:00', 'system', NULL, NULL),
(6, 'my Menu', 'r/home/myMenu', 'Y', '2013-11-12 20:58:50', 'system', NULL, NULL),
(7, 'my Report', 'r/home/myReport', 'Y', '2013-11-12 20:59:27', 'system', NULL, NULL),
(8, 'logout', 'home/logout', 'Y', '2013-11-12 20:59:51', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msopenings`
--

CREATE TABLE IF NOT EXISTS `msopenings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `cHari` varchar(20) DEFAULT NULL,
  `cHour` varchar(50) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `msopenings`
--

INSERT INTO `msopenings` (`id`, `idRestoran`, `cHari`, `cHour`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 'Senin', '09.00 - 21.00', 'Y', '2013-11-15 20:08:17', 'system', NULL, NULL),
(2, 1, 'Selasa', '09.00 - 21.00', 'Y', '2013-11-15 20:09:49', 'system', NULL, NULL),
(3, 1, 'Rabu', '09.00 - 21.00', 'Y', '2013-11-15 20:10:03', 'system', NULL, NULL),
(4, 1, 'Kamis', '09.00 - 21.00', 'Y', '2013-11-15 20:10:28', 'system', NULL, NULL),
(5, 1, 'Jumat', '09.00 - 21.00', 'Y', '2013-11-15 20:10:41', 'system', NULL, NULL),
(6, 1, 'Sabtu', '09.00 - 21.00', 'Y', '2013-11-15 20:11:01', 'system', NULL, NULL),
(7, 1, 'Minggu', '09.00 - 21.00', 'Y', '2013-11-15 20:11:36', 'system', NULL, NULL);

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
(1, 'Cash On Delivery', 'Y', '2013-12-07 14:03:18', 'system', NULL, NULL),
(2, 'My Wallet', 'Y', '2013-12-07 14:03:32', NULL, NULL, NULL),
(3, 'Voucher', 'Y', '2013-12-07 14:42:43', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mspengantarans`
--

CREATE TABLE IF NOT EXISTS `mspengantarans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestoran` int(11) DEFAULT NULL,
  `cWilayah` varchar(100) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mspengantarans`
--

INSERT INTO `mspengantarans` (`id`, `idRestoran`, `cWilayah`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 'Talang Banjar', 'Y', '2013-11-15 20:19:32', 'system', NULL, NULL),
(2, 1, 'Thehok', 'Y', '2013-11-15 20:19:50', 'system', NULL, NULL),
(3, 1, 'Jelutung', 'Y', '2013-11-17 20:18:03', 'system', NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msrestprofiles`
--

INSERT INTO `msrestprofiles` (`id`, `iUsers`, `cHp`, `cTelp`, `iMinOrder`, `iCharge`, `cStatusOpen`, `cStatusAntar`, `cStatusTax`, `cDescription`, `cImage`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 5, '085266042042', '074123247', 50000, 5000, 'Y', 'Y', 'Y', NULL, 'warungtekko.jpg', '2013-11-13 20:27:14', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msrewards`
--

CREATE TABLE IF NOT EXISTS `msrewards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cNama` varchar(100) DEFAULT NULL,
  `iPoin` int(11) DEFAULT NULL,
  `cImage` text,
  `cCode` varchar(10) DEFAULT NULL,
  `iValue` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `msrewards`
--


-- --------------------------------------------------------

--
-- Table structure for table `mssystables`
--

CREATE TABLE IF NOT EXISTS `mssystables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cMasterCode` varchar(10) DEFAULT NULL,
  `cChildCode` varchar(10) DEFAULT NULL,
  `cValue` varchar(50) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mssystables`
--

INSERT INTO `mssystables` (`id`, `cMasterCode`, `cChildCode`, `cValue`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'Bank', 'BCA', '119.147.6251', 'Y', '2013-12-01 10:37:53', 'system', NULL, NULL),
(2, 'Bank', 'Mandiri', '880.90.10.11', 'Y', '2013-12-01 10:38:25', 'system', NULL, NULL),
(3, 'Delivery', 'Charge', '4000', 'Y', '2013-12-08 13:35:59', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msusers`
--

CREATE TABLE IF NOT EXISTS `msusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cNama` varchar(100) DEFAULT NULL,
  `cEmail` varchar(100) DEFAULT NULL,
  `cPassword` varchar(50) DEFAULT NULL,
  `iGroupAccess` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `msusers`
--

INSERT INTO `msusers` (`id`, `cNama`, `cEmail`, `cPassword`, `iGroupAccess`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 'Hendi', 'internisti1908@yahoo.com', 'e3ee24baff1468a3f0d04453288c9cf0', 1, 'Y', '2013-11-07 20:48:26', NULL, '2013-12-01 10:34:23', NULL),
(2, 'Hendi Chen', 'hendi@satukomu.com', 'bfc505fa2cec1e477d320cc04081e12c', 1, 'Y', '2013-11-07 21:14:34', NULL, NULL, NULL),
(3, 'Hendi C.', 'hendi0509@gmail.com', '6d0ac39e609c6b2784fad64c894e423d', 1, 'Y', '2013-11-11 19:17:58', NULL, NULL, NULL),
(4, 'Silviana', 'silviana.jonathan@gmail.com', '6950a44cf9f45a3239f93b3c364392e1', 1, 'Y', '2013-11-11 19:24:48', NULL, NULL, NULL),
(5, 'Warung Tekko', 'xx@gmail.com', 'e3ee24baff1468a3f0d04453288c9cf0', 2, 'Y', '2013-11-13 20:28:15', 'system', NULL, NULL),
(6, 'ABC', 'cc@gmail.com', '6116260eaa7f55e49557c8323cd3fac1', 1, 'Y', '2013-11-26 21:36:49', NULL, NULL, NULL);

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
  `iMenuId` int(11) DEFAULT NULL,
  `iHargaMenuId` int(11) DEFAULT NULL,
  `iJumlah` int(11) DEFAULT NULL,
  `cDesc` text,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trorderdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `trorders`
--

CREATE TABLE IF NOT EXISTS `trorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `idRestoran` int(11) DEFAULT NULL,
  `dTglOrder` datetime DEFAULT NULL,
  `iTax` int(11) DEFAULT '0',
  `iBiayaAntar` int(11) DEFAULT '0',
  `cJenisTerimaMakanan` varchar(50) DEFAULT NULL,
  `cJamPickUp` time DEFAULT NULL,
  `iPaymentId` int(11) DEFAULT NULL,
  `cVoucherCode` varchar(50) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trorders`
--


-- --------------------------------------------------------

--
-- Table structure for table `trredeempoints`
--

CREATE TABLE IF NOT EXISTS `trredeempoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `idReward` int(11) DEFAULT NULL,
  `cStatus` varchar(2) DEFAULT NULL,
  `dTglRedeem` datetime DEFAULT NULL,
  `dCreated` datetime DEFAULT NULL,
  `cCreated` varchar(100) DEFAULT NULL,
  `dUpdated` datetime DEFAULT NULL,
  `cUpdated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trredeempoints`
--


-- --------------------------------------------------------

--
-- Table structure for table `trtopups`
--

CREATE TABLE IF NOT EXISTS `trtopups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCust` int(11) DEFAULT NULL,
  `cRekCompany` varchar(50) DEFAULT NULL,
  `dTglTransfer` datetime DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trtopups`
--

INSERT INTO `trtopups` (`id`, `idCust`, `cRekCompany`, `dTglTransfer`, `cBankUser`, `cRekeningUser`, `cNamaUser`, `iJumlah`, `cStatusVerified`, `cStatus`, `dCreated`, `cCreated`, `dUpdated`, `cUpdated`) VALUES
(1, 1, 'BCA-119.147.6251', '2013-12-01 00:00:00', 'BCA Jambi', '119.147.6251', 'Hendi', 100000, 'N', 'Y', '2013-12-01 12:01:27', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
