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
use SwfTools\Exception\BinaryNotFoundException;
use SwfTools\Exception\InvalidArgumentException;
use SwfTools\Exception\RuntimeException;
use Symfony\Component\Process\ProcessBuilder;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class Swfrender extends Binary
{

    /**
     *
     * @param  string                   $pathfile
     * @param  string                   $outputFile
     * @param  Boolean                  $legacy
     * @return null
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function render($pathfile, $outputFile, $legacy)
    {
        if (trim($outputFile) === '') {
            throw new InvalidArgumentException('Invalid output file');
        }

        $builder = ProcessBuilder::create(array(
            $this->binaryPathname,
            ($legacy ? '-l' : ''),
            $pathfile, '-o',
            $outputFile,
        ));

        return $this->run($builder->getProcess());
    }

    /**
     * Factory method to build the binary
     *
     * Either pass a configuration file with the binary settings, or pass an
     * empty configuration, which will trigger the autodetection
     *
     * @param Configuration $configuration A Configuration
     * @param Logger        $logger        A logger
     *
     * @return Swfrender
     *
     * @throws BinaryNotFoundException
     */
    public static function load(Configuration $configuration, Logger $logger)
    {
        return static::loadBinary('swfrender', $configuration, $logger);
    }
}
