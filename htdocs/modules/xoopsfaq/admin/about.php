<?php
/**
 * cabinet module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright	The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license             http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package	cabinet
 * @since		2.3.0
 * @author 		JJDai <http://xoops.kiolo.com> - Kris <http://www.xoofoo.org>
 * @version		$Id$
**/






// $menu = cab_getMainMenu(false);
// $xoopsTpl->assign("cabinet_menu", $menu->_items );
//
//   $toolsBarre = cab_getMainMenu (true);
//   $xoopsTpl->assign('toolsBarre', $toolsBarre->_items);
//
//
//
// $xoopsTpl->display('db:cabinet_index.html');
//
// include(XOOPS_ROOT_PATH."/footer.php");;



include "admin_header.php";
//$idCabinet = ((isset($p['idCabinet'])) ? $p['idCabinet'] : 0);
$_SESSION['domaine'] = _AM_JJD_ABOUT;

xoops_cp_header();

$module_info = $module_handler->get( $xoopsModule->getVar("mid") );

$xoopsTpl->assign("module_name",            $xoopsModule->getVar("name") );
$xoopsTpl->assign("module_dirname",         $xoopsModule->getVar("dirname") );
$xoopsTpl->assign("module_image",           $module_info->getInfo("image") );
$xoopsTpl->assign("module_version",         $module_info->getInfo("version") );
//$xoopsTpl->assign("module_release",         $module_info->getInfo("release") );
$xoopsTpl->assign("module_author",          $module_info->getInfo("author") );
$xoopsTpl->assign("module_credits",         $module_info->getInfo("credits") );
$xoopsTpl->assign("module_license_url",     $module_info->getInfo("license_url") );
$xoopsTpl->assign("module_license",         $module_info->getInfo("license") );
$xoopsTpl->assign("module_status",          $module_info->getInfo("module_status") );
$xoopsTpl->assign("module_website_url",     $module_info->getInfo("module_website_url") );
$xoopsTpl->assign("module_website_name",    $module_info->getInfo("module_website_name") );
$xoopsTpl->assign("author_website_url",     $module_info->getInfo("author_website_url") );
$xoopsTpl->assign("author_website_name",    $module_info->getInfo("author_website_name") );
//$xoopsTpl->assign("paypal_link",    $module_info->getInfo("paypal_link") );
$xoopsTpl->assign("paypal_link",    "https://paypal.me/JJDELALANDRE?locale.x=fr_FR" );

global $xoopsModule;
$xoopsTpl->assign("module_update_date", formatTimestamp($xoopsModule->getVar("last_update"),"m") );

if ( is_readable( $changelog = XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar("dirname") . "/docs/changelog.txt" ) ){
    $xoopsTpl->assign("changelog",          implode("<br />", file( $changelog ) ) );
}



//   $toolsBarre = med_getMainMenu (0);
//   $xoopsTpl->assign('toolsBarre', $toolsBarre->_items);
//   $xoopsTpl->assign('session', $_SESSION);

$xoopsTpl->display("db:admin/" . $xoopsModule->getVar("dirname") . "_about.html");


// Define Stylesheet and JScript
// $xoTheme->addStylesheet( XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/css/admin.css" );

// include "footer.php";
//include(XOOPS_ROOT_PATH."/footer.php");



xoops_cp_footer();




//    redirect_header("patient.php?op=list&idPatient=0&idOnglet=", 0, '');

?>
