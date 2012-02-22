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
class SamFixedlist extends SamObject
{
    function SamFixedlist($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('PROVIDERID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('FIXEDLISTID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('SORTMODE', XOBJ_DTYPE_TXTBOX, null, false, 5);
		$this->initVar('DATE_MODIFIED', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('DATE_START', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('DATE_END', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('TIME_START', XOBJ_DTYPE_TXTBOX, null, false, 8);
		$this->initVar('TIME_END', XOBJ_DTYPE_TXTBOX, null, false, 8);
		$this->initVar('LOOP_MAX', XOBJ_DTYPE_INT, null, false);
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
class SamFixedlistHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "fixedlist", 'SamFixedlist', "ID", "PROVIDERID");
    }
}

?>