<?php
/**
 * Name: admin.php
 * Description: Xoops FAQ module admin language defines
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
 * @subpackage : Module Language
 * @since 2.5.7
 * @author John Neill
 * @version $Id: admin.php 0000 10/04/2009 09:05:06 John Neill $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
include_once "common.php";


/**
 * Icons
 */
define('_AM_FAQ_EDIT', 'Edit Item' );
define('_AM_FAQ_DELETE', 'Delete Item' );
define('_AM_FAQ_CREATENEW', 'Create New Item' );
define('_AM_FAQ_MODIFYITEM', 'Modify Item: %s' );
//define('_AM_FAQ_CREATENEW', 'Create New' );
define('_AM_FAQ_NOLISTING', 'No Items Found' );

/**
 * Content
 */
define('_AM_FAQ_CONTENTS_HEADER', 'Faq Content Management' );
define('_AM_FAQ_CONTENTS_SUBHEADER', '' );
define('_AM_FAQ_CONTENTS_LIST_DSC', '' );
define('_AM_FAQ_CONTENTS_ID', '#' );
define('_AM_FAQ_CONTENTS_TITLE', 'Content Title' );
define('_AM_FAQ_CONTENTS_WEIGHT', 'Weight' );
define('_AM_FAQ_CONTENTS_PUBLISH', 'Published' );
define('_AM_FAQ_CONTENTS_ACTIVE', 'Active' );
define('_AM_FAQ_ACTIONS', 'Actions' );
define('_AM_FAQ_CONTENTS_CATEGORY', 'Content Category:' );
define('_AM_FAQ_CONTENTS_CATEGORY_DSC', 'Select a category you wish this item to be placed under' );
define('_AM_FAQ_CONTENTS_TITLE', 'Content Title:' );
define('_AM_FAQ_CONTENTS_TITLE_DSC', 'Enter a title for this item.' );
define('_AM_FAQ_CONTENTS_CONTENT', 'Content Body:' );
define('_AM_FAQ_CONTENTS_CONTENT_DSC', '' );
define('_AM_FAQ_CONTENTS_PUBLISH', 'Content Time:' );
define('_AM_FAQ_CONTENTS_PUBLISH_DSC', 'Select the date for the publish date' );
define('_AM_FAQ_CONTENTS_WEIGHT', 'Content Weight:' );
define('_AM_FAQ_CONTENTS_WEIGHT_DSC', 'Enter a value for the item order. ' );
define('_AM_FAQ_CONTENTS_ACTIVE', 'Content Active:' );
define('_AM_FAQ_CONTENTS_AVTIVE_DSC', 'Select whether this item will be hidden or not' );
define('_AM_FAQ_DOHTML', 'Show as Html' );
define('_AM_FAQ_BREAKS', 'Convert Linebreaks to Xoopskreaks' );
define('_AM_FAQ_DOIMAGE', 'Show Xoops Images' );
define('_AM_FAQ_DOXCODE', 'Show Xoops Codes' );
define('_AM_FAQ_DOSMILEY', 'Show Xoops Smilies' );

/**
 * Category
 */
define('_AM_FAQ_ADDCAT', 'Add Category' );
define('_AM_FAQ_CATEGORY_HEADER', 'Faq Category Management' );
define('_AM_FAQ_CATEGORY_SUBHEADER', '' );
define('_MA_FAQ_CATEGORY_DELETE_DSC', 'Delete Check! You are about to delete this item. You can cancel this action by clicking on the cancel button or you can choose to continue.<br /><br />This action is not reversible.' );
define('_MA_FAQ_CATEGORY_EDIT_DSC', 'Edit Mode: You can edit this item properties here. Click the submit button to make your changes permanent or click Cancel to return you were you where.' );
define('_AM_FAQ_CATEGORY_LIST_DSC', '' );
define('_AM_FAQ_ID', '#' );
define('_AM_FAQ_TITLE', 'Title' );
define('_AM_FAQ_CATEGORY_WEIGHT', 'Weight' );

