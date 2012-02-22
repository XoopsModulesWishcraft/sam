<?php

// $Author: wishcraft $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Simon Roberts (AKA wishcraft)                                     //
// URL: http://www.chronolabs.org.au                                         //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

$modversion['name'] = 'SAM for XOOPS';
$modversion['version'] = 1.02;
$modversion['releasedate'] = "Tuesday: Feburary 22, 2012";
$modversion['description'] = 'SAM for XOOP is for SAM Broadcaster - Radio Automation Software';
$modversion['author'] = "Wishcraft";
$modversion['credits'] = "Simon Roberts (simon@chronolabs.coop)";
$modversion['help'] = "sam.html";
$modversion['license'] = "GPL 2.0";
$modversion['official'] = 0;
$modversion['module_status']  = "Stable";
$modversion['image'] = "images/sam_slogo.png";
$modversion['dirname'] = 'sam';

$modversion['system_menu'] = 1;
$modversion['hasMain'] = 1;
$modversion['website'] = "www.chronolabs.coop";

$modversion['dirmoduleadmin'] = 'Frameworks/moduleclasses';
$modversion['icons16'] = 'Frameworks/moduleclasses/icons/16';
$modversion['icons32'] = 'Frameworks/moduleclasses/icons/32';

$modversion['release_info'] = "Stable 2012/02/22";
$modversion['release_file'] = XOOPS_URL."/modules/sam/docs/changelog.txt";
$modversion['release_date'] = "2012/02/22";

$modversion['author_realname'] = "Simon Roberts";
$modversion['author_website_url'] = "http://www.chronolabs.coop";
$modversion['author_website_name'] = "Chronolabs Cooperative";
$modversion['author_email'] = "simon@chronolabs.coop";
$modversion['demo_site_url'] = "";
$modversion['demo_site_name'] = "";
$modversion['support_site_url'] = "";
$modversion['support_site_name'] = "Torque Radio";
$modversion['submit_bug'] = "";
$modversion['submit_feature'] = "";
$modversion['usenet_group'] = "sci.chronolabs";
$modversion['maillist_announcements'] = "";
$modversion['maillist_bugs'] = "";
$modversion['maillist_features'] = "";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Main things
$modversion['hasMain'] = 1;

//$modversion['onUpdate'] = "include/update.php";
//$modversion['onInstall'] = "include/install.php";
//$modversion['onUninstall'] = "include/uninstall.php";

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
// $modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Tables created by sql file (without prefix!)
$i=0;
//$modversion['tables'][$i++] = "sam_data";

// Blocks
$i=0;
$i++;
$modversion['blocks'][$i]['file'] = "sam_block_partnerlinks.php";
$modversion['blocks'][$i]['name'] = 'Partner Links' ;
$modversion['blocks'][$i]['description'] = "Shows Partner Links Block for SAM";
$modversion['blocks'][$i]['show_func'] = "b_sam_block_partnerlinks_show";
$modversion['blocks'][$i]['edit_func'] = "b_sam_block_partnerlinks_edit";
$modversion['blocks'][$i]['options'] = "spacialaudio";
$modversion['blocks'][$i]['template'] = "sam_block_partnerlinks.html" ;

// Templates
$i=0;
$i++;
$modversion['templates'][$i]['file'] = 'sam_header.html';
$modversion['templates'][$i]['description'] = 'Main header for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_footer.html';
$modversion['templates'][$i]['description'] = 'Main Footer for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_playing.html';
$modversion['templates'][$i]['description'] = 'Main Playing Template for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_playlist.html';
$modversion['templates'][$i]['description'] = 'Main Playlist Template for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_request.html';
$modversion['templates'][$i]['description'] = 'Main Request Template for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_request_error.html';
$modversion['templates'][$i]['description'] = 'Main Request Error  Template for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_songcheck.html';
$modversion['templates'][$i]['description'] = 'Main Song Check Template for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_songinfo.html';
$modversion['templates'][$i]['description'] = 'Main Song Information Template for SAM for XOOPS';
$i++;
$modversion['templates'][$i]['file'] = 'sam_error.html';
$modversion['templates'][$i]['description'] = 'Main Error Template for SAM for XOOPS';

$i=0;
$i++;
$modversion['config'][$i]['name'] = 'db_type';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_TYPE";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_TYPE_DESC";
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'mysql';
$modversion['config'][$i]['options'] = array('MySQL'=>'mysql');

