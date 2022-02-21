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

namespace Permissions;

defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );
use Xmf\Module\Helper as xHelper;
include_once "constantes.php";



/**
 * @param $user
 *
 * @return string
 */
 function getUserGroup(&$user)
{
    if (is_a($user, 'XoopsUser')) {
        return $user->getGroups();
    }

    return XOOPS_GROUP_ANONYMOUS;
}

/****************************************************************
 *
 * **************************************************************/
function isPermited($permName, $id){
global $xoopsUser;

    $userGroup = getUserGroup($xoopsUser);
    //if(in_array (1, $userGroup)) return true;


    $tPerm = getPermissions($permName, true);
    if (count($tPerm) > 0){
        $tPerm = array_flip($tPerm);
        $ok = array_key_exists($id, $tPerm);
    } else{
        $ok = false;
    }
//    echo "<hr>===>isPermited : " . (($ok) ? 'oui' : 'non') . "<pre>" . print_r($tPerm, true) . "</pre><br>";
    //exit;
    return $ok;
}

/****************************************************************
 *
 * **************************************************************/
function getPermissions($permName, $retAsArray = false){
global $xoopsUser;


        $user = $xoopsUser;
        $userId = $user ? $user->getVar('uid') : 0;
        $groupPermHandler = xoops_getHandler('groupperm');
        $moduleHandler    = xoops_getHandler('module');
        $module           = $moduleHandler->getByDirname('xoopsfaq');
        $mid              = $module->getVar('mid');
        $userGroup        = getUserGroup($user);

        if (!$module) {
           return false;
        }

        $tPerms = $groupPermHandler->getItemIds($permName, $userGroup, $mid);
//         echo "===>permName = {$permName} - mid = {$mid}<br>";
//         echo "<hr>===>groupes id : {$userId}<pre>" . print_r($userGroup, true) . "</pre><br>";
//         echo "<hr>===>Permissions<pre>" . print_r($tPerms, true) . "</pre><br>";
        if ($retAsArray)
            return $tPerms;
        else
            return implode(",", $tPerms);


//         exit;



}
/****************************************************************
 *
 * **************************************************************/
function addPermissions($permName, $id){
global $xoopsUser;


        $user = $xoopsUser;
        $userId = $user ? $user->getVar('uid') : 0;
        $groupPermHandler = xoops_getHandler('groupperm');
        $moduleHandler    = xoops_getHandler('module');
        $module           = $moduleHandler->getByDirname('xoopsfaq');
        $mid              = $module->getVar('mid');
        $userGroup        = getUserGroup($user);

        if (!$module) {
           return false;
        }

        foreach ($userGroup as $groupId){
            $groupPermHandler->addRight($permName, $id, $groupId, $mid);
        }
}




?>
