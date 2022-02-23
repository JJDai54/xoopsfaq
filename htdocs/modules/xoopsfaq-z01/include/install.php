<?php
/**
 * Name: functions.php
 * Description: Module specific Functions for Xoops FAQ
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
 * @subpackage : Functions
 * @since 2.5.7
 * @author JEan-Jacques DELALANDRE
 * @version $Id: functions.php 0000 10/04/2009 09:03:22 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
//include_once "constantes.php";

/*************************************************
 *
 * ***********************************************/
function xoops_module_install_xoopsfaq(&$module) {   }

/*************************************************
 *
 * ***********************************************/
function xoops_module_uninstall_xoopsfaq(&$module) {   }

/*************************************************
 *
 * ***********************************************/
function xoops_module_update_xoopsfaq(XoopsModule $module, $installedVersion = null) {
    xoops_loadLanguage('admin', $module->dirname());
    $errors = 0;

    if ($installedVersion < 220) include_once "versions/xoopsfaq-220.php";

    if ($installedVersion < 230) include_once "versions/xoopsfaq-230.php";

    return $errors ? false : true;

}      




     
?>