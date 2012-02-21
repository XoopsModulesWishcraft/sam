<?php
/**
 * Abstract base class for XOOPS Database access classes
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         kernel
 * @subpackage      database
 * @since           1.0.0
 * @author          Kazumi Ono <onokazu@xoops.org>
 * @version         $Id: database.php 8066 2011-11-06 05:09:33Z beckmi $
 */

defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * make sure this is only included once!
 */
if (defined('SAM_C_DATABASE_INCLUDED')) {
    return;
}

define('SAM_C_DATABASE_INCLUDED', 1);

/**
 * Abstract base class for Database access classes
 *
 * @abstract
 * @author Kazumi Ono <onokazu@xoops.org>
 * @package kernel
 * @subpackage database
 */
class SamDatabase
{
    /**
     * Prefix for tables in the database
     *
     * @var string
     */
     var $prefix = '';

     /**
      * reference to a {@link SamLogger} object
      *
      * @see SamLogger
      * @var object SamLogger
      */
     var $logger;

    /**
     * If statements that modify the database are selected
     *
     * @var boolean
     */
    var $allowWebChanges = false;

    /**
     * constructor
     *
     * will always fail, because this is an abstract class!
     */
    function SamDatabase()
    {
        // exit('Cannot instantiate this class directly');
    }

    /**
     * assign a {@link SamLogger} object to the database
     *
     * @see SamLogger
     * @param object $logger reference to a {@link SamLogger} object
     */

    function setLogger(&$logger)
    {
        $this->logger = &$logger;
    }

    /**
     * set the prefix for tables in the database
     *
     * @param string $value table prefix
     */
    function setPrefix($value)
    {
        $this->prefix = $value;
    }

    /**
     * attach the prefix.'_' to a given tablename
     *
     * if tablename is empty, only prefix will be returned
     *
     * @param string $tablename tablename
     * @return string prefixed tablename, just prefix if tablename is empty
     */
    function prefix($tablename = '')
    {
        if ($tablename != '') {
            return $this->prefix . '_' . $tablename;
        } else {
            return $this->prefix;
        }
    }
}

?>