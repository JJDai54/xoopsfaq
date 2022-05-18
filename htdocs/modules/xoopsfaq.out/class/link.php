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


/**
 * XoopsfaqCategory
 *
 * @package Xoops FAQ
 * @author John Neill
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqLink extends XoopsObject {
	/**
	 * XoopsfaqCategory::__construct()
	 */
	function __construct() {
		//$this->XoopsObject();
        parent::__construct();
		$this->initVar('link_id', XOBJ_DTYPE_INT, null, false );
		$this->initVar('link_title', XOBJ_DTYPE_TXTBOX, null, true, 50 );
		$this->initVar('link_url', XOBJ_DTYPE_TXTBOX, null, true, 255 );
        $this->initVar('link_newtab', XOBJ_DTYPE_INT, 1, false );
	}

	/**
	 * XoopsfaqLink::XoopsfaqLink()
	 */
	function XoopsfaqLink() {
		$this->__construct();
	}

	/**
	 * XoopsfaqLink::displayForm()
	 *
	 * @return
	 */
	function displayForm() {
		include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
		$caption = ( $this->isNew() ) ? _AM_FAQ_CREATENEW : sprintf( _AM_FAQ_MODIFYITEM, $this->getVar( 'link_title' ) );

		$form = new XoopsThemeForm( $caption, 'link', $_SERVER['REQUEST_URI']  );
		//$form = new XoopsThemeForm( $caption, 'category', xoops_getenv( 'PHP_SELF' ) );
		$form->addElement( new XoopsFormHiddenToken() );
		$form->addElement( new xoopsFormHidden( 'op', 'save' ) );
		$form->addElement( new xoopsFormHidden( 'link_id', $this->getVar( 'link_id', 'e' ) ) );
		// title
		$link_title = new XoopsFormText( _AM_FAQ_TITLE, 'link_title', 50, 150, $this->getVar( 'link_title', 'e' ) );
		//$link_title->setDescription( _AM_FAQ_LINK_TITLE_DSC );
		$form->addElement( $link_title, true );

		$link_url = new XoopsFormText( _AM_FAQ_URL, 'link_url', 120, 255, $this->getVar( 'link_url', 'e' ) );
		//$link_url->setDescription( _AM_FAQ_URL_DSC );
		$form->addElement( $link_url, true );

        $link_newtab = new XoopsFormRadioYN( _AM_FAQ_NEWTAB, 'link_newtab', $this->getVar( 'link_newtab', 'e' ), ' ' . _YES . '', ' ' . _NO . '' );
		$link_newtab->setDescription( _AM_FAQ_NEWTAB_DSC );
		$form->addElement( $link_newtab);


		$form->addElement( new XoopsFormButton( '', 'submit', _SUBMIT, 'submit' ) );
		$form->display();
	}
	/**
	 * XoopsfaqContents::getActive()
	 *
	 * @return
	function getActive() {
		return $this->getVar( 'category_active' ) ? _YES : _NO;
	}
	 */
	/**
	 * XoopsfaqContents::getActive()
	 *
	 * @return
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
	 */

} // fin de la classe

/**
 * XoopsfaqLinkHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqLinkHandler extends XoopsPersistableObjectHandler {
	/**
	 * XoopsfaqLinkHandler::__construct()
	 *
	 * @param mixed $db
	 */
	function __construct( &$db ) {
		parent::__construct( $db, 'xoopsfaq_links', 'XoopsfaqLink', 'link_id', 'link_title' );
	}

	/**
	 * XoopsfaqLinkHandler::XoopsfaqLinkHandler()
	 *
	 * @param mixed $db
	 */
	function XoopsfaqLinkHandler( &$db ) {
		$this->__construct( $db );
	}

	/**
	 * XoopsfaqLinkHandler::getObj()
	 *
	 * @return
	 */
	function &getObj(CriteriaElement $criteria = null, $id_as_key = false, $as_object = true) {
		$myts = MyTextSanitizer::getInstance();
		$obj = false;
    
		if ( is_null($criteria)) {
		  $criteria = new CriteriaCompo();
			$criteria->setSort( 'link_title'  );

			$criteria->setStart( 0 );
			$criteria->setLimit( 0 );                   
		}      
    
		$obj['count'] = $this->getCount( $criteria );
		//if ( !empty( $args[0] ) ) {
		$obj['list'] = $this->getObjects( $criteria, false );
		return $obj;   
	}

  	/**
	 * XoopsfaqLinkHandler::getObj()
	 *
	 * @return
	 */
	function getLinks($criteria=null) {
		$obj = false;
		if (is_null($criteria)) $criteria = new CriteriaCompo();
//-------------------------------------------

		$obj['count'] = $this->getCount( $criteria );
		$criteria->setSort( 'link_title' );
		$criteria->setOrder( 'ASC' );
		$obj['list'] = $this->getObjects( $criteria, false );
		return $obj;
	}


	/**
	 * XoopsfaqLinkHandler::getSelectArray()
	 *
	 * @return
	 */
	function getSelectArray($criteria=null, $fldKey='link_id', $fldValue='link_title', $addNone = false) {
		$obj = $this->getLinks($criteria) ;
        $tSelect = array();
        if ($addNone)  $tSelect[0] = "...";
        foreach($obj['list'] AS $link){
            //echo "===> title = " . $link->getVar('link_title') . "<br>";
          $tSelect[$link->getVar($fldKey)] = $link->getVar($fldValue);
        }
		return $tSelect;
	}

	/**
	 * XoopsfaqLinkHandler::displayAdminListing()
	 *
	 * @return
	 */
	function displayAdminListing() {
		$objects = $this->getObj(null,false,true);

		$buttons = array( 'edit', 'delete' );

        $links = array();
        $links['nbLinks']  = $objects['count'];
        $class = "";

		foreach( $objects['list'] as $object ) {
              $link_id = $object->getVar( 'link_id' );
              $class  = ($class == "odd") ? 'even': 'odd';

              $item = array();
              $item['class'] = $class;
              $item['id'] = $object->getVar('link_id');
              $item['title'] = $object->getVar('link_title');
              $item['url'] = $object->getVar('link_url');
              $item['newtab'] = ($object->getVar('link_newtab')) ? _YES : _NO ;
              $item['actions'] = xoopsFaq_getIconsStr('link', 'edit,delete', 'link_id', $link_id);

              $links['items'][] = $item;
    	}
global $xoopsTpl;
        $xoopsTpl->assign('links', $links);
        $xoopsTpl->display('db:admin/xoopsfaq_links.html');

    }
	/**
	 * XoopsfaqLinkHandler::DisplayError()
	 *
	 * @return
	 */
	function displayError( $errorString = '' ) {
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 1 );
		xoopsFaq_DisplayHeading( _AM_FAQ_LINK_HEADER, _MA_FAQ_FAQ_SUBERROR );
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
