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
class SamFixedlist_item extends SamObject
{
    function SamFixedlist_item($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('PROVIDERID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('FIXEDLISTID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('FIXEDLIST_ITEMID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('ADZID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('SORTID', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('PLAYCOUNT', XOBJ_DTYPE_INT, null, false);
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
class SamFixedlist_itemHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "fixedlist_item", 'SamFixedlist_item', "ID", "PROVIDERID");
    }
}

?>