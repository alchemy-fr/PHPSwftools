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
use SwfTools\EmbeddedObject;
use SwfTools\Exception\BinaryNotFoundException;
use SwfTools\Exception\InvalidArgumentException;
use SwfTools\Exception\RuntimeException;
use Symfony\Component\Process\ProcessBuilder;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class Swfextract extends Binary
{

    /**
     * Execute the command to list the embedded objects
     *
     * @param  string           $pathfile
     * @throws RuntimeException
     * @return string|null      The ouptut string, null on error
     */
    public function listEmbedded($pathfile)
    {
        $builder = ProcessBuilder::create(array(
            $this->binaryPathname, $pathfile
        ));

        return $this->run($builder->getProcess());
    }

    /**
     *
     * Execute the command to extract an embedded object from a flash file
     *
     * @param  string                   $pathfile   the file
     * @param  EmbeddedObject           $embedded   The id of the object
     * @param  string                   $outputFile the path where to extract
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @return string|null              The ouptut string, null on error
     */
    public function extract($pathfile, EmbeddedObject $embedded, $outputFile)
    {
        if (trim($outputFile) === '') {
            throw new InvalidArgumentException('Invalid output file');
        }

        $builder = ProcessBuilder::create(array(
            $this->binaryPathname,
            '-' . $embedded->getOption(),
            $embedded->getId(),
            $pathfile,
            '-o',
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
        return static::loadBinary('swfextract', $configuration, $logger);
    }
}
