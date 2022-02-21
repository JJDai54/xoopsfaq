#
# Table structure for table `faq_categories`
#

CREATE TABLE `xoopsfaq_categories` (
  `category_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) NOT NULL DEFAULT '',
  `category_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `category_active` TINYINT(1) NOT NULL DEFAULT '1',
  `category_color_set` VARCHAR(50) NOT NULL default '',
  `category_show_hidetext` TINYINT(1) NOT NULL DEFAULT '0',
  `category_hidetext_align` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 ;


#
# Table structure for table `faq_contents`
#

CREATE TABLE `xoopsfaq_contents` (
  `contents_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `contents_cid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `contents_title` varchar(255) NOT NULL DEFAULT '',
  `contents_answer` VARCHAR(255) NOT NULL,
  `contents_seealso1` VARCHAR(255) NOT NULL,
  `contents_libseealso1` VARCHAR(50) NOT NULL,
  `contents_seealso2` VARCHAR(255) NOT NULL,
  `contents_libseealso2` VARCHAR(50) NOT NULL,
  `contents_seealso3` VARCHAR(255) NOT NULL,
  `contents_libseealso3` VARCHAR(50) NOT NULL,
  `contents_contents` text NOT NULL,
  `contents_publish` int(11) unsigned NOT NULL DEFAULT '0',
  `contents_weight` smallint(5) unsigned NOT NULL DEFAULT '0',
  `contents_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dohtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `doxcode` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dosmiley` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `doimage` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dobr` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`contents_id`),
  KEY `contents_title` (`contents_title`(40)),
  KEY `contents_visible_category_id` (`contents_active`,`contents_cid`)
) ENGINE=MyISAM AUTO_INCREMENT=0;

#
# Table structure for table `faq_links`
#

CREATE TABLE `xoopsfaq_links` (
  `link_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `link_title` varchar(50) NOT NULL DEFAULT '',
  `link_url` VARCHAR(255) NOT NULL,
  `link_newtab` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`),
  UNIQUE KEY  (`link_title`),
) ENGINE=MyISAM AUTO_INCREMENT=0 ;


