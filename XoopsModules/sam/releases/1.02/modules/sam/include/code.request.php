<?php
require_once(dirname(__FILE__).'/header.php');
$errormessage = '';
$songID = isset($_REQUEST['songID'])?intval($_REQUEST['songID']):0;

if (empty($songID)) {
	$errormessage = 'Song ID must be valid';
}

$requestID = isset($_REQUEST['requestID'])?intval($_REQUEST['requestID']):0;
 if ($requestID === 0) { //This is a new request for a song
	$host = $_SERVER["REMOTE_ADDR"];
	
	$request = "GET /req/?songID=$songID&host=" . urlencode($host) . " HTTP\1.0\r\n\r\n";
	
	$xmldata = "";
	$fd = @fsockopen($GLOBALS['samModuleConfig']['sam_host'], $GLOBALS['samModuleConfig']['sam_port'], $errno, $errstr, 30);
	
	if (!empty($fd)) {
		fputs($fd, $request);
		$line = "";
		while (!($line == "\r\n")) {
			$line = fgets($fd, 128);
		}// strip out the header
		while ($buffer = fgets($fd, 4096)) {
			$xmldata .= $buffer;
		}
		fclose($fd);
	} else {
		$errormessage .= 'Unable to connect to ' . $GLOBALS['samModuleConfig']['sam_host'] . ':' . $GLOBALS['samModuleConfig']['sam_port'] . ". Station might be offline.<br>The error returned was $errstr ($errno).";
	}
	
	if (empty($xmldata)) {
		$errormessage .= '<br/>'.'Invalid data returned!';
	}
	
	//#################################
	//	Initialize data
	//#################################
	$tree = XML2Array($xmldata);
	if (isset($tree["REQUEST"]))
		$request = Keys2Lower($tree["REQUEST"]);
	else 
		$request = array('status'=>array('code'=>500, 'message'=>'No communication with server', 'requestid'=>0));
	
	$code = $request["status"]["code"];
	$message = $request["status"]["message"];
	$requestID = $request["status"]["requestid"];
	
	if (empty($code)) {
		$errormessage .= '<br/>'.'Invalid data returned!';
	}
	
	if ($code != 200) {
		$errormessage .= '<br/>'.$message;
	} else {
		$requestlist_handler = xoops_getmodulehandler('requestlist', 'sam');
		$request = $requestlist_handler->create();
		$request->setVar('ID', $requestID);
		$request->setVar('songID', $songID);
		$request->setVar('code', $code);
		$request->setVar('host', $host);
		$request->setVar('ETA', date('Y-m-d H:i:s'));
		$request->setVar('t_stamp', date('Y-m-d H:i:s'));
		$requestID = $requestlist_handler->insert($request);
	}
} else { //If a request was already made, allow dedication to the request
	$data = array();
	$data['msg'] = strip_tags($_REQUEST['rmessage']);
	$data['name'] = strip_tags($_REQUEST['rname']);

	$requestlist_handler = xoops_getmodulehandler('requestlist', 'sam');
	$request = $requestlist_handler->get($requestID);
	if (is_object($request)) {
		$request->setVars($data);
		$requestlist_handler->insert($request);
	}
}
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
$xoTheme  =& $xoopsThemeFactory->createInstance(array('contentTemplate' => 'db:sam_request.html'));
$xoopsTpl =& $xoTheme->template;

$xoopsTpl->assign('songID', $songID);
$xoopsTpl->assign('requestID', $requestID);
// Retrieve details of the requested song from the database.
if ($requestID > 0) {
	$song = $songlist_handler->getRequestedSong($requestID, true);
	if (is_object($song)) {
		$xoopsTpl->assign('song', $song->toArray());
	}
} elseif ($songID>0) {
	$song = $songlist_handler->get($songID, true);
	if (is_object($song)) {
		$xoopsTpl->assign('song', $song->toArray());
	}
}

if (empty($errormessage)) {
	$xoopsTpl->display('db:sam_request.html');
} else {
	$xoopsTpl->assign('message', $errormessage);
	$xoopsTpl->display('db:sam_request_error.html');
}

?>