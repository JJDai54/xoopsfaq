<?php
/*
 You may not change or alter any portion of this comment or credits of
 supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit
 authors.

 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * Module: RandomQuote
 *
 * @category        Module
 * @package         randomquote
 * @author          XOOPS Module Development Team
 * @author          Mamba
 * @copyright       {@link http://xoops.org 2001-2016 XOOPS Project}
 * @license         {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @link            http://xoops.org XOOPS
 * @since           2.00
 */
use Xmf\Request;

include 'admin_header.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
xoops_load('XoopsFormLoader');
xoops_load('XoopsGroupPermForm');
use Permissions as Permissions;


$isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_PERMISSIONS);
if (!$isPermit) redirect_header(_FAQ_XURL . 'admin/index.php', 1, _NOPERM );
//----------------------------------------------------------------------

$moduleId = $xoopsModule->getVar('mid');

$p = array_merge($_POST, $_GET);
//echo "<hr><pre>" . print_r($p, true) . "</pre><hr>";

$op = (isset($p['op'])) ? $p['op'] : '';
$perms = (isset($p['perms'])) ? $p['perms'] : '';

	  xoops_cp_header();
      //------------------------------------------------------------------------

      //$labCategory = new XoopsFormLabel( _AM_FAQ_CONTENTS_CATEGORY);
      $url = _FAQ_XURL . "admin/permissions.php?";
      $opform    = new XoopsSimpleForm('', 'opform', $url, 'post');
      //$perm = (isset($_POST['perm'])) ? $_POST['perm'] : 'consult';
      $inpPerm = new XoopsFormSelect( _AM_FAQ_PERMISSIONS, 'perms',  $perms, 1 ,"");
      $inpPerm->setExtra('onchange="document.forms.opform.submit()"');
      $inpPerm->addOption(_FAQ_PREFIX_PERM_ADMIN,       _AM_FAQ_ADMIN);
      $inpPerm->addOption(_FAQ_PREFIX_PERM_CAT_CONSULT, _AM_FAQ_CATS_CONSULT);

      $opform->addElement($inpPerm);
      $opform->display();
      //----------------------------------------------------

      switch ($perms){
        case _FAQ_PREFIX_PERM_CAT_CONSULT:
          $category_handler = xoops_getModuleHandler( 'category' );
          $catsObj = $category_handler->getCategories();

          $params = array();


          $titleOfForm = ''; //_AM_EXTCAL_AUTOAPPROVE_PERMISSION;
          $permName    = sprintf("%s_%s",'xf' , $perm);
          $permName    = 'xf_cats_consult';
          $permDesc    = ''; //_AM_EXTCAL_AUTOAPPROVE_PERMISSION_DESC;
          $form        = new XoopsGroupPermForm($titleOfForm, $moduleId, $permName, $permDesc, "admin/permissions.php?perms={$perms}");

          foreach ($catsObj['list'] as $cat) {
              $form->addItem($cat->getVar('category_id'), $cat->getVar('category_title'));
          }

          break;
    //---------------------------------------------------------------------
    case 'test':
    // DELETE FROM `x251_group_permission` WHERE `gperm_modid`=6;
        $permissions = Permissions\getPermissions(_FAQ_PREFIX_PERM_CAT_CONSULT);
        //echo "<hr>===>perm array = " . print_r($permissions, true) . "<br>";
        echo "==============================================<br>";

        $permissions = Permissions\getPermissions(_FAQ_PREFIX_PERM_ADMIN);
        //echo "<hr>===>perm consult = {$permissions}<br>";
        echo "==============================================<br>";
        //exit;
        break;



      //---------------------------------------------------------------------
      case 'default':
      default:
          $titleOfForm = ''; //_AM_EXTCAL_AUTOAPPROVE_PERMISSION;
          $permName    = _FAQ_PREFIX_PERM_ADMIN;
          $permDesc    = ''; //_AM_EXTCAL_AUTOAPPROVE_PERMISSION_DESC;
          $form        = new XoopsGroupPermForm($titleOfForm, $moduleId, $permName, $permDesc, "admin/permissions.php?perms={$perms}");
          $form->addItem(_FAQ_PERM_MODULE,      _AM_FAQ_PERMS_ADM_MODULE);
          $form->addItem(_FAQ_PERM_CATEGORYS,   _AM_FAQ_PERMS_ADM_CATEGORYS);
          $form->addItem(_FAQ_PERM_QUESTIONS,   _AM_FAQ_PERMS_ADM_FAQ);
          $form->addItem(_FAQ_PERM_LINKS,       _AM_FAQ_PERMS_ADM_LINKS);
          $form->addItem(_FAQ_PERM_PERMISSIONS, _AM_FAQ_PERMS_ADM_PERMS);
          break;
    }

    echo $form->render();
    xoopsFaq_cp_footer();




//--------------------------------------------------------------















