-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2015 at 04:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `ct_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pd_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ct_qty` mediumint(8) unsigned NOT NULL DEFAULT '1',
  `ct_session_id` char(32) NOT NULL DEFAULT '',
  `ct_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ct_id`),
  KEY `pd_id` (`pd_id`),
  KEY `ct_session_id` (`ct_session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`ct_id`, `pd_id`, `ct_qty`, `ct_session_id`, `ct_date`) VALUES
(2, 3, 1, 'e5rb67uehbuusnbq41jsummfe1', '2015-03-21 18:58:37'),
(5, 3, 1, 'esn7go71jqp4h0nqes4q6rpm50', '2015-03-21 22:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_parent_id` int(11) NOT NULL DEFAULT '0',
  `cat_name` varchar(50) NOT NULL DEFAULT '',
  `cat_description` varchar(200) NOT NULL DEFAULT '',
  `cat_image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`),
  KEY `cat_parent_id` (`cat_parent_id`),
  KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_parent_id`, `cat_name`, `cat_description`, `cat_image`) VALUES
(40, 0, 'Women shoes', 'Elegant and beautiful', '98a03fde6e8e4c1c329a6ea475999f2d.jpg'),
(41, 40, 'Boots', 'GYUITYIUFGYFR', 'e597d1a27edaecf564d97e53589a81b4.jpg'),
(42, 0, 'Men Shoes', 'a man should wore', '0bb82def8cd7f5953b4443f4c06d165c.jpg'),
(43, 40, 'Sandal', 'dsgfdhthry', 'a2007c9cf244d349d36b371ab98461b9.jpg'),
(44, 40, 'Wedges', 'guytyuigth', '045f115a6551b0f7bf111fa4f3058a89.jpg'),
(45, 40, 'Pump', 'yfyiugig', '9a204ff3501996b4151fac06d6e2cef4.jpg'),
(46, 40, 'Evening', 'giuygtuyt', '03a3fc814c3d9343124619daee7ff562.jpg'),
(47, 0, 'Kids Shoes', 'fgyfhgf7yfyu', '301d77734981298093d215ad7c94f8e9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `cy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cy_code` char(3) NOT NULL DEFAULT '',
  `cy_symbol` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`cy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`cy_id`, `cy_code`, `cy_symbol`) VALUES
(1, 'EUR', '&#8364;'),
(2, 'GBP', '&pound;'),
(3, 'JPY', '&yen;'),
(4, 'USD', '$'),
(5, 'Php', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `od_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `od_date` datetime DEFAULT NULL,
  `od_last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_status` enum('New','Paid','Shipped','Completed','Cancelled') NOT NULL DEFAULT 'New',
  `od_memo` varchar(255) NOT NULL DEFAULT '',
  `od_shipping_first_name` varchar(50) NOT NULL DEFAULT '',
  `od_shipping_last_name` varchar(50) NOT NULL DEFAULT '',
  `od_shipping_address1` varchar(100) NOT NULL DEFAULT '',
  `od_shipping_address2` varchar(100) NOT NULL DEFAULT '',
  `od_shipping_phone` varchar(32) NOT NULL DEFAULT '',
  `od_shipping_city` varchar(100) NOT NULL DEFAULT '',
  `od_shipping_state` varchar(32) NOT NULL DEFAULT '',
  `od_shipping_postal_code` varchar(10) NOT NULL DEFAULT '',
  `od_shipping_cost` decimal(5,2) DEFAULT '0.00',
  `od_payment_first_name` varchar(50) NOT NULL DEFAULT '',
  `od_payment_last_name` varchar(50) NOT NULL DEFAULT '',
  `od_payment_address1` varchar(100) NOT NULL DEFAULT '',
  `od_payment_address2` varchar(100) NOT NULL DEFAULT '',
  `od_payment_phone` varchar(32) NOT NULL DEFAULT '',
  `od_payment_city` varchar(100) NOT NULL DEFAULT '',
  `od_payment_state` varchar(32) NOT NULL DEFAULT '',
  `od_payment_postal_code` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`od_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`od_id`, `od_date`, `od_last_update`, `od_status`, `od_memo`, `od_shipping_first_name`, `od_shipping_last_name`, `od_shipping_address1`, `od_shipping_address2`, `od_shipping_phone`, `od_shipping_city`, `od_shipping_state`, `od_shipping_postal_code`, `od_shipping_cost`, `od_payment_first_name`, `od_payment_last_name`, `od_payment_address1`, `od_payment_address2`, `od_payment_phone`, `od_payment_city`, `od_payment_state`, `od_payment_postal_code`) VALUES
