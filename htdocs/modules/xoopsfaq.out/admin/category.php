<?php
/**
 * Name: category.php
 * Description: Category Admin file
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
 * @subpackage : Xoops FAQ ADmin
 * @since 2.5.7
 * @author John Neill
 * @version $Id: category.php 0000 10/04/2009 08:57:46 John Neill $
 */
include 'admin_header.php';
include_once "..//include/functions-color-set.php";
use colorSet AS colorSet;
use Permissions AS Permissions;

$isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_CATEGORYS);
if (!$isPermit) redirect_header(_FAQ_XURL . 'admin/index.php', 1, _NOPERM );
//----------------------------------------------------------------------
$category_handler = xoops_getModuleHandler( 'category' );

$op = xoopsFaq_CleanVars( $_REQUEST, 'op', 'default', 'string' );
switch ( $op ) {
    case 'add':
	case 'edit':
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 1 );
		xoopsFaq_DisplayHeading( _AM_FAQ_CATEGORY_HEADER, _MA_FAQ_CATEGORY_EDIT_DSC, false );
		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'category_id', 0, 'int' );
		$obj = ( $category_id == 0 ) ? $category_handler->create() : $category_handler->get( $category_id );
		if ( is_object( $obj ) ) {
			$obj->displayForm();
		} else {
			$category_handler->displayError( _AM_FAQ_ERRORCOULDNOTEDITCAT );
		}
		break;

	case 'delete':
		$ok = xoopsFaq_CleanVars( $_REQUEST, 'ok', 0, 'int' );
		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'category_id', 0, 'int' );
		if ( $ok == 1 ) {
			$obj = $category_handler->get( $category_id );
			if ( is_object( $obj ) ) {
				if ( $category_handler->delete( $obj ) ) {
					$sql = sprintf( 'DELETE FROM %s WHERE category_id = %u', $xoopsDB->prefix( 'xoopsfaq_contents' ), $category_id );
					$xoopsDB->query( $sql );
					// delete comments
					xoops_comment_delete( $xoopsModule->getVar( 'mid' ), $category_id );
					redirect_header( 'category.php', 1, _AM_FAQ_DBSUCCESS );
				}
			}
			$category_handler->displayError( _AM_FAQ_ERRORCOULDNOTDELCAT );
		} else {
			xoops_cp_header();
//			xoopsFaq_AdminMenu( 1 );
			xoopsFaq_DisplayHeading( _AM_FAQ_CATEGORY_HEADER, _AM_FAQ_CATEGORY_DELETE_DSC, false );
			xoops_confirm( array( 'op' => 'delete', 'category_id' => $category_id, 'ok' => 1 ), 'category.php', _AM_FAQ_RUSURECAT );
		}
		break;

	case 'save':
		if ( !$GLOBALS['xoopsSecurity']->check() ) {
			redirect_header( $this->url, 0, $GLOBALS['xoopsSecurity']->getErrors( true ) );
		}
		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'category_id', 0, 'int' );
		$obj = ( $category_id == 0 ) ? $category_handler->create() : $category_handler->get( $category_id );
		if ( is_object( $obj ) ) {
			$obj->setVar( 'category_title', xoopsFaq_CleanVars( $_REQUEST, 'category_title', '', 'string' ) );
			$obj->setVar( 'category_order', xoopsFaq_CleanVars( $_REQUEST, 'category_order', 0, 'int' ) );           
			$obj->setVar( 'category_active', xoopsFaq_CleanVars( $_REQUEST, 'category_active', 0, 'int' ) );           
			$obj->setVar( 'category_color_set', xoopsFaq_CleanVars( $_REQUEST, 'category_color_set', '', 'string' ) );
			$obj->setVar( 'category_show_hidetext', xoopsFaq_CleanVars( $_REQUEST, 'show_hidetext', 0, 'int' ) );
			$obj->setVar( 'category_hidetext_align', xoopsFaq_CleanVars( $_REQUEST, 'hidetext_align', 0, 'int' ) );

            if ( $category_handler->insert( $obj, true ) ) {
                $cid = $obj->getVar("category_id");
                Permissions\addPermissions(_FAQ_PREFIX_PERM_CAT_CONSULT, $cid);
                //exit("===> cid = {$cid}");
                $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                if ($source == '')
  				      redirect_header( 'category.php', 1, _AM_FAQ_DBSUCCESS );
                else {
				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                }

			}
		}
		$category_handler->displayError( _AM_FAQ_ERRORCOULDNOTADDCAT );
		break;

    
	case 'active':
// 		if ( !$GLOBALS['xoopsSecurity']->check() ) {
// 			redirect_header( 'contents.php', 0, $GLOBALS['xoopsSecurity']->getErrors( true ) );   
// 		}
//       $t=print_r($_REQUEST,true);
//       echo "id={$contents_id}<pre>".$t."</pre>";
//       exit;
		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'category_id', 0, 'int' );
		$category_active = xoopsFaq_CleanVars( $_REQUEST, 'category_active', 1, 'int' );
		$obj = ( $category_id == 0 ) ? $category_handler->create() : $category_handler->get( $category_id );
		if ( is_object( $obj ) ) {
			$obj->setVars( $_REQUEST );
			$obj->setVar( 'category_active', $category_active );
			$ret = $category_handler->insert( $obj, true );
      
      
      
			if ( $ret ) {
                $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                if ($source == '')
                    redirect_header( 'category.php', 1, _AM_FAQ_DBSUCCESS );
                else {
				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                }
			}
		}
		$category_handler->displayError( $ret );
		break;
    	case 'order':
// 		if ( !$GLOBALS['xoopsSecurity']->check() ) {
// 			redirect_header( 'category.php', 0, $GLOBALS['xoopsSecurity']->getErrors( true ) );   
// 		}
//       $t=print_r($_REQUEST,true);
//       echo "op=order<pre>".$t."</pre>";
      
      foreach($_REQUEST['category_order']  as $category_id=>$category_order)
      {
        echo $category_id."=". $category_order. " |";
		    $obj = $category_handler->get( $category_id );
	 		 $obj->setVar( 'category_order', $category_order );
			 $ret = $category_handler->insert( $obj, false );
      } 

	case 'default':
	default:
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 1 );
    $index_admin = new ModuleAdmin();
    //echo $index_admin->addNavigation('xoopsfaq');
    $url = _FAQ_XURL . 'admin/'. basename( $_SERVER['SCRIPT_FILENAME'] ) . '?op=edit&value=' . _AM_FAQ_CREATENEW ;
    $index_admin->addItemButton(_ADD, $url, 'add',"");
    echo  $index_admin->renderButton('right', '');


		xoopsFaq_DisplayHeading( _AM_FAQ_CATEGORY_HEADER, _AM_FAQ_CATEGORY_LIST_DSC, false );
		$category_handler->displayAdminListing();
		break;
}
xoopsFaq_cp_footer();

?>
