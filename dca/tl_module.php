<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['marquee']    = '{title_legend},name,headline,type;{marqee_legend},marquee,numberOfItems;{config_legend},marquee_speed,marquee_direction,marquee_delayBeforeStart,marquee_gap,marquee_pauseOnHover,marquee_duplicated;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['marquee'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'options_callback'        => array('tl_module_marquee', 'getMarquees'),
	'eval'                    => array('multiple'=>false, 'mandatory'=>true),
	'sql'                     => "int(10) unsigned NOT NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['marquee_speed'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['marquee_speed'],
	'exclude'              => true,
	'inputType'            => 'text',
	'eval'                 => array('tl_class'=>'w50'),
    'sql'                  => "int(10) NOT NULL default '200'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['marquee_delayBeforeStart'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['marquee_delayBeforeStart'],
	'exclude'              => true,
	'inputType'            => 'text',
	'eval'                 => array('tl_class'=>'w50'),
    'sql'                  => "int(10) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['marquee_gap'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['marquee_gap'],
	'exclude'              => true,
	'inputType'            => 'text',
	'eval'                 => array('tl_class'=>'w50'),
    'sql'                  => "int(10) NULL"
);



$GLOBALS['TL_DCA']['tl_module']['fields']['marquee_pauseOnHover'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee_pauseOnHover'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['marquee_duplicated'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee_duplicated'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['marquee_direction'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee_direction'],
	'default'                 => 'right',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('right', 'left', 'up','down'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);


/**
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_module_marquee extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	/**
	 * Get all news archives and return them as array
	 *
	 * @return array
	 */
	public function getMarquees()
	{
		//if (!$this->User->isAdmin && !is_array($this->User->news))
		//{
		//	return array();
		//}

		$arrMarquees = array();
		$objMarquees = $this->Database->execute("SELECT id, title FROM tl_marquee ORDER BY title");

		while ($objMarquees->next())
		{
			//if ($this->User->hasAccess($objMarquees->id, 'marquee'))
			//{
				$arrMarquees[$objMarquees->id] = $objMarquees->title;
			//}
		}

		return $arrMarquees;
	}
}
