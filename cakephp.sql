-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 15 日 15:55
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cakephp`
--

-- --------------------------------------------------------

--
-- 表的结构 `ck_messages`
--

CREATE TABLE IF NOT EXISTS `ck_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `postdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `ck_messages`
--

INSERT INTO `ck_messages` (`id`, `uid`, `content`, `postdate`) VALUES
(22, 8, '章子怡，著名国际影星。1998年被张艺谋发掘，主演电影《我的父亲母亲》，该片获柏林国际电影节银熊奖而一举成名。1999年主演李安导演的影片《卧虎藏龙》，该片摘得华语电影史上第一个奥斯卡金像奖最佳外语片奖，因此蜚声国际。2005年主演由罗伯·马歇尔执导、斯皮尔伯格监制的好莱坞大片《艺伎回忆录》，是首位担任好莱坞A级别制作大片女主角的华人影星，并获得美国电影金球奖、英国电影学院奖影后提名。', '2013-10-15 17:41:03'),
(23, 8, '三次登上《时代周刊》封面，数次被外媒评为“世界最美50人” ，拥有多部享誉国际的经典影片。作为中国在世界影坛最具知名度和影响力的代表人物之一，章子怡连续两年担任奥斯卡颁奖嘉宾和终身评委，三次担任戛纳国际电影节评委，美国《时代周刊》更称她是“中国送给好莱坞的礼物”。', '2013-10-15 17:41:36'),
(24, 8, '2013年因在王家卫导演的电影《一代宗师》中精湛的演技发挥获得广泛的影响与好评；北美票房超过650万美金，跻身华语电影北美票房前十名，并在国外掀起一股“宗师热”；6月被法国政府授予法兰西文化与艺术骑士勋章以表彰她在电影艺术领域的杰出成就与突出贡献。', '2013-10-15 17:41:48'),
(27, 11, '路过，不小心留下一个潇洒的背影。---那是哥。', '2013-10-15 17:58:55'),
(28, 10, '章子怡出生于北京普通工人家庭，有一个哥哥，小时候苦学舞蹈，毕业于中央戏剧学院戏剧系，儿时的章子怡长得瘦瘦的，小小的，老师建议她去学舞蹈。', '2013-10-15 18:02:56'),
(29, 10, '3天时间，莴累崩了。cakephp 框架更新太快（平均一个月更新一次）。中文的api没有，有也1.x的版本，前后方法和用法有许多地方不兼容。前期纠结了很久。。看了很多文章，代码。。\r\n权限控制没有用Auth，也没有acl配置Aro，aco的权限。因为用Auth->login()总是不能登录成功。后面自己直接写的认证【借鉴别人】。对视图域控制器的看法。。视图集成没弄太明白。开始用的时候觉得不太具有拓展性。但是后来用的时候觉得很好。写界面代码很少，较简约.总之。中文手册，api更不上新版本，新版本没有中文手册，api。', '2013-10-15 21:48:24');

--
-- 触发器 `ck_messages`
--
DROP TRIGGER IF EXISTS `ck_messages`;
DELIMITER //
CREATE TRIGGER `ck_messages` BEFORE INSERT ON `ck_messages`
 FOR EACH ROW set new.postdate = now()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `ck_replies`
--

CREATE TABLE IF NOT EXISTS `ck_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `msgid` int(11) NOT NULL,
  `content` text NOT NULL,
  `postdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `ck_replies`
--

INSERT INTO `ck_replies` (`id`, `uid`, `username`, `msgid`, `content`, `postdate`) VALUES
(7, 10, '笑起来很甜', 22, '支持章子怡，我的女神。。', '2013-10-15 17:45:18'),
(10, 11, '胖子很犀利', 23, '厉害的人必有其厉害之处', '2013-10-15 17:52:30'),
(12, 10, '笑起来很甜', 28, '沉舟侧畔千帆过，病树前头万木春，\r\n', '2013-10-15 18:14:02');

--
-- 触发器 `ck_replies`
--
DROP TRIGGER IF EXISTS `ck_replies`;
DELIMITER //
CREATE TRIGGER `ck_replies` BEFORE INSERT ON `ck_replies`
 FOR EACH ROW set new.postdate = now()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `ck_users`
--

CREATE TABLE IF NOT EXISTS `ck_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `ck_users`
--

INSERT INTO `ck_users` (`id`, `username`, `password`, `is_admin`, `is_active`, `created`, `modified`) VALUES
(8, 'lalala', '1bbd886460827015e5d605ed44252251', 0, 0, '2013-10-13 15:56:04', '2013-10-15 11:41:48'),
(9, 'admin', '0192023a7bbd73250516f069df18b500', 1, 0, '2013-10-13 16:46:10', '2013-10-13 16:46:10'),
(10, '笑起来很甜', '1bbd886460827015e5d605ed44252251', 0, 0, '2013-10-15 11:42:33', '2013-10-15 15:48:24'),
(11, '胖子很犀利', '1bbd886460827015e5d605ed44252251', 0, 0, '2013-10-15 11:44:04', '2013-10-15 11:58:55');

-- --------------------------------------------------------

--
-- 表的结构 `ck_words`
--

CREATE TABLE IF NOT EXISTS `ck_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `ck_words`
--

INSERT INTO `ck_words` (`id`, `content`) VALUES
(1, '你妹'),
(2, '你大爷'),
(3, '艹'),
(5, '新鲜词汇，+111'),
(6, 'fuck '),
(7, '妈蛋');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
