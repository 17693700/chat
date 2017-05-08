-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 27 日 09:47
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `chat`
--
CREATE DATABASE IF NOT EXISTS `chat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `chat`;

-- --------------------------------------------------------

--
-- 表的结构 `fenzu`
--

CREATE TABLE IF NOT EXISTS `fenzu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(22) NOT NULL,
  `fenzuname` varchar(22) NOT NULL DEFAULT '我的好友',
  `haoyouqq` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `fenzu`
--

INSERT INTO `fenzu` (`id`, `qq`, `fenzuname`, `haoyouqq`) VALUES
(2, '123', '我的好友', '646598927'),
(3, '123', '我的同学', '1713823247'),
(4, '123', '我的同学', '409842229'),
(6, '1713823247', '同学', '123'),
(7, '123', '我的同学', '17693700'),
(8, '17693700', '我的同学', '123'),
(10, '95271', '我的好友', NULL),
(11, '95271', '我的好友', '123'),
(12, '123', '我的好友', '95271'),
(18, '17693700', '我的好友', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `jilu`
--

CREATE TABLE IF NOT EXISTS `jilu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendqq` varchar(22) NOT NULL,
  `getqq` varchar(22) NOT NULL,
  `content` varchar(100) NOT NULL,
  `shijian` datetime NOT NULL,
  `isget` varchar(5) NOT NULL,
  `isget2` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `jilu`
--

INSERT INTO `jilu` (`id`, `sendqq`, `getqq`, `content`, `shijian`, `isget`, `isget2`) VALUES
(1, '123', '1713823247', 'dsafs', '2016-05-27 17:46:08', '1', '1'),
(2, '123', '1713823247', 'fsdf', '2016-05-27 17:46:09', '1', '0'),
(3, '123', '1713823247', 'fsdf', '2016-05-27 17:46:09', '1', '0'),
(4, '1713823247', '123', 'sa', '2016-05-27 17:46:56', '1', '0');

-- --------------------------------------------------------

--
-- 表的结构 `qun`
--

CREATE TABLE IF NOT EXISTS `qun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qunhao` varchar(22) NOT NULL,
  `qunmingchen` varchar(22) NOT NULL,
  `quntouxiang` varchar(33) NOT NULL,
  `qq` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `qun`
--

INSERT INTO `qun` (`id`, `qunhao`, `qunmingchen`, `quntouxiang`, `qq`) VALUES
(1, '580226', '男生群', 'img/touxiang5.png', '123'),
(2, '580226', '男生群', 'img/touxiang5.png', '17693700'),
(3, '580227', '女生群', 'img/touxiang3.png', '1713823247'),
(4, '580227', '女生群', 'img/touxiang3.png', '123');

-- --------------------------------------------------------

--
-- 表的结构 `qunjilu`
--

CREATE TABLE IF NOT EXISTS `qunjilu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qunhao` varchar(22) NOT NULL,
  `qq` varchar(22) NOT NULL,
  `touxiang` varchar(33) NOT NULL,
  `wangming` varchar(22) NOT NULL,
  `content` varchar(100) NOT NULL,
  `shijian` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `qunjilu`
--

INSERT INTO `qunjilu` (`id`, `qunhao`, `qq`, `touxiang`, `wangming`, `content`, `shijian`) VALUES
(27, '580226', '123', 'img/touxiang9.png', '初见', '952795279527', '2016-05-04 22:19:36'),
(28, '580226', '123', 'img/touxiang9.png', '初见', '大家好  我又回来了', '2016-05-04 22:20:50'),
(29, '580227', '123', 'img/touxiang9.png', '初见', '女士们好', '2016-05-04 22:21:01'),
(30, '580227', '123', 'img/touxiang9.png', '初见', '呵呵', '2016-05-04 22:21:16'),
(31, '580226', '123', 'img/touxiang9.png', '初见', '嗯', '2016-05-04 22:22:20'),
(32, '580226', '17693700', 'img/touxiang1.png', '17693700', '哦', '2016-05-04 22:22:40'),
(33, '580226', '123', 'img/touxiang9.png', '初见', 'cvx', '2016-05-27 17:46:18');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(22) NOT NULL,
  `mima` varchar(22) NOT NULL,
  `touxiang` varchar(22) DEFAULT 'img/touxiang1.png',
  `wangming` varchar(22) NOT NULL,
  `gexingqianming` varchar(44) DEFAULT '这人很懒，什么也没留下。',
  `xingbie` enum('男','女') NOT NULL,
  `online` varchar(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `qq`, `mima`, `touxiang`, `wangming`, `gexingqianming`, `xingbie`, `online`) VALUES
(1, '123', '123', 'img/touxiang9.png', '初见', '大家好我叫123', '男', '1'),
(3, '646598927', '123', 'img/touxiang1.png', '六六六', '。。。。。。。', '男', '0'),
(4, '2435336617', '123', 'img/touxiang1.png', '二字', '水电开发建设的罚款', '女', '0'),
(5, '409842229', '123', 'img/touxiang1.png', '四', 'SD  ', '男', '0'),
(6, '1713823247', '123', 'img/touxiang2.png', '赵妙玲', '我是赵妙玲', '女', '1'),
(10, '9527', '123', 'img/touxiang1.png', '9527777', '这人很懒，什么也没留下。', '女', '0'),
(11, '95271', '123', 'img/touxiang1.png', '1231111', '这人很懒，什么也没留下。', '男', '0'),
(12, '17693700', '123', 'img/touxiang1.png', '见', '这人很懒，什么也没留下。', '男', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
