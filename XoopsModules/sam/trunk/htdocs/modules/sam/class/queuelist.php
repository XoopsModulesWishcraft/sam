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
class SamQueuelist extends SamObject
{
    function SamQueuelist($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('songID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('sortID', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('requests', XOBJ_DTYPE_INT, null, false);
		$this->initVar('requestID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('auxdata', XOBJ_DTYPE_TXTBOX, null, false, 200);
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
class SamQueuelistHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "queuelist", 'SamQueuelist', "ID", "songID");
    }
}

?>