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
class SamAdz extends SamObject
{

    function SamAdz($id = null)
    {
        $this->initVar('ID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('PROVIDERID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('CAMPAIGNID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('CATEGORYID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('DATE_START', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('DATE_END', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('SONGTYPE', XOBJ_DTYPE_TXTBOX, "A", false, 1);
		$this->initVar('LOCALFILENAME', XOBJ_DTYPE_TXTBOX, null, false, 200);
		$this->initVar('LOCALSTATUS', XOBJ_DTYPE_TXTBOX, 'download', false, 10);
		$this->initVar('DOWNLOAD_URL', XOBJ_DTYPE_TXTBOX, null, false, 200);
		$this->initVar('LASTUPDATE', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('DESCRIPTION', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('DATE_END', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('CAMPAIGNACTIVE', XOBJ_DTYPE_TXTBOX, 'yes', false, 3);
		$this->initVar('STATUS', XOBJ_DTYPE_TXTBOX, 'active', false, 10);
		$this->initVar('WEIGHT', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('GLOBALWEIGHT', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('DURATION', XOBJ_DTYPE_INT, null, false);
		$this->initVar('FILESIZE', XOBJ_DTYPE_INT, null, false);
		$this->initVar('DATE_PLAYED', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('DATE_CATEGORY_PLAYED', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('DATE_CAMPAIGN_PLAYED', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('DATE_VALID', XOBJ_DTYPE_TXTBOX, null, false, 19);
		$this->initVar('SPINS', XOBJ_DTYPE_INT, null, false);
		$this->initVar('PERFORMANCES', XOBJ_DTYPE_INT, null, false);
		$this->initVar('SPINS_MAX', XOBJ_DTYPE_INT, null, false);
		$this->initVar('cap_day', XOBJ_DTYPE_INT, null, false);
		$this->initVar('cap_day_cnt', XOBJ_DTYPE_INT, null, false);
		$this->initVar('DAYS', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('HOURS', XOBJ_DTYPE_TXTBOX, null, false, 100);
		$this->initVar('BLOCKED', XOBJ_DTYPE_TXTBOX, null, false, 3);
		$this->initVar('LOCALWEIGHT', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('LOCALBALANCE', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('SORTID', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('EXTERNALID', XOBJ_DTYPE_INT, null, false);
		$this->initVar('SYNCINFO', XOBJ_DTYPE_TXTBOX, null, false, 200);
		$this->initVar('PROGRESS', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('timematrix', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('min_separation', XOBJ_DTYPE_INT, null, false);
		$this->initVar('min_separation_campaign', XOBJ_DTYPE_INT, null, false);
		
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
class SamAdzHandler extends SamPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db =& SamDatabaseFactory::getDatabaseConnection();
        parent::__construct($db, "adz", 'SamAdz', "ID", "PROVIDERID");
    }
}

?>