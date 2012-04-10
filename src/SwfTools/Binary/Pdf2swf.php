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

namespace SwfTools\Binary;

use SwfTools\Configuration;
use SwfTools\Exception;
use Symfony\Component\Process\Process;

class Pdf2swf extends Binary
{

    const CONVERT_POLY2BITMAP         = 'poly2bitmap';
    const CONVERT_BITMAP              = 'bitmap';
    const OPTION_LINKS_DISABLE        = 'disablelinks';
    const OPTION_LINKS_OPENNEWWINDOW  = 'linksopennewwindow';
    const OPTION_ZLIB_ENABLE          = 'enablezlib';
    const OPTION_ZLIB_DISABLE         = 'disablezlib';
    const OPTION_ENABLE_SIMPLEVIEWER  = 'simpleviewer';
    const OPTION_DISABLE_SIMPLEVIEWER = 'nosimpleviewer';

    public function toSwf(\SplFileInfo $file, $outputFile, Array $options = array(), $convertType = self::CONVERT_POLY2BITMAP, $resolution = 72, $pageRange = '1-', $frameRate = 15, $jpegquality = 75, $timelimit = 100)
    {
        if ( ! trim($outputFile))
        {
            throw new Exception\InvalidArgument('Invalid resolution argument');
        }

        if ((int) $resolution < 1)
        {
            throw new Exception\InvalidArgument('Invalid resolution argument');
        }

        if ((int) $frameRate < 1)
        {
            throw new Exception\InvalidArgument('Invalid framerate argument');
        }

        if ((int) $jpegquality < 0 || (int) $jpegquality > 100)
        {
            throw new Exception\InvalidArgument('Invalid jpegquality argument');
        }

        if ( ! preg_match('/\d+-\d?/', $pageRange))
        {
            throw new Exception\InvalidArgument('Invalid pages argument');
        }

        if ((int) $timelimit < 1)
        {
            throw new Exception\InvalidArgument('Invalid time limit argument');
        }


        $option_cmd = array();

        switch ($convertType)
        {
            case self::CONVERT_POLY2BITMAP:
            case self::CONVERT_BITMAP:
                $option_cmd [] = $convertType;
                break;
        }

        $option_cmd [] = 'zoom=' . (int) $resolution;
        $option_cmd [] = 'framerate=' . (int) $frameRate;
        $option_cmd [] = 'jpegquality=' . (int) $jpegquality;
        $option_cmd [] = 'pages=' . $pageRange;

        if ( ! in_array(self::OPTION_ZLIB_DISABLE, $options) && in_array(self::OPTION_ZLIB_ENABLE, $options))
        {
            $option_cmd [] = 'enablezlib';
        }
        if ( ! in_array(self::OPTION_DISABLE_SIMPLEVIEWER, $options) && in_array(self::OPTION_ENABLE_SIMPLEVIEWER, $options))
        {
            $option_cmd [] = 'simpleviewer';
        }
        if (in_array(self::OPTION_LINKS_DISABLE, $options))
        {
            $option_cmd [] = 'disablelinks';
        }
        if (in_array(self::OPTION_LINKS_OPENNEWWINDOW, $options))
        {
            $option_cmd [] = 'linksopennewwindow';
        }

        $option_string = escapeshellarg(implode('&', $option_cmd));

        $option_string = ! $option_string ? : '-s ' . $option_string;


        $cmd = sprintf(
          '%s %s %s -o %s -T 9 -f'
          , escapeshellcmd($this->binaryPathname)
          , escapeshellarg($file->getPathname())
          , $option_string
          , escapeshellarg($outputFile)
        );

        if ( ! defined('PHP_WINDOWS_VERSION_BUILD') && $timelimit > 0)
        {
            $cmd .= ' -Q ' . (int) $timelimit;
        }

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
        return static::findBinary('pdf2swf', $configuration);
    }

}
