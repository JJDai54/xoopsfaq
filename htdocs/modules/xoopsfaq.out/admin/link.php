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

$isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_LINKS);
if (!$isPermit) redirect_header(_FAQ_XURL . 'admin/index.php', 1, _NOPERM );
//----------------------------------------------------------------------

$link_handler = xoops_getModuleHandler( 'link' );

$op = xoopsFaq_CleanVars( $_REQUEST, 'op', 'default', 'string' );
switch ( $op ) {
	case 'add':
	case 'edit':
		$link_id = xoopsFaq_CleanVars( $_REQUEST, 'link_id', 0, 'int' );
		$obj = ( $link_id == 0 ) ? $link_handler->create() : $link_handler->get( $link_id );

		if ( is_object( $obj ) ) {
			xoops_cp_header();
			xoopsFaq_DisplayHeading( _AM_FAQ_LINKS_HEADER, _MA_FAQ_LINK_EDIT_DSC, false );
			$obj->displayForm();
		} else {
			$link_handler->displayError( _AM_FAQ_ERRORCOULDNOTEDITLINK );
		}
		break;

	case 'delete':
		$ok = xoopsFaq_CleanVars( $_REQUEST, 'ok', 0, 'int' );
		$link_id = xoopsFaq_CleanVars( $_REQUEST, 'link_id', 0, 'int' );

		if ( $ok == 1 ) {
			$obj = $link_handler->get( $link_id );
			if ( is_object( $obj ) ) {
				if ( $link_handler->delete( $obj ) ) {
// 					$sql = sprintf( 'DELETE FROM %s WHERE contents_id = %u', $xoopsDB->prefix( 'xoopsfaq_contents' ), $contents_id );
// 					$xoopsDB->query( $sql );
					// delete comments
//					xoops_comment_delete( $xoopsModule->getVar( 'mid' ), $link_id );
                    $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                    if ($source == '')
					    redirect_header("link.php?link_id={$link_id}", 1, _AM_FAQ_DBSUCCESS );
                    else {
    				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                    }

				}
			}
			$link_handler->displayError( _AM_FAQ_ERRORCOULDNOTDELCAT );
		} else {
			xoops_cp_header();
			xoopsFaq_DisplayHeading( _AM_FAQ_LINK_HEADER, _AM_FAQ_LINK_DELETE_DSC, false );
            $params = array('op'          => 'delete',
                            'link_id' => $link_id,
                            'ok'          => 1 ,
                            'source' => xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' ));
			xoops_confirm($params, 'link.php', _AM_FAQ_CONFIRM_DEL_LINK );
		}
		break;

	case 'save':
		if ( !$GLOBALS['xoopsSecurity']->check() ) {
			redirect_header( 'contents.php', 0, $GLOBALS['xoopsSecurity']->getErrors( true ) );
		}
		$link_id = xoopsFaq_CleanVars( $_REQUEST, 'link_id', 0, 'int' );

		$obj = ( $link_id == 0 ) ? $link_handler->create() : $link_handler->get( $link_id );
		if ( is_object( $obj ) ) {
			$obj->setVars( $_REQUEST );
			$ret = $link_handler->insert( $obj, true );


			if ( $ret ) {
                $source = xoopsFaq_CleanVars( $_REQUEST, 'source', '', 'string' );
                if ($source == '')
				    redirect_header( "link.php?link_id={$link_id}", 1, _AM_FAQ_DBSUCCESS );
                else {
				    redirect_header( _FAQ_XURL . "{$source}", 1, _AM_FAQ_DBSUCCESS );
                }

			}
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

		xoopsFaq_DisplayHeading( _AM_FAQ_LINKS_HEADER, _AM_FAQ_LINKS_LIST_DSC, false );
		$link_handler->displayAdminListing();
		break;
}
xoopsFaq_cp_footer();

?>
