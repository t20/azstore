# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.0.67)
# Database: azstore
# Generation Time: 2011-02-15 02:03:39 -0600
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table adsets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `adsets`;

CREATE TABLE `adsets` (
  `id` int(10) NOT NULL,
  `name` varchar(14) NOT NULL,
  `pageid` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;



# Dump of table asins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `asins`;

CREATE TABLE `asins` (
  `asin` varchar(14) NOT NULL,
  `ratings` int(4) NOT NULL,
  `reviews` int(4) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY  (`asin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table associations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `associations`;

CREATE TABLE `associations` (
  `asin` varchar(14) NOT NULL,
  `pageid` int(5) NOT NULL,
  UNIQUE KEY `unique_assoc_cons` (`asin`,`pageid`),
  KEY `page_fk` (`pageid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(14) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `maxitems` int(5) NOT NULL,
  `enabled` int(1) NOT NULL default '1' COMMENT '1 for enabled, 0 for disabled',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;



# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(3) NOT NULL auto_increment,
  `setting` varchar(20) NOT NULL,
  `value` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `key` (`setting`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
