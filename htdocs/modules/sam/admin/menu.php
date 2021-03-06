<?php
/**
 * Extended User Profile
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code 
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         profile
 * @since           2.3.0
 * @author          Jan Pedersen
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: menu.php 2021 2008-08-31 02:02:45Z phppp $
 */
$module_handler = xoops_gethandler('module');
$GLOBALS['profileModule'] = $module_handler->getByDirname('sam');
$adminmenu = array();	
$adminmenu[0]['title'] = _MI_SAM_DASHBOARD;
$adminmenu[0]['icon'] = '../../'.$GLOBALS['profileModule']->getInfo('icons32').'/about.png';
$adminmenu[0]['image'] = '../../'.$GLOBALS['profileModule']->getInfo('icons32').'/about.png';
$adminmenu[0]['link'] = "admin/index.php";
$adminmenu[1]['title'] = _MI_SAM_ABOUT;
$adminmenu[1]['icon'] = '../../'.$GLOBALS['profileModule']->getInfo('icons32').'/about.png';
$adminmenu[1]['image'] = '../../'.$GLOBALS['profileModule']->getInfo('icons32').'/about.png';
$adminmenu[1]['link'] = "admin/about.php";

?>