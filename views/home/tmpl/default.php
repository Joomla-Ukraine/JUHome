<?php
/**
 * JUHome
 *
 * @version        3.x
 * @package        JUHome
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2017 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 **/

// no direct access
defined('_JEXEC') or die;

if($params->get('display_title'))
{
	echo '<h1 class="head">' . $params->get('page_title') . '</h1>';
}

echo HomeViewHome::LoadPositionForHome($home->mod_name_pref, $style = ($home->style ? $home->style : 'raw'));