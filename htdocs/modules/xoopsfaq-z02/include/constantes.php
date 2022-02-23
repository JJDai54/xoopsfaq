<?php
/**
 * Name: constantes.php
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
 * @author Jean-Jacques DELALANDRE
 * @version $Id: functions.php 0000 10/01/20126 09:03:22 John Neill $
 */
 
define('XFAQ_SHOW_TPL_NAME', 0);
define('XFAQ_MODE', 1); //0 : old mode

//define('XOOPS_MA_URL', XOOPS_URL . '/Frameworks/moduleclasses');
define('_FAQ_DIRNAME', 'xoopsfaq');
define('_FAQ_FLD', "/modules/" . _FAQ_DIRNAME ."/");
define('_FAQ_XURL', XOOPS_URL . _FAQ_FLD);
define('_FAQ_PATH', XOOPS_ROOT_PATH . "/modules/" . _FAQ_DIRNAME ."/");
define('_FAQ_PATHICON16', "/Frameworks/moduleclasses/icons/16/");
define('_FAQ_PATHICON32', "/Frameworks/moduleclasses/icons/32/");

define('_FAQ_ICONE16',  XOOPS_URL . _FAQ_PATHICON16);
define('_FAQ_ICONE32',  XOOPS_URL . _FAQ_PATHICON32);

define('_FAQ_ON',  _FAQ_ICONE16 . "on.png");
define('_FAQ_OFF', _FAQ_ICONE16 . "off.png");

// define('_FAQ_PREFIX_PERM_MOD',   "xoopsfaq");
// define('_FAQ_PREFIX_PERM_CAT',   "cat");
// define('_FAQ_PREFIX_PERM_ACTION', "admin,manage,consult");
// define('_FAQ_PREFIX_PERM_MODULE', "module");
// define('_FAQ_PREFIX_PERM_CAT_CONSULT', "cat_consult");

define('_FAQ_PREFIX_PERM_ADMIN', "xf_admin_perms");
define('_FAQ_PREFIX_PERM_CAT_CONSULT', "xf_cats_consult");


define('_FAQ_PERM_MODULE',      1);
define('_FAQ_PERM_CATEGORYS',   2);
define('_FAQ_PERM_QUESTIONS',   3);
define('_FAQ_PERM_PERMISSIONS', 4);
define('_FAQ_PERM_LINKS',       5);






?>