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

use SwfTools\Configuration;
use SwfTools\Exception;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class Swfrender extends Binary
{

    /**
     *
     * @param  \SplFileInfo               $file
     * @param  type                       $outputFile
     * @param  type                       $legacy
     * @return null
     * @throws Exception\InvalidArgumentException
     * @throws Exception\RuntimeException
     */
    public function render(\SplFileInfo $file, $outputFile, $legacy)
    {
        if (trim($outputFile) === '') {
            throw new Exception\InvalidArgumentException('Invalid output file');
        }

        $cmd = sprintf(
          '%s %s %s -o %s'
          , $this->binaryPathname
          , ($legacy ? '-l' : '')
          , $file->getPathname()
          , $outputFile
        );

        return self::run($cmd);
    }

    /**
     * Factory method to build the binary
     *
     * Either pass a configuration file with the binary settings, or pass an
     * empty configuration, which will trigger the autodetection
     *
     * @throws Exception\BinaryNotFoundException
     * @return Swfrender
     */
    public static function load(Configuration $configuration)
    {
        return static::findBinary('swfrender', $configuration);
    }

}
