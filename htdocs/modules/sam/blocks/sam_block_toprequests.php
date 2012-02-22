<?php


function b_sam_block_toprequests_show( $options )
{
	xoops_loadLanguage('blocks', 'sam');
	xoops_loadLanguage('modinfo', 'sam');

	$songlist_handler = xoops_getmodulehandler('songlist', basename(dirname(dirname(__FILE__))));
	
	$config_handler = xoops_gethandler('config');
	$module_handler = xoops_gethandler('module');
	$GLOBALS['samModule'] = $module_handler->getByDirname('sam');
	$GLOBALS['samModuleConfig'] = $config_handler->getConfigList($GLOBALS['samModule']->getVar('mid'));
	
	$block = array();
	$block = $GLOBALS['samModuleConfig'];
	
	foreach ($songlist_handler->getTopRequestedSongs() as $id=>$topRequestedSong) {
		$block['topRequestedSongs'][$id] = $topRequestedSong->toArray();
	}
	
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY, array('type'=>'text/javascript'), '', 'jquery');
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY_CORNERS, array('type'=>'text/javascript'), '', 'jquery.corner');
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_COMMON, array('type'=>'text/javascript'), '', 'common');
	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL._BL_SAM_CSS_TOPREQUESTS, array('type'=>'text/css'), '', 'toprequestcss');
	return $block;
}


function b_sam_block_toprequests_edit( $options )
{
	xoops_load('XoopsFormLoader');
	xoops_loadLanguage('blocks', 'sam');

}
?>