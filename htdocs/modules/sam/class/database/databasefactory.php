<?php
/**
 * Factory Class for XOOPS Database
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
 * @version         $Id: databasefactory.php 8066 2011-11-06 05:09:33Z beckmi $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * SamDatabaseFactory
 *
 * @package Kernel
 * @author Kazumi Ono <onokazu@xoops.org>
 * @access public
 */
class SamDatabaseFactory
{
    /**
     * SamDatabaseFactory::SamDatabaseFactory()
     */
    function SamDatabaseFactory()
    {
    	if (!isset($GLOBALS['samModuleConfig'])||!is_array($GLOBALS['samModuleConfig'])) {
    		$config_handler = xoops_gethandler('config');
    		$module_handler = xoops_gethandler('module');
    		$GLOBALS['samModule'] = $module_handler->getDirname('sam');
    		$GLOBALS['samModuleConfig'] = $config_handler->getConfigList($GLOBALS['samModule']->getVar('mid')); 
    	}
    }

    /**
     * Get a reference to the only instance of database class and connects to DB
     *
     * if the class has not been instantiated yet, this will also take
     * care of that
     *
     * @static
     * @staticvar object  The only instance of database class
     * @return object Reference to the only instance of database class
     */
    function &getDatabaseConnection()
    {
    	
        static $instance;
        if (!isset($instance)) {
            if (file_exists($file = XOOPS_ROOT_PATH . '/modules/sam/class/database/' . $GLOBALS['samModuleConfig']['db_type'] . 'database.php')) {
                require_once $file;
                if (!$GLOBALS['samModuleConfig']['db_proxy']) {
                    $class = 'Sam' . ucfirst($GLOBALS['samModuleConfig']['db_type']) . 'DatabaseSafe';
                } else {
                    $class = 'Sam' . ucfirst($GLOBALS['samModuleConfig']['db_type']) . 'DatabaseProxy';
                }
                $xoopsPreload =& XoopsPreload::getInstance();
                $xoopsPreload->triggerEvent('sam.class.database.databasefactory.connection', array(&$class));
                $instance = new $class();
                $instance->setLogger(XoopsLogger::getInstance());
                $instance->setPrefix($GLOBALS['samModuleConfig']['db_prefix']);
                if (!$instance->connect()) {
                    trigger_error('notrace:Unable to connect to SAM database, please check database settings for the SAM Module in the module preferences!', E_USER_ERROR);
                }
            } else {
                trigger_error('notrace:Failed to load database of type: ' . $GLOBALS['samModuleConfig']['db_type'] . ' in file: ' . __FILE__ . ' at line ' . __LINE__, E_USER_WARNING);
            }
        }
        return $instance;
    }

    /**
     * Gets a reference to the only instance of database class. Currently
     * only being used within the installer.
     *
     * @static
     * @staticvar object  The only instance of database class
     * @return object Reference to the only instance of database class
     */
    function &getDatabase()
    {
        static $database;
        if (!isset($database)) {
            if (file_exists($file = XOOPS_ROOT_PATH . '/modules/sam/class/database/' . $GLOBALS['samModuleConfig']['db_type'] . 'database.php')) {
                include_once $file;
                if (!$GLOBALS['samModuleConfig']['db_proxy']) {
                    $class = 'Sam' . ucfirst($GLOBALS['samModuleConfig']['db_type']) . 'DatabaseSafe';
                } else {
                    $class = 'Sam' . ucfirst($GLOBALS['samModuleConfig']['db_type']) . 'DatabaseProxy';
                }
                unset($database);
                $database = new $class();
            } else {
                trigger_error('notrace:Failed to load database of type: ' . $GLOBALS['samModuleConfig']['db_type'] . ' in file: ' . __FILE__ . ' at line ' . __LINE__, E_USER_WARNING);
            }
        }
        return $database;
    }
}

?>