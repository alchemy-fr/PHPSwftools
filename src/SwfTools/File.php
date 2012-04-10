<?php

/**
 * Copyright (c) 2012 Alchemy
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

namespace SwfTools;

abstract class File extends \SplFileInfo
{

    protected $configuration;
    protected $embedded;

    /**
     * Build the Flash file given the configuration
     *
     * @param type $pathname
     * @param Configuration $configuration
     * @throws Exception
     */
    public function __construct($pathname, Configuration $configuration = null)
    {
        if ( ! file_exists($pathname))
        {
            throw new Exception(sprintf('File %s does not exist', $pathname));
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
     * @throws Exception
     */
    protected function getBinaryAdapter($binaryName)
    {
        $classname = __NAMESPACE__ . '\\Binary\\' . $binaryName;

        try
        {
            if (class_exists($classname))
            {
                return $classname::load($this->configuration);
            }
        }
        catch (Exception\RuntimeException $e)
        {

        }

        throw new Exception(sprintf('Unable to load %s', $binaryName));
    }

}
