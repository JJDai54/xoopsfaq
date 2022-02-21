<?php
/**
 * Name: menu.php
 * Description: Menu for the Xoops FAQ Module
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
 * @package : Xoops
 * @Module : Xoops FAQ
 * @subpackage : Xoops FAQ Adminisration
 * @since 2.5.7
 * @author John Neill
 * @version $Id: menu.php 0000 10/04/2009 08:55:20 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
/**
 * Admin Menus
 */
$pathIcon32 = 'images/icons/32/';
$showAllTabs = false;
require_once XOOPS_ROOT_PATH . '/modules/xoopsfaq/include/constantes.php';
require_once XOOPS_ROOT_PATH . '/modules/xoopsfaq/include/functions-permissions.php';
use Permissions AS Permissions;

$adminmenu[] = array( 'title' => _MI_FAQ_MENU_ADMININDEX, 
                      'link' => 'admin/index.php',
                      'icon' => $pathIcon32 . 'index.png',
                      'menu' => '',
                      'desc' => '' );
                      
if ($showAllTabs || Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_CATEGORYS))
$adminmenu[] = array( 'title' => _MI_FAQ_MENU_ADMINCATEGORYS,
                      'link' => 'admin/category.php',
                      'icon' => $pathIcon32 . 'category.png',
                      'menu' => 'categorie',
                      'desc' => '' );


if ($showAllTabs || Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_QUESTIONS))
$adminmenu[] = array( 'title' => _MI_FAQ_MENU_QUESTIONS,
                      'link' => 'admin/contents.php',
                      'icon' => $pathIcon32 . 'contents.png',
                      'menu' => 'questions',
                      'desc' => '' );



$adminmenu[] = array('title' => _MI_FAQ_MENU_LINKS,
                     'link'  => 'admin/link.php',
                     'icon'  => "{$pathIcon32}/link.png",
                     'menu'  => 'links',
                     'desc'  => '');

if ($showAllTabs || Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_PERMISSIONS))
$adminmenu[] = array('title' => _MI_FAQ_MENU_PERMISSIONS,
                     'link'  => 'admin/permissions.php',
                     'icon'  => $pathIcon32 . 'permissions.png',
                     'menu'  => 'permissions',
                     'desc'  => '');

$adminmenu[] = array('title' => _MI_FAQ_MENU_ABOUT,
                     'link'  => 'admin/about.php',
                     'icon'  => "{$pathIcon32}/about.png",
                     'menu'  => 'about',
                     'desc'  => '');

$adminmenu[] = array('title' => _MI_FAQ_MENU_ABOUT,
                     'link'  => 'admin/about-old.php',
                     'icon'  => "{$pathIcon32}/about.png",
                     'menu'  => 'about-old',
                     'desc'  => '');

?>   