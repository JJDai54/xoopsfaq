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
 * @since 2.5.7
 * @author John Neill
 * @version $Id: category.php 0000 10/04/2009 08:59:26 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
//include_once "include/functions-color-set.php";
use colorSet AS colorSet;

/**
 * XoopsfaqCategory
 *
 * @package Xoops FAQ
 * @author John Neill
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqCategory extends XoopsObject {
	/**
	 * XoopsfaqCategory::__construct()
	 */
	function __construct() {
		//$this->XoopsObject();
        parent::__construct();
		$this->initVar( 'category_id', XOBJ_DTYPE_INT, null, false );
		$this->initVar( 'category_title', XOBJ_DTYPE_TXTBOX, null, true, 255 );
		$this->initVar( 'category_order', XOBJ_DTYPE_INT, 0, false );
        $this->initVar( 'category_active', XOBJ_DTYPE_INT, 1, false );
		$this->initVar( 'category_color_set', XOBJ_DTYPE_TXTBOX, null, true, 50 );
        $this->initVar( 'category_show_hidetext', XOBJ_DTYPE_INT, 1, false );
        $this->initVar( 'category_hidetext_align', XOBJ_DTYPE_INT, 1, false );
	}

	/**
	 * XoopsfaqCategory::XoopsfaqCategory()
	 */
	function XoopsfaqCategory() {
		$this->__construct();
	}

	/**
	 * XoopsfaqCategory::displayForm()
	 *
	 * @return
	 */
	function displayForm() {
		include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
		$caption = ( $this->isNew() ) ? _AM_FAQ_CREATENEW : sprintf( _AM_FAQ_MODIFYITEM, $this->getVar( 'category_title' ) );

		$form = new XoopsThemeForm( $caption, 'category', $_SERVER['REQUEST_URI']  );
		//$form = new XoopsThemeForm( $caption, 'category', xoops_getenv( 'PHP_SELF' ) );
		$form->addElement( new XoopsFormHiddenToken() );
		$form->addElement( new xoopsFormHidden( 'op', 'save' ) );
		$form->addElement( new xoopsFormHidden( 'category_id', $this->getVar( 'category_id', 'e' ) ) );
		// title
		$category_title = new XoopsFormText( _AM_FAQ_TITLE, 'category_title', 50, 150, $this->getVar( 'category_title', 'e' ) );
		$category_title->setDescription( _AM_FAQ_TITLE_DSC );
		$form->addElement( $category_title, true );
		// order
		$category_order = new XoopsFormText( _AM_FAQ_CATEGORY_WEIGHT, 'category_order', 5, 5, $this->getVar( 'category_order', 'e' ) );
		$category_order->setDescription( _AM_FAQ_CATEGORY_WEIGHT_DSC );
		$form->addElement( $category_order, false );
    
    $category_active = new XoopsFormRadioYN( _AM_FAQ_CONTENTS_ACTIVE, 'category_active', $this->getVar( 'category_active', 'e' ), ' ' . _YES . '', ' ' . _NO . '' );
		$category_active->setDescription( _AM_FAQ_CONTENTS_AVTIVE_DSC );
		$form->addElement( $category_active );

    $category_showHidetext = new XoopsFormRadioYN( _AM_FAQ_SHOW_HIDETEXT, 'show_hidetext', $this->getVar( 'category_show_hidetext', 'e' ), ' ' . _YES . '', ' ' . _NO . '' );
		$category_active->setDescription( _AM_FAQ_SHOW_HIDETEXT_DSC );
		$form->addElement( $category_showHidetext );

    $category_hidetext = new XoopsFormRadioYN( _AM_FAQ_HIDETEXT_ALIGN, 'hidetext_align', $this->getVar( 'category_hidetext_align', 'e'), ' ' . _YES . '', ' ' . _NO . '' );
		//$category_active->setDescription( _AM_FAQ_HIDETEXT_ALIGN_DSC );
		$form->addElement( $category_hidetext );

        $selectFormColorSet = new XoopsFormSelect(_AM_FAQ_COLOR_SET, 'category_color_set', $this->getVar( 'category_color_set', 'e' ) );
        $selectFormColorSet->addOptionArray(colorSet\get_css_color());
        //$selectFormColorSet->setDescription(_AM_FAQ_COLOR_SET_DESC);
        $form->addElement($selectFormColorSet);

		$form->addElement( new XoopsFormButton( '', 'submit', _SUBMIT, 'submit' ) );
		$form->display();
	}
	/**
	 * XoopsfaqContents::getActive()
	 *
	 * @return
	 */
	function getActive() {
		return $this->getVar( 'category_active' ) ? _YES : _NO;
	}
	/**
	 * XoopsfaqContents::getActive()
	 *
	 * @return
	 */
	function getActiveIcone($source = '') {
        $active = $this->getVar( 'category_active' );
        $img = ($active==1) ? _FAQ_ON : _FAQ_OFF;
        $url = _FAQ_XURL . 'admin/category.php?op=active'
             . '&category_id='.$this->getVar( 'category_id' )
             . '&category_active='  . (($active==1) ? 0 : 1)
             . (($source !='') ? "&source=".$source : '');

        $html = "<a href='".$url."'><img src='".$img."' title='' alt=''></a>";
        //echo '===>'.$url;exit;
    		return $html;
	}

} // fin de la classe

