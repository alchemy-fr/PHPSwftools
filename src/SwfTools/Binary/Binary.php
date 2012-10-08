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
use SwfTools\Exception\BinaryNotFoundException;
use SwfTools\Exception\RuntimeException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
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
     *
     * @var Logger
     */
    protected $logger;

    /**
     * The path to the binary
     *
     * @param type   $binaryPathname
     * @param Logger $logger         A logger
     */
    public function __construct($binaryPathname, Logger $logger)
    {
        if (!is_executable($binaryPathname)) {
            throw new BinaryNotFoundException(sprintf('Binary %s appears to be not executable', $binaryPathname));
        }

        $this->binaryPathname = $binaryPathname;
        $this->logger = $logger;
    }

    /**
     * Try to get the version of the binary. If the detection fails, return null
     *
     * @return string|null
     */
    public function getVersion()
    {
        $builder = ProcessBuilder::create(array($this->binaryPathname, '--version'));

        $datas = $this->run($builder->getProcess(), true);
        unset($builder);

        preg_match('/[a-z]+\ -\ part of swftools ([0-9\.]+)/i', $datas, $matches);

        return count($matches) > 0 ? $matches[1] : null;
    }

    /**
     * Load a Binary with configuration value, otherwise try to detect it.
     *
     * @param  string        $binaryName    the name of the executable (used as a keyin the configuration)
     * @param  Configuration $configuration The configuration
     * @param  Logger        $logger        A logger
     * @return Binary
     *
     * @throws BinaryNotFoundException When no binary found
     */
    protected static function loadBinary($binaryName, Configuration $configuration, Logger $logger)
    {
        if ($configuration->has($binaryName)) {
            return new static($configuration->get($binaryName), $logger);
        }

        $finder = new ExecutableFinder();

        if (null !== $exec_path = $finder->find($binaryName)) {
            unset($finder);

            return new static($exec_path, $logger);
        }

        throw new BinaryNotFoundException(sprintf('Binary %s not found', $binaryName));
    }

    /**
     * Run a command
     *
     * @param  Process          $process       The command to execute
     * @param  Boolean          $bypass_errors if true, No exception are thrown
     * @return string           The output of the command
     * @throws RuntimeException When the command failed
     */
    protected function run(Process $process, $bypass_errors = false)
    {
        $this->logger->addInfo(sprintf('SwfTools running command %s', $process->getCommandLine()));

        $process->run();

        if (!$process->isSuccessful() && !$bypass_errors) {
            $this->logger->addError(sprintf('SwfTools command failed %s', $process->getErrorOutput()));
            throw new RuntimeException('Failed to execute ' . $process->getCommandLine());
        }

        $result = $process->getOutput();

        $this->logger->addInfo('SwfTools command successful');

        return $result;
    }
}
