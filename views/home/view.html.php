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

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

/**
 * Wrapper view class.
 *
 * @since  4.0
 */
class HomeViewHome extends HtmlView
{
	public function __construct(array $config = [])
	{
		parent::__construct($config);

		$this->app    = Factory::getApplication();
		$this->doc    = $this->app->getDocument();
		$this->params = $this->app->getParams();
	}

	/**
	 * @param   null  $tpl
	 *
	 *
	 * @return bool|string
	 * @since 4.0
	 */
	public function display($tpl = null)
	{
		$show_title = $this->params->get('show_page_heading');
		$title      = $this->params->get('page_title', '');

		if(empty($title) || $show_title == 0)
		{
			$title = $this->app->get('sitename');
		}
		elseif($this->app->get('sitename_pagetitles', 0))
		{
			$title = Text::sprintf('JPAGETITLE', $title, $this->app->get('sitename'));
		}
		elseif($this->app->get('sitename_pagetitles', 0) == 2)
		{
			$title = Text::sprintf('JPAGETITLE', $this->app->get('sitename'), $title);
		}

		$this->doc->setTitle($title);

		if($this->params->get('menu-meta_description'))
		{
			$this->doc->setDescription($this->params->get('menu-meta_description'));
		}

		if($this->params->get('menu-meta_keywords'))
		{
			$this->doc->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if($this->params->get('robots'))
		{
			$this->doc->setMetadata('robots', $this->params->get('robots'));
		}

		$template   = trim($this->params->get('template', ''));
		$layoutpath = JPATH_SITE . '/components/com_home/views/home/tmpl/' . $template;

		$home                = new stdClass();
		$home->mod_name_pref = trim($this->params->get('mod_name_pref', ''));
		$home->style         = trim($this->params->get('style', ''));

		$this->pageclass_sfx = ($this->params->get('pageclass_sfx') ? htmlspecialchars($this->params->get('pageclass_sfx')) : '');

		if(file_exists($layoutpath))
		{
			require_once $layoutpath;

			return true;
		}

		return Text::_("<strong>Template <span style=\"color: green;\">$template</span> do is not found!</strong><br />Please, upload new template to <em>components/com_home/views/home/tmpl</em> folder or select other template from back-end!");
	}
}