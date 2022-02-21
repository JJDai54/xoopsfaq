<?php
/**
 * Name: category.php
 * Description: Xoops FAQ Category Class
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
 * @subpackage : Xoops FAQ Category
 * @since 2.3.0
 * @author Jean-Jacques DELALANDRE
 * @version $Id: category.php 0000 10/04/2009 08:59:26 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

/**
 * XoopsfaqCategory
 *
 * @package Xoops FAQ
 * @author John Neill
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqGroups extends XoopsObject {
	/**
	 * XoopsfaqCategory::__construct()
	 */
	function __construct() {
		$this->XoopsObject();
		$this->initVar( 'contents_id', XOBJ_DTYPE_INT, null, false );
		$this->initVar( 'groupid', XOBJ_DTYPE_INT, null, null, false );
	}

	/**
	 * XoopsfaqCategory::XoopsfaqGroups()
	 */
	function XoopsfaqGroups() {
		$this->__construct();
	}

	/**
	 * XoopsfaqCategory::displayForm()
	 *
	 * @return
	 */
	function displayForm() {
	}
}

/**
 * XoopsfaqCategoryHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqGroupsHandler extends XoopsPersistableObjectHandler {
	/**
	 * XoopsfaqCategoryHandler::__construct()
	 *
	 * @param mixed $db
	 */
	function __construct( &$db ) {
		parent::__construct( $db, 'contents_id', 'groupid');
	}

	/**
	 * XoopsfaqCategoryHandler::XoopsfaqCategoryHandler()
	 *
	 * @param mixed $db
	 */
	function XoopsfaqGroupsHandler( &$db ) {
		$this->__construct( $db );
	}

	/**
	 * XoopsfaqCategoryHandler::getObj()
	 *
	 * @return
	 */
	function &getObj() {
		$myts = &MyTextSanitizer::getInstance();
		$obj = false;
		$criteria = new CriteriaCompo();
		$obj['count'] = $this->getCount( $criteria );
		if ( !empty( $args[0] ) ) {
			$criteria->setSort( wfp_addslashes( 'ASC' ) );
			$criteria->setOrder( wfp_addslashes( 'groupid' ) );
			$criteria->setStart( 0 );
			$criteria->setLimit( 0 );
		}
    //(new Criteria('isactive', 1)
    
		$obj['list'] = &$this->getObjects( $criteria, false );
		return $obj;
	}

	/**
	 * XoopsfaqCategoryHandler::displayAdminListing()
	 *
	 * @return
	 */
	function displayAdminListing() {
	}

	/**
	 * XoopsfaqCategoryHandler::DisplayError()
	 *
	 * @return
	 */
	function displayError( $errorString = '' ) {
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 1 );
		xoopsFaq_DisplayHeading( _MA_FAQ_CATEGORY_HEADER, _MA_FAQ_FAQ_SUBERROR );
		if ( !is_array( $errorString ) ) {
			echo $errorString;
		} else {
			echo $errorString;
		}
		xoops_cp_footer();
		exit();
	}
}

?>