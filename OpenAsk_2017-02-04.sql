# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: OpenAsk
# Generation Time: 2017-02-04 07:57:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table openask_answer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_answer`;

CREATE TABLE `openask_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_at` int(10) unsigned DEFAULT NULL,
  `question_id` int(10) unsigned NOT NULL DEFAULT '0',
  `count_comment` int(10) unsigned NOT NULL DEFAULT '0',
  `count_view` int(10) unsigned NOT NULL DEFAULT '0',
  `count_approve` int(10) unsigned NOT NULL DEFAULT '0',
  `count_oppose` int(10) unsigned NOT NULL DEFAULT '0',
  `count_follow` int(10) unsigned NOT NULL DEFAULT '0',
  `count_thank` int(10) unsigned NOT NULL DEFAULT '0',
  `count_mark` int(10) unsigned NOT NULL DEFAULT '0',
  `count_no_help` int(10) unsigned NOT NULL DEFAULT '0',
  `is_lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_anonymous` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`,`count_approve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_answer` WRITE;
/*!40000 ALTER TABLE `openask_answer` DISABLE KEYS */;

INSERT INTO `openask_answer` (`id`, `body`, `created_at`, `author_id`, `updated_at`, `modified_by`, `modified_at`, `question_id`, `count_comment`, `count_view`, `count_approve`, `count_oppose`, `count_follow`, `count_thank`, `count_mark`, `count_no_help`, `is_lock`, `is_anonymous`)
VALUES
	(1,'<p>会</p>',1474343308,4,1474343308,NULL,NULL,67,0,0,0,0,0,0,0,0,0,1),
	(2,'<p>你好你好</p>',1474354545,4,1474354545,NULL,NULL,64,0,0,0,0,0,0,0,0,0,0),
	(3,'<p>我来回答你啦。</p>',1479746101,1,1479746101,NULL,NULL,71,6,0,0,0,0,0,0,0,0,0),
	(4,'<p>嗯嗯</p>',1480129652,1,1480129652,NULL,NULL,67,0,0,0,0,0,0,0,0,0,0),
	(7,'<p>a</p>',1480183693,1,1480183693,NULL,NULL,69,0,0,0,0,0,0,0,0,0,0),
	(8,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188398,1,1480188398,NULL,NULL,108,0,0,0,0,0,0,0,0,0,1),
	(9,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188578,1,1480188578,NULL,NULL,109,0,0,0,0,0,0,0,0,0,1),
	(10,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188613,1,1480188613,NULL,NULL,110,0,0,1,0,0,0,0,0,0,1),
	(11,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188619,1,1480188619,NULL,NULL,111,0,0,1,0,0,0,0,0,0,1),
	(12,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480217875,1,1480217875,NULL,NULL,112,0,0,0,0,0,0,0,0,0,1),
	(13,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480218619,1,1480218619,NULL,NULL,113,0,0,0,0,0,0,0,0,0,1),
	(14,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480218656,1,1480218656,NULL,NULL,114,0,0,1,0,0,0,0,0,0,1),
	(15,'<p>测试回答</p>',1480382046,2,1480382046,NULL,NULL,117,0,0,0,0,0,0,0,0,0,0),
	(17,'<p>测试回答</p>',1480552869,1,1480552869,NULL,NULL,115,0,0,0,0,0,0,0,0,0,0),
	(18,'<p>测试一下回答</p>',1480780939,1,1480780939,NULL,NULL,121,0,0,0,0,0,0,0,0,0,0),
	(19,'<p>测试回答</p>',1480781520,1,1480781520,NULL,NULL,122,0,0,0,0,0,0,0,0,0,0),
	(20,'<p>测试回答，修改回答</p>',1480781602,1,1480781617,NULL,NULL,123,0,0,0,0,0,0,0,0,0,0),
	(21,'<p>测试回答，回答修改123</p>',1480781808,1,1484155733,NULL,NULL,124,0,0,0,0,0,0,0,0,0,0),
	(23,'<p>我来回答一下。</p>',1481122474,1,1481122474,NULL,NULL,120,0,0,0,0,0,0,0,0,0,0),
	(28,'<p>asdfsdfsdf</p>',1481993116,1,1481993116,NULL,NULL,125,0,0,0,0,0,0,0,0,0,0),
	(29,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481994826,1,1481994826,NULL,NULL,126,0,0,0,0,0,0,0,0,0,1),
	(30,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995320,1,1481995320,NULL,NULL,127,0,0,0,0,0,0,0,0,0,1),
	(31,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995456,1,1481995456,NULL,NULL,128,0,0,0,0,0,0,0,0,0,1),
	(32,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995590,1,1481995590,NULL,NULL,129,0,0,0,0,0,0,0,0,0,1),
	(33,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995594,1,1481995594,NULL,NULL,130,0,0,0,0,0,0,0,0,0,1),
	(34,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995645,1,1481995645,NULL,NULL,131,0,0,0,0,0,0,0,0,0,1),
	(35,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995782,1,1481995782,NULL,NULL,132,0,0,0,0,0,0,0,0,0,1),
	(36,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995919,1,1481995919,NULL,NULL,133,0,0,0,0,0,0,0,0,0,1),
	(37,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995977,1,1481995977,NULL,NULL,134,0,0,0,0,0,0,0,0,0,1),
	(38,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996144,1,1481996144,NULL,NULL,135,0,0,0,0,0,0,0,0,0,1),
	(39,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996207,1,1481996207,NULL,NULL,136,0,0,0,0,0,0,0,0,0,1),
	(40,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996261,1,1481996261,NULL,NULL,137,0,0,0,0,0,0,0,0,0,1),
	(41,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996739,1,1481996739,NULL,NULL,138,0,0,1,0,0,0,0,0,0,1),
	(42,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996788,1,1481996788,NULL,NULL,139,0,0,1,0,0,0,0,0,0,1),
	(43,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996799,1,1481996799,NULL,NULL,140,0,0,1,0,0,0,0,0,0,1),
	(44,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482136174,1,1482136174,NULL,NULL,141,0,0,1,0,0,0,0,0,0,1),
	(45,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137446,1,1482137446,NULL,NULL,153,0,0,0,0,0,0,0,0,0,1),
	(46,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137508,1,1482137508,NULL,NULL,154,0,0,1,0,0,0,0,0,0,1),
	(47,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482248469,1,1482248469,NULL,NULL,155,0,0,1,0,0,0,0,0,0,1),
	(48,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482249250,1,1482249250,NULL,NULL,156,0,0,0,0,0,0,0,0,0,1),
	(49,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482249319,1,1482249319,NULL,NULL,157,0,0,0,0,0,0,0,0,0,1),
	(50,'<p>单元测试回答内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482249598,1,1482249598,NULL,NULL,158,0,0,1,0,0,0,0,0,0,1),
	(51,'<ol><li>adfasfasfdas</li>\n	<li>asfd</li>\n	<li>asfdasdf</li>\n	<li>asdf</li>\n</ol><p>asdfasfasfasdf\n</p><ul><li>afasf</li>\n	<li>asdf</li>\n	<li>asdf</li>\n	<li>asdf</li>\n</ul>',1484155485,1,1484155485,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(52,'<p>emojii ?</p>',1484709115,1,1484709115,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(53,'<table><tbody><tr><td>姓名</td><td>工号</td></tr><tr><td>张三</td><td>10086</td></tr></tbody></table>',1484709667,1,1484709667,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(54,'<hr />',1484710569,1,1484710569,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(55,'<p>你好?你在哪里呢？\n</p>',1484734769,1,1484734769,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(56,'<p>你好</p>',1484734798,1,1484734798,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(57,'<p>?你</p>',1484735159,1,1484735159,NULL,NULL,159,0,0,0,0,0,0,0,0,0,0),
	(58,'<p>123</p>',1484798144,1,1484798144,NULL,NULL,152,0,0,0,0,0,0,0,0,0,0),
	(59,'<p>?123</p>',1484798179,1,1484798179,NULL,NULL,152,0,0,0,0,0,0,0,0,0,0),
	(60,'<p>?123</p>',1484798345,1,1484798345,NULL,NULL,152,0,0,0,0,0,0,0,0,0,0),
	(61,'<p>?</p>',1484815952,1,1484815952,NULL,NULL,151,0,0,0,0,0,0,0,0,0,0),
	(62,'<p>?</p>',1484815985,1,1484815985,NULL,NULL,151,0,0,0,0,0,0,0,0,0,0),
	(63,'<p>?</p>',1484816394,1,1484816394,NULL,NULL,150,0,0,0,0,0,0,0,0,0,0),
	(64,'<p>不错</p><p>表格测试：</p><table><tbody><tr><td>姓名</td><td>年龄</td></tr><tr><td>张三</td><td>18</td></tr><tr><td>李四</td><td>19</td></tr></tbody></table>',1485007071,1,1485007455,NULL,NULL,161,1,0,0,0,0,0,0,0,0,0),
	(65,'<p>test</p>',1485175863,1,1485175863,NULL,NULL,160,0,0,0,0,0,0,0,0,0,0),
	(66,'<p>123</p>',1485182719,1,1485182719,NULL,NULL,149,0,0,0,0,0,0,0,0,0,0);

/*!40000 ALTER TABLE `openask_answer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_comment`;

CREATE TABLE `openask_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `reply_author_id` int(10) unsigned DEFAULT NULL,
  `reply_comment_id` int(10) unsigned DEFAULT NULL,
  `count_approve` int(10) unsigned NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned DEFAULT NULL,
  `answer_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  KEY `answer_id` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_comment` WRITE;