define('_AM_FAQ_TITLE', 'Category Title:' );
define('_AM_FAQ_TITLE_DSC', '' );
define('_AM_FAQ_CATEGORY_WEIGHT', 'Category Weight:' );
define('_AM_FAQ_CATEGORY_WEIGHT_DSC', '' );

/**
 * Database and error
 */
define('_MA_FAQ_FAQ_SUBERROR', 'We have encountered an Error<br />' );
define('_AM_FAQ_RUSURECAT', 'Are you sure you want to delete this category and all of its FAQ?' );
define('_AM_FAQ_DBSUCCESS', 'Database Updated Successfully!' );
define('_AM_FAQ_ERRORNOCATEGORY', 'Error: No category name given, please go back and enter a category name' );
define('_AM_FAQ_ERRORCOULDNOTADDCAT', 'Error: Could not add category to database.' );
define('_AM_FAQ_ERRORCOULDNOTDELCAT', 'Error: Could not delete requested category.' );
define('_AM_FAQ_ERRORCOULDNOTEDITCAT', 'Error: Could not edit requested item.' );
define('_AM_FAQ_ERRORCOULDNOTDELCONTENTS', 'Error: Could not delete FAQ contents.' );
define('_AM_FAQ_ERRORCOULDNOTUPCONTENTS', 'Error: Could not update FAQ contents.' );
define('_AM_FAQ_ERRORCOULDNOTADDCONTENTS', 'Error: Could not add FAQ contents.' );
define('_AM_FAQ_NOTHTINGTOSHOW', 'No Items To Display' );
define('_AM_FAQ_ERRORNOCAT', 'Error: There are no Categories created yet. Before you can create a new FAQ, you must create a Category first.' );


define('_AM_FAQ_CONTENTS_URL', 'URL' );

define('_AM_FAQ_CONTENTS_SEEALSO', 'See also' );
define('_AM_FAQ_CONTENTS_SEEALSO_DSC', "URL of reference. \"http://\" will be add.</ br>Le caption replace the url for showing" );

define('_AM_FAQ_CONTENTS_LIBSEEALSO', 'Caption' );
define('_AM_FAQ_CONTENTS_LIBSEEALSO_DSC', "Optional caption of URL" );

define('_AM_FAQ_CONTENTS_ANSWER', 'Short answer' );
define('_AM_FAQ_CONTENTS_ANSWER_DSC', 'short answer for the list.' );

define('_AM_FAQ_CONTENTS_QUESTIONS', 'Questions' );
define('_AM_FAQ_CONTENTS_QUESTIONS_DSC', 'Questions.' );

define ('_AM_FAQ_COLOR_SET', 'Color set');
define ('_AM_FAQ_COLOR_SET_DESC', 'Défini le jeu de couleurs pour cette catégorie. Les jeux de couleurs sont définis dans le CSS "style-item-color.css" du module, du theme ou du framework JJD (voir les options du module)');

define('_AM_FAQ_CATEGORY', 'Categorys' );

define('_AM_FAQ_PERMISSIONS', 'Permissions' );
define('_AM_FAQ_CONSULT', 'View' );
define('_AM_FAQ_ADMIN', 'Admin of module' );
define('_AM_FAQ_MANAGE_QUESTIONS', 'Manage questions' );
define('_AM_FAQ_MANAGE_CATEGORYS', 'Manage categorys');
define('_AM_FAQ_MANAGE', 'Manage module');

define('_AM_FAQ_CATS_CONSULT', 'View by category of FAQ');

define('_AM_FAQ_PERMS_ADM_MODULE','Manage module');
define('_AM_FAQ_PERMS_ADM_CATEGORYS','Manage catgorys');
define('_AM_FAQ_PERMS_ADM_FAQ','Manage questions');
define('_AM_FAQ_PERMS_ADM_PERMS','Manage permissions');

?>