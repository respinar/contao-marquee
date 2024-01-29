<?php

declare(strict_types=1);

/*
 * This file is part of Contao Marquee Bundle.
 *
 * (c) Hamid Peywasti 2023-2024 <hamid@respinar.com>
 *
 * @license LGPL-3.0-or-later
 */

namespace Respinar\ContaoMarquee\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Respinar\ContaoMarquee\ContaoMarqueeBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoMarqueeBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
