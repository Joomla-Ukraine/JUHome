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

// no direct access
defined('_JEXEC') or die;

echo HomeViewHome::LoadPositionForHome( $home->mod_name_pref, $style = 'raw' );