<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Respinar\Marquee',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'Respinar\Marquee\ModuleMarquee'    => 'system/modules/marquee/library/Respinar/Marquee/Frontend/Modules/ModuleMarquee.php',

    // Content Elements
	'Respinar\Marquee\ContentMarquee'    => 'system/modules/marquee/library/Respinar/Marquee/Frontend/Elements/ContentMarquee.php',

	// Models
	'Respinar\Marquee\MarqueeModel'     => 'system/modules/marquee/library/Respinar/Marquee/Models/MarqueeModel.php',
	'Respinar\Marquee\MarqueeTextModel' => 'system/modules/marquee/library/Respinar/Marquee/Models/MarqueeTextModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_marquee' => 'system/modules/marquee/templates/module',
	'ce_marquee'  => 'system/modules/marquee/templates/content',
));
