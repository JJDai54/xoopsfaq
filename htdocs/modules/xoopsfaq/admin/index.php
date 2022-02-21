<?php
/**
 * Name: index.php
 * Description: Admin Index File for Xoops FAQ Admin
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
 * @subpackage : Xoops FAQ Admin
 * @since 2.5.7
 * @author John Neill
 * @version $Id: index.php 0000 10/04/2009 08:56:26 John Neill $
 */
include 'admin_header.php';

$contents_handler = xoops_getModuleHandler( 'contents' );
xoops_cp_header();

global $xoopsModule;
$dirname = $xoopsModule->getVar("dirname");		
$module_info = $module_handler->get( $xoopsModule->getVar("mid") );
//include_once XOOPS_ROOT_PATH."/modules/" . $dirname . "/class/menu.php";
//-------------------------------------------------------------------


$p = array_merge($_POST, $_GET);
$op = ((isset($p['op'])) ? $p['op'] : 'list');
//$module = ((isset($p['module'])) ? $p['module'] : '');
$menu = ((isset($p['menu'])) ? $p['menu'] : '');
//------------------------------------------------------------------

if ($menu ==''){
  if ($isFwModuleAdmin){
      $index_admin = new ModuleAdmin();
      
      $index_admin->addInfoBox('id');
      $index_admin->addInfoBoxLine('id', "ID Module : " . $xoopsModule->getVar('mid'));
      $index_admin->addInfoBoxLine('id', "Dossier : " . $xoopsModule->getVar('dirname'));
  //echoArray($xoopsModule);
      $index_admin->addInfoBox('description');
      $index_admin->addInfoBoxLine('description',_MI_FAQ_XOOPSFAQ_INFO, '', '', 'information');    
      
      $f = XOOPS_PATH . "/Frameworks/jquery/plugins/showHide.js";
      $msg = (file_exists($f)) ? _MI_FAQ_SHOWHIDE_OK  : _MI_FAQ_SHOWHIDE_NO;
      $index_admin->addInfoBoxLine('description', sprintf($msg, $f), '', '', 'information');

      echo $index_admin->addNavigation('index.php');
      

      echo  $index_admin->renderButton('right', '');
      
      echo $index_admin->renderIndex();
  }
}else{
//exit;
  admin_controleur($dirname, $menu, $op, $p);
}











xoopsFaq_cp_footer();

?>