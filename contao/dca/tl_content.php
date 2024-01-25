<?php

/*
 * This file is part of Contao Marquee Bundle.
 *
 * (c) Hamid Peywasti 2015-2024 <hamid@respinar.com>
 *
 * @license LGPL-3.0-or-later
 */

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['marquee']    = '{title_legend},type,headline;{marquee_legend},marquee,numberOfItems;{config_legend},marquee_title,marquee_duration,marquee_duration_is_speed,marquee_direction,marquee_pauseOnHover,marquee_delayBeforeStart,marquee_duplicated;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'marquee_duplicated';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['marquee_duplicated'] = 'marquee_gap';




/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_title'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee_title'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>"w50"),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'foreignKey'              => 'tl_marquee.title',
	'eval'                    => array('multiple'=>false, 'mandatory'=>true),
	'sql'                     => "int(10) unsigned NOT NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_duration'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['marquee_duration'],
	'exclude'              => true,
	'inputType'            => 'text',
	'eval'                 => array('tl_class'=>'w50'),
    'sql'                  => "int(10) NOT NULL default '200'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_duration_is_speed'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['marquee_duration_is_speed'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_delayBeforeStart'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['marquee_delayBeforeStart'],
	'exclude'              => true,
	'inputType'            => 'text',
	'eval'                 => array('tl_class'=>'w50'),
    'sql'                  => "int(10) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_gap'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['marquee_gap'],
	'exclude'              => true,
	'inputType'            => 'text',
	'eval'                 => array('tl_class'=>'w50'),
    'sql'                  => "int(10) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_pauseOnHover'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee_pauseOnHover'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_duplicated'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['marquee_duplicated'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true,'tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['marquee_direction'] = array
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
