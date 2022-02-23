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


require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
$adminObject = Xmf\Module\Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));
$adminObject->setPaypal('jjdelalandre@orange.fr');
$adminObject->displayAbout(false);

//require_once __DIR__ . '/admin_footer.php';
xoops_cp_footer();


?>