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
class SamDisk extends SamObject
{

    function SamDisk($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('serial', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('name', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('status', XOBJ_DTYPE_INT, null, false);
		$this->initVar('t_stamp', XOBJ_DTYPE_TXTBOX, null, false, 19);
		
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
class SamDiskHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "disk", 'SamDisk', "ID", "name");
    }
}

?>