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

use Silex\Application;
use Silex\ServiceProviderInterface;
use SwfTools\Configuration;
use SwfTools\Processor\FlashFile;
use SwfTools\Processor\PDFFile;

/**
 * @author Romain Neutron imprec@gmail.com
 */
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

        $app['swftools.pdf-file'] = $app->share(function(Application $app) use ($optionsResolver) {
            $app['swftools.options'] = $optionsResolver($app['swftools.options']);
            $logger = isset($app['monolog']) ? $app['monolog'] : null;

            return new PDFFile(new Configuration($app['swftools.options']), $logger);
        });

        $app['swftools.flash-file'] = $app->share(function(Application $app) use ($optionsResolver) {
            $app['swftools.options'] = $optionsResolver($app['swftools.options']);
            $logger = isset($app['monolog']) ? $app['monolog'] : null;

            return new FlashFile(new Configuration($app['swftools.options']), $logger);
        });
    }

    public function boot(Application $app)
    {

    }
}
