<?php

	// Preferences
	define('_MI_SAM_DB_TYPE','SAM Database Type');
	define('_MI_SAM_DB_TYPE_DESC','');
	define('_MI_SAM_DB_PREFIX','SAM Database Prefix');
	define('_MI_SAM_DB_PREFIX_DESC','');
	define('_MI_SAM_DB_HOST','SAM Database Host');
	define('_MI_SAM_DB_HOST_DESC','');
	define('_MI_SAM_DB_NAME','SAM Database Name');
	define('_MI_SAM_DB_NAME_DESC','');
	define('_MI_SAM_DB_USER','SAM Database Username');
	define('_MI_SAM_DB_USER_DESC','');
	define('_MI_SAM_DB_PASS','SAM Database Password');
	define('_MI_SAM_DB_PASS_DESC','');
	define('_MI_SAM_DB_CHARSET','SAM Database Character Set');
	define('_MI_SAM_DB_CHARSET_DESC','');
	define('_MI_SAM_DB_PROXY','SAM Database is Proxied?');
	define('_MI_SAM_DB_PROXY_DESC','');
	define('_MI_SAM_STATION_NAME','Radio Station Name');
	define('_MI_SAM_STATION_NAME_DESC','');
	define('_MI_SAM_STATION_EMAIL','Radio Station Email');
	define('_MI_SAM_STATION_EMAIL_DESC','Leave blank if you do not wish to publish your email address!');
	define('_MI_SAM_STATION_LOGO','Radio Station Logo');
	define('_MI_SAM_STATION_LOGO_DESC','');
	define('_MI_SAM_STATION_ID','Your SpacialNet station ID.');
	define('_MI_SAM_STATION_ID_DESC','Log into your SpacialNet broadcaster account and go to "My Stations" to get this ID.');
	define('_MI_SAM_ALLOW_REQUESTS','Requests are allowed to be made to SAM.');
	define('_MI_SAM_ALLOW_REQUESTS_DESC','');
	define('_MI_SAM_PRIVATE_REQUESTS','Web server will handle song requests.');
	define('_MI_SAM_PRIVATE_REQUESTS_DESC','If yes, your own web server will handle song requests.<br/>If no, AudioRealm.com will handle the request.');
	define('_MI_SAM_SHOW_TOP_REQUESTS','If yes, display the top requests.');
	define('_MI_SAM_SHOW_TOP_REQUESTS_DESC','');
	define('_MI_SAM_TOP_REQUEST_COUNT','The number of top requests to display.');
	define('_MI_SAM_TOP_REQUEST_COUNT_DESC','');
	define('_MI_SAM_REQUEST_DAYS','Show the top requests for the last xx days.');
	define('_MI_SAM_REQUEST_DAYS_DESC','');
	define('_MI_SAM_SAM_HOST','The internet IP address of the machine SAM is running on.');
	define('_MI_SAM_SAM_HOST_DESC','DO NOT use a local IP address like 127.0.0.1 or 192.x.x.x (UNLESS your webserver is on the same local network as SAM)');
	define('_MI_SAM_SAM_PORT','The port SAM handles HTTP requests on. Usually 1221.');
	define('_MI_SAM_SAM_PORT_DESC','If you are behind a router you may need to implement "port forwarding" to make SAM visible.');
	define('_MI_SAM_SHOW_PICTURES','Must we show album cover pictures in now playing section?');
	define('_MI_SAM_SHOW_PICTURES_DESC','For this to work you must<br/>a) Associate the album cover pictures with the tracks using the Song Information Editor in SAM.<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Amazon lookup really makes this an easy process.<br/>b) Upload these album pictures to your webserver.<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By default SAM stores the pictures in the directory specified in SAM->Config->General under "Local Picture Directory"<br/>c) SAM can upload album cover pictures using FTP. See<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* SAM->Config->HTML Ouput to set up FTP details<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* and SAM->Menu->General->HTML Output->Upload all pictures');
	define('_MI_SAM_PICTURE_URL','Location where all your album pictures are stored.');
	define('_MI_SAM_PICTURE_URL_DESC','Example Relative path: pictures/<br/>Example Absolute path: http://your.webserver.com/pictures/');
	define('_MI_SAM_PICTURE_URL_NA','Use this picture if the song has no picture.');
	define('_MI_SAM_PICTURE_URL_NA_DESC','To disable the use of a default picture set value to empty string.');
	define('_MI_SAM_HISTORY_COUNT','The number of history items to display on the playing page');
	define('_MI_SAM_HISTORY_COUNT_DESC','');
	define('_MI_SAM_COMING_UP_COUNT','The number of coming soon songs to display.');
	define('_MI_SAM_COMING_UP_COUNT_DESC','Set to zero to disable coming up section.');
	define('_MI_SAM_CHECK_INTERVAL','How regularly do you want to check for a song change event in order to refresh the "Now playing" page data.');
	define('_MI_SAM_CHECK_INTERVAL_DESC','');
	define('_MI_SAM_CHECK_INTERVAL_10S','10 seconds');
	define('_MI_SAM_CHECK_INTERVAL_15S','15 seconds');
	define('_MI_SAM_CHECK_INTERVAL_20S','20 seconds');
	define('_MI_SAM_CHECK_INTERVAL_25S','25 seconds');
	define('_MI_SAM_CHECK_INTERVAL_30S','30 seconds');
	define('_MI_SAM_CHECK_INTERVAL_35S','35 seconds');
	define('_MI_SAM_CHECK_INTERVAL_40S','40 seconds');
	define('_MI_SAM_CHECK_INTERVAL_45S','45 seconds');
	define('_MI_SAM_CHECK_INTERVAL_50S','50 seconds');
	define('_MI_SAM_CHECK_INTERVAL_55S','55 seconds');
	define('_MI_SAM_CHECK_INTERVAL_60S','1 minute');
	define('_MI_SAM_CHECK_INTERVAL_90S','1 minute 30 seconds');
	define('_MI_SAM_CHECK_INTERVAL_120S','2 minute');
	define('_MI_SAM_CHECK_INTERVAL_150S','2 minutes 30 seconds');
	define('_MI_SAM_CHECK_INTERVAL_180S','3 minutes');
	
	
	// HTML Constants
	// Javascript
	define('_MI_SAM_JS_JQUERY','/browse.php?Frameworks/jquery/jquery.js');
	define('_MI_SAM_JS_JQUERY_CORNERS','/modules/sam/js/jquery.corner.js');
	define('_MI_SAM_JS_COMMON','/modules/sam/js/common.js');

	// Stylesheets
	define('_MI_SAM_CSS_STYLE','/modules/sam/css/style.css');
	define('_MI_SAM_CSS_SONGINFO','/modules/sam/css/songinfo.css');
	define('_MI_SAM_CSS_REQUEST','/modules/sam/css/request.css');
	define('_MI_SAM_CSS_REQUEST_ERROR','/modules/sam/css/request.error.css');
	
	// Admin Menus
	define('_MI_SAM_DASHBOARD','Dashboard');
	define('_MI_SAM_ABOUT','About');
	
	// Sponsor Notice
	define('_MI_SAM_SOFTWARESPONSOR','<p align="center" style="margin-top:20px;"><font style="font-size:16px;margin-bottom:20px;">Development Sponsored By</font><br/><a target="_blank" href="http://torqueradio.com"><img src="'.XOOPS_URL.'/modules/sam/images/torqueradio_sponsor.png"/></a></p>');
?>