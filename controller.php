<?php
/**
 * @package        JUHome Component
 * @version        4.x
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2025 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @since          4.0
 */

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

/**
 * Content Component Controller
 *
 * @since  4.0
 */
class HomeController extends BaseController
{
	/**
	 * @param bool $cachable
	 * @param bool $urlparams
	 *
	 * @return JControllerLegacy  This object to support chaining.
	 *
	 * @throws \Exception
	 * @since 4.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$params = Factory::getApplication()->getParams();

		if($params->get('cache_home', '0') == 1)
		{
			$cachable = true;
		}

		$vName = $this->input->get('view', 'home');
		$this->input->set('view', $vName);

		return parent::display($cachable, [ 'Itemid' => 'INT' ]);
	}
}