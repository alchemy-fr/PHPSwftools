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
use SwfTools\FlashFile;
use SwfTools\EmbeddedObject;
use SwfTools\Exception;
use Symfony\Component\Process\Process;

class Swfextract extends Binary
{

    /**
     * Execute the command to list the embedded objects
     *
     * @param FlashFile $file
     * @throws \SwfTools\Exception\RuntimeException
     * @return string|null The ouptut string, null on error
     */
    public function listEmbedded(FlashFile $file)
    {
        $cmd = sprintf('%s %s', escapeshellcmd($this->binaryPathname), escapeshellarg($file->getPathname()));

        return self::run($cmd);
    }

    /**
     *
     * Execute the command to extract an embedded object from a flash file
     *
     * @param FlashFile $file the FlashFile
     * @param int $id The id of the object
     * @param string $outputFile the path where to extract
     * @throws Exception\InvalidArgument
     * @throws Exception\RuntimeException
     * @return string|null The ouptut string, null on error
     */
    public function extract(FlashFile $file, EmbeddedObject $embedded, $outputFile)
    {
        if (trim($outputFile) === '')
        {
            throw new Exception\InvalidArgument('Invalid output file');
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
