<?php


function b_sam_block_partnerlinks_show( $options )
{
	xoops_loadLanguage('blocks', 'sam');
	xoops_loadLanguage('modinfo', 'sam');
		
	$config_handler = xoops_gethandler('config');
	$module_handler = xoops_gethandler('module');
	$GLOBALS['samModule'] = $module_handler->getByDirname('sam');
	$GLOBALS['samModuleConfig'] = $config_handler->getConfigList($_Mod->getVar('mid'));
	
	$block = array();
	$block = $GLOBALS['samModuleConfig'];
	$block['username'] = $options[0]; 
	
	$GLOBALS['xoTheme']->addScript(sprintf(_BL_SAM_ADDTHIS_JAVASCRIPT, $options[0]), array('type'=>'text/javascript'));
	
	return $block;
}


function b_sam_block_partnerlinks_edit( $options )
{
	xoops_load('XoopsFormLoader');
	xoops_loadLanguage('blocks', 'uitabs');
	
	$username = new XoopsFormText('', 'options[0]', 25, 40, $options[0]);
		
	$form = _BL_SAM_ADDTHIS_USERNAME.$username->render()."<br/>";
	return $form ;
}
?>