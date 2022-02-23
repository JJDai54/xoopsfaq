<?php
/**
 * Name: modinfo.php
 * Description:
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
 * @subpackage : Menu Language
 * @since 2.5.7
 * @author John Neill
 * @version $Id: modinfo.php 0000 10/04/2009 09:08:46 John Neill $
 * Traduction: LionHell 
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Accès restreint' );
include_once "common.php";

/**
 * Module Version
 */
define('_MI_FAQ_XOOPSFAQ_NAME', 'Xoops FAQ' );
define('_MI_FAQ_XOOPSFAQ_DESC', 'Gestionnaire de FAQ Xoops' );

/**
 * Module Menu
 */
define('_MI_FAQ_MENU_MODULEHOME', 'Accueil du module' );
define('_MI_FAQ_MENU_MODULEBLOCKS', 'Blocs' );
define('_MI_FAQ_MENU_MODULETEMPLATES', 'Templates' );
define('_MI_FAQ_MENU_MODULECOMMENTS', 'Commentaires' );
define('_MI_FAQ_MENU_ADMININDEX', 'Index' );
define('_MI_FAQ_MENU_ADMINCATEGORY', 'Catégorie' );
define('_MI_FAQ_MENU_PERMISSIONS', 'Permissions');

/**
 * Module Prefs
 */
 
 /***********************************************************************/
define('_MI_FAQ_XOOPSFAQ_EDITORS', 'Choisir l\'éditeur:' );
define('_MI_FAQ_XOOPSFAQ_EDITORS_DSC', 'Veuillez choisir l\'éditeur que vous souhaitez utiliser. <br />Peut-être aurez-vous à installer un éditeur avant de pouvoir l\'utiliser.' );

define('_MI_FAQ_MENU_QUESTIONS', 'Questions' );

define('_MI_FAQ_MENU_ADMINCATEGORYS', 'Catégories' );

define("_MI_FAQ_XOOPSFAQ_INFO" , "<p>Gestionnaire de Foire aux questions.</p><p>C'est une mise à jour majeur du module.</p><h4>Fonctionalités :</h4><ul>  <li>Intégration du framework 'moduleadmin'</li>  <li>Mise à jour pour Xoops 2.5.7 & supérieur.</li></ul>");

define('_MI_FAQ_SHOWHIDE_OK', "<span style='color:green;'>Le plugin 'showHide.js' est installé<br>%s</span>" );
define('_MI_FAQ_SHOWHIDE_NO', "<span style='color:red;'>Le plugin 'showHide.js' n'est pas installé<br>%s</span>" );

define('_MI_FAQ_XOOPSFAQ_VERSION',"Mode d'affichage");
define('_MI_FAQ_XOOPSFAQ_VERSION_DSC',"Permet de conserver l'interface version antérieur à 2.30 avec 2 pages<br>ou nouvelle interface avec utilisation de showhide.js et color_set sur une seul page");
define('_MI_FAQ_XOOPSFAQ_VERSION_220',"Affichage version antérieur à 2.30");
define('_MI_FAQ_XOOPSFAQ_VERSION_230',"Affichage nouvelle interface (conseillé)");
define('_MI_FAQ_MENU_ABOUT',"A propos");
define('_MI_FAQ_MENU_LINKS',"Liens prédéfinis");

?>