<?php
// 28 feb 2008
// Bharadwaj

// This file contains the table schema. This is t be called during install.

$asin_table_create = "CREATE TABLE `asins` (
  `asin` varchar(14) NOT NULL,
  `ratings` int(5),
  `reviews` int(5),
  `price` varchar(20),
  PRIMARY KEY  (`asin`)
);";

$adset_table_create = "CREATE TABLE `adsets` (
  `id` int(10) NOT NULL,
  `name` varchar(14) NOT NULL,
  `pageid` varchar(14) NOT NULL
);";

$associations_table_create = "CREATE TABLE `associations` (
  `asin` varchar(14) NOT NULL,
  `pageid` int(5) NOT NULL,
  UNIQUE KEY `unique_assoc_cons` (`asin`,`pageid`),
  KEY `page_fk` (`pageid`)
);";

$pages_create_table = "CREATE TABLE `pages` (
  `id` int(14) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `maxitems` int(5) NOT NULL,
  `enabled` int(1) NOT NULL default '1' COMMENT '1 for enabled, 0 for disabled',
  PRIMARY KEY  (`id`)
);";

$settings_create_table = "CREATE TABLE `settings` (
  `id` int(3) NOT NULL auto_increment,
  `setting` varchar(20) NOT NULL,
  `value` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `key` (`setting`)
);";

$users_create_table = "CREATE TABLE `users` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_name` varchar(200) NOT NULL default '',
  `user_email` varchar(220)  NOT NULL default '',
  `pwd` varchar(220) NOT NULL default '',
  `ckey` varchar(220) NOT NULL default '',
  `ctime` varchar(220) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_email` (`user_email`),
  FULLTEXT KEY `idx_search` (`user_email`,`user_name`)
);";

$default_settings_sitename = "INSERT INTO `settings` (setting) values ('sitename');";
$default_settings_tagline = "INSERT INTO `settings` (setting) values ('tagline');";
$default_settings_theme = "INSERT INTO `settings` (setting) values ('theme');";

$pages_default_row = "INSERT INTO `pages` (`id`,`name`,`maxitems`,`enabled`)
VALUES (1,'Home',10,1);";

// Store each query as an array. It will be easy to update, in case of an upgrade.
$azstore_db_create_query = array($asin_table_create , $adset_table_create , $associations_table_create , $pages_create_table , $settings_create_table , $users_create_table, $pages_default_row, $default_settings_sitename, $default_settings_tagline, $default_settings_theme);


?>