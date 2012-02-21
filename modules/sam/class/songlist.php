<?php
// $Autho: wishcraft $

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

include_once dirname(__FILE__).'/object.php';
/**
 * Class for compunds
 * @author Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class SamSonglist extends SamObject
{

	var $_buycd = 'http://audiorealm.com/findcd.html?artist=%s&title=%s&album=%s';
	var $_website = 'http://audiorealm.com/findwebsite.html?artist=%s&title=%s&album=%s';
	var $count = 0;
	var $requestID = 0;
	var $listeners = 0;
	var $starttime = '00:00:00';
	var $dedicationName = '';
	var $dedicationMsg = '';
	var $duration = '';
	var $isDedication = false;
	var $isRequested = false;
	
	function SamSonglist($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('filename', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('diskID', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('flags', XOBJ_DTYPE_TXTBOX, 'NNNNNNNNNN', false, 10);
		$this->initVar('songtype', XOBJ_DTYPE_TXTBOX, 'S', false, 1);
		$this->initVar('status', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('weight', XOBJ_DTYPE_DECIMAL, 50, false);
		$this->initVar('balance', XOBJ_DTYPE_DECIMAL, 0, false);
		$this->initVar('date_added', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('date_played', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('date_artist_played', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('date_album_played', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('date_title_played', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('duration', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('artist', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('album', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('label', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('pline', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('trackno', XOBJ_DTYPE_INT, null, false);
		$this->initVar('composer', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('ISRC', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('catalog', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('UPC', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('feeagency', XOBJ_DTYPE_TXTBOX, null, false, 20);
		$this->initVar('albumyear', XOBJ_DTYPE_TXTBOX, null, false, 4);
		$this->initVar('genre', XOBJ_DTYPE_TXTBOX, null, false, 20);
		$this->initVar('website', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('buycd', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('info', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('lyrics', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('picture', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('count_played', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('count_requested', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('last_requested', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('count_performances', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('xfade', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('bpm', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('mood', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('rating', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('overlay', XOBJ_DTYPE_ENUM, 'no', false, false, false, array('yes', 'no'));
		$this->initVar('playlimit_count', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('playlimit_action', XOBJ_DTYPE_ENUM, 'none', false, false, false, array('none','remove','erase'));
		$this->initVar('songrights', XOBJ_DTYPE_ENUM, 'broadcast', false, false, false, array('broadcast','download','on-demand','royaltyfree'));
		$this->initVar('adz_listID', XOBJ_DTYPE_INT, 0, false);
		
    }

    function toArray() {
    	$ret = parent::toArray();
    	$ret['count'] = $this->count;
    	$ret['requestID'] = $this->requestID;
		$ret['listeners'] = $this->listeners;
		$ret['starttime'] = $this->starttime;
		$ret['dedicationName'] = $this->dedicationName;
		$ret['dedicationMsg'] = $this->dedicationMsg;
		$ret['isDedication'] = $this->isDedication;
		$ret['isRequested'] = $this->isRequested;
		$ret['duration'] = $this->duration;
		$ret['buycd'] = $this->getBuyCD();
		$ret['website'] = $this->getWebsite();
		$ret['picture'] = $this->getPicture();
		$ret['artist_title'] = $this->getArtistTitle();
		return $ret; 
    }
    
    function assignVars($var_arr) {
    	foreach ($var_arr as $field => $value) {
    		switch ($field) {
    			default:
    				$this->assignVar($field, $value);
    				break;
    			case 'requestID':
    				$this->requestID = $value;
    				$this->isRequested = true;
    				break;
    			case 'listeners':
    				$this->listeners = $value;
    				break;
    			case 'starttime':
    				$this->starttime = $value;
    				break;
				case 'dedicationName':
    				$this->dedicationName = $value;
    				$this->isDedication = true;
    				break;
    			case 'dedicationMsg':
    				$this->dedicationMsg = $value;
    				$this->isDedication = true;
    				break;
    			case 'count':
    				$this->count = $value;
    				break;    				
    		}
    	}
    	@$this->setDuration();
    }
    
    function getBuyCD() {
    	if (strlen($this->getVar('buycd'))==0) {
    		return sprintf($this->_buycd, $this->getVar('artist'), $this->getVar('title'), $this->getVar('album'));
    	} else {
    		preg_match('/^((http[s]?):\/\/)?/', $this->getVar('buycd'), $matches);
			if (empty($matches[0])) {
				return 'http://' . $this->getVar('buycd');
			}
    		return $this->getVar('buycd');
    	}
    }
    
	function getWebsite() {
    	if (strlen($this->getVar('website'))==0) {
    		return sprintf($this->_website, $this->getVar('artist'), $this->getVar('title'), $this->getVar('album'));
    	} else {
    		preg_match('/^((http[s]?):\/\/)?/', $this->getVar('website'), $matches);
			if (empty($matches[0])) {
				return 'http://' . $this->getVar('website');
			}
    		return $this->getVar('website');
    	}
    }
    
    function getPicture() {
		if (!strlen($this->getVar('picture'))) {
			return XOOPS_URL . $GLOBALS['samModuleConfig']['picture_url'] . $this->getVar('picture');
		}
		return XOOPS_URL . $GLOBALS['samModuleConfig']['picture_url_na'];
    }
    
    function setDuration() {
		$dur = $this->getVar("duration");
		if (is_numeric($dur) && $dur > 0) {
			$ss = round($this->getVar("duration") / 1000);
			$mm = (int) ($ss / 60);
			$ss = ($ss % 60);
			if ($ss < 10) {
				$ss = "0$ss";
			}
			$this->duration = "$mm:$ss";
		} else {
			$this->duration = "";
		}
		return $this->duration;
	}
	
 	function getArtistTitle() {
		//Make Artist+Tile combination
		if (strlen($this->getVar('artist')) && strlen($this->getVar('title'))) {
			return $this->getVar('artist') . ' - ' . $this->getVar('title');
		} elseif (strlen($this->getVar('title'))) {
			return strlen($this->getVar('title'));
		} else {
			//If both Artist and Title is empty, use filename
			$path_parts = pathinfo($this->getVar('filename'));
			return $path_parts['filename']; //Requires PHP 5.2.0
		}
	}
}


/**
* XOOPS policies handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.coop>
* @package kernel
*/
class SamSonglistHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "songlist", 'SamSonglist', "ID", "title");
    }
    
    function getComingSongs($songtype = 'S', $as_object = true, $id_as_key = true) {
    	$sql = 'SELECT `s`.*, `q`.`requestID` from `songlist` as `s` JOIN `queuelist` as `q` on `q`.`songID` = `s`.`ID` WHERE `s`.`songtype` = \''.$songtype.'\' ORDER BY `q`.`sortID` ASC LIMIT ' . $GLOBALS['samModuleConfig']['coming_up_count'];
    	if (!$result = $this->db->queryF($sql)) {
    		return false;
    	}
    	$ret = array();
    	$i=0;
    	while ($row = $this->db->fetchArray($result)) {
    		if ($as_object==true) {
    			if ($id_as_key==true) {
		    		$ret[$row[$this->keyName]] = new SamSonglist();
		    		$ret[$row[$this->keyName]]->assignVars($row);
    			} else {
    				$ret[$i] = new SamSonglist();
		    		$ret[$i]->assignVars($row);
    				$i++;
    			}
    		} else {
    			if ($id_as_key==true) {
		    		$ret[$row[$this->keyName]] = $row;
    			} else {
		    		$ret[$i] = $row;
    				$i++;
    			}
    		}
    	}
    	return $ret;
    }
    
	function getRecentSongs($songtype = 'S', $as_object = true, $id_as_key = true) {
    	$sql = 'SELECT `s`.*, `h`.`listeners`, `h`.`requestID`, `h`.`date_played` as `starttime`, `r`.`name` as `dedicationName`, `r`.`msg` as `dedicationMsg` from `songlist` as `s` JOIN `historylist` as `h` ON `h`.`songID` = `s`.`ID` LEFT JOIN `requestlist` as `r` ON `r`.`ID` = `h`.`requestID` WHERE `s`.`songtype` = \''.$songtype.'\' ORDER BY `h`.`date_played` DESC LIMIT ' . $GLOBALS['samModuleConfig']['history_count'] + 1;
    	if (!$result = $this->db->queryF($sql)) {
    		return false;
    	}
    	$ret = array();
    	$i=0;
    	while ($row = $this->db->fetchArray($result)) {
    		if ($as_object==true) {
    			if ($id_as_key==true) {
		    		$ret[$row[$this->keyName]] = new SamSonglist();
		    		$ret[$row[$this->keyName]]->assignVars($row);
    			} else {
    				$ret[$i] = new SamSonglist();
		    		$ret[$i]->assignVars($row);
    				$i++;
    			}
    		} else {
    			if ($id_as_key==true) {
		    		$ret[$row[$this->keyName]] = $row;
    			} else {
		    		$ret[$i] = $row;
    				$i++;
    			}
    		}
    	}
    	return $ret;
    }
    
    function getTopRequestedSongs($code = '200', $as_object = true, $id_as_key = true) {
    	$sql = 'SELECT `s`.*, count(`songID`) as `count` from `songlist` as `s` JOIN `requestlist` as `r` ON `r`.`songID` = `s`.`ID` WHERE `r`.`code` = \''.$code.'\' AND DATEDIFF(CURRENT_DATE, `r`.`t_stamp`) <= '.$GLOBALS['samModuleConfig']['request_days'].' GROUP BY `r`.`songID`';
    	if (!$result = $this->db->queryF($sql)) {
    		return false;
    	}
    	$ret = array();
    	$i=0;
    	while ($row = $this->db->fetchArray($result)) {
    		if ($as_object==true) {
    			if ($id_as_key==true) {
		    		$ret[$row[$this->keyName]] = new SamSonglist();
		    		$ret[$row[$this->keyName]]->assignVars($row);
    			} else {
    				$ret[$i] = new SamSonglist();
		    		$ret[$i]->assignVars($row);
    				$i++;
    			}
    		} else {
    			if ($id_as_key==true) {
		    		$ret[$row[$this->keyName]] = $row;
    			} else {
		    		$ret[$i] = $row;
    				$i++;
    			}
    		}
    	}
    	return $ret;
    }
    
    function getPlaylistSongs($search_words, $sort_letter, $start, $limit, $id_as_key = true, $as_object = true) {
    	if ($start <= 0) {	$start = 0;	}
		if ($limit <= 5) {	$limit = 5;	}
		$criteria = new CriteriaCompo(new Criteria('`songtype`', 'S'));
		$criteria->add(new Criteria('`status`', '0'));
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		if (is_array($search_words)) {
			reset($search_words);
			$criteria_base = array();			
			while (list($key, $val) = each($search_words)) {
				$criteria_base[] = new CriteriaCompo(new Criteria('`title`', '%'.$val.'%', 'LIKE'), 'OR');
				$criteria_base[sizeof($criteria_base)-1]->add(new Criteria('`artist`', '%'.$val.'%', 'LIKE'), 'OR');
				$criteria_base[sizeof($criteria_base)-1]->add(new Criteria('`album`', '%'.$val.'%', 'LIKE'), 'OR');
			}
			foreach($criteria_base as $crit) {
				$criteria->add($crit, 'OR');
			}
		}
		if ($sort_letter == '0 - 9') {
			$criteria_sort = new CriteriaCompo(new Criteria('`artist`', '0', '>='), 'AND');
			$criteria_sort->add(new Criteria('`artist`', 'ZZZZZZZZZZZZ', '<='), 'AND');
			$criteria->add($criteria_sort, 'AND NOT');
		} elseif ($sort_letter != '') {
			$nextletter = chr(ord($sort_letter) + 1);
			$criteria_sort = new CriteriaCompo(new Criteria('`artist`', $sort_letter, '>='), 'AND');
			$criteria_sort->add(new Criteria('`artist`', $nextletter, '<='), 'AND');
			$criteria->add($criteria_sort, 'AND');
		}
    	return $this->getObjects($criteria, $id_as_key, $as_object);
    }

    function getPlaylistSongCount($search_words, $sort_letter) {
		$criteria = new CriteriaCompo(new Criteria('`songtype`', 'S'));
		$criteria->add(new Criteria('`status`', '0'));
		if (is_array($search_words)) {
			reset($search_words);
			$criteria_base = array();			
			while (list($key, $val) = each($search_words)) {
				$criteria_base[] = new CriteriaCompo(new Criteria('`title`', '%'.$val.'%', 'LIKE'), 'OR');
				$criteria_base[sizeof($criteria_base)-1]->add(new Criteria('`artist`', '%'.$val.'%', 'LIKE'), 'OR');
				$criteria_base[sizeof($criteria_base)-1]->add(new Criteria('`album`', '%'.$val.'%', 'LIKE'), 'OR');
			}
			foreach($criteria_base as $crit) {
				$criteria->add($crit, 'OR');
			}
		}
		if ($sort_letter == '0 - 9') {
			$criteria_sort = new CriteriaCompo(new Criteria('`artist`', '0', '>='), 'AND');
			$criteria_sort->add(new Criteria('`artist`', 'ZZZZZZZZZZZZ', '<='), 'AND');
			$criteria->add($criteria_sort, 'AND NOT');
		} elseif ($sort_letter != '') {
			$nextletter = chr(ord($sort_letter) + 1);
			$criteria_sort = new CriteriaCompo(new Criteria('`artist`', $sort_letter, '>='), 'AND');
			$criteria_sort->add(new Criteria('`artist`', $nextletter, '<='), 'AND');
			$criteria->add($criteria_sort, 'AND');
		}
    	return $this->getCount($criteria);
    }
 	function getCurrentSong() {
    	$sql = 'SELECT `s`.`songID` from `historylist` as `s` ORDER BY `date_played` DESC LIMIT 1';
    	if (!$result = $this->db->queryF($sql)) {
    		return false;
    	}
    	$row = $this->db->fetchArray($result);
    	return $this->get($row['songID']);
    }
    
 	function checkSongChange($songID = 0) {
    	$sql = 'SELECT `s`.`songID` from `historylist` as `s` ORDER BY `date_played` DESC LIMIT 1';
    	if (!$result = $this->db->queryF($sql)) {
    		return false;
    	}
    	$row = $this->db->fetchArray($result);
    	if ($row['songID']==$songID) {
    	   	return false;
    	} else {
		   	return true;
    	}
    }
    
    function getRequestedSong($requestID = 0, $as_object=true) {
    	$sql = 'SELECT `s`.*, `r`.`ID` as `requestID`, `r`.`name` as `dedicationName`, `r`.`msg` as `dedicationMsg` from `songlist` as `s` JOIN `requestlist` as `r` ON `r`.`songID` = `s`.`ID` WHERE `r`.`ID` = \''.$requestID.'\'';
    	if (!$result = $this->db->queryF($sql)) {
    		return false;
    	}
    	$row = $this->db->fetchArray($result);
    	if ($as_object==true) {
    	   	$ret = new SamSonglist();
		   	$ret->assignVars($row);
    	} else {
		   	$ret = $row;
    	}
    	return $ret;
    }
}

?>