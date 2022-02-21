<?php
/**
 * Name: functions.php
 * Description: Module specific Functions for Xoops FAQ
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
 * @package : XOOPS
 * @Module : Xoops FAQ
 * @subpackage : Functions
 * @since 2.5.7
 * @author John Neill
 * @version $Id: functions.php 0000 10/04/2009 09:03:22 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
use Xmf\Module\Helper as xHelper;
include_once "constantes.php";

require_once XOOPS_ROOT_PATH . _FAQ_FLD . '/include/functions-permissions.php';
use Permissions AS Permissions;


/**
 * xoopsFaq_CleanVars()
 *
 * @return
 */
function xoopsFaq_CleanVars( &$global, $key, $default = '', $type = 'int' ) {
	switch ( $type ) {
		case 'string':
			$ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_MAGIC_QUOTES ) : $default;
			break;
		case 'int':
		default:
			$ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_NUMBER_INT ) : $default;
			break;
	}
	if ( $ret === false ) {
		return $default;
	}
	return $ret;
}

/**
 * xoopsFaq_displayHeading()
 *
 * @param mixed $value
 * @return
 */
function xoopsFaq_DisplayHeading( $heading = '', $subheading = '', $showbutton = true ) {
	$ret = '';

	if ( !empty( $heading ) ) {
		$ret .= '<h4>' . $heading . '</h4>';
	}

	if ( !empty( $subheading ) ) {
		$ret .= '<div style="text-align: left; margin-bottom: 5px; margin-left: 5px;">' . $subheading . '</div><br />';
	}
	if ( $showbutton ) {
		$ret .= '<div style="text-align: right; margin-bottom: 10px;"><input type="button" name="button" onclick=\'location="' . basename( $_SERVER['SCRIPT_FILENAME'] ) . '?op=edit"\' value="' . _AM_FAQ_CREATENEW . '" /></div>';
	}
	echo $ret;
}

/**
 * xoopsFaq_cp_footer()
 *
 * @return
 */
function xoopsFaq_cp_footer() {
	global $xoopsModule;

	echo '<div style="padding-top: 16px; padding-bottom: 10px; text-align: center;">'
	   . '<a href="' . $xoopsModule->getInfo( 'website_url' ) . '" target="_blank">' . xoopsFaq_showImage( 'microbutton', '', '', 'gif' ) . '</a>'
	   . '</div>';
	xoops_cp_footer();
}

/**
 * xoopsFaq_showImage()
 *
 * @param string $name
 * @param string $title
 * @param string $align
 * @param string $ext
 * @param string $path
 * @param string $size
 * @return
 */
function xoopsFaq_showImage( $name = '', $title = '', $align = 'middle', $ext = 'png', $path = '', $size = '' ) {

	if ( empty( $name )) return '';

    if ( empty( $path ) ) {
		$path = _FAQ_FLD . '/images';
	}

	$fullpath = XOOPS_URL . '/' . $path . '/' . $name . '.' . $ext;

	$ret = '<img src="' . $fullpath . '" ' . $size;
	$ret .= ' title = "' . htmlspecialchars( $title ) . '"';
	$ret .= ' alt = "' . htmlspecialchars( $title ) . '"';
	if ( !empty( $align ) ) {
		$ret .= ' style="vertical-align: ' . $align . '; border: 0px;"';
	}
	$ret .= ' />';
	return $ret;
}

/**
 * xoopsFaq_getIcons()
 *
 * @param string $domaine - category, question, ...
 * @param string $buttons
 * @param mixed $key
 * @param mixed $value
 * @param mixed $extra
 * @return
 */
 //JJDai - remplacement du tableau par une chaine et application des permissions
function xoopsFaq_getIconsStr($domaine, $buttons, $key , $value = null, $params = "", $htmlActive='') {
    switch ($domaine){
      case 'category': $permName = _FAQ_PERM_CATEGORYS; break;
      case 'contents': $permName = _FAQ_PERM_QUESTIONS; break;
      case 'link':     $permName = _FAQ_PERM_LINKS; break;
    }

    $isPermit = Permissions\isPermited(_FAQ_PREFIX_PERM_ADMIN, $permName);
    if (!$isPermit) return '';

    $icon_array = explode(',', $buttons);
    $urlTpl = _FAQ_XURL . 'admin/' . $domaine . ".php?z=z&{$params}";
	$ret = '';
    $sep = "&nbsp;&nbsp;&nbsp;";
    $tIcons = array();
	foreach($icon_array as $icon ) {
       switch($icon) {
       case "active":
  		    $tIcons[] = $htmlActive;
            break;

        default:
              $url = $urlTpl ."&op={$icon}&{$key}=" . (($icon=='add') ? 0: $value);
              $title = xoopsFaq_getConstants("_CO_FAQ_{$domaine}_" . strtoupper($icon));
  		      $tIcons[] = "<a href='{$url}'>" . xoopsFaq_showImage($icon, $title, null, 'png', _FAQ_PATHICON16 ) . '</a>';
              break;
       }

    //-------------------------------------------
    //echo '===>'.$url;exit;




	}

    //$btn =  implode($sep, $tIcons)  . $content->getActiveIcone()
    return implode($sep, $tIcons) . $sep;

}

