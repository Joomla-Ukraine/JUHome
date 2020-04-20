<?php
/**
 * @package        JUHome Component
 * @version        3.x
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2020 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @since          3.0
 */

defined('_JEXEC') or die;

$load = new HomeViewHome();

echo $load->LoadPositionForHome($home->mod_name_pref, 'raw');