<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'marquee',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'marquee\ModuleMarquee'    => 'system/modules/marquee/modules/ModuleMarquee.php',

    // Content Elements
	'marquee\ContentMarquee'    => 'system/modules/marquee/elements/ContentMarquee.php',

	// Models
	'marquee\MarqueeModel'     => 'system/modules/marquee/models/MarqueeModel.php',
	'marquee\MarqueeTextModel' => 'system/modules/marquee/models/MarqueeTextModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_marquee' => 'system/modules/marquee/templates/module',
	'ce_marquee'  => 'system/modules/marquee/templates/content',
));
