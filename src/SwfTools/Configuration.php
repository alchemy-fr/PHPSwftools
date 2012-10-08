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

use SwfTools\Exception\InvalidArgumentException;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class Configuration
{
    protected $configuration;

    public function __construct(Array $configuration = null)
    {
        $this->configuration = $configuration;
    }

    public function has($key)
    {
        return isset($this->configuration[$key]);
    }

    public function get($key)
    {
        if (!isset($this->configuration[$key])) {
            throw new InvalidArgumentException(sprintf('No configuration for %s', $key));
        }

        return $this->configuration[$key];
    }
}
