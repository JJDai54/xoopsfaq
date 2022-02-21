<?php
/**
 * Name: modinfo.php
 * Description:
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
 * @subpackage : Menu Language
 * @since 2.5.7
 * @author John Neill
 * @version $Id: modinfo.php 0000 10/04/2009 09:08:46 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
include_once "common.php";


/**
 * Module Version
 */
define( '_MI_FAQ_XOOPSFAQ_NAME', 'Xoops FAQ' );
define( '_MI_FAQ_XOOPSFAQ_DESC', 'Xoops FAQ Manager' );

/**
 * Module Menu
 */
define( '_MI_FAQ_MENU_MODULEHOME', 'Module Home' );
define( '_MI_FAQ_MENU_MODULEBLOCKS', 'Blocks' );
define( '_MI_FAQ_MENU_MODULETEMPLATES', 'Templates' );
define( '_MI_FAQ_MENU_MODULECOMMENTS', 'Comments' );
define( '_MI_FAQ_MENU_ADMININDEX', 'Index' );
define( '_MI_FAQ_MENU_ADMINCATEGORY', 'Category' );
define( '_MI_FAQ_MENU_PERMISSIONS', 'Permissions');

/**
 * Module Prefs
 */
define( '_MI_FAQ_XOOPSFAQ_EDITORS', 'Select Editor:' );
define( '_MI_FAQ_XOOPSFAQ_EDITORS_DSC', 'Please select the editor you would like to use? <br />You maybe required to install an editor before you can use it.' );
 /***********************************************************************/

define( '_MI_FAQ_MENU_QUESTIONS', 'Questions' );

define( '_MI_FAQ_MENU_ADMINCATEGORYS', 'Catégory' );

define("_MI_FAQ_XOOPSFAQ_INFO" , "
<p>Management of FAQ.</p>
<p>It is a great update.</p>
<h4>Fonctions :</h4>
<ul>  
  <li>Intégration du framework 'moduleadmin'</li>
  <li>Updtate for Xoops 2.5.7 & more.</li>  
</ul>
");

define( '_MI_FAQ_SHOWHIDE_OK', "<span style='color:green;'>Le plugin 'showHide.js' est installé<br>{$f}</span>" );
define( '_MI_FAQ_SHOWHIDE_NO', "<span style='color:red;'>Le plugin 'showHide.js' n'est pas installé<br>{$f}</span>" );


?>