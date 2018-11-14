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
use Joomla\CMS\MVC\Controller\BaseController;

jimport('joomla.application.component.controller');

$controller = BaseController::getInstance('Home');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();