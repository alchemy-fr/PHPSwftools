<?php

/*
 * This file is part of PHP-SwfTools.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwfTools\Binary;

use Psr\Log\LoggerInterface;
use \Pimple\Container;

class DriverContainer extends Container
{
    public static function create($configuration = array(), LoggerInterface $logger = null)
    {
        $container = new static();

        $container['configuration'] = $configuration;
        $container['logger'] = $logger;

        $container['pdf2swf'] = function ($container) {
            return Pdf2swf::create($container['configuration'], $container['logger']);
        };

        $container['swfrender'] = function ($container) {
            return Swfrender::create($container['configuration'], $container['logger']);
        };

        $container['swfextract'] = function ($container) {
            return Swfextract::create($container['configuration'], $container['logger']);
        };

        return $container;
    }
}
