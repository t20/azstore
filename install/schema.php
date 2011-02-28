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

// Store each query as an array. It will be easy to update, in case of an upgrade.
$azstore_db_create_query = array($asin_table_create , $adset_table_create , $associations_table_create , $pages_create_table , $settings_create_table );


?>