<?php

// The class handling song info
require_once(dirname(__FILE__).'/header.php');
$xoopsOption['template_main'] = 'sam_playlist.html';
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


if ($GLOBALS['samModuleConfig']['allow_requests']) {
	// An array of song objects with the top requested songs
	foreach ($songlist_handler->getTopRequestedSongs() as $topRequestedSong) {
		$GLOBALS['xoopsTpl']->append('topRequestedSongs', $topRequestedSong->toArray());
	}
}

$start = isset($_REQUEST['start'])?intval($_REQUEST['start']):0;	// Where the playlist must start
$limit = isset($_REQUEST['limit'])?intval($_REQUEST['limit']):50;;	// How many items will be displayed
$search = isset($_REQUEST['search'])?($_REQUEST['search']):'';	// The search string
$character = isset($_REQUEST['character'])?($_REQUEST['character']):''; // The letter to sort the playlist by
if ("All" == $character) {
	unset($character);
}


//########## BUILD SEARCH STRING ################
$search_words = '';
if ($search <> '') {
	$search_words = array();
	$temp = explode(' ', $search);
	reset($temp);
	while (list($key, $val) = each($temp)) {
		$val = trim($val);
		if (!empty($val)) {
			$search_words[] = $val;
		}
	}
}

// An array of song objects matching the search criteria
$playlistSongs = $songlist_handler->getPlaylistSongs($search_words, $character, $start, $limit);
$cnt = $songlist_handler->getPlaylistSongCount($search_words, $character);
//########## =================== ################
$first = $start + 1;
$last = min($cnt, $start + $limit);
// Create the previous and next links based on the result
if ($cnt > 0) {
	$searchstr = urlencode($search);
	$prev = max(0, $start - $limit);
	if ($start > 0) {
		$GLOBALS['xoopsTpl']->assign('prevlnk', "<a href='?start=$prev&limit={$limit}&character=$character&search=$searchstr'>&lt;&lt; Previous</a>");
	}

	$tmp = ($start + $limit);
	if ($tmp < $cnt) {
		$GLOBALS['xoopsTpl']->assign('nextlnk', "<a href='?start=$tmp&limit={$limit}&character=$character&search=$searchstr'>Next &gt;&gt;</a>");
	}
}
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);
$GLOBALS['xoopsTpl']->assign('chracter', $chracter);
$GLOBALS['xoopsTpl']->assign('prev', $prev);
$GLOBALS['xoopsTpl']->assign('count', $cnt);
$GLOBALS['xoopsTpl']->assign('first', $first);
$GLOBALS['xoopsTpl']->assign('last', $last);

foreach ($playlistSongs as $playlistSong) {
	$GLOBALS['xoopsTpl']->append('playlistSongs', $playlistSong->toArray());
}
$GLOBALS['xoopsTpl']->assign('err_message', $err_message);
$GLOBALS['xoopsTpl']->assign('xoConfig', $GLOBALS['samModuleConfig']);
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/footer.php');

?>