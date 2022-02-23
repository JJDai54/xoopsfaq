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

function update_tbl_contents()
{
global $xoopsDB;
    $table=$xoopsDB->prefix("xoopsfaq_contents");
    $sql = "SHOW COLUMNS FROM {$table}";

    $rst=$xoopsDB->query($sql);
    $cols = array();
    while ($row = $xoopsDB->fetchArray($rst))
    {
      $cols[$row['Field']] = $row['Field'];
    }

    //---------------------------------------------------------------
    if (!isset($cols['contents_answer']))
    {

$sql = <<<__sql__
ALTER TABLE `{$table}`
   ADD `contents_answer` VARCHAR(255) NOT NULL;
__sql__;

      $xoopsDB->queryF($sql);
    }
    //---------------------------------------------------------------
    if (!isset($cols['contents_seealso1']))
    {
$sql = <<<__sql__
ALTER TABLE `{$table}`
   ADD `contents_seealso1` VARCHAR(255) NOT NULL,
   ADD `contents_libseealso1` VARCHAR(50) NOT NULL,
   ADD `contents_seealso2` VARCHAR(255) NOT NULL,
   ADD `contents_libseealso2` VARCHAR(50) NOT NULL,
   ADD `contents_seealso3` VARCHAR(255) NOT NULL,
   ADD `contents_libseealso3` VARCHAR(50) NOT NULL;
__sql__;

// $t=print_r($cols,true);
// echo "<pre>".$t."</pre>";
// echo $sql;
// exit;

      $xoopsDB->queryF($sql);
    } }


function update_tbl_category()
{
global $xoopsDB;
    $table=$xoopsDB->prefix("xoopsfaq_categories");
    $sql = "SHOW COLUMNS FROM {$table}";

    $rst=$xoopsDB->query($sql);
    $cols = array();
    while ($row = $xoopsDB->fetchArray($rst))
    {
      $cols[$row['Field']] = $row['Field'];
    }

    //---------------------------------------------------------------
    if (!isset($cols['category_active']))
    {

$sql = <<<__sql__
ALTER TABLE `{$table}`
  ADD `category_active` TINYINT(1) NOT NULL DEFAULT '1' ;
__sql__;

      $xoopsDB->queryF($sql);
    }
}
//----------------------------------------------------------------------------

echo "<hr>xoops_module_update_xoopsfaq<hr>";
    update_tbl_contents();
    update_tbl_category();

?>