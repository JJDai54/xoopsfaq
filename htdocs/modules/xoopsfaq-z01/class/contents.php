<?php
/**
 * Name: contents.php
 * Description: Xoops FAQ Contents Class
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
 * @subpackage : Contents Class
 * @since 2.5.7
 * @author John Neill
 * @version $Id: contents.php 0000 10/04/2009 09:01:12 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

/**
 * XoopsfaqContents
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqContents extends XoopsObject {
	/**
	 * XoopsfaqContents::__construct()
	 */
	function __construct() {
		//$this->XoopsObject();
        parent::__construct();
		$this->initVar( 'contents_id', XOBJ_DTYPE_INT, null, false );
		$this->initVar( 'contents_cid', XOBJ_DTYPE_INT, 0, false );
		$this->initVar( 'contents_title', XOBJ_DTYPE_TXTBOX, null, true, 255 );
		$this->initVar( 'contents_contents', XOBJ_DTYPE_TXTAREA, null, false );
		$this->initVar( 'contents_publish', XOBJ_DTYPE_INT, time(), false );
		$this->initVar( 'contents_weight', XOBJ_DTYPE_INT, 0, false );
		$this->initVar( 'contents_active', XOBJ_DTYPE_INT, 1, false );
		$this->initVar( 'dohtml', XOBJ_DTYPE_INT, 0, false );
		$this->initVar( 'doxcode', XOBJ_DTYPE_INT, 1, false );
		$this->initVar( 'dosmiley', XOBJ_DTYPE_INT, 1, false );
		$this->initVar( 'doimage', XOBJ_DTYPE_INT, 1, false );
		$this->initVar( 'dobr', XOBJ_DTYPE_INT, 1, false );
		$this->initVar( 'contents_answer', XOBJ_DTYPE_TXTBOX, null, false, 255 );
		$this->initVar( 'contents_seealso1', XOBJ_DTYPE_TXTBOX, null, false, 255 );
		$this->initVar( 'contents_libseealso1', XOBJ_DTYPE_TXTBOX, null, false, 50 );
		$this->initVar( 'contents_seealso2', XOBJ_DTYPE_TXTBOX, null, false, 255 );
		$this->initVar( 'contents_libseealso2', XOBJ_DTYPE_TXTBOX, null, false, 50 );
		$this->initVar( 'contents_seealso3', XOBJ_DTYPE_TXTBOX, null, false, 255 );
		$this->initVar( 'contents_libseealso3', XOBJ_DTYPE_TXTBOX, null, false, 50 );
	}

	/**
	 * XoopsfaqContents::XoopsfaqContents()
	 */
	function XoopsfaqContents() {
		$this->__construct();
	}

	/**
	 * XoopsfaqContents::displayForm()
	 *
	 * @return
	 */
	function displayForm() {
		global $xoopsModuleConfig;

		$category_handler = xoops_getModuleHandler( 'category' );
		if ( !$category_handler->getCount() ) {
			xoops_error( _AM_FAQ_ERRORNOCAT, $title = '' );
			xoops_cp_footer();
			exit();
		}

		include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

		$caption = ( $this->isNew() ) ? _AM_FAQ_CREATENEW: sprintf( _AM_FAQ_MODIFYITEM, $this->getVar( 'contents_title' ) );
		$form = new XoopsThemeForm( $caption, 'content', $_SERVER['REQUEST_URI'] );
		$form->addElement( new XoopsFormHiddenToken() );
		$form->addElement( new xoopsFormHidden( 'op', 'save' ) );
		$form->addElement( new xoopsFormHidden( 'contents_id', $this->getVar( 'contents_id', 'e' ) ) );
		// title
		$category_handler = xoops_getModuleHandler( 'category' );
		$objects = $category_handler->getList();
		$contents_cid = new XoopsFormSelect( _AM_FAQ_CONTENTS_CATEGORY, 'contents_cid', $this->getVar( 'contents_cid', 'e' ), 1, false );
		$contents_cid->setDescription( _AM_FAQ_CONTENTS_CATEGORY_DSC );
		$contents_cid->addOptionArray( $objects );
		$form->addElement( $contents_cid );

		$contents_title = new XoopsFormText( _AM_FAQ_CONTENTS_TITLE, 'contents_title', 120, 150, $this->getVar( 'contents_title', 'e' ) );
		$contents_title->setDescription( _AM_FAQ_CONTENTS_TITLE_DSC );
		$form->addElement( $contents_title, true );
		
		$contents_answer = new XoopsFormText( _AM_FAQ_CONTENTS_ANSWER, 'contents_answer', 120, 250, $this->getVar( 'contents_answer', 'e' ) );
		$contents_answer->setDescription( _AM_FAQ_CONTENTS_ANSWER_DSC );
		$form->addElement($contents_answer , false );

        /* ************************************ */
		$options_tray = new XoopsFormElementTray( _AM_FAQ_CONTENTS_CONTENT, '<br />' );
		if ( class_exists( 'XoopsFormEditor' ) ) {
			$options['name'] = 'contents_contents';
			$options['value'] = $this->getVar( 'contents_contents', 'e' );
			$options['rows'] = 12;
			$options['cols'] = '100%';
			$options['width'] = '80%';
			//$options['height'] = '600px';
			$contents_contents = new XoopsFormEditor( '', $xoopsModuleConfig['use_wysiwyg'], $options, $nohtml = false, $onfailure = 'textarea' );
			$options_tray->addElement( $contents_contents );
		} else {
			$contents_contents = new XoopsFormDhtmlTextArea( '', 'contents_contents', $this->getVar( 'contents_contents', 'e' ), '100%', '100%' );
			$options_tray->addElement( $contents_contents );
		}
		$options_tray->setDescription( _AM_FAQ_CONTENTS_CONTENT_DSC );
		if ( false == xoopsFaq_isEditorHTML() ) {
			if ( $this->isNew() ) {
				$this->setVar( 'dohtml', 0 );
				$this->setVar( 'dobr', 1 );
			}

			$html_checkbox = new XoopsFormCheckBox( '', 'dohtml', $this->getVar( 'dohtml', 'e' ) );
			$html_checkbox->addOption( 1, _AM_FAQ_DOHTML );
			$options_tray->addElement( $html_checkbox );
			/**
			 */
			$breaks_checkbox = new XoopsFormCheckBox( '', 'dobr', $this->getVar( 'dobr', 'e' ) );
			$breaks_checkbox->addOption( 1, _AM_FAQ_BREAKS );
			$options_tray->addElement( $breaks_checkbox );
		} else {
			$form->addElement( new xoopsFormHidden( 'dohtml', 1 ) );
			$form->addElement( new xoopsFormHidden( 'dobr', 0 ) );
		}

		/**
		 */
		$doimage_checkbox = new XoopsFormCheckBox( '', 'doimage', $this->getVar( 'doimage', 'e' ) );
		$doimage_checkbox->addOption( 1, _AM_FAQ_DOIMAGE );
		$options_tray->addElement( $doimage_checkbox );
		/**
		 */
		$xcodes_checkbox = new XoopsFormCheckBox( '', 'doxcode', $this->getVar( 'doxcode', 'e' ) );
		$xcodes_checkbox->addOption( 1, _AM_FAQ_DOXCODE );
		$options_tray->addElement( $xcodes_checkbox );
		/**
		 */
		$smiley_checkbox = new XoopsFormCheckBox( '', 'dosmiley', $this->getVar( 'dosmiley', 'e' ) );
		$smiley_checkbox->addOption( 1, _AM_FAQ_DOSMILEY );
		$options_tray->addElement( $smiley_checkbox );
		$form->addElement( $options_tray );
        /* ************************************ */

      $seealso = array();
      $libseealso = array();
      $contents_seealso = array();


      $link_handler = xoops_getModuleHandler('link');
      $tLinks =  $link_handler->getSelectArray(null, 'link_title', 'link_url', false);
include "formdatalist.php";
      $datalistUrlName = "datalist_url_predefinies";
      $datalistUrl = new xoopsformDatalist($datalistUrlName, $tLinks);
      $form->addElement($datalistUrl);

        $name = 'lib_url'  ;
        $libUrls = new xoopsformLabel(_AM_FAQ_URLS, _AM_FAQ_URLS_DSC);
		$form->addElement($libUrls);


    for ($k=1; $k<4; $k++){

        $name = 'contents_libseealso' . $k;
        $libseealso[$k] = new XoopsFormText( _AM_FAQ_CONTENTS_LIBSEEALSO, $name, 30, 50, $this->getVar( $name, 'e' ) );
        $libseealso[$k]->setExtra("list=\"{$datalistUrlName}\"");
        $onchange = "datalist_setInfo('{$datalistUrlName}','{$name}','contents_seealso{$k}');";
        $libseealso[$k]->setExtra("onchange=\"{$onchange}\"");
        $libseealso[$k]->setExtra("autocomplete=\"off\"");

        $name = 'contents_seealso' . $k;
        $seealso[$k] = new XoopsFormText( _AM_FAQ_CONTENTS_URL, $name, 100, 250, $this->getVar( $name, 'e' ) );

       // $name  = "seealso" . $k;
        $contents_seealso[$k] = new XoopsFormElementTray(_AM_FAQ_CONTENTS_SEEALSO . " n&deg; " . $k, "<br>");
        $contents_seealso[$k]->setDescription( _AM_FAQ_CONTENTS_SEEALSO_DSC );
        $contents_seealso[$k]->addElement($libseealso[$k]);
        $contents_seealso[$k]->addElement($seealso[$k]);
        $form->addElement($contents_seealso[$k], false);

    }
 


		$contents_publish = new XoopsFormTextDateSelect( _AM_FAQ_CONTENTS_PUBLISH, 'contents_publish', 20, $this->getVar( 'contents_publish' ), $this->isNew() );
		$contents_publish->setDescription( _AM_FAQ_CONTENTS_PUBLISH_DSC );
		$form->addElement( $contents_publish );

		$contents_weight = new XoopsFormText( _AM_FAQ_CONTENTS_WEIGHT, 'contents_weight', 5, 5, $this->getVar( 'contents_weight', 'e' ) );
		$contents_weight->setDescription( _AM_FAQ_CONTENTS_WEIGHT_DSC );
		$form->addElement( $contents_weight, false );

		$contents_active = new XoopsFormRadioYN( _AM_FAQ_CONTENTS_ACTIVE, 'contents_active', $this->getVar( 'contents_active', 'e' ), ' ' . _YES . '', ' ' . _NO . '' );
		$contents_active->setDescription( _AM_FAQ_CONTENTS_AVTIVE_DSC );
		$form->addElement( $contents_active );
    
		$form->addElement( new XoopsFormButton( '', 'submit', _SUBMIT, 'submit' ) );

     $dir = "modules/" . _FAQ_DIRNAME . "/assets/js";
     $GLOBALS['xoTheme']->addScript($GLOBALS['xoops']->url($dir . "/xoopsfaq.js"));
		$form->display();
	}

	/**
	 * XoopsfaqContents::getActive()
	 *
	 * @return
	 */
	function getActive() {
		return $this->getVar( 'contents_active' ) ? _YES : _NO;
	}

	/**
	 * XoopsfaqContents::getActive()
	 *
	 * @return
	 */
	function getActiveIcone($source='') {
        $active = $this->getVar( 'contents_active' );
        $img = ($active==1) ? _FAQ_ON : _FAQ_OFF;
        $url = _FAQ_XURL . 'admin/contents.php?op=active&contents_id='.$this->getVar( 'contents_id' )
                         . '&contents_active='  . (($active==1) ? 0 : 1)
                         . "&category_id=" . $this->getVar('contents_cid')
                         . (($source !='') ? "&source=".$source : '');
        //echo $url . "<hr>";exit;
        $html = "<a href='".$url."'><img src='".$img."' title='' alt=''></a>";
        //echo '===>'.$url;exit;
		return $html;
	}


	function getPublished( $timestamp = '') {
		if ( !$this->getVar( 'contents_publish' ) ) {
			return '';
		}
     $timestamp = 'd-m-Y' ;
     if ($GLOBALS['xoopsConfig']['language']=="french") 
     {
        $timestamp = 'd-m-Y' ;
     }else{
        $timestamp = 'Y-m-d' ;
     }
		return formatTimestamp( $this->getVar( 'contents_publish' ), $timestamp );
	}
  
	function getSeealso($index=1, $mode=0 ) {
    if ($mode > 0)
    {
      $link = $this->getVar( 'contents_seealso' . $index );
      if ($link=='') return $link;
      //-----------------------------------------------

      if (substr($link, 0, 7) != 'http://' && substr($link, 0, 8) != 'https://')
      {
        $link = 'http://' . $link;
      }
      if ($mode==2){
        $link = sprintf("<a href='%1\$s' title='' target='blank'>%2\$s</a>", $link, _AM_FAQ_CONTENTS_SEEALSO);
//  		    echo "<hr>{$exp}<br>{$link}<hr>";
      }
    }
    
  	return  $link;
	}   
	function getLibseealso($index=1 ) {
  	return  $this->getVar('contents_libseealso' . $index );
	}   
  
	function getAnswer( ) {
  	return  $this->getVar( 'contents_answer' );
	}   
  
}

