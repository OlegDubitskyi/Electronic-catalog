-- phpMyAdmin SQL Dump
-- version 2.8.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 22, 2006 at 02:35 PM
-- Server version: 5.0.27
-- PHP Version: 5.0.4
-- 
-- Database: `webcat`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `catalog`
-- 

CREATE TABLE `catalog` (
  `cat_id` int(11) NOT NULL auto_increment,
  `cat_left` int(11) default NULL,
  `cat_right` int(11) default NULL,
  `cat_level` int(11) default NULL,
  `cat_name` varchar(100) default NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=57 ;

-- 
-- Dumping data for table `catalog`
-- 

INSERT INTO `catalog` (`cat_id`, `cat_left`, `cat_right`, `cat_level`, `cat_name`) VALUES (1, 1, 56, 0, 'Каталог'),
(30, 3, 4, 2, 'Мобильные телефоны'),
(31, 5, 12, 2, 'Гарнитуры '),
(24, 2, 19, 1, 'Телефония и связь'),
(34, 10, 11, 3, 'Компьютерные гарнитуры'),
(33, 8, 9, 3, 'Проводные гарнитуры'),
(32, 6, 7, 3, 'Bluetooth гарнитуры '),
(35, 13, 14, 2, 'Сотовые телефоны CDMA'),
(36, 15, 16, 2, 'Радиотелефоны'),
(37, 17, 18, 2, 'Факсы'),
(38, 20, 35, 1, 'Фото-техника'),
(39, 21, 22, 2, 'Цифровые фотоаппараты'),
(40, 23, 28, 2, 'Фотоаппараты'),
(41, 24, 25, 3, 'Зеркальные фотокамеры'),
(42, 26, 27, 3, 'Компактные фотокамеры '),
(43, 29, 30, 2, 'Объективы'),
(44, 31, 32, 2, 'Штативы'),
(45, 33, 34, 2, 'Сумки '),
(47, 36, 45, 1, 'Компьютерная техника'),
(48, 37, 38, 2, 'Персональные компьютеры'),
(49, 39, 40, 2, 'Ноутбуки и аксессуары'),
(50, 41, 42, 2, 'КПК и аксессуары'),
(51, 43, 44, 2, 'Игровые приставки'),
(52, 46, 55, 1, 'Аудиотехника'),
(53, 47, 48, 2, 'Музыкальные центры'),
(54, 49, 50, 2, 'Магнитолы'),
(55, 51, 52, 2, 'Портативная аудио техника'),
(56, 53, 54, 2, 'Радиоприемники');

-- --------------------------------------------------------

-- 
-- Table structure for table `goods`
-- 

CREATE TABLE `goods` (
  `id` int(11) NOT NULL auto_increment,
  `cat_id` int(11) default NULL,
  `vendor_id` int(11) default NULL,
  `seller_id` int(11) default NULL,
  `name` varchar(255) default NULL,
  `description` text,
  `price_usd` decimal(10,2) default NULL,
  `price_ua` decimal(10,2) default NULL,
  `guarantee` tinyint(4) default NULL,
  `date_last_mod` date default NULL,
  `URL` varchar(255) default NULL,
  `price_opt_ua` decimal(10,2) default '0.00',
  `price_opt_usd` decimal(10,2) NOT NULL default '0.00',
  `presence` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `goods`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `model_transfer`
-- 

CREATE TABLE `model_transfer` (
  `model_id` int(10) NOT NULL default '0',
  `cat_id` int(10) NOT NULL default '0',
  `vendor_id` int(10) NOT NULL default '0',
  `original_name` varchar(45) NOT NULL default '',
  `transfer_name` varchar(45) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- 
-- Dumping data for table `model_transfer`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `models`
-- 

CREATE TABLE `models` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default '',
  `cat_id` int(11) default '0',
  `vendor_id` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `models`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `photos`
-- 

CREATE TABLE `photos` (
  `product_id` int(11) default NULL,
  `photo_id` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `photos`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `region`
-- 

CREATE TABLE `region` (
  `id` int(11) NOT NULL auto_increment,
  `region_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `region`
-- 

INSERT INTO `region` (`id`, `region_name`) VALUES (1, 'Киев'),
(2, 'Днепропетровск'),
(3, 'Ровно'),
(4, 'Харьков');

-- --------------------------------------------------------

-- 
-- Table structure for table `sellers`
-- 

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL auto_increment,
  `company_name` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `region_id` int(11) default NULL,
  `curs` float default '0',
  `delivery` tinyint(1) default NULL,
  `credit` tinyint(1) default NULL,
  `beznal` tinyint(1) default NULL,
  `reg_date` date default NULL,
  `status` tinyint(4) NOT NULL default '0',
  `url` varchar(45) NOT NULL,
  `icq` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `delivery_options` text NOT NULL,
  `work_time` varchar(100) NOT NULL,
  `fax` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel_code1` varchar(5) NOT NULL,
  `tel1` varchar(10) NOT NULL,
  `tel_code2` varchar(5) NOT NULL,
  `tel2` varchar(10) NOT NULL,
  `tel_code3` varchar(5) NOT NULL,
  `tel3` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `sellers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `stat`
-- 

CREATE TABLE `stat` (
  `id` int(11) NOT NULL auto_increment,
  `gid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `user_ip` varchar(50) NOT NULL,
  `date_visit` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `stat`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `statistics`
-- 

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL auto_increment,
  `cat_id` int(11) default '0',
  `goods_name` varchar(255) default '',
  `vendor_name` varchar(255) default '',
  `seller_id` int(11) default '0',
  `stat_date` date default '0000-00-00',
  `user_IP` varchar(255) default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `statistics`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `uid` int(11) NOT NULL auto_increment,
  `seller_id` int(11) default '0',
  `user_name` varchar(255) default NULL,
  `login` varchar(255) default NULL,
  `pas` varchar(255) default '',
  `reg_date` date default NULL,
  `user_type` tinyint(4) default '0',
  `email` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `vendor_transfer`
-- 

CREATE TABLE `vendor_transfer` (
  `vendor_id` int(10) unsigned NOT NULL default '0',
  `original_name` varchar(45) default NULL,
  `transfer_name` varchar(45) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- 
-- Dumping data for table `vendor_transfer`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `vendors`
-- 

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL auto_increment,
  `cat_id` int(11) NOT NULL default '0',
  `vendor_name` varchar(255) default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `vendors`
-- 

