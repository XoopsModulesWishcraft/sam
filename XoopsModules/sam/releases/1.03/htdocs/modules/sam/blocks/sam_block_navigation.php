<?php


function b_sam_block_navigation_show( $options )
{
	xoops_loadLanguage('blocks', 'sam');
	xoops_loadLanguage('modinfo', 'sam');
		
	$config_handler = xoops_gethandler('config');
	$module_handler = xoops_gethandler('module');
	$GLOBALS['samModule'] = $module_handler->getByDirname('sam');
	$GLOBALS['samModuleConfig'] = $config_handler->getConfigList($GLOBALS['samModule']->getVar('mid'));
	
	$block = array();
	$block = $GLOBALS['samModuleConfig'];
	
	$block['allow_player'] = $options[0];
	$block['allow_nowplaying'] = $options[1];
	$block['allow_playlistrequest'] = $options[2];
	$block['allow_contactus'] = $options[3];
		
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY, array('type'=>'text/javascript'), '', 'jquery');
	$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY_CORNERS, array('type'=>'text/javascript'), '', 'jquery.corner');
	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL._BL_SAM_CSS_NAVIGATION, array('type'=>'text/css'), '', 'navigationmenucss');
	return $block;
}


function b_sam_block_navigation_edit( $options )
{
	xoops_load('XoopsFormLoader');
	xoops_loadLanguage('blocks', 'sam');
	
	$allow_player = new XoopsFormRadioYN('', 'options[0]', $options[0]);
	$allow_nowplaying = new XoopsFormRadioYN('', 'options[1]', $options[1]);
	$allow_playlistrequest = new XoopsFormRadioYN('', 'options[2]', $options[2]);
	$allow_contactus = new XoopsFormRadioYN('', 'options[3]', $options[3]);
		
	$form = _BL_SAM_ALLOW_PLAYER.$allow_player->render()."<br/>";
	$form .= _BL_SAM_ALLOW_NOWPLAYING.$allow_nowplaying->render()."<br/>";
	$form .= _BL_SAM_ALLOW_PLAYLISTREQUEST.$allow_playlistrequest->render()."<br/>";
	$form .= _BL_SAM_ALLOW_CONTACTUS.$allow_contactus->render()."<br/>";
	return $form ;
}
?>