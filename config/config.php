<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @package   Marquee
 * @author    Hamid Abbaszadeh info@respinar.com
 * @license   LGPL-3.0+
 * @copyright respinar 2015-2017
 */

 /**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'marquee' => array
	(
		'tables' => array('tl_marquee', 'tl_marquee_text'),
		'icon'   => 'system/modules/marquee/assets/icon.png'
	)
));

/**
 * Register models
 */
 $GLOBALS['TL_MODELS']['tl_marquee']      = 'Respinar\Marquee\Model\MarqueeModel';
 $GLOBALS['TL_MODELS']['tl_marquee_text'] = 'Respinar\Marquee\Model\MarqueeTextModel'; 

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['miscellaneous']['marquee']   = 'Respinar\Marquee\Frontend\Module\ModuleMarquee';

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['miscellaneous']['marquee']   = 'Respinar\Marquee\Frontend\Element\ContentMarquee';