/*!40000 ALTER TABLE `openask_comment` DISABLE KEYS */;

INSERT INTO `openask_comment` (`id`, `body`, `created_at`, `author_id`, `reply_author_id`, `reply_comment_id`, `count_approve`, `question_id`, `answer_id`)
VALUES
	(1,'测试评论',1480140795,1,NULL,NULL,0,NULL,NULL),
	(2,'送㩐',1480140804,1,NULL,NULL,0,NULL,NULL),
	(3,'ddd',1480140861,1,NULL,NULL,0,NULL,NULL),
	(4,'1',1480141888,1,NULL,NULL,0,NULL,NULL),
	(5,'2',1480142134,1,NULL,NULL,0,NULL,NULL),
	(6,'3',1480142170,1,NULL,NULL,0,NULL,NULL),
	(7,'4',1480142231,1,NULL,NULL,0,NULL,NULL),
	(8,'5',1480142248,1,NULL,NULL,0,NULL,NULL),
	(9,'6',1480142388,1,NULL,NULL,0,NULL,NULL),
	(10,'1',1480142462,1,NULL,NULL,0,NULL,NULL),
	(11,'asdf',1480146823,1,NULL,NULL,0,NULL,NULL),
	(13,'测试评论',1480227902,1,NULL,NULL,0,NULL,NULL),
	(15,'回复你',1480227931,1,1,13,0,NULL,NULL),
	(16,'测试评论',1481993138,1,NULL,NULL,0,NULL,NULL),
	(17,'asf',1481997609,1,NULL,NULL,0,NULL,NULL),
	(18,'啊',1481997700,1,NULL,NULL,0,NULL,NULL),
	(19,'岁',1481997735,1,NULL,NULL,0,NULL,NULL),
	(20,'a',1484151381,1,NULL,NULL,0,159,NULL),
	(21,'a',1484151717,1,NULL,NULL,0,159,NULL),
	(22,'a',1484151774,1,NULL,NULL,0,159,NULL),
	(23,'a',1484151850,1,NULL,NULL,0,159,NULL),
	(27,'abc',1485023685,1,NULL,NULL,0,NULL,64),
	(34,'123',1485177637,1,NULL,NULL,0,160,NULL),
	(35,'123',1485350231,1,NULL,NULL,0,162,NULL),
	(36,'abc',1485350250,1,NULL,NULL,0,162,NULL);

/*!40000 ALTER TABLE `openask_comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_feed
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_feed`;

CREATE TABLE `openask_feed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) unsigned NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `question_id` int(11) unsigned DEFAULT NULL,
  `answer_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_feed` WRITE;
/*!40000 ALTER TABLE `openask_feed` DISABLE KEYS */;

