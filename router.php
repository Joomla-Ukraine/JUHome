<?php
/**
 * @since          3.0
 * @version        3.x
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2020 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @package        JUHome Component
 */

use Joomla\CMS\Component\Router\RouterView;

defined('_JEXEC') or die;

class HomeRouter extends RouterView
{
	protected bool $noIDs = false;

	/**
	 * @param $query
	 *
	 * @return array
	 *
	 * @since 1.0
	 */
	public function build(&$query)
	{
		parent::build($query);
		if(isset($query[ 'view' ]))
		{
			unset($query[ 'view' ]);
		}

		return [];
	}

	/**
	 * @param $segments
	 *
	 * @return array
	 *
	 * @since 1.0
	 */
	public function parse(&$segments)
	{
		parent::parse($segments);
		if($segments[ 0 ] === $this->app->getMenu()->getActive()->alias)
		{
			return [ 'view' => 'home' ];
		}

		return [ 'view' => 'homes' ];

	}
}

/**
 * @param $query
 *
 * @return array
 *
 * @since 1.0
 */
function homeBuildRoute(&$query)
{
	return (new HomeRouter($this->app, $this->app->getMenu()))->build($query);
}

/**
 * @return array
 *
 * @since 1.0
 */
function homeParseRoute()
{
	return (new HomeRouter($this->app, $this->app->getMenu()))->parse($segments);
}