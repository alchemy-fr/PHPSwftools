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
use SwfTools\EmbeddedObject;
use SwfTools\Exception;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class Swfextract extends Binary
{

    /**
     * Execute the command to list the embedded objects
     *
     * @param  \SplFileInfo                         $file
     * @throws \SwfTools\Exception\RuntimeException
     * @return string|null                          The ouptut string, null on error
     */
    public function listEmbedded(\SplFileInfo $file)
    {
        $cmd = sprintf('%s %s', escapeshellcmd($this->binaryPathname), escapeshellarg($file->getPathname()));

        return self::run($cmd);
    }

    /**
     *
     * Execute the command to extract an embedded object from a flash file
     *
     * @param  \SplFileInfo               $file       the file
     * @param  EmbeddedObject             $embedded   The id of the object
     * @param  string                     $outputFile the path where to extract
     * @throws Exception\InvalidArgumentException
     * @throws Exception\RuntimeException
     * @return string|null                The ouptut string, null on error
     */
    public function extract(\SplFileInfo $file, EmbeddedObject $embedded, $outputFile)
    {
        if (trim($outputFile) === '') {
            throw new Exception\InvalidArgumentException('Invalid output file');
        }

        $cmd = sprintf('%s -%s %d %s -o %s'
          , escapeshellcmd($this->binaryPathname)
          , $embedded->getOption()
          , $embedded->getId()
          , escapeshellarg($file->getPathname())
          , escapeshellarg($outputFile)
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
        return static::findBinary('swfextract', $configuration);
    }

}
