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
use SwfTools\Exception\BinaryNotFoundException;
use SwfTools\Exception\RuntimeException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ExecutableFinder;

/**
 * The abstract binary adapter
 * 
 * @author Romain Neutron imprec@gmail.com
 */
abstract class Binary implements AdapterInterface
{

    protected $binaryPathname;

    /**
     * The path to the binary
     *
     * @param type $binaryPathname
     */
    public function __construct($binaryPathname)
    {
        $this->binaryPathname = $binaryPathname;
    }

    /**
     * Try to get the version of the binary. If the detection fails, return null
     *
     * @return string|null
     */
    public function getVersion()
    {
        $cmd = sprintf('%s --version', $this->binaryPathname);

        $datas = self::run($cmd, true);

        preg_match('/[a-z]+\ -\ part of swftools ([0-9\.]+)/i', $datas, $matches);

        return count($matches) > 0 ? $matches[1] : null;
    }

    /**
     * Load a Binary with configuration value, otherwise try to detect it.
     *
     * @param string $binaryName the name of the executable (used as a keyin the configuration)
     * @param  Configuration                               $configuration The configuration
     * @return Binary
     * 
     * @throws BinaryNotFoundException When no binary found
     */
    protected static function loadBinary($binaryName, Configuration $configuration)
    {
        if ($configuration->has($binaryName)) {
            return new static($configuration->get($binaryName));
        }

        $finder = new ExecutableFinder();

        if (null !== $exec_path = $finder->find($binaryName)) {
            return new static($exec_path);
        }

        throw new BinaryNotFoundException(sprintf('Binary %s not found', $binaryName));
    }

    /**
     * Run a command
     *
     * @param  string           $command       The command to execute
     * @param  Boolean          $bypass_errors if true, No exception are thrown
     * @return string           The output of the command
     * @throws RuntimeException When the command failed
     */
    protected static function run($command, $bypass_errors = false)
    {
        $process = new Process($command);
        $process->run();

        if ( ! $process->isSuccessful() && ! $bypass_errors) {
            throw new RuntimeException('Failed to execute ' . $command);
        }

        $result = $process->getOutput();
        unset($process);

        return $result;
    }

}