INSERT INTO `openask_feed` (`id`, `type`, `user_id`, `created_at`, `question_id`, `answer_id`)
VALUES
	(1,2,1,1481996788,139,NULL),
	(2,4,1,1481996788,139,NULL),
	(6,6,1,1481996788,139,NULL),
	(10,3,1,1481996788,139,NULL),
	(11,2,1,1481996799,140,NULL),
	(12,4,1,1481996799,140,NULL),
	(16,6,1,1481996799,140,NULL),
	(20,3,1,1481996799,140,NULL),
	(25,2,1,1482136174,141,NULL),
	(26,4,1,1482136174,141,NULL),
	(30,6,1,1482136174,141,NULL),
	(34,3,1,1482136174,141,NULL),
	(35,2,1,1482136426,142,NULL),
	(36,2,1,1482136633,143,NULL),
	(37,2,1,1482136935,144,NULL),
	(38,2,1,1482137022,145,NULL),
	(39,2,1,1482137095,146,NULL),
	(40,2,1,1482137114,147,NULL),
	(41,2,1,1482137152,148,NULL),
	(42,2,1,1482137199,149,NULL),
	(43,2,1,1482137255,150,NULL),
	(44,2,1,1482137348,151,NULL),
	(45,2,1,1482137374,152,NULL),
	(46,2,1,1482137446,153,NULL),
	(47,4,1,1482137446,153,NULL),
	(48,2,1,1482137508,154,NULL),
	(49,4,1,1482137508,154,NULL),
	(53,6,1,1482137508,154,NULL),
	(57,3,1,1482137508,154,NULL),
	(58,2,1,1482248469,155,NULL),
	(59,4,1,1482248469,155,NULL),
	(63,6,1,1482248469,155,NULL),
	(67,3,1,1482248469,155,NULL),
	(68,2,1,1482249250,156,NULL),
	(69,4,1,1482249250,156,NULL),
	(70,2,1,1482249319,157,NULL),
	(71,4,1,1482249319,157,NULL),
	(72,2,1,1482249598,158,NULL),
	(73,4,1,1482249598,158,NULL),
	(77,6,1,1482249598,158,NULL),
	(81,3,1,1482249598,158,NULL),
	(85,2,6,1482972936,159,NULL),
	(87,1,1,1484097901,159,NULL),
	(88,1,1,1484098059,159,NULL),
	(89,1,1,1484098143,159,NULL),
	(90,1,1,1484098216,159,NULL),
	(91,1,1,1484098222,159,NULL),
	(92,1,1,1484098227,159,NULL),
	(93,1,1,1484098602,159,NULL),
	(94,1,1,1484098742,159,NULL),
	(95,1,1,1484150035,159,NULL),
	(96,1,1,1484152280,159,NULL),
	(97,1,1,1484152281,159,NULL),
	(98,1,1,1484154346,159,NULL),
	(99,4,1,1484155485,159,51),
	(100,1,1,1484155751,124,NULL),
	(101,1,1,1484155817,122,NULL),
	(102,4,1,1484709115,159,52),
	(103,4,1,1484709667,159,53),
	(104,4,1,1484710569,159,54),
	(105,4,1,1484734769,159,55),
	(106,4,1,1484734798,159,56),
	(107,4,1,1484735159,159,57),
	(108,4,1,1484798144,152,58),
	(109,4,1,1484798179,152,59),
	(110,4,1,1484798345,152,60),
	(111,4,1,1484815952,151,61),
	(112,4,1,1484815985,151,62),
	(113,4,1,1484816394,150,63),
	(114,2,1,1484818007,160,NULL),
	(115,2,1,1484818069,161,NULL),
	(116,1,1,1485006934,161,NULL),
	(117,4,1,1485007072,161,64),
	(118,4,1,1485175863,160,65),
	(119,4,1,1485182719,149,66),
	(120,2,1,1485182751,162,NULL),
	(121,1,1,1485182904,162,NULL);

/*!40000 ALTER TABLE `openask_feed` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_message`;

CREATE TABLE `openask_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) unsigned NOT NULL,
  `to_uid` int(11) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table openask_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_migration`;

CREATE TABLE `openask_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_migration` WRITE;
/*!40000 ALTER TABLE `openask_migration` DISABLE KEYS */;

INSERT INTO `openask_migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1479489600),
	('m140209_132017_init',1479489730),
	('m140403_174025_create_account_table',1479489731),
	('m140504_113157_update_tables',1479489731),
	('m140504_130429_create_token_table',1479489731),
	('m140830_171933_fix_ip_field',1479489731),
	('m140830_172703_change_account_table_name',1479489731),
	('m141222_110026_update_ip_field',1479489731),
	('m141222_135246_alter_username_length',1479489731),
	('m150614_103145_update_social_account_table',1479489731),
	('m150623_212711_fix_username_notnull',1479489731),
	('m151218_234654_add_timezone_to_profile',1479489731);

/*!40000 ALTER TABLE `openask_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_notification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_notification`;

CREATE TABLE `openask_notification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `source_uid` int(11) unsigned DEFAULT NULL,
  `dest_uid` int(11) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `source_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `target_user_id` (`dest_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table openask_profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_profile`;

CREATE TABLE `openask_profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `openask_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_profile` WRITE;
/*!40000 ALTER TABLE `openask_profile` DISABLE KEYS */;

