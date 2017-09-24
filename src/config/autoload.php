<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */

/**
 * Register PSR-0 namespaces
 */
 if (class_exists('NamespaceClassLoader')) {
    NamespaceClassLoader::add('Respinar\Marquee', 'system/modules/marquee/library');
}

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_marquee' => 'system/modules/marquee/templates/module',
	'ce_marquee'  => 'system/modules/marquee/templates/content',
));
