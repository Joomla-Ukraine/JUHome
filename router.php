<?php
/**
 * JUHome
 *
 * @version        3.x
 * @package        JUHome
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2018 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 **/

function homeBuildRoute(&$query)
{
	$segments = array();

	if(isset($query['view']))
	{
		unset($query['view']);
	}

	return $segments;
}

/**
 * @param $segments
 *
 * @return array
 *
 * @since 3.0
 */
function homeParseRoute($segments)
{
	$vars = array();

	$vars['view'] = 'home';

	return $vars;
}