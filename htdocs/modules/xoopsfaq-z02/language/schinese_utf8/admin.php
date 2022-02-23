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
define('_AM_FAQ_EDIT', '编辑条目' );
define('_AM_FAQ_DELETE', '删除条目' );
define('_AM_FAQ_CREATENEW', '创建条目' );
define('_AM_FAQ_MODIFYITEM', '修改条目: %s' );
//define('_AM_FAQ_CREATENEW', '新建' );
define('_AM_FAQ_NOLISTING', '没有找到任何条目' );

/**
 * Content
 */
define('_AM_FAQ_CONTENTS_HEADER', '帮助中心内容管理' );
define('_AM_FAQ_CONTENTS_SUBHEADER', '' );
define('_AM_FAQ_CONTENTS_LIST_DSC', '' );
define('_AM_FAQ_CONTENTS_ID', '#' );
define('_AM_FAQ_CONTENTS_TITLE', '标题' );
define('_AM_FAQ_CONTENTS_WEIGHT', '顺序' );
define('_AM_FAQ_CONTENTS_PUBLISH', '已发布' );
define('_AM_FAQ_CONTENTS_ACTIVE', '启用' );
define('_AM_FAQ_ACTIONS', '操作' );
define('_AM_FAQ_CONTENTS_CATEGORY', '类别:' );
define('_AM_FAQ_CONTENTS_CATEGORY_DSC', '请选择条目所属类别' );
define('_AM_FAQ_CONTENTS_TITLE', '标题:' );
define('_AM_FAQ_CONTENTS_TITLE_DSC', '输入此条目的标题.' );
define('_AM_FAQ_CONTENTS_CONTENT', '内容:' );
define('_AM_FAQ_CONTENTS_CONTENT_DSC', '' );
define('_AM_FAQ_CONTENTS_PUBLISH', '发布时间:' );
define('_AM_FAQ_CONTENTS_PUBLISH_DSC', '选择条目的发布时间' );
define('_AM_FAQ_CONTENTS_WEIGHT', '条目顺序:' );
define('_AM_FAQ_CONTENTS_WEIGHT_DSC', '输入一个有效数字 ' );
define('_AM_FAQ_CONTENTS_ACTIVE', '启用这个项目:' );
define('_AM_FAQ_CONTENTS_AVTIVE_DSC', '选择是否在前台显示这个条目' );
define('_AM_FAQ_DOHTML', '以HTML格式显示' );
define('_AM_FAQ_BREAKS', '转换Linebreaks为Xoopskreaks' );
define('_AM_FAQ_DOIMAGE', '显示Xoops图片' );
define('_AM_FAQ_DOXCODE', '显示Xoops代码' );
define('_AM_FAQ_DOSMILEY', '显示Xoops表情' );

/**
 * Category
 */
define('_AM_FAQ_ADDCAT', '增加分类' );
define('_AM_FAQ_CATEGORY_HEADER', '帮助中心分类管理' );
define('_AM_FAQ_CATEGORY_SUBHEADER', '' );
define('_MA_FAQ_CATEGORY_DELETE_DSC', 'Delete Check! You are about to delete this item. You can cancel this action by clicking on the cancel button or you can choose to continue.<br /><br />This action is not reversible.' );
define('_MA_FAQ_CATEGORY_EDIT_DSC', '编辑模式: You can edit this item properties here. Click the submit button to make your changes permanent or click Cancel to return you were you where.' );
define('_AM_FAQ_CATEGORY_LIST_DSC', '' );
define('_AM_FAQ_ID', '#' );
define('_AM_FAQ_TITLE', '标题' );
define('_AM_FAQ_CATEGORY_WEIGHT', '权重' );

define('_AM_FAQ_TITLE', '类别标题:' );
define('_AM_FAQ_TITLE_DSC', '' );
define('_AM_FAQ_CATEGORY_WEIGHT', '类别顺序:' );
define('_AM_FAQ_CATEGORY_WEIGHT_DSC', '' );

/**
 * Database and error
 */
define('_MA_FAQ_FAQ_SUBERROR', '发生了一个错误<br />' );
define('_AM_FAQ_RUSURECAT', '你确定要删除这个类别和里面所有的问答吗？' );
define('_AM_FAQ_DBSUCCESS', '数据库更新成功!' );
define('_AM_FAQ_ERRORNOCATEGORY', '错误: 没有选择任何分类，请返回选择一个分类' );
define('_AM_FAQ_ERRORCOULDNOTADDCAT', '错误: 无法增加分类.' );
define('_AM_FAQ_ERRORCOULDNOTDELCAT', '错误: 无法删除分类.' );
define('_AM_FAQ_ERRORCOULDNOTEDITCAT', '错误: 无法编辑条目.' );
define('_AM_FAQ_ERRORCOULDNOTDELCONTENTS', '错误: 无法删除FAQ内容.' );
define('_AM_FAQ_ERRORCOULDNOTUPCONTENTS', '错误: 无法更新FAQ内容' );
define('_AM_FAQ_ERRORCOULDNOTADDCONTENTS', '错误: 无法增加FAQ条目.' );
define('_AM_FAQ_NOTHTINGTOSHOW', '没有条目' );
define('_AM_FAQ_ERRORNOCAT', '错误: 现在还没有类别。请先创建一个类别' );

//--------------------------------------------------------------------
define('_AM_FAQ_CONTENTS_URL', 'URL' );

define('_AM_FAQ_CONTENTS_SEEALSO', 'Voir aussi' );
define('_AM_FAQ_CONTENTS_SEEALSO_DSC', "URL de référence. \"http://\" sera ajouté automatiquement si nécéssaire.</ br>Le libellé remplacera l'url pour l'affichage" );

define('_AM_FAQ_CONTENTS_LIBSEEALSO', 'Libellé' );
define('_AM_FAQ_CONTENTS_LIBSEEALSO_DSC', "Libellé optionel de l'URL" );

define('_AM_FAQ_CONTENTS_ANSWER', 'Réponse courte' );
define('_AM_FAQ_CONTENTS_ANSWER_DSC', 'Réponse courte affichée dans les listes.' );

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