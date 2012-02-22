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
class SamRequestlist extends SamObject
{

    function SamRequestlist($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('songID', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('t_stamp', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('host', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('msg', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('name', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('code', XOBJ_DTYPE_INT, null, false);
		$this->initVar('ETA', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('status', XOBJ_DTYPE_ENUM, 'new', false, false, false, array('played','ignored','pending','new'));
		
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
class SamRequestlistHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "requestlist", 'SamRequestlist', "ID", "songID");
    }
}

?>