/**
 * XoopsfaqContentsHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class XoopsfaqContentsHandler extends XoopsPersistableObjectHandler {
	/**
	 * XoopsfaqContentsHandler::__construct()
	 *
	 * @param mixed $db
	 */
	function __construct( &$db ) {
		parent::__construct( $db, 'xoopsfaq_contents', 'XoopsfaqContents', 'contents_id', 'contents_title', 'contents_answer' );  //jjD
	}

	/**
	 * XoopsfaqContentsHandler::XoopsfaqContentsHandler()
	 *
	 * @param mixed $db
	 */
	function XoopsfaqContentsHandler( &$db ) {
		$this->__construct( $db );
	}

	/**
	 * XoopsfaqContentsHandler::getObj()
	 *
	 * @return
	 */
	function &getObj(CriteriaElement $criteria = null, $id_as_key = false, $as_object = true) {
		$obj = false;
    
    if ( is_null($criteria)) {
		  $criteria = new CriteriaCompo();

			$criteria->setSort( 'contents_title ASC, contents_id'  );

			$criteria->setStart( 0 );
			$criteria->setLimit( 0 );
		}      

		$obj['count'] = $this->getCount( $criteria );
		$obj['list'] = $this->getObjects( $criteria, false );
		return $obj;
	}

	/**
	 * XoopsfaqContentsHandler::getObj()
	 *
	 * @return
	 */
	function &getPublished( $cid = '', $criteria=null) {
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
$isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, _FAQ_PERM_QUESTIONS);
//echo "permission : " .  ($isPermit ? "oui":"non") . "<hr>";
//-------------------------------------------
		if ( !empty( $cid ) ) {
			$criteria->add( new Criteria( 'contents_cid', $cid, '=' ) );
		}
        if (!$isPermit)
		  $criteria->add( new Criteria( 'contents_active', 1, '=' ) );

		$criteriaPublished = new CriteriaCompo();
		$criteriaPublished->add( new Criteria( 'contents_publish', 0, '>' ) );
		$criteriaPublished->add( new Criteria( 'contents_publish', time(), '<=' ) );
		$criteria->add( $criteriaPublished );

		$obj['count'] = $this->getCount( $criteria );
		$criteria->setSort( 'contents_weight, contents_title ASC, contents_id' );
		$criteria->setOrder( 'ASC' );
