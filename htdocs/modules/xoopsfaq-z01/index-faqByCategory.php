<?php
/**
 * Name: index.php
 * Description: Dispaly user side code, categories and faq answers
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
 * @subpackage : User side code
 * @since 2.5.7
 * @author John Neill
 * @version $Id: index.php 0000 10/04/2009 09:22:12 John Neill $
 */
include_once 'header.php';
include_once 'include/functions.php';
include_once 'include/constantes.php';
require_once _FAQ_PATH . 'include/functions-permissions.php';
use Permissions AS Permissions;

	$xoopsOption['template_main'] = 'xoopsfaq-faqByCategory.html';
	include_once XOOPS_ROOT_PATH . '/header.php';
include_once "include/functions-color-set.php";
use colorSet AS colorSet;
$category_handler = xoops_getModuleHandler('category');
$content_handler = xoops_getModuleHandler('contents');
$p = array_merge($_GET, $_POST);
$cat_id = xoopsFaq_CleanVars($p, 'cat_id', 0, 'int' );



//---------------------------------
global $category_handler;
    $category_handler = xoops_getModuleHandler( 'category' );

    $criteria = new criteriaCompo();
    $permsCats = Permissions\getPermissions('xf_cats_consult');
    $criteriaPerm = new criteria('category_id', "({$permsCats})", "IN");
    $criteria->add($criteriaPerm);
    $categorysObj = $category_handler->getCategories($criteria);

	if (count($categorysObj['list']) == 0 ) {
        redirect_header( XOOPS_URL, 1, _NOPERM );
    }



//---------------------------------
// chargement des categories
/*
    $criteria = new criteriaCompo();
    $permsCats = Permissions\getPermissions('xf_cats_consult');
    $criteriaPerm = new criteria('category_id', "({$permsCats})", "IN");
    $criteria->add($criteriaPerm);
	$categorysObj = $category_handler->getCategories($criteria);
    //echo "===> cats = {$Permscats}<br>";



    $tCategorys = xoopsfaq_getCategorys($criteria);
	if ( count($tCategorys) == 0 ) {
        redirect_header( XOOPS_URL, 1, _NOPERM );
    }
*/
//echo "firstCat = {$firstCat}<pre>" . print_r($tCategorys, true ). "</pre><hr>";
//---------------------------------
// affichage d'une seule category à la fois
//verification des permission de la voi sinon affichage de la premiere autorisée
//     $tCat = array_flip(implode(',', $permsCats));
//     if (!array_key_exists($cat_id, $tCat)) $cat_id=0;

//---------------------------------
        $tCategorys = array();
		foreach($categorysObj['list'] as $catObj ) {
            $cid = $catObj->getVar( 'category_id' );
			$category = array();
			$category['id'] = $cid;
			$category['title'] = $catObj->getVar( 'category_title' );
			$category['color_set'] = $catObj->getVar( 'category_color_set' );
			$category['show_hidetext'] = $catObj->getVar( 'category_show_hidetext' ) ; //? _YES : _NO;
			$category['hidetext_align'] = $catObj->getVar( 'category_hidetext_align' ) ; //? _YES : _NO;

            $category['btnAddQestion'] = xoopsFaq_getIconsStr('contents', 'add', 'contents_id', 0, "cat_id={$cid}&source=index.php?cat_id={$cid}");
            //$source = "source=index.php?cat_id={$cid}";
            $source = "cat_id={$cid}&source=index.php?cat_id={$cid}";
            $category['buttons'] = xoopsFaq_getIconsStr('category', 'edit,add,delete,active', 'category_id', $cid, $source, $catObj->getActiveIcone($source));

			$category['nbQuestions'] = 0 ;
            $category['show'] = 0;
            //--------------------------------------------------------
            $tCategorys[$cid] = $category;
       }

       //$tCategorys[$cid]['show'] = 0;
    if (!array_key_exists($cat_id, $tCategorys)) $cat_id=0;
    //recupere le premier id des categories - l'id n° 1 n'existe peut être pas
    if ( $cat_id <= 0 ) $cat_id = array_key_first($tCategorys);

    //pour les commentaires permet a xoops de récupérer l'id courant
    $_GET['cat_id'] = $cat_id;
    //$_POST['cat_id'] = $cat_id;

    $showBtnAllCategorys = 0;
	$xoopsTpl->assign( 'showBtnAllCategorys',  $showBtnAllCategorys);

//---------------------------------
    //$tCatBarre = array();
    /*
	foreach( $tCategorys as $cid=>$cat ) {
       $tCategorys[$cid]['btnAddQestion'] = xoopsFaq_getIconsStr('contents', 'add', 'contents_id', 0, "cat_id={$cid}&source=index.php?cat_id={$cid}");
       $source = "source=index.php?cat_id={$cid}";
       $tCategorys[$cid]['buttons'] = xoopsFaq_getIconsStr('category', 'edit,add,delete', 'category_id', $cid, $source, $tCategorys->getActiveIcone($source));
       $tCategorys[$cid]['nbQuestions'] = 0;
       $tCategorys[$cid]['show'] = 0;
    }
    */
//        $tCatBarre[] = array('id'    => $cat[$cid],
//                             'title' => $cat['category_title'],
//                             'color_set' => $cat['category_color_set']);
//---------------------------------
$params = array();
// chargement des question de la categrie selectionnées
    //affichage d'un seule ctegorie à la fois
    //a voir si l'option plusieurs comme cela était reste viable
    $contentsObj = $content_handler->getPublished($cat_id);
    $tCategorys[$cat_id]['show'] = 1;
	foreach( $contentsObj['list'] as $content ) {
          $contents_id = $content->getVar( 'contents_id' );
          $cid = $content->getVar( 'contents_cid' );
          // JJDai - $source permet un retour au front office si besoin
          $source = "cat_id={$cid}&source=index.php?cat_id={$cid}";

          $question =  array('link'     => $content->getVar( 'contents_id' ),
                             'id'       => $contents_id,
                             'cid'      => $cid,
                             'title'    => $content->getVar( 'contents_title' ),
                             'contents' => $content->getVar( 'contents_contents' ),
                             'answer'   => $content->getVar( 'contents_answer'),
                             'buttons'  => xoopsFaq_getIconsStr('contents', 'edit,add,delete,active', 'contents_id', $contents_id, $source, $content->getActiveIcone($source))
                             );

          $question['seealso'] = array();
          for ($k=1;$k<4;$k++){
                $url = $content->getSeealso($k,1);
                if ($url != ''){
                    $t = array();
                    $t['url'] = $url;
                    $t['lib'] = $content->getLibseealso($k);
  			          $question['seealso'][] = $t;

                }
            }

        $params['showHidetext'] = $tCategorys[$cid]['show_hidetext'];
        $params['hidetext_align'] = ($tCategorys[$cid]['hidetext_align'] == 1) ? 'right' : 'inline';
        $tCategorys[$cid]['questions'][] = $question;
		$tCategorys[$cid]['nbQuestions'] ++ ;

 	}

//echo "<pre>" . print_r($tCategorys, true ). "</pre><hr>";




	$xoopsTpl->assign( 'categorys',  $tCategorys);
	$xoopsTpl->assign( 'params',  $params);
//===============================================
colorSet\load_css();

include XOOPS_ROOT_PATH . '/include/comment_view.php';

include 'footer.php';

?>