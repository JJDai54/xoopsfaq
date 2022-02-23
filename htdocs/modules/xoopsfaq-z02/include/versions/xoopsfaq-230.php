<?php
/**
 * Name: search.inc.php
 * Description: Search function for Xoops FAQ Module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package : XOOPS
 * @Module : Xoops FAQ
 * @subpackage : Search Functions
 * @since 2.5.7
 * @author John Neill
 * @version $Id: search.inc.php 0000 10/04/2009 09:04:24 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

//----------------------------------------------------------------------------
function update_tbl_category_230(){
global $xoopsDB;
    $tbl = $xoopsDB->prefix('xoopsfaq_category');
    $sql = "ALTER TABLE `{$tbl}` "
         . "ADD `category_color_set`      VARCHAR(50) NOT NULL AFTER `category_active`,"
         . "ADD `category_show_hidetext`  TINYINT(1) NOT NULL AFTER `category_active`,"
         . "ADD `category_hidetext_align` TINYINT(1) NOT NULL AFTER `category_active`,"
         . ";";

    //echo "<hr>update_tbl_category<br>{$sql}<hr>";
    $xoopsDB->query($sql);
}
function add_tbl_links_230(){
global $xoopsDB;
    $tbl = $xoopsDB->prefix('xoopsfaq_links');
/*
CREATE TABLE `xoopsfaq_links` (
  `link_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `link_title` varchar(50) NOT NULL DEFAULT '',
  `link_url` VARCHAR(255) NOT NULL,
  `link_newtab` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 ;

*/
    //echo "<hr>update_tbl_category<br>{$sql}<hr>";
    $xoopsDB->query($sql);
}
/***************************************
 *
 * *************************************/
    update_tbl_category_230();
    add_tbl_links_230();

?>