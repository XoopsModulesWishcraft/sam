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
class SamEventtime extends SamObject
{

    function SamEventtime($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
        $this->initVar('eventID', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('eventtime', XOBJ_DTYPE_TXTBOX, null, false, 8);
		$this->initVar('eventdate', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('eventday', XOBJ_DTYPE_TXTBOX, 'day', false, 20);
		$this->initVar('recurring', XOBJ_DTYPE_ENUM, 'no', false, false, false, array('yes', 'no'));
		
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
class SamEventtimeHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "eventtime", 'SamEventtime', "ID", "eventID");
    }
}

?>