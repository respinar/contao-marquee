<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   Marquee
 * @author    Hamid Abbaszadeh info@respinar.com
 * @license   GNU/LGPL
 * @copyright respinar 2015
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace marquee;


/**
 * Reads and writes Marquee
 *
 * @package   Models
 * @author    Hamid Abbaszadeh <http://respinar.com>
 * @copyright Hamid Abbaszadeh 2013-2014
 */
class MarqueeModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_marquee';

}