/**
 * XoopsfaqCategoryHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqCategoryHandler extends XoopsPersistableObjectHandler {
	/**
	 * XoopsfaqCategoryHandler::__construct()
	 *
	 * @param mixed $db
	 */
	function __construct( &$db ) {
		parent::__construct( $db, 'xoopsfaq_categories', 'XoopsfaqCategory', 'category_id', 'category_title' );
	}

	/**
	 * XoopsfaqCategoryHandler::XoopsfaqCategoryHandler()
	 *
	 * @param mixed $db
	 */
	function XoopsfaqCategoryHandler( &$db ) {
		$this->__construct( $db );
	}

	/**
	 * XoopsfaqCategoryHandler::getObj()
	 *
	 * @return
	 */
	function &getObj(CriteriaElement $criteria = null, $id_as_key = false, $as_object = true) {
		$myts = MyTextSanitizer::getInstance();
		$obj = false;
    
		if ( is_null($criteria)) {
		  $criteria = new CriteriaCompo();
			$criteria->setSort( 'category_order ASC, category_title'  );

			$criteria->setStart( 0 );
			$criteria->setLimit( 0 );                   
		}      
    
		$obj['count'] = $this->getCount( $criteria );
		//if ( !empty( $args[0] ) ) {
		$obj['list'] = $this->getObjects( $criteria, false );
		return $obj;   
	}

  	/**
	 * XoopsfaqCategoryHandler::getObj()
	 *
	 * @return
	 */
	function getCategories($criteria=null) {
		$obj = false;
		if (is_null($criteria)) $criteria = new CriteriaCompo();
//-------------------------------------------
// define('_FAQ_PREFIX_PERM_ADMIN', "xf_admin_perms");
// define('_FAQ_PREFIX_PERM_CAT_CONSULT', "xf_cats_consult");
//
//
// define('_FAQ_PERM_MODULE',      1);
// define('_FAQ_PERM_CATEGORYS',   2);
// define('_FAQ_PERM_QUESTIONS',   3);
// define('_FAQ_PERM_PERMISSIONS', 4);


//$isPermit = Permissions\isPermited(_FAQ_PERM_QUESTIONS, $cid);
$isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_CATEGORYS);
        if (!$isPermit)
		      $criteria->add( new Criteria( 'category_active', 1, '=' ) );
		//$criteriaActive = new CriteriaCompo();
                            
		//$criteria->add( $criteriaActive );

		$obj['count'] = $this->getCount( $criteria );
			$criteria->setSort( 'category_order, category_title' );     
			$criteria->setOrder( 'ASC' );
// 		if ( is_null($criteria)) {
// 			$criteria->setSort( 'category_title' );     
// 			$criteria->setOrder( 'ASC' );
// 			$criteria->setStart( 0 );
// 			$criteria->setLimit( 0 );
// 		}
		$obj['list'] = $this->getObjects( $criteria, false );
		return $obj;
	}

	/**
	 * XoopsfaqCategoryHandler::displayAdminListing()
	 *
	 * @return
	 */
	function displayAdminListing() {
		$objects = $this->getObj(null,false,true);

		$buttons = array( 'edit', 'delete' );

        $cats = array();
        $cats['nbCategorys']  = $objects['count'];
        $class = "";

		foreach( $objects['list'] as $object ) {
              $category_id = $object->getVar( 'category_id' );
              $name = "category_order[{$category_id}]";
              $class  = ($class == "odd") ? 'even': 'odd';
              $inpOrder = new XoopsFormText('', $name, 5, 5, $object->getVar('category_order'));
              $inpOrder->setExtra("style='text-align:right;'");

              $item = array();
              $item['class'] = $class;
              $item['category_id'] = $object->getVar('category_id');
              $item['category_title'] = $object->getVar('category_title');
              $item['activeIcone'] = $object->getActiveIcone();
              $item['category_color_set'] = $object->getVar('category_color_set');
              $item['inpOrder'] = $inpOrder->render();
              $item['show_hidetext'] = ($object->getVar('category_show_hidetext')) ? _YES : _NO ;
              $item['hidetext_align'] = ($object->getVar('category_hidetext_align')) ? 'right' : 'inline' ;
              $item['actions'] = xoopsFaq_getIconsStr('category', 'edit,delete', 'category_id', $category_id);

              $cats['items'][] = $item;
    	}
global $xoopsTpl;
        $xoopsTpl->assign('categorys', $cats);
        $xoopsTpl->display('db:admin/xoopsfaq_category.html');

    }
	/**
	 * XoopsfaqCategoryHandler::DisplayError()
	 *
	 * @return
	 */
	function displayError( $errorString = '' ) {
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 1 );
		xoopsFaq_DisplayHeading( _AM_FAQ_CATEGORY_HEADER, _MA_FAQ_FAQ_SUBERROR );
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
