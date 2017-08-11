<?php
/**
 * Helper class for Site Members module
 * 
 * @package    Site Members
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModSiteMembersHelper
{
    /**
     * Retrieves the member count
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getMembers($params)
    {
        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the members count
        $membertype = $params->get('members');
        if ($membertype == "Guest")
        {
            $whereclause = "";
            $usertype = "";
        }
        else
        {
	    $whereclause = "WHERE g.title LIKE '%".$membertype."%'";
	    if (substr($membertype,-1) == 's') $membertype= substr($membertype,0,strlen($membertype)-1); // display singular, always
        }
        $query = "SELECT count(*) FROM hme3_users u JOIN hme3_user_usergroup_map m ON u.id=m.user_id JOIN hme3_usergroups g on m.group_id=g.id ".$whereclause;
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadResult();
        // Return the Hello
        return $result." ".strtolower($membertype);
    }
}
?>