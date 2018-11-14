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

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;

jimport('joomla.application.component.view');

/**
 * Wrapper view class.
 *
 * @since  3.0
 */
class HomeViewHome extends HtmlView
{
	public function __construct(array $config = array())
	{
		parent::__construct($config);

		$this->app    = Factory::getApplication();
		$this->doc    = Factory::getDocument();
		$this->params = $this->app->getParams();
	}

	/**
	 * @param null $tpl
	 *
	 *
	 * @return bool|string
	 * @since 3.0
	 */
	public function display($tpl = null)
	{
		$show_title = $this->params->get('show_page_heading');
		$title      = $this->params->get('page_title', '');

		if( empty($title) || $show_title == 0 )
		{
			$title = $this->app->get('sitename');
		}
		elseif( $this->app->get('sitename_pagetitles', 0) )
		{
			$title = JText::sprintf('JPAGETITLE', $this->app->get('sitename'), $title);
		}

		$this->document->setTitle($title);

		if( $this->params->get('menu-meta_description') )
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if( $this->params->get('menu-meta_keywords') )
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if( $this->params->get('robots') )
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}

		$template   = trim($this->params->get('template', ''));
		$layoutpath = JPATH_SITE . '/components/com_home/views/home/tmpl/' . $template;

		$home                = new stdClass();
		$home->mod_name_pref = trim($this->params->get('mod_name_pref', ''));
		$home->style         = trim($this->params->get('style', ''));

		$this->pageclass_sfx = htmlspecialchars($this->params->get('pageclass_sfx'));
		//$this->assignRef('params', $this->params);
		//$this->params  = &$this->params;
		$this->wrapper = &$wrapper;

		$pos = $this->app->input->post->get('pos');

		if( $pos )
		{
			$this->app->input->post->get('tmpl', 'none');
			$html = $this->LoadPositionForHome($pos, $style = 'raw');
		}
		else
		{

			if( file_exists($layoutpath) )
			{
				require_once $layoutpath;

				return true;
			}

			$html = JText::_("<strong>Template <span style=\"color: green;\">$template</span> do is not found!</strong><br />Please, upload new template to <em>components/com_home/views/home/tmpl</em> folder or select other template from back-end!");
		}

		return $html;
	}

	/**
	 * @param     $position
	 * @param int $style
	 *
	 * @return string
	 *
	 * @since 3.0
	 */
	public function LoadPositionForHome($position, $style = -2)
	{
		$renderer = $this->doc->loadRenderer('module');
		$params   = array( 'style' => $style );
		$contents = '';

		foreach( JModuleHelper::getModules($position) as $mod )
		{
			$contents .= $renderer->render($mod, $params);
		}

		return $contents;
	}
}