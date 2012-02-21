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
class SamCategory extends SamObject
{

    function SamCategory($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('name', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('parentID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('levelindex', XOBJ_DTYPE_INT, null, false);
		$this->initVar('itemindex', XOBJ_DTYPE_INT, null, false);
		
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
class SamCategoryHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "category", 'SamCategory', "ID", "name");
    }
}

?>