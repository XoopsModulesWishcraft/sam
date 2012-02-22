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

/**
 * @var xos_opal_Theme
 */
$xoTheme  =& $xoopsThemeFactory->createInstance(array('contentTemplate' => @$xoopsOption['template_main']));
$xoopsTpl =& $xoTheme->template;

if (@is_object($xoTheme->plugins['xos_logos_PageBuilder'])) {
	$aggreg =& $xoTheme->plugins['xos_logos_PageBuilder'];
}

$GLOBAL['xoopsTpl']->assign('songID', $songID);

// The song object specified by the songID
$songChanged = $songlist_handler->checkSongChange($songID);
$GLOBAL['xoopsTpl']->display('db:sam_songcheck.html');

?>