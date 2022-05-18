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

use Permissions AS Permissions;

$isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_QUESTIONS);
if (!$isPermit) redirect_header(_FAQ_XURL . 'admin/index.php', 1, _NOPERM );
//----------------------------------------------------------------------

$contents_handler = xoops_getModuleHandler( 'contents' );

$op = xoopsFaq_CleanVars( $_REQUEST, 'op', 'default', 'string' );
switch ( $op ) {
	case 'add':
	case 'edit':
		$contents_id = xoopsFaq_CleanVars( $_REQUEST, 'contents_id', 0, 'int' );
		$obj = ( $contents_id == 0 ) ? $contents_handler->create() : $contents_handler->get( $contents_id );

		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'cat_id', 0, 'int' );
        //echo "===>category_id = {$category_id}<br>";
        if ($category_id > 0) $obj->setVar('contents_cid', $category_id);
		if ( is_object( $obj ) ) {
			xoops_cp_header();
			xoopsFaq_DisplayHeading( _AM_FAQ_CONTENTS_HEADER, _MA_FAQ_CATEGORY_EDIT_DSC, false );
			$obj->displayForm();
		} else {
			$contents_handler->displayError( _AM_FAQ_ERRORCOULDNOTEDITCAT );
		}
		break;

	case 'delete':
		$ok = xoopsFaq_CleanVars( $_REQUEST, 'ok', 0, 'int' );
		$contents_id = xoopsFaq_CleanVars( $_REQUEST, 'contents_id', 0, 'int' );
		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'category_id', 0, 'int' );
		if ( $ok == 1 ) {
			$obj = $contents_handler->get( $contents_id );
			if ( is_object( $obj ) ) {
				if ( $contents_handler->delete( $obj ) ) {
					$sql = sprintf( 'DELETE FROM %s WHERE contents_id = %u', $xoopsDB->prefix( 'xoopsfaq_contents' ), $contents_id );
					$xoopsDB->query( $sql );
					// delete comments
					xoops_comment_delete( $xoopsModule->getVar( 'mid' ), $contents_id );
                    $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                    if ($source == '')
					    redirect_header("contents.php?category_id={$category_id}", 1, _AM_FAQ_DBSUCCESS );
                    else {
    				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                    }

				}
			}
			$contents_handler->displayError( _AM_FAQ_ERRORCOULDNOTDELCAT );
		} else {
			xoops_cp_header();
			xoopsFaq_DisplayHeading( _AM_FAQ_CONTENTS_HEADER, _AM_FAQ_CATEGORY_DELETE_DSC, false );
            $params = array('op'          => 'delete',
                            'contents_id' => $contents_id,
                            'ok'          => 1 ,
                            'category_id' => $category_id ,
                            'source' => xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' ));
			xoops_confirm($params, 'contents.php', _AM_FAQ_RUSURECAT );
		}
		break;

	case 'save':
		if ( !$GLOBALS['xoopsSecurity']->check() ) {
			redirect_header( 'contents.php', 0, $GLOBALS['xoopsSecurity']->getErrors( true ) );
		}
		$contents_id = xoopsFaq_CleanVars( $_REQUEST, 'contents_id', 0, 'int' );

		$obj = ( $contents_id == 0 ) ? $contents_handler->create() : $contents_handler->get( $contents_id );
		if ( is_object( $obj ) ) {
			$obj->setVars( $_REQUEST );
			$obj->setVar( 'contents_publish', strtotime(xoopsFaq_transformDate2Local($_REQUEST['contents_publish'] ) ) );
			$obj->setVar( 'dohtml', isset( $_REQUEST['dohtml'] ) ? 1 : 0 );
			$obj->setVar( 'dosmiley', isset( $_REQUEST['dosmiley'] ) ? 1 : 0 );
			$obj->setVar( 'doxcode', isset( $_REQUEST['doxcode'] ) ? 1 : 0 );
			$obj->setVar( 'doimage', isset( $_REQUEST['doimage'] ) ? 1 : 0 );
			$obj->setVar( 'dobr', isset( $_REQUEST['dobr'] ) ? 1 : 0 );
			$ret = $contents_handler->insert( $obj, true );

		    $category_id = $obj->getVar('contents_cid');

//       $t=print_r($_REQUEST,true);
//       echo "<pre>".$t."</pre>";
//       exit;
			if ( $ret ) {
                $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                if ($source == '')
				    redirect_header( "contents.php?category_id={$category_id}", 1, _AM_FAQ_DBSUCCESS );
                else {
				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                }

			}
		}
		$contents_handler->displayError( $ret );
		break;
    
	case 'active':
		$contents_id = xoopsFaq_CleanVars( $_REQUEST, 'contents_id', 0, 'int' );
		$contents_active = xoopsFaq_CleanVars( $_REQUEST, 'contents_active', 1, 'int' );
		$category_id = xoopsFaq_CleanVars( $_REQUEST, 'category_id', 0, 'int' );

		$obj = ( $contents_id == 0 ) ? $contents_handler->create() : $contents_handler->get( $contents_id );
		if ( is_object( $obj ) ) {
			$obj->setVars( $_REQUEST );
			$obj->setVar( 'contents_active', $contents_active );
			$ret = $contents_handler->insert( $obj, true );
      
      
      
			if ( $ret ) {

                $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                if ($source == '')
				    redirect_header("contents.php?category_id={$category_id}", 1, _AM_FAQ_DBSUCCESS );
                else {
				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                }
			}
		}
		$contents_handler->displayError( $ret );
		break;
    
	case 'order':

        foreach($_REQUEST['contents_weight']  as $contents_id=>$contents_weight)
        {
              //echo $contents_id."=". $contents_weight. " |";
  		    $obj = $contents_handler->get( $contents_id );
  	 		$obj->setVar( 'contents_weight', $contents_weight );
  			$ret = $contents_handler->insert( $obj, false );
        }
        $ret = true;
      
		if ( $ret ) {
            $category_id = (isset($_REQUEST['category_id'])) ? $_REQUEST['category_id'] : 0;
			redirect_header("contents.php?category_id={$category_id}", 1, _AM_FAQ_DBSUCCESS );
		}
		$contents_handler->displayError( $ret );
		break;

	case 'default':
	default:
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 0 );

    $index_admin = new ModuleAdmin();
    //echo $index_admin->addNavigation('xoopsfaq');
    $url = _FAQ_XURL . 'admin/'. basename( $_SERVER['SCRIPT_FILENAME'] ) . '?op=edit&value=' . _AM_FAQ_CREATENEW ;
    $index_admin->addItemButton(_ADD, $url, 'add',"");
    echo  $index_admin->renderButton('right', '');

		xoopsFaq_DisplayHeading( _AM_FAQ_CONTENTS_HEADER, _AM_FAQ_CONTENTS_LIST_DSC, false );
		$contents_handler->displayAdminListing();
		break;
}
xoopsFaq_cp_footer();

?>
