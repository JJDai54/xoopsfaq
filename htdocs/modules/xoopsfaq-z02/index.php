<?php
/**
 * Name: index.php
 * Description: Dispaly user side code, categories and faq answers
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
 * @subpackage : User side code
 * @since 2.5.7
 * @author John Neill
 * @version $Id: index.php 0000 10/04/2009 09:22:12 John Neill $
 */
include_once 'header.php';
include_once 'include/functions.php';
include_once 'include/constantes.php';
require_once _FAQ_PATH . '/include/functions-permissions.php';
use Permissions AS Permissions;

// $mode = (isset($_REQUEST['mode'])) ? $_REQUEST['mode'] : 99;
// global $xoopsModuleConfig;

$mode= $xoopsModuleConfig['mode_version'];


switch ($mode){
    case 0:
      include_once  "index-v220.php";
      break;

    case 1:
    default;
      include_once "index-faqByCategory.php";
      break;
    }
?>