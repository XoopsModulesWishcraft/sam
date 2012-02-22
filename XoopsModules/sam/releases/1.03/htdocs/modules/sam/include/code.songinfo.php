<?php
include(dirname(__FILE__).'/header.php');
$songID = isset($_REQUEST['songID'])?intval($_REQUEST['songID']):0;
global $xoopsOption, $xoopsConfig, $xoopsModule;
$xoopsOption['theme_use_smarty'] = 1;

    // include Smarty template engine and initialize it
require_once $GLOBALS['xoops']->path('class/template.php');
require_once $GLOBALS['xoops']->path('class/theme.php');
require_once $GLOBALS['xoops']->path('class/theme_blocks.php');

$xoopsThemeFactory = null;
$xoopsThemeFactory = new xos_opal_ThemeFactory();
$xoopsThemeFactory->allowedThemes = $xoopsConfig['theme_set_allowed'];
$xoopsThemeFactory->defaultTheme = $xoopsConfig['theme_set'];


$xoTheme  =& $xoopsThemeFactory->createInstance(array('contentTemplate' => 'db:sam_songinfo.html'));
$xoopsTpl =& $xoTheme->template;

$xoopsTpl->assign('songID', $songID);

// The song object specified by the songID
$song = $songlist_handler->get($songID);

if (is_object($song))
	$xoopsTpl->assign('song', $song->toArray());

$xoopsTpl->display('db:sam_songinfo.html');

?>