<?php
/**
 * Site Members Module Entry Point
 * 
 * @package    Site Members
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * mod_sitemembers is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Module\SiteMembers\Site\Helper\SiteMembersHelper;

$members = SiteMembersHelper::getMembers($params);

require ModuleHelper::getLayoutPath('mod_sitemembers', $params->get('layout', 'default'));
