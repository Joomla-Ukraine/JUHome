<?php
/**
 * @package        JUHome Component
 * @version        @version@
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2018 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @since          3.0
 */

defined('_JEXEC') or die;

function homeBuildRoute($query)
{
	$segments = array();

	if( isset($query[ 'view' ]) )
	{
		unset($query[ 'view' ]);
	}

	return $segments;
}

/**
 * @return array
 *
 * @since 3.0
 */
function homeParseRoute()
{
	$vars = array();

	$vars[ 'view' ] = 'home';

	return $vars;
}