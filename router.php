<?php
/**
 * @package        JUHome Component
 * @version        3.x
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2019 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @since          3.0
 */

use Joomla\CMS\Component\Router\RouterView;

defined('_JEXEC') or die;

class HomeRouter extends RouterView
{
	protected $noIDs = false;

	/**
	 * HomeRouter constructor.
	 *
	 * @param null $app
	 * @param null $menu
	 *
	 * @since 1.0
	 */
	public function __construct($app = null, $menu = null)
	{
		parent::__construct($app, $menu);
	}

	/**
	 * @param $query
	 *
	 * @return array
	 *
	 * @since 1.0
	 */
	public function build(&$query)
	{
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
	$router = new HomeRouter($this->app, $this->app->getMenu());

	return $router->build($query);
}


/**
 * @return array
 *
 * @since 1.0
 */
function homeParseRoute()
{
	$router = new HomeRouter($this->app, $this->app->getMenu());

	return $router->parse($segments);
}