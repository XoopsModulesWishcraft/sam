<?php


function b_sam_block_currentsong_show( $options )
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
	$currentSong = $songlist_handler->getCurrentSong();
	$block['currentSong'] =  $currentSong->toArray();
	
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY, array('type'=>'text/javascript'), '', 'jquery');
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY_CORNERS, array('type'=>'text/javascript'), '', 'jquery.corner');
	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL._BL_SAM_CSS_CURRENTSONG, array('type'=>'text/css'), '', 'currentsongcss');
	
	return $block;
}


function b_sam_block_currentsong_edit( $options )
{
	xoops_load('XoopsFormLoader');
	xoops_loadLanguage('blocks', 'sam');

}
?>