<?php
// $Id: directory.php 5204 2010-09-06 20:10:52Z mageg $
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
// Author: XOOPS Foundation                                                  //
// URL: http://www.xoops.org/                                                //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

	include ('header.php');
	xoops_loadLanguage('admin', 'sam');
	
	xoops_cp_header();		
	
	$indexAdmin = new ModuleAdmin();
	echo $indexAdmin->addNavigation('admin/index.php');
		
	$indexAdmin = new ModuleAdmin();
	
	if (empty($GLOBALS['samModuleConfig']['db_type'])||empty($GLOBALS['samModuleConfig']['db_host'])||empty($GLOBALS['samModuleConfig']['db_name'])||empty($GLOBALS['samModuleConfig']['db_user'])||empty($GLOBALS['samModuleConfig']['db_pass'])||empty($GLOBALS['samModuleConfig']['db_charset'])||empty($GLOBALS['samModuleConfig']['sam_host'])||empty($GLOBALS['samModuleConfig']['sam_port'])) {
		$indexAdmin->addInfoBox(_AM_SAM_PREF_NEEDTOBESET);
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_DB_TYPE."</label>", empty($GLOBALS['samModuleConfig']['db_type'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['db_type'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_DB_HOST."</label>", empty($GLOBALS['samModuleConfig']['db_host'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['db_host'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_DB_NAME."</label>", empty($GLOBALS['samModuleConfig']['db_name'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['db_name'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_DB_USER."</label>", empty($GLOBALS['samModuleConfig']['db_user'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['db_user'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_DB_PASS."</label>", empty($GLOBALS['samModuleConfig']['db_pass'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['db_pass'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_DB_CHARSET."</label>", empty($GLOBALS['samModuleConfig']['db_charset'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['db_charset'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_SAM_HOST."</label>", empty($GLOBALS['samModuleConfig']['sam_host'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['sam_host'])?'Red':'Green');
		$indexAdmin->addInfoBoxLine(_AM_SAM_PREF_NEEDTOBESET, "<label>"._AM_SAM_PREF_SAM_PORT."</label>", empty($GLOBALS['samModuleConfig']['sam_port'])?_NO:_YES, empty($GLOBALS['samModuleConfig']['sam_port'])?'Red':'Green');
	} else {
		$songlist_handler = xoops_getmodulehandler('songlist', 'sam');
	    $requestlist_handler = xoops_getmodulehandler('requestlist', 'sam');
 		$indexAdmin->addInfoBox(_AM_SAM_COUNTS);
        $indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_SONGS."</label>", $songlist_handler->getCount(NULL), 'Green');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_BROADCAST_SONGS."</label>", $songlist_handler->getCount(new Criteria('`songrights`', 'broadcast')), 'Green');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_DOWNLOAD_SONGS."</label>", $songlist_handler->getCount(new Criteria('`songrights`', 'download')), 'Green');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_ONDEMAND_SONGS."</label>", $songlist_handler->getCount(new Criteria('`songrights`', 'on-demand')), 'Green');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_ROAYALTYFREE_SONGS."</label>", $songlist_handler->getCount(new Criteria('`songrights`', 'royaltyfree')), 'Green');
        $indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_REQUESTS."</label>", $requestlist_handler->getCount(NULL), 'Orange');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_NEW_REQUESTS."</label>", $requestlist_handler->getCount(new Criteria('`status`', 'new')), 'Orange');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_PENDING_REQUESTS."</label>", $requestlist_handler->getCount(new Criteria('`status`', 'pending')), 'Orange');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_IGNORED_REQUESTS."</label>", $requestlist_handler->getCount(new Criteria('`status`', 'ignored')), 'Orange');
    	$indexAdmin->addInfoBoxLine(_AM_SAM_COUNTS, "<label>"._AM_SAM_THEREARE_PLAYED_REQUESTS."</label>", $requestlist_handler->getCount(new Criteria('`status`', 'played')), 'Orange');
	}    	
    echo $indexAdmin->renderIndex();
	xoops_cp_footer();	

?>