(1, '2012-10-19 16:59:44', '2012-10-19 16:59:44', 'New', '', 'Dawda', 'Dawdaw', 'dawdaw', 'dawd', '423423', 'Fsefes', 'sfsf', '4234', 5.00, 'Dawda', 'Dawdaw', 'dawdaw', 'dawd', '423423', 'Fsefes', 'sfsf', '4234'),
(2, '2012-10-19 18:07:56', '2012-10-19 18:07:56', 'New', '', 'Dawda', 'Dawdaw', 'dwad', 'awdawdaw', 'dawd', 'Dawda', 'awdaw', 'wdwad', 5.00, 'Dawda', 'Dawdaw', 'dwad', 'awdawdaw', 'dawd', 'Dawda', 'awdaw', 'wdwad'),
(3, '2012-10-19 18:08:59', '2012-10-19 18:08:59', 'New', '', 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234', 5.00, 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234'),
(4, '2012-10-19 18:14:35', '2012-10-19 18:14:35', 'New', '', 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234', 5.00, 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234'),
(5, '2012-10-19 18:35:04', '2012-10-19 18:35:04', 'New', '', 'Wad', 'Dawdaw', 'dawd', 'awdawdawdawd', 'wadwad', 'Dawda', 'awd', 'dawdwa', 5.00, 'Wad', 'Dawdaw', 'dawd', 'awdawdawdawd', 'wadwad', 'Dawda', 'awd', 'dawdwa'),
(6, '2012-10-19 18:44:18', '2012-10-19 18:44:18', 'New', '', 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234', 5.00, 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234'),
(7, '2012-10-19 19:01:26', '2012-10-19 19:01:26', 'New', '', 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234', 5.00, 'Dawda', 'Dawdaw', 'dawdaw', 'awdawdaw', '423423', 'Dawda', 'awdaw', '4234'),
(8, '2015-03-21 22:17:34', '2015-03-21 22:17:34', 'New', '', 'Rona', 'Arevalo', 'Brgy.Alijis', 'Bacolod City', '09231084427', 'Bacolod City', 'Negros Occidental', '6100', 5.00, 'Rona', 'Arevalo', 'Brgy.Alijis', 'Bacolod City', '09231084427', 'Bacolod City', 'Negros Occidental', '6100'),
(9, '2015-03-21 22:39:24', '2015-03-21 22:39:24', 'New', '', 'Shamley', 'Sacare', 'Handuman', 'Lacson St.', '09071523468', 'Bacolod City', 'Negros Occidental', '6100', 5.00, 'Shamley', 'Sacare', 'Handuman', 'Lacson St.', '09071523468', 'Bacolod City', 'Negros Occidental', '6100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE IF NOT EXISTS `tbl_order_item` (
  `od_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pd_id` int(10) unsigned NOT NULL DEFAULT '0',
  `od_qty` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`od_id`,`pd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`od_id`, `pd_id`, `od_qty`) VALUES
(1, 2, 9),
(2, 7, 1),
(3, 3, 1),
(5, 2, 1),
(6, 3, 2),
(7, 3, 1),
(8, 6, 2),
(9, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pd_name` varchar(100) NOT NULL DEFAULT '',
  `pd_description` text NOT NULL,
  `pd_price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `pd_qty` smallint(5) unsigned NOT NULL DEFAULT '0',
  `pd_image` varchar(200) DEFAULT NULL,
  `pd_thumbnail` varchar(200) DEFAULT NULL,
  `pd_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pd_last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pd_id`),
  KEY `cat_id` (`cat_id`),
  KEY `pd_name` (`pd_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pd_id`, `cat_id`, `pd_name`, `pd_description`, `pd_price`, `pd_qty`, `pd_image`, `pd_thumbnail`, `pd_date`, `pd_last_update`) VALUES
(1, 43, 'Noli Leather Sandal', 'fgfdhjhgktu', 1589.65, 20, '25d4e6497201539cc4cc196d41b85435.jpg', 'd0ed5fc71bd847740c4ef4f04c7d4ccc.jpg', '2015-03-21 18:04:59', '0000-00-00 00:00:00'),
(2, 43, 'Martin Flat Leather Sandal', 'hytrutyuijytiidjyt', 989.75, 20, '46c637976cd2ac8740bc839a0b807a83.jpg', 'e09b9fbe6614ad8dc8e78dcbde03b6d1.jpg', '2015-03-21 18:06:02', '0000-00-00 00:00:00'),
(3, 41, 'Knee Boot', 'fhfgjhgikuykjhgf', 799.99, 20, '0ea47fce37981dce9dfbbc4652ce3f3e.jpg', '7f124f63da934fb7b505129c45b4a1d9.jpg', '2015-03-21 18:07:06', '0000-00-00 00:00:00'),
(4, 41, 'Eyelet and Zip Leather Angkle-boot', 'tgdfhhhhtyur', 856.50, 19, 'e9746b666b2073706975adfbe5501de0.jpg', 'a55f8beb0a71a4eb9104a0b5fd0c3bbb.jpg', '2015-03-21 18:09:25', '0000-00-00 00:00:00'),
(5, 44, 'Viviane slip on wedge', 'rgetujy', 750.63, 20, '13c9656f95736f4d2d97b14f9eb0b778.jpg', 'f0a5abc71a0a117e16714f2bd999779b.jpg', '2015-03-21 18:10:26', '0000-00-00 00:00:00'),
(6, 44, 'studded espadrille wedge sandal', 'gfdhgfhgfjfgjf', 799.99, 18, '27b68bbaca25253eb3baa1014f37980c.jpg', 'b5d620ed7c8bb3510390413de3d9b5b6.jpg', '2015-03-21 18:11:11', '0000-00-00 00:00:00'),
(7, 45, 'pointed metal toe Leather pump', 'dsgfdhgd', 899.20, 10, '3fddd9d6514896c417bbf990537774fb.jpg', '0d8a1ecef2c74a76f88014d62f779c0b.jpg', '2015-03-21 18:13:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_config`
--

CREATE TABLE IF NOT EXISTS `tbl_shop_config` (
  `sc_name` varchar(50) NOT NULL DEFAULT '',
  `sc_address` varchar(100) NOT NULL DEFAULT '',
  `sc_phone` varchar(30) NOT NULL DEFAULT '',
  `sc_email` varchar(30) NOT NULL DEFAULT '',
  `sc_shipping_cost` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sc_currency` int(10) unsigned NOT NULL DEFAULT '1',
  `sc_order_email` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shop_config`
--

INSERT INTO `tbl_shop_config` (`sc_name`, `sc_address`, `sc_phone`, `sc_email`, `sc_shipping_cost`, `sc_currency`, `sc_order_email`) VALUES
('Shoe Earth', 'Celita Village, Brgy. Alijis', '09231084427', 'ronaarevalo_96@yahoo.com', 100.00, 5, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `user_password` varchar(32) NOT NULL DEFAULT '',
  `address` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_regdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `address`, `phone`, `email`, `user_level`, `user_regdate`, `user_last_login`) VALUES
(1, 'admin', 'admin', '', '', '', 1, '2005-02-20 17:35:44', '2015-03-23 15:10:18'),
(2, 'haha', 'hehe', '', '', '', 0, '2015-03-21 19:43:41', '2015-03-21 19:48:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