// 		if ( is_null($criteria)) {
// 			$criteria->setSort( 'contents_title' );     
// 			$criteria->setOrder( 'ASC' );
// 			$criteria->setStart( 0 );
// 			$criteria->setLimit( 0 );
// 		}
		$obj['list'] = $this->getObjects( $criteria, false );
		return $obj;
	}

	/**
	 * XoopsfaqContentsHandler::displayAdminListing()
	 *
	 * @return
	 */
	function displayAdminListing() {
    global $xoopsTpl;

        $tCategorys = xoopsFaq_getCategorys();
              //	include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
              xoops_load('XoopsFormLoader');
      //------------------------------------------------------------------------
      //$labCategory = new XoopsFormLabel( _AM_FAQ_CONTENTS_CATEGORY);
      //$url = _FAQ_XURL . "admin/contents.php?";
      //$opform    = new XoopsSimpleForm('', 'opform', $url, 'post');

      $category_id = (isset($_REQUEST['category_id'])) ? $_REQUEST['category_id'] : 0;
      $inpCategory = new XoopsFormSelect( _AM_FAQ_CONTENTS_CATEGORY, 'category_id',  $category_id,1 ,"");
      $inpCategory->setExtra('onchange="document.forms.opSelectCat.submit()"');
      foreach($tCategorys AS $key=>$t){
          $inpCategory->addOption($key, $t['title']);
      }
      //$opform->addElement($inpCategory);
      //$opform->display();
      $xoopsTpl->assign('selectCategory', $inpCategory->render());
      $xoopsTpl->assign('category_id', $category_id);


        //----------------------------------------------------------------------
        if ($category_id > 0){
            $criteria=new criteriaCompo(new criteria("contents_cid",$category_id));
            $objects = $this->getObj($criteria);
        }else{
            $objects = $this->getObj();
        }
		$buttons = array( 'edit', 'delete' );


        $questions = array();
        $questions['nbQuestions'] = $objects['count'];
        $class = "";

		foreach( $objects['list'] as $object ) {
              $item = array();
              $contents_id = $object->getVar( 'contents_id' );
              $cid = $object->getVar( 'contents_cid' );
              $class = ($class == "odd") ? 'even': 'odd';
              $name= "contents_weight[{$contents_id}]";
              $inpOrder = new XoopsFormText('', $name, 5, 5, $object->getVar('contents_weight'));
              $inpOrder->setExtra("style='text-align:right;'");

              $item['class'] = $class;
              $item['id'] = $contents_id;
              $item['title'] = $object->getVar( 'contents_title' );
              $item['answer'] = $object->getAnswer() ;
              $item['catTitle'] = $tCategorys[$cid]['title'] ;
              $item['activeIcone'] = $object->getActiveIcone();
              $item['inpOrder'] = $inpOrder->render();
              $item['datePublished'] = $object->getPublished();
              $item['actions'] = xoopsFaq_getIconsStr('contents', 'edit,delete', 'contents_id', $contents_id, "source=admin/contents.php?category_id={$cid}");

              $questions['items'][] = $item;

		}

        $xoopsTpl->assign('questions', $questions);
        $xoopsTpl->display('db:admin/xoopsfaq_contents.html');

	}

	/**
	 * XoopsfaqContentsHandler::DisplayError()
	 *
	 * @return
	 */
	function displayError( $errorString = '' ) {
		xoops_cp_header();
//		xoopsFaq_AdminMenu( 0 );
		xoopsFaq_DisplayHeading( _AM_FAQ_CONTENTS_HEADER, '', false );
		xoops_error( $errorString, _MA_FAQ_FAQ_SUBERROR );
		xoops_cp_footer();
		exit();
	}
}

?>