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

$load = new HomeViewHome();

if( $params->get('display_title') )
{
	echo '<h1>' . $params->get('page_title') . '</h1>';
}

echo $load->LoadPositionForHome($home->mod_name_pref, $style = ($home->style ? : 'raw'));