$i++;
$modversion['config'][$i]['name'] = 'db_prefix';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_PREFIX";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_PREFIX_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'db_host';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_HOST";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_HOST_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'db_name';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_NAME";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_NAME_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'db_user';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_USER";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_USER_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'db_pass';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_PASS";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_PASS_DESC";
$modversion['config'][$i]['formtype'] = 'password';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'db_charset';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_CHARSET";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_CHARSET_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'utf8';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'db_proxy';
$modversion['config'][$i]['title'] = "_MI_SAM_DB_PROXY";
$modversion['config'][$i]['description'] = "_MI_SAM_DB_PROXY_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'station_name';
$modversion['config'][$i]['title'] = "_MI_SAM_STATION_NAME";
$modversion['config'][$i]['description'] = "_MI_SAM_STATION_NAME_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = $GLOBALS['xoopsConfig']['sitename'];
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'station_email';
$modversion['config'][$i]['title'] = "_MI_SAM_STATION_EMAIL";
$modversion['config'][$i]['description'] = "_MI_SAM_STATION_EMAIL_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = $GLOBALS['xoopsConfig']['adminmail'];
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'station_logo';
$modversion['config'][$i]['title'] = "_MI_SAM_STATION_LOGO";
$modversion['config'][$i]['description'] = "_MI_SAM_STATION_LOGO_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '/modules/sam/images/logo.png';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'station_id';
$modversion['config'][$i]['title'] = "_MI_SAM_STATION_ID";
$modversion['config'][$i]['description'] = "_MI_SAM_STATION_ID_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = false;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'allow_requests';
$modversion['config'][$i]['title'] = "_MI_SAM_ALLOW_REQUESTS";
$modversion['config'][$i]['description'] = "_MI_SAM_ALLOW_REQUESTS_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = true;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'private_requests';
$modversion['config'][$i]['title'] = "_MI_SAM_PRIVATE_REQUESTS";
$modversion['config'][$i]['description'] = "_MI_SAM_PRIVATE_REQUESTS_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = true;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'show_top_requests';
$modversion['config'][$i]['title'] = "_MI_SAM_SHOW_TOP_REQUESTS";
$modversion['config'][$i]['description'] = "_MI_SAM_SHOW_TOP_REQUESTS_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = true;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'top_request_count';
$modversion['config'][$i]['title'] = "_MI_SAM_TOP_REQUEST_COUNT";
$modversion['config'][$i]['description'] = "_MI_SAM_TOP_REQUEST_COUNT_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = true;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'request_days';
$modversion['config'][$i]['title'] = "_MI_SAM_REQUEST_DAYS";
$modversion['config'][$i]['description'] = "_MI_SAM_REQUEST_DAYS_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 30;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'sam_host';
$modversion['config'][$i]['title'] = "_MI_SAM_SAM_HOST";
$modversion['config'][$i]['description'] = "_MI_SAM_SAM_HOST_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'sam_port';
$modversion['config'][$i]['title'] = "_MI_SAM_SAM_PORT";
$modversion['config'][$i]['description'] = "_MI_SAM_SAM_PORT_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = '1221';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'show_pictures';
$modversion['config'][$i]['title'] = "_MI_SAM_SHOW_PICTURES";
$modversion['config'][$i]['description'] = "_MI_SAM_SHOW_PICTURES_DESC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = true;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'picture_url';
$modversion['config'][$i]['title'] = "_MI_SAM_PICTURE_URL";
$modversion['config'][$i]['description'] = "_MI_SAM_PICTURE_URL_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '/uploads/sam/';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'picture_url_na';
$modversion['config'][$i]['title'] = "_MI_SAM_PICTURE_URL_NA";
$modversion['config'][$i]['description'] = "_MI_SAM_PICTURE_URL_NA_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '/uploads/sam/na.png';
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'history_count';
$modversion['config'][$i]['title'] = "_MI_SAM_HISTORY_COUNT";
$modversion['config'][$i]['description'] = "_MI_SAM_HISTORY_COUNT_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 5;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'coming_up_count';
$modversion['config'][$i]['title'] = "_MI_SAM_COMING_UP_COUNT";
$modversion['config'][$i]['description'] = "_MI_SAM_COMING_UP_COUNT_DESC";
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 2;
$modversion['config'][$i]['options'] = array();

$i++;
$modversion['config'][$i]['name'] = 'check_interval';
$modversion['config'][$i]['title'] = "_MI_SAM_CHECK_INTERVAL";
$modversion['config'][$i]['description'] = "_MI_SAM_CHECK_INTERVAL_DESC";
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 30000;
$modversion['config'][$i]['options'] = array(	_MI_SAM_CHECK_INTERVAL_10S=>10000, _MI_SAM_CHECK_INTERVAL_15S=>15000, _MI_SAM_CHECK_INTERVAL_20S=>20000, _MI_SAM_CHECK_INTERVAL_25S=>25000, _MI_SAM_CHECK_INTERVAL_30S=>30000, 
												_MI_SAM_CHECK_INTERVAL_35S=>35000, _MI_SAM_CHECK_INTERVAL_40S=>40000, _MI_SAM_CHECK_INTERVAL_45S=>45000, _MI_SAM_CHECK_INTERVAL_50S=>50000, _MI_SAM_CHECK_INTERVAL_55S=>55000, 
												_MI_SAM_CHECK_INTERVAL_60S=>60000, _MI_SAM_CHECK_INTERVAL_90S=>90000, _MI_SAM_CHECK_INTERVAL_120S=>120000, _MI_SAM_CHECK_INTERVAL_150S=>150000, _MI_SAM_CHECK_INTERVAL_180S=>180000 
									   );

?>