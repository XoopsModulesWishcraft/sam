<?php
	require_once (dirname(__FILE__).'/xml.php');
	require_once (dirname(dirname(dirname(dirname(__FILE__)))).'/mainfile.php');
	
	xoops_loadLanguage('modinfo', basename(dirname(dirname(__FILE__))));
	xoops_loadLanguage('main', basename(dirname(dirname(__FILE__))));
	
	$config_handler = xoops_gethandler('config');
	$module_handler = xoops_gethandler('module');
	
	$GLOBALS['samModule'] = $module_handler->getByDirname(basename(dirname(dirname(__FILE__))));
	$GLOBALS['samModuleConfig'] = $config_handler->getConfigList($GLOBALS['samModule']->getVar('mid'));
		
	$songlist_handler = xoops_getmodulehandler('songlist', basename(dirname(dirname(__FILE__))));
		
?>