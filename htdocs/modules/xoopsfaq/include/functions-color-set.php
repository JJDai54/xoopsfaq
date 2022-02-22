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
namespace colorSet;
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
use Xmf\Module\Helper as xHelper;
include_once "constantes.php";


/**********************************************
 *
 **********************************************/
function get_css_path(){
global $helper, $xoopsModuleCongig;
$helper = xHelper::getHelper("xoopsfaq");
    //$cssFld = $helper->getConfig('css_folder');
    //$cssFld = $xoopsModuleCongig['css_folder'];
    if($helper) {
    $cssFld = $helper->getConfig('css_folder');
    }else{
    $cssFld = '';
    }


    if ($cssFld == "" ){
      $dir = "modules/" . _FAQ_DIRNAME . "/assets/css";
    }else{

      if ($cssFld[0] == '/') $cssFld = substr($cssFld, 1);
      if ($cssFld[strlen($cssFld)-1] == '/') $cssFld = substr($cssFld, -1);
      $dir = $cssFld;
    }

    return $dir;
}


/**********************************************
 *
 **********************************************/
function load_css($color="*"){
global $helper, $xoopsModuleCongig;


    //if ($helper->getConfig('css_folder') =="" ){
    //if ($xoopsModuleCongig['css_folder'] =="" ){
    /*
    if ($helper->getConfig('css_folder') =="" ){
          $dir = "browse.php?" . news_get_css_path();
    }else{
      $dir = news_get_css_path();
    }
    */
      $f = XOOPS_PATH . "/Frameworks/jquery/plugins/showHide.js";
      if (file_exists($f)){
        $GLOBALS['xoTheme']->addScript(XOOPS_URL . '/browse.php?Frameworks/jquery/plugins/showHide.js');
      }else{
        $f = XOOPS_ROOT_PATH . "/Frameworks/jquery/plugins/showHide.js";
        if (file_exists($f)){
          $GLOBALS['xoTheme']->addScript(XOOPS_URL . '/Frameworks/jquery/plugins/showHide.js');
        }
      }
                    


 $GLOBALS['xoTheme']->addScript(XOOPS_URL . '/browse.php?Frameworks/jquery/plugins/showHide.js');
                                                       
    //$dir = "" . $fld;
    $dir = "browse.php?" . get_css_path();
    $GLOBALS['xoTheme']->addStylesheet($GLOBALS['xoops']->url($dir . "/style-item-design.css"));
    $GLOBALS['xoTheme']->addStylesheet($GLOBALS['xoops']->url($dir . "/style-item-color.css"));

    $GLOBALS['xoTheme']->addStylesheet($GLOBALS['xoops']->url($dir . "/style.css"));
// echo "<hr>===> CSS folder : " . $helper->getConfig('css_folder',"s")  . "<br>";
// echo "<hr>===> CSS folder : " . $dir  . "<hr>";


     $dir = "modules/" . _FAQ_DIRNAME . "/assets/js";
    $GLOBALS['xoTheme']->addScript($GLOBALS['xoops']->url($dir . "/xoopsfaq.js"));
    //$xoTheme->(XOOPS_URL . '/browse.php?Frameworks/jquery/plugins/showHide.js');
}

/**********************************************
 *
 **********************************************/
function get_css_color(){
global $helper;

    $filename = XOOPS_ROOT_PATH . "/" . get_css_path() . "/style-item-color.css";
    $content = file_get_contents ($filename);

//echo "<br>{$filename}<br>{$content}<br>";
    $tLines = explode("\n" , $content);
//echo "nbLines = " . count($tLines) . "<pre>" . print_r($tLines, true) . "</pre>";
//echo "nbLines = " . count($tLines) ;
//  echo "<pre>" . print_r($tLines, true) . "</pre>";

    $tColors = array(NEWS_DEFAULT => NEWS_DEFAULT);
    foreach($tLines as $line){
      if(strlen($line)>0 && $line[0] == "."){
        $t = explode("-", $line);
        $color = substr($t[0],1);
        if (!array_key_exists($color, $tColors)){
            $tColors[$color] = $color;
        }
      }
    }
//  echo "<pre>" . print_r($tColors, true) . "</pre>";

    return $tColors;
}

?>