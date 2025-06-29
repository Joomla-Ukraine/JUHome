<?php
/**
 * @since          4.0
 * @version        4.x
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2025 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @package        JUHome Component
 */

use Joomla\CMS\Component\Router\RouterView;

defined('_JEXEC') or die;

class HomeRouter extends RouterView
{
	/**
	 * @param $query
	 *
	 * @return array
	 *
	 * @since 4.0
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
	 * @since 4.0
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