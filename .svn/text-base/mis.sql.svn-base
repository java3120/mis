-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 29 日 17:32
-- 服务器版本: 5.00.15
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mis`
--

-- --------------------------------------------------------

--
-- 表的结构 `invheader`
--

CREATE TABLE IF NOT EXISTS `invheader` (
  `invid` int(11) NOT NULL auto_increment,
  `invdate` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `tax` decimal(10,2) NOT NULL default '0.00',
  `total` decimal(10,2) NOT NULL default '0.00',
  `note` char(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`invid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `invheader`
--

INSERT INTO `invheader` (`invid`, `invdate`, `client_id`, `amount`, `tax`, `total`, `note`) VALUES
(1, '2012-07-03', 1, '0.00', '0.00', '0.00', '111');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(128) collate utf8_unicode_ci default NULL,
  `product_type` varchar(128) collate utf8_unicode_ci default NULL,
  `product_number` bigint(20) NOT NULL,
  `purchase_price` double(20,0) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `purchase_size` float NOT NULL,
  `purchase_color` varchar(50) collate utf8_unicode_ci NOT NULL,
  `store_number` bigint(20) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` bigint(20) NOT NULL,
  `sale_price` double(20,0) NOT NULL,
  `sale_number` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(60) collate utf8_unicode_ci default NULL,
  `user_password` varchar(64) collate utf8_unicode_ci default NULL,
  `user_nickname` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_nickname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '管理员');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
