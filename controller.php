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

defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Content Component Controller
 *
 * @since  3.0
 */
class HomeController extends JControllerLegacy
{
	/**
	 * @param bool $cachable
	 * @param bool $urlparams
	 *
	 * @return JControllerLegacy  This object to support chaining.
	 *
	 * @since 3.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$app    = JFactory::getApplication();
		$params = $app->getParams();

		if($params->get('cache_home', '0') == 1)
		{
			$cachable = true;
		}

		$vName = $this->input->get('view', 'home');
		$this->input->set('view', $vName);

		return parent::display($cachable, array( 'Itemid' => 'INT' ));
	}
}