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

use Monolog\Logger;
use SwfTools\Configuration;

/**
 * The adapter interface. SwfTools binaries adapters should implement this
 * interface
 *
 * @author Romain Neutron imprec@gmail.com
 */
interface AdapterInterface
{

    /**
     * Return the version of the binary adapter
     *
     * @return string The version of the binary adapter
     */
    public function getVersion();

    /**
     * Load the binary adapter. If the configuration contains a parameter, use
     * it as pathfile, otherwise, autodetect the binary
     *
     * @param Configuration $configuration
     * @param Logger        $logger        A logger
     */
    public static function load(Configuration $configuration, Logger $logger);
}
