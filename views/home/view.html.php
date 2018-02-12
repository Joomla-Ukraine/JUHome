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

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * Wrapper view class.
 *
 * @since  3.0
 */
class HomeViewHome extends JViewLegacy
{
	/**
	 * @param null $tpl
	 *
	 *
	 * @since 3.0
	 * @return bool|string
	 */
	public function display($tpl = null)
	{
		$app    = JFactory::getApplication();
		$params = $app->getParams();

		$show_title = $params->get('show_page_heading');
		$title      = $params->get('page_title', '');

		if(empty($title) || $show_title == 0)
		{
			$title = $app->getCfg('sitename');
		}
		elseif($app->getCfg('sitename_pagetitles', 0))
		{
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}

		$this->document->setTitle($title);

		if($params->get('menu-meta_description'))
		{
			$this->document->setDescription($params->get('menu-meta_description'));
		}

		if($params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $params->get('menu-meta_keywords'));
		}

		if($params->get('robots'))
		{
			$this->document->setMetadata('robots', $params->get('robots'));
		}

		$template   = trim($params->get('template', ''));
		$layoutpath = JPATH_SITE . '/components/com_home/views/home/tmpl/' . $template;

		$home                = new stdClass();
		$home->mod_name_pref = trim($params->get('mod_name_pref', ''));
		$home->style         = trim($params->get('style', ''));

		$this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));
		$this->assignRef('params', $params);

		$pos = JFactory::getApplication()->input->post->get('pos');

		if($pos)
		{
			JFactory::getApplication()->input->post->get('tmpl', 'none');
			$html = self::LoadPositionForHome($pos, $style = 'raw');
		}
		else
		{

			if(file_exists($layoutpath))
			{
				require $layoutpath;

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
		$document = JFactory::getDocument();
		$renderer = $document->loadRenderer('module');
		$params   = array( 'style' => $style );
		$contents = '';

		foreach(JModuleHelper::getModules($position) as $mod)
		{
			$contents .= $renderer->render($mod, $params);
		}

		return $contents;
	}
}