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

/**
 *
 */
abstract class Binary implements AdapterInterface
{

    protected $binaryPathname;

    /**
     * The path to the binary
     *
     * @param type $binaryPath
     */
    public function __construct($binaryPathname)
    {
        $this->binaryPathname = $binaryPathname;
    }

    /**
     * Returns the version of the binary
     *
     * @return string
     */
    public function getVersion()
    {
        $cmd = sprintf('%s --version', $this->binaryPathname);

        $datas = self::run($cmd, true);

        preg_match('/[a-z]+\ -\ part of swftools ([0-9\.]+)/i', $datas, $matches);

        return count($matches) > 0 ? $matches[1] : null;
    }

    /**
     *
     * @param   string  $binaryName the name of the executable (used as a key
     *                              in the configuration)
     * @param   Configuration   $configuration  The configuration
     * @return  \SwfTools\Binary\Binary
     * @throws  \SwfTools\Exception\BinaryNotFoundException
     */
    protected static function findBinary($binaryName, Configuration $configuration)
    {
        if ($configuration->has($binaryName))
        {
            return new static($configuration->get($binaryName));
        }

        $exec_path = self::autodetect($binaryName);

        if ($exec_path && is_executable($exec_path))
        {
            return new static($exec_path);
        }

        throw new Exception\BinaryNotFoundException(sprintf('Binary %s not found', $binaryName));
    }

    /**
     * Autodetect the presence of a binary
     *
     * @param   string      $binaryName
     * @return  string
     */
    protected static function autodetect($binaryName)
    {
        return trim(self::run(sprintf('which %s', escapeshellarg($binaryName)), true));
    }

    /**
     * Run a command
     *
     * @param   string      $command            The command to execute
     * @param   boolean     $bypass_errors      if true, No exception are thrown
     * @return  string                          The output of the command
     * @throws  RuntimeException
     */
    protected static function run($command, $bypass_errors = false)
    {
        $process = new Process($command);
        $process->run();

        if ( ! $process->isSuccessful() && ! $bypass_errors)
        {
            throw new Exception\RuntimeException('Failed to execute ' . $command);
        }

        $result = $process->getOutput();
        unset($process);

        return $result;
    }

}