/**
 * xoopsFaq_getIcons()
 *
 * @param array $_icon_array
 * @param mixed $key
 * @param mixed $value
 * @param mixed $extra
 * @return
 */
function xoopsFaq_getIcons( $_icon_array = array(), $key, $value = null, $extra = null ) {
	$ret = '';
  //$sep = "z<div style='position:relative;width:120px;'></div>";
  $sep = "&nbsp;&nbsp;&nbsp;";     
	if ( $value ) {
		foreach( $_icon_array as $_op => $icon ) {     
			$url = ( !is_numeric( $_op ) ) ? $_op . "?{$key}=" . $value : xoops_getenv( 'PHP_SELF' ) . "?op={$icon}&amp;{$key}=" . $value;
			if ( $extra != null ) {
			}
			$ret .= $sep .  '<a href="' . $url . '">' . xoopsFaq_showImage( $icon, xoopsFaq_getConstants( '_AM_FAQ_' . $icon ), null, 'png' ) . '</a>';
			 
		}
	}           
  $ret = $ret . $sep;
	return $ret;
}

/**
 * xoopsFaq_getConstants()
 *
 * @param mixed $_title
 * @param string $prefix
 * @param string $suffix
 * @return
 */
function xoopsFaq_getConstants( $_title, $prefix = '', $suffix = '' ) {
	$prefix = ( $prefix != '' || $_title != 'action' ) ? trim( $prefix ) : '';
	$suffix = trim( $suffix );
	return constant( strtoupper( "{$prefix}{$_title}{$suffix}" ) );
}

/**
 * wfp_isEditorHTML()
 *
 * @return
 */
function xoopsFaq_isEditorHTML() {
	if ( isset( $GLOBALS['xoopsModuleConfig']['use_wysiwyg'] ) && in_array( $GLOBALS['xoopsModuleConfig']['use_wysiwyg'], array( 'tinymce', 'fckeditor', 'koivi', 'inbetween', 'spaw' ) ) ) {
		return true;
	}
	return false;
}


/***
 *
 **/
function xoopsFaq_modulename_checkModuleAdmin()
{
  if ( file_exists($GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php'))){
    include_once $GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
    return true;
  }else{
    echo xoops_error("Error: You don't use the Frameworks \"adminmodule\". Please install this Frameworks");
    return false;
    }
}

/****************************************************************
 *  Transformation de la date fr -> en 
 ****************************************************************/
function xoopsFaq_transformDate2Local($mydate){

  if ($GLOBALS['xoopsConfig']['language']=="french") 

  {
    if(isset($mydate['date']))
    {
      @list($jour,$mois,$annee)=explode('/',$mydate['date']);
      $mydate['date'] = @date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
    }else{
      @list($jour,$mois,$annee)=explode('/',$mydate);
      $mydate = @date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
    }
  }  
  return $mydate;

}

/****************************************************************
 *
 * **************************************************************/
 function xoopsFaq_getCategorys($criteria = null){
 global $category_handler;
$category_handler = xoops_getModuleHandler( 'category' );
        $categorysObj = $category_handler->getCategories($criteria);
//	if ( $objCategorys['count'] > 0 ) {
//utilisé pour recuperé le premier id des categories - l'id n) 1 n'existe peut être pas


        $tCategorys = array();
		foreach($categorysObj['list'] as $catObj ) {
            $catId = $catObj->getVar( 'category_id' );
			$category = array();
			$category['id'] = $catId;
			$category['title'] = $catObj->getVar( 'category_title' );
			$category['color_set'] = $catObj->getVar( 'category_color_set' );
			$category['show_hidetext'] = $catObj->getVar( 'category_show_hidetext' ) ; //? _YES : _NO;
			$category['hidetext_align'] = $catObj->getVar( 'category_hidetext_align' ) ; //? _YES : _NO;

            $tCategorys[$catId] = $category;
			$tCategorys[$catId]['nbQuestions'] = 0 ;
       }

       return $tCategorys;
 }



?>
