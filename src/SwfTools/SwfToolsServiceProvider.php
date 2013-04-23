<?php

/*
 * This file is part of PHP-SwfTools.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwfTools;

use Monolog\Logger;
use Monolog\Handler\NullHandler;
use Silex\Application;
use Silex\ServiceProviderInterface;
use SwfTools\Configuration;
use SwfTools\Processor\FlashFile;
use SwfTools\Processor\PDFFile;

class SwfToolsServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['swftools.options'] = array();

        $optionsResolver = function($options) {
            return array_filter(array_replace(
                array(
                    'pdf2swf'    => '',
                    'swfrender'  => '',
                    'swfextract' => '',
                ), $options
            ), function($value) {
                return $value !== '';
            });
        };

        $app['swftools.logger'] = $app->share(function (Application $app) {
            if (isset($app['monolog'])) {
                return $app['monolog'];
            }

            $logger = new Logger('swftools-logger');
            $logger->pushHandler(new NullHandler());

            return $logger;
        });

        $app['swftools.configuration'] = $app->share(function (Application $app) use ($optionsResolver) {
            return new Configuration($optionsResolver($app['swftools.options']));
        });

        $app['swftools.pdf-file'] = $app->share(function(Application $app) {
            return new PDFFile($app['swftools.configuration'], $app['swftools.logger']);
        });

        $app['swftools.flash-file'] = $app->share(function(Application $app) {
            return new FlashFile($app['swftools.configuration'], $app['swftools.logger']);
        });
    }

    public function boot(Application $app)
    {
    }
}
