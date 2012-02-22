<?php

/* This script will check if a new song started playing and then return javascript code that will refresh the current page */
try {

	// Get the code for this page
	require_once(dirname(__FILE__).'/include/code.songcheck.php');

} catch (Exception $ex) {
	// The error page will be displayed if anything goes wrong above
	$message = $ex->getMessage();
	require_once(dirname(dirname(dirname(__FILE__))).'/mainfile.php');
	$xoopsOption['template_main'] = 'sam_error.html';
	require_once(dirname(dirname(dirname(__FILE__))).'/header.php');
	$GLOBALS['xoopsTpl']->assign('message', $message);
	require_once(dirname(dirname(dirname(__FILE__))).'/footer.php');
	
}

?>