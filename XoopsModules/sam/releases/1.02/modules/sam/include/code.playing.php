<?php

// The class handling song info
require_once(dirname(__FILE__).'/header.php');
$xoopsOption['template_main'] = 'sam_playing.html';
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/header.php');
$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY, array('type'=>'text/javascript'), '', 'jquery');
$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_JQUERY_CORNERS, array('type'=>'text/javascript'), '', 'jquery.corner');
$GLOBALS['xoTheme']->addScript(XOOPS_URL._MI_SAM_JS_COMMON, array('type'=>'text/javascript'), '', 'common');
$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL._MI_SAM_CSS_STYLE, array('type'=>'text/css'), '', 'style');
	
if ($GLOBALS['samModuleConfig']['allow_requests']) {
	$GLOBALS['xoTheme']->addScript('', array('type'=>'text/javascript'), '/**
 * Open a popup window to send a song request to SAM
 */
function request(songID)
{
	'.($GLOBALS['samModuleConfig']['private_requests']?'
		requestPrivate(songID, \''.XOOPS_URL.'\', \'sam\');
}':'
		var samhost = "'.$GLOBALS['samModuleConfig']['sam_host'].'";
		var samport = "'.$GLOBALS['samModuleConfig']['sam_port'].'";
		requestAudioRealm(songID, samhost, samport);
	'.'
}'), 'request');
}

// The currently Playing song object
$currentSong = $songlist_handler->getCurrentSong();
$GLOBALS['xoopsTpl']->assign('currentSong', $currentSong->toArray());
if (!is_object($currentSong)) {
	$err_message[] = 'No trackinfo retrieved, is SAM currently playing?';
}

// An array of song objects with songs that played recently
foreach ($songlist_handler->getRecentSongs() as $recentSong) {
	$GLOBALS['xoopsTpl']->append('recentSongs', $recentSong->toArray());
}
// An array of song objects with songs that are in the queue to be played
foreach ($songlist_handler->getComingSongs() as $comingSong) {
	$GLOBALS['xoopsTpl']->append('comingSongs', $comingSong->toArray());
}

if ($GLOBALS['samModuleConfig']['allow_requests']) {
	// An array of song objects with the top requested songs
	foreach ($songlist_handler->getTopRequestedSongs() as $topRequestedSong) {
		$GLOBALS['xoopsTpl']->append('topRequestedSongs', $topRequestedSong->toArray());
	}
}
$GLOBALS['xoopsTpl']->assign('err_message', $err_message);
$GLOBALS['xoopsTpl']->assign('xoConfig', $GLOBALS['samModuleConfig']);
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/footer.php');