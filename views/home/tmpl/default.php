<?php
/**
 * @package        JUHome Component
 * @version        4.x
 * @author         Denys D. Nosov (denys@joomla-ua.org)
 * @copyright (C)  2011-2025 by Denys D. Nosov (https://joomla-ua.org)
 * @license        GNU General Public License version 2 or later
 *
 * @since          4.0
 */

use Joomla\CMS\Layout\FileLayout;

defined('_JEXEC') or die;

echo (new FileLayout('home.' . $home->mod_name_pref))->render();