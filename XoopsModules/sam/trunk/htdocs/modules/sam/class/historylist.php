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
class SamHistorylist extends SamObject
{

    function SamHistorylist($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
        $this->initVar('songID', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('filename', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('date_played', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('duration', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('artist', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('album', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('albumyear', XOBJ_DTYPE_TXTBOX, null, false, 4);		
		$this->initVar('website', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('buycd', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('picture', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('listeners', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('label', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('pline', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('trackno', XOBJ_DTYPE_INT, null, false);
		$this->initVar('composer', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('ISRC', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('catalog', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('UPC', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('feeagency', XOBJ_DTYPE_TXTBOX, null, false, 20);
		$this->initVar('songtype', XOBJ_DTYPE_TXTBOX, null, false, 1);
		$this->initVar('requestID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('overlay', XOBJ_DTYPE_ENUM, 'no', false, false, false, array('yes', 'no'));
		$this->initVar('songrights', XOBJ_DTYPE_ENUM, 'broadcast', false, false, false, array('broadcast','download','on-demand','royaltyfree'));
		
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
class SamHistorylistHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "historylist", 'SamHistorylist', "ID", "songID");
    }
}

?>