INSERT INTO `openask_profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`)
VALUES
	(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `openask_profile` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_question
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_question`;

CREATE TABLE `openask_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_at` int(10) unsigned DEFAULT NULL,
  `accept_answer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `count_comment` int(10) unsigned NOT NULL DEFAULT '0',
  `count_answer` int(10) unsigned NOT NULL DEFAULT '0',
  `count_view` int(10) unsigned NOT NULL DEFAULT '0',
  `count_approve` int(10) unsigned NOT NULL DEFAULT '0',
  `count_oppose` int(10) unsigned NOT NULL DEFAULT '0',
  `count_follow` int(10) unsigned NOT NULL DEFAULT '0',
  `count_thank` int(10) unsigned NOT NULL DEFAULT '0',
  `count_mark` int(10) unsigned NOT NULL DEFAULT '0',
  `count_no_help` int(10) unsigned NOT NULL DEFAULT '0',
  `is_lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_anonymous` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `last_active` int(10) unsigned DEFAULT NULL,
  `last_answer_id` int(10) unsigned DEFAULT NULL,
  `last_answer_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_question` WRITE;
/*!40000 ALTER TABLE `openask_question` DISABLE KEYS */;

INSERT INTO `openask_question` (`id`, `title`, `body`, `created_at`, `author_id`, `updated_at`, `modified_by`, `modified_at`, `accept_answer_id`, `count_comment`, `count_answer`, `count_view`, `count_approve`, `count_oppose`, `count_follow`, `count_thank`, `count_mark`, `count_no_help`, `is_lock`, `is_anonymous`, `last_active`, `last_answer_id`, `last_answer_by`)
VALUES
	(3,'PHP是最好的语言吗','<p>请问PHP是最好的语言吗</p>',1472551661,4,1472551661,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472608249,NULL,NULL),
	(4,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609249,4,1472609249,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609249,NULL,NULL),
	(5,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609305,4,1472609305,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609305,NULL,NULL),
	(6,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609311,4,1472609311,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609311,NULL,NULL),
	(7,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609586,4,1472609586,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609586,NULL,NULL),
	(8,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609586,4,1472609586,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609586,NULL,NULL),
	(9,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609588,4,1472609588,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609588,NULL,NULL),
	(10,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609589,4,1472609589,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609589,NULL,NULL),
	(11,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609590,4,1472609590,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609590,NULL,NULL),
	(12,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609591,4,1472609591,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609591,NULL,NULL),
	(13,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609592,4,1472609592,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609592,NULL,NULL),
	(14,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609592,4,1472609592,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609592,NULL,NULL),
	(15,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609593,4,1472609593,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609593,NULL,NULL),
	(16,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609594,4,1472609594,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609594,NULL,NULL),
	(17,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609595,4,1472609595,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609595,NULL,NULL),
	(18,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609595,4,1472609595,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609595,NULL,NULL),
	(19,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609596,4,1472609596,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609596,NULL,NULL),
	(20,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609597,4,1472609597,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609597,NULL,NULL),
	(21,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609598,4,1472609598,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609598,NULL,NULL),
	(22,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609598,4,1472609598,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609598,NULL,NULL),
	(23,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1472609859,4,1472609859,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1472609859,NULL,NULL),
	(24,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472634630,4,1472634630,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472634630,NULL,NULL),
	(25,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472634817,4,1472634817,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472634817,NULL,NULL),
	(26,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472634867,4,1472634867,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472634867,NULL,NULL),
	(27,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472634895,4,1472634895,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472634895,NULL,NULL),
	(28,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472635042,4,1472635042,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472635042,NULL,NULL),
	(29,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472639282,4,1472639282,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472639282,NULL,NULL),
	(30,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472639899,4,1472639899,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472639899,NULL,NULL),
	(31,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472640078,4,1472640078,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472640078,NULL,NULL),
	(32,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472654985,4,1472654985,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472654985,NULL,NULL),
	(33,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472655005,4,1472655005,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472655005,NULL,NULL),
	(34,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472655021,4,1472655021,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472655021,NULL,NULL),
	(41,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472656810,4,1472656810,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472656810,NULL,NULL),
	(46,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472657798,4,1472657798,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472657798,NULL,NULL),
	(47,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472657881,4,1472657881,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472657881,NULL,NULL),
	(48,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472657902,4,1472657902,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472657902,NULL,NULL),
	(60,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p>alert(1)<a href=\"http://www.qq.com/\">腾讯</a>',1472685763,4,1484500378,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472685763,NULL,NULL),
	(61,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472685769,4,1472685769,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472685769,NULL,NULL),
	(62,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472685924,4,1472685924,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472685924,NULL,NULL),
	(63,'测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\QuestionTest::testCreate测试标题 tests\\codeception\\unit\\models\\Quest','<p>单元测试内容</p><script>alert(1)</script><a href=\"http://www.qq.com/\">腾讯</a>',1472685929,4,1472685929,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1472685929,NULL,NULL),
	(64,'大家好啊','<p>你们在干什么呢\r\n</p>alert(1)',1472687180,4,1474355505,NULL,NULL,0,1,1,0,1,0,0,0,0,0,0,1,1474354545,2,4),
	(67,'读写分离到底会带来多大的性能提升？','<p>仅考虑redis或者mysql上的读写分离。\n</p>',1473641197,4,1480129652,NULL,NULL,0,0,2,0,0,0,0,0,0,0,0,0,1480129652,4,1),
	(68,'你好吗','',1479578075,1,1479578075,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1479578075,NULL,NULL),
	(69,'测试提问','<p>问题详情</p>',1479687344,1,1480183693,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1480183693,7,1),
	(70,'测试提问','<p>问题详情</p>',1479687813,1,1479687813,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1479687813,NULL,NULL),
	(71,'测试提问','<p>提问详情</p>',1479687962,1,1479746102,NULL,NULL,0,4,1,0,0,0,0,0,0,0,0,0,1479746102,3,1),
	(72,'sdf','',1480037261,1,1480037261,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1480037261,NULL,NULL),
	(92,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186270,1,1480186270,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186270,NULL,NULL),
	(93,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186591,1,1480186591,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186591,NULL,NULL),
	(94,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186629,1,1480186629,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186629,NULL,NULL),
	(95,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186804,1,1480186804,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186804,NULL,NULL),
	(96,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186915,1,1480186915,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186915,NULL,NULL),
	(97,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186936,1,1480186936,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186936,NULL,NULL),
	(98,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480186993,1,1480186993,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480186993,NULL,NULL),
	(99,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480187012,1,1480187012,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480187012,NULL,NULL),
	(100,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480187092,1,1480187092,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480187092,NULL,NULL),
	(101,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480187199,1,1480187199,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480187199,NULL,NULL),
	(102,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480187578,1,1480187578,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480187578,NULL,NULL),
	(103,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480187725,1,1480187725,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1480187725,NULL,NULL),
	(104,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480187876,1,1480187876,NULL,NULL,0,0,0,0,0,1,0,0,0,0,0,1,1480187876,NULL,NULL),
	(105,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188057,1,1480188057,NULL,NULL,0,0,0,0,0,1,0,0,0,0,0,1,1480188057,NULL,NULL),
	(106,'测试标题 tests\\codeception\\unit\\models\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188097,1,1480188097,NULL,NULL,0,0,0,0,1,0,0,0,0,0,0,1,1480188097,NULL,NULL),
	(107,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188231,1,1480188231,NULL,NULL,0,0,0,0,1,0,0,0,0,0,0,1,1480188231,NULL,NULL),
	(108,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188397,1,1480188398,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1480188398,8,1),
	(109,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188577,1,1480188578,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1480188578,9,1),
	(110,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188613,1,1480188613,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1480188613,10,1),
	(111,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480188619,1,1480188619,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1480188619,11,1),
	(112,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480217875,1,1480217875,NULL,NULL,0,2,1,0,0,0,0,0,0,0,0,1,1480217875,12,1),
	(113,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480218619,1,1480218619,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1480218619,13,1),
	(114,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1480218656,1,1480218656,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1480218656,14,1),
	(115,'PHP是最好的语言吗','',1480228888,1,1480552869,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1480552869,17,1),
	(116,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1480264975,1,1480264975,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1480264975,NULL,NULL),
	(117,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1480266869,1,1480382046,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1480382046,15,2),
	(118,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1480471443,1,1480471443,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1480471443,NULL,NULL),
	(119,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1480471497,1,1480471497,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,1480471497,NULL,NULL),
	(120,'测试 QuestionCreate','<p>测试 QuestionCreate，文章内容</p>',1480471579,1,1481122474,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1481122474,23,1),
	(121,'Se..IDE 问题','<p>Se..IDE 问题说明</p>',1480780931,1,1480780939,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1480780939,18,1),
	(122,'测试提问','<p>测试问题说明</p>',1480781508,1,1480781520,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1480781520,19,1),
	(123,'测试提问','<p>测试问题说明</p>',1480781597,1,1480781602,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,0,1480781602,20,1),
	(124,'测试提问','<p>测试提问问题说明</p>',1480781801,1,1480781808,NULL,NULL,0,0,1,0,0,0,1,0,1,0,0,0,1480781808,21,1),
	(125,'PHP是最好的语言吗','<p>你们觉得PHP是最好的语言吗？</p>',1480784570,1,1481993116,NULL,NULL,0,4,1,0,0,0,1,0,1,0,0,0,1481993116,28,1),
	(126,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481994826,1,1481994826,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1481994826,29,1),
	(127,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995320,1,1481995320,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1481995320,30,1),
	(128,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995456,1,1481995456,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1481995456,31,1),
	(129,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995590,1,1481995590,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1481995590,32,1),
	(130,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995594,1,1481995594,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1481995594,33,1),
	(131,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995645,1,1481995645,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481995645,34,1),
	(132,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995782,1,1481995782,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481995782,35,1),
	(133,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995919,1,1481995919,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481995919,36,1),
	(134,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481995977,1,1481995977,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481995977,37,1),
	(135,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996144,1,1481996144,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481996144,38,1),
	(136,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996206,1,1481996207,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481996207,39,1),
	(137,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996261,1,1481996261,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481996261,40,1),
	(138,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996739,1,1481996739,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481996739,41,1),
	(139,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996788,1,1481996788,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1481996788,42,1),
	(140,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1481996798,1,1481996799,NULL,NULL,0,0,1,0,1,0,0,0,1,0,0,1,1481996799,43,1),
	(141,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482136174,1,1482136174,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1482136174,44,1),
	(142,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482136426,1,1482136426,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482136426,NULL,NULL),
	(143,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482136633,1,1482136633,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482136633,NULL,NULL),
	(144,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482136935,1,1482136935,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482136935,NULL,NULL),
	(145,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137022,1,1482137022,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482137022,NULL,NULL),
	(146,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137095,1,1482137095,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482137095,NULL,NULL),
	(147,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137114,1,1482137114,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482137114,NULL,NULL),
	(148,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137152,1,1482137152,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,1,1482137152,NULL,NULL),
	(149,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137199,1,1485182719,NULL,NULL,0,0,1,11,0,0,1,0,0,0,0,1,1485182719,66,1),
	(150,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137255,1,1484816394,NULL,NULL,0,0,1,1,0,0,1,0,1,0,0,1,1484816394,63,1),
	(151,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137348,1,1484815985,NULL,NULL,0,0,2,1,0,0,1,0,0,0,0,1,1484815985,62,1),
	(152,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137374,1,1484798345,NULL,NULL,0,0,3,1,0,0,1,0,0,0,0,1,1484798345,60,1),
	(153,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137446,1,1482137446,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1482137446,45,1),
	(154,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482137508,1,1482137508,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1482137508,46,1),
	(155,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482248469,1,1482248469,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1482248469,47,1),
	(156,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482249250,1,1482249250,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1482249250,48,1),
	(157,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482249319,1,1482249319,NULL,NULL,0,0,1,0,0,0,0,0,0,0,0,1,1482249319,49,1),
	(158,'测试标题 tests\\codeception\\unit\\ModelTest::testQuestionCreate','<p>单元测试内容</p><a href=\"http://www.qq.com/\">腾讯</a>',1482249597,1,1482249598,NULL,NULL,0,0,1,0,1,0,0,0,0,0,0,1,1482249598,50,1),
	(159,'asd','<p>asdasdf</p>',1482972936,6,1484735159,NULL,NULL,0,4,7,0,0,0,1,0,1,0,0,0,1484735159,57,1),
	(160,'test','',1484818007,1,1485175863,NULL,NULL,0,1,1,34,0,0,1,0,0,0,0,0,1485175863,65,1),
	(161,'test','',1484818069,1,1485007072,NULL,NULL,0,0,1,13,0,0,1,0,0,0,0,0,1485007072,64,1),
	(162,'提问','<p>阿斯顿发</p>',1485182751,1,1485182751,NULL,NULL,0,2,0,23,0,0,1,0,1,0,0,0,1485182751,NULL,NULL);

/*!40000 ALTER TABLE `openask_question` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_question_topic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_question_topic`;

CREATE TABLE `openask_question_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_question_topic` WRITE;
/*!40000 ALTER TABLE `openask_question_topic` DISABLE KEYS */;

INSERT INTO `openask_question_topic` (`id`, `question_id`, `topic_id`, `uid`, `add_time`)
VALUES
	(1,3,7,4,1472551661),
	(2,5,6,4,1472609306),
	(3,5,7,4,1472609306),
	(4,6,6,4,1472609311),
	(5,6,7,4,1472609311),
	(6,7,6,4,1472609586),
	(7,7,7,4,1472609586),
	(8,8,6,4,1472609586),
	(9,8,7,4,1472609586),
	(10,9,6,4,1472609588),
	(11,9,7,4,1472609588),
	(12,10,6,4,1472609589),
	(13,10,7,4,1472609589),
	(14,11,6,4,1472609590),
	(15,11,7,4,1472609590),
	(16,12,6,4,1472609591),
	(17,12,7,4,1472609591),
	(18,13,6,4,1472609592),
	(19,13,7,4,1472609592),
	(20,14,6,4,1472609592),
	(21,14,7,4,1472609592),
	(22,15,6,4,1472609593),
	(23,15,7,4,1472609593),
	(24,16,6,4,1472609594),
	(25,16,7,4,1472609594),
	(26,17,6,4,1472609595),
	(27,17,7,4,1472609595),
	(28,18,6,4,1472609595),
	(29,18,7,4,1472609595),
	(30,19,6,4,1472609596),
	(31,19,7,4,1472609596),
	(32,20,6,4,1472609597),
	(33,20,7,4,1472609597),
	(34,21,6,4,1472609598),
	(35,21,7,4,1472609598),
	(36,22,6,4,1472609598),
	(37,22,7,4,1472609598),
	(38,23,6,4,1472609859),
	(39,23,7,4,1472609859),
	(40,25,6,4,1472634817),
	(41,25,7,4,1472634817),
	(42,26,6,4,1472634867),
	(43,26,7,4,1472634867),
	(44,27,6,4,1472634896),
	(45,27,7,4,1472634896),
	(46,28,6,4,1472635042),
	(47,28,7,4,1472635042),
	(48,29,6,4,1472639282),
	(49,29,7,4,1472639282),
	(50,30,6,4,1472639899),
	(51,30,7,4,1472639899),
	(52,31,6,4,1472640078),
	(53,31,7,4,1472640078),
	(54,32,6,4,1472654985),
	(55,32,7,4,1472654985),
	(56,33,6,4,1472655005),
	(57,33,7,4,1472655005),
	(58,34,6,4,1472655022),
	(59,34,7,4,1472655021),
	(60,41,6,4,1472656810),
	(61,41,7,4,1472656810),
	(62,46,6,4,1472657798),
	(63,46,7,4,1472657798),
	(64,47,6,4,1472657881),
	(65,47,7,4,1472657881),
	(66,48,6,4,1472657902),
	(67,48,7,4,1472657902),
	(68,61,6,4,1472685769),
	(69,61,7,4,1472685769),
	(70,62,6,4,1472685924),
	(71,62,7,4,1472685924),
	(72,63,6,4,1472685929),
	(73,63,7,4,1472685929),
	(74,64,3,4,1474355506),
	(75,64,7,4,1474355506),
	(76,67,8,1,1480090331),
	(77,68,7,1,1479578075),
	(78,69,7,1,1479687344),
	(79,70,7,1,1479687813),
	(80,71,7,1,1479687962),
	(81,72,7,1,1480037261),
	(82,92,6,1,1480186271),
	(83,92,7,1,1480186271),
	(84,93,6,1,1480186591),
	(85,93,7,1,1480186591),
	(86,94,6,1,1480186629),
	(87,94,7,1,1480186629),
	(88,95,6,1,1480186805),
	(89,95,7,1,1480186805),
	(90,96,6,1,1480186915),
	(91,96,7,1,1480186915),
	(92,97,6,1,1480186936),
	(93,97,7,1,1480186936),
	(94,98,6,1,1480186994),
	(95,98,7,1,1480186994),
	(96,99,6,1,1480187012),
	(97,99,7,1,1480187012),
	(98,100,6,1,1480187092),
	(99,100,7,1,1480187092),
	(100,101,6,1,1480187199),
	(101,101,7,1,1480187199),
	(102,103,6,1,1480187725),
	(103,103,7,1,1480187725),
	(104,104,6,1,1480187876),
	(105,104,7,1,1480187876),
	(106,105,6,1,1480188057),
	(107,105,7,1,1480188057),
	(108,106,6,1,1480188097),
	(109,106,7,1,1480188097),
	(110,107,6,1,1480188232),
	(111,107,7,1,1480188232),
	(112,108,6,1,1480188398),
	(113,108,7,1,1480188397),
	(114,109,6,1,1480188578),
	(115,109,7,1,1480188578),
	(116,110,6,1,1480188613),
	(117,110,7,1,1480188613),
	(118,111,6,1,1480188619),
	(119,111,7,1,1480188619),
	(120,112,6,1,1480217875),
	(121,112,7,1,1480217875),
	(122,113,6,1,1480218619),
	(123,113,7,1,1480218619),
	(124,114,6,1,1480218656),
	(125,114,7,1,1480218656),
	(126,115,7,1,1480228888),
	(127,116,8,1,1480264975),
	(128,117,8,1,1480266869),
	(129,118,8,1,1480471443),
	(130,119,8,1,1480471497),
	(131,120,8,1,1480471579),
	(132,121,3,1,1480780931),
	(133,121,7,1,1480780931),
	(134,122,5,1,1480781508),
	(135,122,7,1,1480781508),
	(136,123,5,1,1480781597),
	(137,123,7,1,1480781597),
	(138,124,5,1,1480781801),
	(139,124,7,1,1480781801),
	(140,125,3,1,1480784570),
	(141,125,7,1,1480784570),
	(142,126,6,1,1481994826),
	(143,126,7,1,1481994826),
	(144,127,6,1,1481995320),
	(145,127,7,1,1481995320),
	(146,128,6,1,1481995456),
	(147,128,7,1,1481995456),
	(148,129,6,1,1481995590),
	(149,129,7,1,1481995590),
	(150,130,6,1,1481995594),
	(151,130,7,1,1481995594),
	(152,131,6,1,1481995645),
	(153,131,7,1,1481995645),
	(154,132,6,1,1481995782),
	(155,132,7,1,1481995782),
	(156,133,6,1,1481995919),
	(157,133,7,1,1481995919),
	(158,134,6,1,1481995977),
	(159,134,7,1,1481995977),
	(160,135,6,1,1481996144),
	(161,135,7,1,1481996144),
	(162,136,6,1,1481996207),
	(163,136,7,1,1481996207),
	(164,137,6,1,1481996261),
	(165,137,7,1,1481996261),
	(166,138,6,1,1481996739),
	(167,138,7,1,1481996739),
	(168,139,6,1,1481996788),
	(169,139,7,1,1481996788),
	(170,140,6,1,1481996799),
	(171,140,7,1,1481996799),
	(172,141,6,1,1482136174),
	(173,141,7,1,1482136174),
	(174,142,6,1,1482136426),
	(175,142,7,1,1482136426),
	(176,143,6,1,1482136633),
	(177,143,7,1,1482136633),
	(178,144,6,1,1482136936),
	(179,144,7,1,1482136936),
	(180,145,6,1,1482137022),
	(181,145,7,1,1482137022),
	(182,146,6,1,1482137095),
	(183,146,7,1,1482137095),
	(184,147,6,1,1482137114),
	(185,147,7,1,1482137114),
	(186,148,6,1,1482137152),
	(187,148,7,1,1482137152),
	(188,149,6,1,1482137199),
	(189,149,7,1,1482137199),
	(190,150,6,1,1482137255),
	(191,150,7,1,1482137255),
	(192,151,6,1,1482137348),
	(193,151,7,1,1482137348),
	(194,152,6,1,1482137374),
	(195,152,7,1,1482137374),
	(196,153,6,1,1482137446),
	(197,153,7,1,1482137446),
	(198,154,6,1,1482137508),
	(199,154,7,1,1482137508),
	(200,155,6,1,1482248469),
	(201,155,7,1,1482248469),
	(202,156,6,1,1482249250),
	(203,156,7,1,1482249250),
	(204,157,6,1,1482249319),
	(205,157,7,1,1482249319),
	(206,158,6,1,1482249598),
	(207,158,7,1,1482249598),
	(208,159,3,6,1482972936),
	(209,60,6,1,1484500378),
	(210,60,7,1,1484500378),
	(211,160,4,1,1484818007),
	(212,161,4,1,1484818069),
	(213,162,7,1,1485182751);

/*!40000 ALTER TABLE `openask_question_topic` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_relation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_relation`;

CREATE TABLE `openask_relation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `from` int(11) unsigned NOT NULL,
  `target` int(11) unsigned NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`from`,`target`),
  KEY `type_2` (`type`,`target`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_relation` WRITE;
/*!40000 ALTER TABLE `openask_relation` DISABLE KEYS */;

INSERT INTO `openask_relation` (`id`, `type`, `from`, `target`, `created_at`)
VALUES
	(36,2,1,124,1484155755),
	(37,5,1,124,1484155756),
	(58,2,1,159,1484794604),
	(59,5,1,159,1484794604),
	(60,2,1,152,1484798144),
	(61,2,1,151,1484815952),
	(62,2,1,150,1484816394),
	(63,5,1,150,1484817994),
	(64,2,1,160,1484818007),
	(68,2,1,161,1485007072),
	(69,2,1,149,1485182719),
	(74,2,1,162,1486194723),
	(75,5,1,162,1486194724);

/*!40000 ALTER TABLE `openask_relation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_session`;

CREATE TABLE `openask_session` (
  `id` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `openask_session` WRITE;
/*!40000 ALTER TABLE `openask_session` DISABLE KEYS */;

INSERT INTO `openask_session` (`id`, `expire`, `data`)
VALUES
	('6pa78cm809lu2o8ekn3tuj49l7',1485104571,X'5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A31383A222F7175657374696F6E2F3136302F65646974223B5F5F69647C693A313B'),
	('hgmvtuqe8h3ch984fcnio9r4hc',1486196164,X'5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A353A222F66656564223B5F5F69647C693A313B');

/*!40000 ALTER TABLE `openask_session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_social_account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_social_account`;

CREATE TABLE `openask_social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `openask_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table openask_token
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_token`;

CREATE TABLE `openask_token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `openask_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_token` WRITE;
/*!40000 ALTER TABLE `openask_token` DISABLE KEYS */;

INSERT INTO `openask_token` (`user_id`, `code`, `created_at`, `type`)
VALUES
	(7,'tLyAgsPSswEIf6mZyouOE6mfNUAw4Tv3',1479566882,0),
	(10,'nnu0aobNxHpUw-a2UuOOvqOTy8T7L26L',1479577429,0);

/*!40000 ALTER TABLE `openask_token` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_topic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_topic`;

CREATE TABLE `openask_topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `count_best` int(11) unsigned NOT NULL DEFAULT '0',
  `count_follower` int(11) unsigned NOT NULL DEFAULT '0',
  `count` int(11) unsigned NOT NULL DEFAULT '0',
  `count_last_week` int(10) unsigned NOT NULL DEFAULT '0',
  `count_last_month` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_topic` WRITE;
/*!40000 ALTER TABLE `openask_topic` DISABLE KEYS */;

INSERT INTO `openask_topic` (`id`, `name`, `icon`, `desc`, `count_best`, `count_follower`, `count`, `count_last_week`, `count_last_month`)
VALUES
	(1,'asdf','','',0,0,0,0,0),
	(2,'CSS','','',0,0,2,2,2),
	(3,'Html','','',0,0,1,1,1),
	(4,'Java','','',0,0,3,1,3),
	(5,'Javascript','','',0,0,1,1,1),
	(6,'js','','',0,0,4,1,4),
	(7,'PHP','','',0,0,1,1,1),
	(8,'MySQL',NULL,NULL,0,0,0,0,0);

/*!40000 ALTER TABLE `openask_topic` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_user`;

CREATE TABLE `openask_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_user` WRITE;
/*!40000 ALTER TABLE `openask_user` DISABLE KEYS */;

INSERT INTO `openask_user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`)
VALUES
	(1,'admin','admin@qq.com','$2y$10$iSMIT6ob5jZEjLK0lhG/YO2pUkwu4923K8YX7HVig7L1oLRGso.Ue','lNSOgrfg71n0AKHozumapkGEdhr5Uv8N',1479490007,NULL,NULL,NULL,1479490007,1479490007,0),
	(2,'id2','id2@qq.com','$2y$10$GfpHBFVVSW/4o019lYL8ye9HM8DH5IOZigDC5htr8DlgQ79KJKCcO','wXRyLWStAe-16owVfTle5sw9pzTTILoo',1479490027,NULL,NULL,NULL,1479490027,1479490027,0),
	(3,'id3','id3@qq.com','$2y$10$6h4bQBeAf/tPptkMLs/EG.Y4QAMN53PrTsF4PwEszlOnm62jyGet2','etG-MSZDZ88hOs1M0YftY70Hgj9C8Y6y',1479490031,NULL,NULL,NULL,1479490031,1479490031,0),
	(4,'id4','id4@qq.com','$2y$10$8ZBw8by2roPNTvzv5y1ubeAKhAGfUbKRbTyV2zBkh9P6wXY7V/X8C','IvDZjh03KNcWsDTqDRlMggd6iUkdoS12',1479490036,NULL,NULL,NULL,1479490036,1479490036,0),
	(5,'id5','id5@qq.com','$2y$10$U5e1r28DVWDqAn.tRGuh8uXkwN6puxJd4VWDraadgG5k0pTx/eJAa','YVo6mRxzGCbxN9YGLjMMDkCBorAVFIid',1479490041,NULL,NULL,NULL,1479490041,1479490041,0),
	(6,'id6','id6@qq.com','$2y$10$16Yrbu/hLf.k.CNCW/Y89uZfxFDwIB8fPykHafwZBNj8cS9Uem0Lq','BU0FRcR5k7KcNYrNA-GLGLhkl54eNLGq',1479490046,NULL,NULL,NULL,1479490046,1479490046,0),
	(7,'id7','id7@qq.com','$2y$10$fFsSRYnDLkQBp/yyQf.roeHsMviHlz8l5DBnYT3dV1.ZkiTDtkJGS','U4STt_V2y1QahRp8J8ZS292DyKwnTiLm',NULL,NULL,NULL,'127.0.0.1',1479566882,1479566882,0),
	(8,'id8','id8@qq.com','$2y$10$PZzOWQ1JlCMdXklPI1Nrb.rcmYJkvnOqm0Rt/TEeYfhJdmhovzBoi','B8MlF-EJlgupk0ac02Yx_4FwWe4qsCzx',1479571351,NULL,NULL,NULL,1479571351,1479571351,0),
	(9,'id9','id9@qq.com','$2y$10$DYfApYgRwUYIiN3fethULOImltoeSWXMEOaSY36rEW9nTLGlmui52','EI2UE0ny-bZ_RB6FbJsfzmUc3mj7hDzc',1479571765,NULL,NULL,NULL,1479571765,1479571765,0),
	(10,'id10','id10@qq.com','$2y$10$JTDpYRqMRDWKrOSQvScbd.PVmmZAU4vtSlLK/Xl9izNtRL2azMeXu','YYgk4LZnjbehNzvzTZ8f1jwF_xI5MYsu',NULL,NULL,NULL,'127.0.0.1',1479577429,1479577429,0);

/*!40000 ALTER TABLE `openask_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table openask_user_profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `openask_user_profile`;

CREATE TABLE `openask_user_profile` (
  `user_id` int(10) NOT NULL,
  `last_read_feed` int(10) unsigned NOT NULL DEFAULT '0',
  `count_approve` int(10) unsigned NOT NULL DEFAULT '0',
  `count_thank` int(10) unsigned NOT NULL DEFAULT '0',
  `count_ask` int(10) unsigned NOT NULL DEFAULT '0',
  `count_answer` int(10) unsigned NOT NULL DEFAULT '0',
  `count_mark` int(10) unsigned NOT NULL DEFAULT '0',
  `avatar` varchar(256) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `headline` varchar(128) COLLATE utf8_unicode_ci DEFAULT '',
  `bio` text COLLATE utf8_unicode_ci,
  `business` varchar(128) COLLATE utf8_unicode_ci DEFAULT '',
  `location` varchar(128) COLLATE utf8_unicode_ci DEFAULT '',
  `display_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reputation` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `slug` (`slug`),
  CONSTRAINT `openask_user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `openask_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `openask_user_profile` WRITE;
/*!40000 ALTER TABLE `openask_user_profile` DISABLE KEYS */;

INSERT INTO `openask_user_profile` (`user_id`, `last_read_feed`, `count_approve`, `count_thank`, `count_ask`, `count_answer`, `count_mark`, `avatar`, `gender`, `headline`, `bio`, `business`, `location`, `display_name`, `slug`, `reputation`)
VALUES
	(1,85,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','超级管理员','admin',0),
	(2,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-2','slug-0.5356868324202363',0),
	(3,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-3','slug-0.2967993712954217',0),
	(4,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-4','slug-0.8769363899500449',0),
	(5,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-5','slug-0.49428386659760387',0),
	(6,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-6','slug-0.8406101938715299',0),
	(7,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-7','slug-0.7201994002984831',0),
	(8,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-8','slug-0.07916645061147069',0),
	(9,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-9','slug-0.2352340828955491',0),
	(10,0,0,0,0,0,0,'/497f57e8327de0159b168fbe865c855c.jpg',0,'',NULL,'','','昵称-10','slug-0.9386710933769784',0);

/*!40000 ALTER TABLE `openask_user_profile` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
