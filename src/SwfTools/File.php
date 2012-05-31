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

/**
 * @author Romain Neutron imprec@gmail.com
 */
abstract class File extends \SplFileInfo
{

    protected $configuration;
    protected $embedded;

    /**
     * Build the Flash file given the configuration
     *
     * @param  type                      $pathname
     * @param  Configuration             $configuration
     * @throws Exception\InvalidArgument
     */
    public function __construct($pathname, Configuration $configuration = null)
    {
        if ( ! file_exists($pathname)) {
            throw new Exception\InvalidArgument(sprintf('File %s does not exist', $pathname));
        }

        parent::__construct($pathname);

        $this->configuration = $configuration ? : new Configuration();
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
     * @param type $binaryName
     *
     * @return Binary\Binary The requested binary
     *
     * @throws Exception\RuntimeException
     */
    protected function getBinaryAdapter($binaryName)
    {
        $classname = __NAMESPACE__ . '\\Binary\\' . $binaryName;

        try {
            if (class_exists($classname)) {
                return $classname::load($this->configuration);
            }
        } catch (Exception\RuntimeException $e) {

        }

        throw new Exception\RuntimeException(sprintf('Unable to load %s', $binaryName));
    }

}
