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

use SwfTools\EmbeddedObject;
use SwfTools\Exception\Exception;
use SwfTools\Exception\InvalidArgumentException;
use SwfTools\Exception\LogicException;
use SwfTools\Exception\RuntimeException;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class FlashFile extends File
{
    protected $embedded;

    public function __destruct()
    {
        $this->embedded = null;
        parent::__destruct();
    }

    /**
     * Render the flash to PNG file
     *
     * @param  string                   $outputFile
     * @param  Boolean                  $legacy_rendering
     * @return Boolean
     * @throws InvalidArgumentException
     */
    public function render($outputFile, $legacy_rendering = false)
    {
        if (!$this->pathfile) {
            throw new LogicException('No file open');
        }

        $swfrender = $this->getBinaryAdapter('Swfrender');

        if (!$outputFile) {
            throw new InvalidArgumentException('Invalid argument');
        }

        $outputFile = static::changePathnameExtension($outputFile, 'png');

        try {
            $swfrender->render($this->pathfile, $outputFile, $legacy_rendering);
        } catch (Exception $e) {
            throw new RuntimeException('Unable to render');
        }

        unset($swfrender);

        return $outputFile;
    }

    /**
     * List all embedded object of the current flash file
     *
     * @param  Boolean          $useCache
     * @return type
     * @throws RuntimeException
     */
    public function listEmbeddedObjects($useCache = false)
    {
        if (!$this->pathfile) {
            throw new LogicException('No file open');
        }

        if ($useCache && $this->embedded) {
            return $this->embedded;
        }

        $this->embedded = array();

        $swfextract = $this->getBinaryAdapter('Swfextract');

        try {
            $datas = explode("\n", $swfextract->listEmbedded($this->pathfile));
        } catch (RuntimeException $e) {
            throw new RuntimeException('Unable to list embedded datas');
        }

        unset($swfextract);

        foreach ($datas as $line) {

            $matches = array();

            preg_match('/\[-([a-z]{1})\]\ [0-9]+\ ([a-z]+):\ ID\(s\)\ ([0-9-,\ ]+)/i', $line, $matches);

            if (count($matches) === 0)
                continue;

            $option = $matches[1];
            $type = EmbeddedObject::detectType($matches[2]);

            if (!$type) {
                continue;
            }

            foreach (explode(",", $matches[3]) as $id) {
                if (false !== $offset = strpos($id, '-')) {
                    for ($i = substr($id, 0, $offset); $i <= substr($id, $offset + 1); $i++) {
                        $this->embedded[] = new EmbeddedObject($option, $matches[2], $i);
                    }
                } else {
                    $this->embedded[] = new EmbeddedObject($option, $type, $id);
                }
            }
        }

        return $this->embedded;
    }

    /**
     * Extract the specified Embedded file
     *
     * @param integer $id
     * @param string  $outputFile
     *
     * @return string
     *
     * @throws RuntimeException
     */
    public function extractEmbedded($id, $outputFile)
    {
        if (!$this->pathfile) {
            throw new LogicException('No file open');
        }

        if (!$outputFile) {
            throw new InvalidArgumentException('Bad destination');
        }

        foreach ($this->listEmbeddedObjects(true) as $embedded) {
            if ($embedded->getId() == $id) {
                $swfextract = $this->getBinaryAdapter('Swfextract');

                try {
                    $swfextract->extract($this->pathfile, $embedded, $outputFile);
                } catch (Exception $e) {
                    throw new RuntimeException('Unable to use SwfExtract', $e->getCode(), $e);
                }

                unset($swfextract);

                return $outputFile;
            }
        }

        throw new RuntimeException('Unable to extract an embedded object');
    }

    /**
     * Extract the first embedded image found
     *
     * @param string $outputFile
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function extractFirstImage($outputFile)
    {
        if (!$this->pathfile) {
            throw new LogicException('No file open');
        }

        if (!$outputFile) {
            throw new InvalidArgumentException('Bad destination');
        }

        $objects = $this->listEmbeddedObjects();

        if (!$objects) {
            throw new RuntimeException('Unable to extract an image');
        }

        foreach ($objects as $embedded) {
            if (in_array($embedded->getType(), array(EmbeddedObject::TYPE_JPEG, EmbeddedObject::TYPE_PNG))) {
                $swfextract = $this->getBinaryAdapter('Swfextract');

                switch ($embedded->getType()) {
                    case EmbeddedObject::TYPE_JPEG:
                        $outputFile = static::changePathnameExtension($outputFile, 'jpg');
                        break;
                    case EmbeddedObject::TYPE_PNG:
                        $outputFile = static::changePathnameExtension($outputFile, 'png');
                        break;
                    default:
                        continue;
                }

                try {
                    $swfextract->extract($this->pathfile, $embedded, $outputFile);
                } catch (Exception $e) {
                    throw new RuntimeException('Unable to use SwfExtract', $e->getCode(), $e);
                }

                unset($swfextract);

                return $outputFile;
            }
        }

        throw new RuntimeException('Unable to extract an image');
    }
}
