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

jimport('joomla.application.component.controller');

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

/**
 * Content Component Controller
 *
 * @since  3.0
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
	 * @since 3.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$params = Factory::getApplication()->getParams();

		if( $params->get('cache_home', '0') == 1 )
		{
			$cachable = true;
		}

		$vName = $this->input->get('view', 'home');
		$this->input->set('view', $vName);

		return parent::display($cachable, array( 'Itemid' => 'INT' ));
	}
}