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

$controller = JControllerLegacy::getInstance('Home');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();