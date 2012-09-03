<?php

/*
 * This file is part of PHP-SwfTools.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwfTools\Processor;

use Monolog\Logger;
use SwfTools\Configuration;
use SwfTools\Exception\InvalidArgumentException;
use SwfTools\Exception\RuntimeException;

/**
 * @author Romain Neutron imprec@gmail.com
 */
abstract class File
{

    protected $configuration;
    protected $pathfile;
    protected $binaryAdapters;

    /**
     * Build the File processor given the configuration
     *
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration = null)
    {
        $this->configuration = $configuration ? : new Configuration();
        $this->binaryAdapters = array();
    }

    public function __destruct()
    {
        $this->close();
        $this->configuration = $this->binaryAdapters = null;
    }

    public function open($pathfile)
    {
        if ( ! file_exists($pathfile)) {
            throw new InvalidArgumentException(sprintf('File %s does not exist', $pathfile));
        }

        $this->pathfile = $pathfile;

        return $this;
    }

    public function close()
    {
        $this->pathfile = null;

        return $this;
    }

    /**
     * Change the extension of a pathname
     *
     * @example static::changePathnameExtension('/my/path/to/image.png', 'jpg') returns
     * '/my/path/to/image.jpg'
     *
     * @param string $pathname
     * @param string $extension
     *
     * @return string
     */
    protected static function changePathnameExtension($pathname, $extension)
    {
        return dirname($pathname) . '/' . pathinfo($pathname, PATHINFO_FILENAME) . '.' . $extension;
    }

    /**
     * Return the BinaryAdapter given a BinaryName
     *
     * @param string $binaryName
     * @param Logger $logger     A logger
     *
     * @return Binary\Binary The requested binary
     *
     * @throws Exception\RuntimeException
     */
    protected function getBinaryAdapter($binaryName, Logger $logger)
    {
        if (isset($this->binaryAdapters[$binaryName])) {
            return $this->binaryAdapters[$binaryName];
        }

        $classname = 'SwfTools\\Binary\\' . $binaryName;

        try {
            if (class_exists($classname)) {
                $this->binaryAdapters[$binaryName] = $classname::load($this->configuration, $logger);

                return $this->binaryAdapters[$binaryName];
            }
        } catch (RuntimeException $e) {

        }

        throw new RuntimeException(sprintf('Unable to load %s', $binaryName));
    }

}
