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
class FlashFile extends File
{
    protected $embedded;

    /**
     * Render the flash to PNG file
     *
     * @param  type                       $outputFile
     * @param  type                       $legacy_rendering
     * @return boolean
     * @throws Exception\InvalidArgumentException
     */
    public function render($outputFile, $legacy_rendering = false)
    {
        $swfrender = $this->getBinaryAdapter('Swfrender');

        if ( ! $outputFile) {
            throw new Exception\InvalidArgumentException('Invalid argument');
        }

        $outputFile = static::changePathnameExtension($outputFile, 'png');

        try {
            $swfrender->render($this, $outputFile, $legacy_rendering);

            return $outputFile;
        } catch (Exception\Exception $e) {
            throw new Exception\RuntimeException('Unable to render', $e->getCode(), $e);
        }

        throw new Exception('Unable to render the object');
    }

    /**
     * Returns an ArrayCollection of embedded object
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     *
     * @throws Exception\RuntimeException
     */
    public function listEmbeddedObjects()
    {
        if ($this->embedded) {
            return $this->embedded;
        }

        $this->embedded = new \Doctrine\Common\Collections\ArrayCollection();

        $swfextract = $this->getBinaryAdapter('Swfextract');

        try {
        $datas = explode("\n", $swfextract->listEmbedded($this));
        } catch (Exception\RuntimeException $e) {
            throw new Exception\RuntimeException('Unable to list embedded datas');
        }

        foreach ($datas as $line) {

            $matches = array();

            preg_match('/\[-([a-z]{1})\]\ [0-9]+\ ([a-z]+):\ ID\(s\)\ ([0-9-,\ ]+)/i', $line, $matches);

            if (count($matches) === 0)
                continue;

            $option = $matches[1];
            $type = EmbeddedObject::detectType($matches[2]);

            if ( ! $type) {
                continue;
            }

            foreach (explode(",", $matches[3]) as $id) {
                if (false !== $offset = strpos($id, '-')) {
                    for ($i = substr($id, 0, $offset); $i <= substr($id, $offset + 1); $i ++ ) {
                        $this->embedded->add(new EmbeddedObject($option, $matches[2], $i));
                    }
                } else {
                    $this->embedded->add(new EmbeddedObject($option, $type, $id));
                }
            }
        }

        return $this->embedded;
    }

    /**
     * Extract the specified Embedded file
     *
     * @param type $id
     * @param type $outputFile
     *
     * @return string
     *
     * @throws Exception\RuntimeException
     */
    public function extractEmbedded($id, $outputFile)
    {
        foreach ($this->listEmbeddedObjects() as $embedded) {
            if ($embedded->getId() == $id) {
                $swfextract = $this->getBinaryAdapter('Swfextract');

                try {
                    $swfextract->extract($this, $embedded, $outputFile);

                    return $outputFile;
                } catch (Exception\Exception $e) {
                    throw new Exception\RuntimeException('Unable to use SwfExtract', $e->getCode(), $e);
                }
            }
        }

        throw new Exception\RuntimeException('Unable to extract an embedded object');
    }

    /**
     * Extract the first embedded image found
     *
     * @param type $outputFile
     *
     * @return type
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\RuntimeException
     */
    public function extractFirstImage($outputFile)
    {
        if ( ! $outputFile) {
            throw new Exception\InvalidArgumentException('Bad destination');
        }

        $objects = $this->listEmbeddedObjects();

        if ( ! $objects) {
            throw new Exception\RuntimeException('Unable to extract an image');
        }

        foreach ($objects as $embedded) {
            if (in_array($embedded->getType(), array(EmbeddedObject::TYPE_JPEG, EmbeddedObject::TYPE_PNG))) {
                $swfextract = $this->getBinaryAdapter('Swfextract');

                try {
                    switch ($embedded->getType()) {
                        case EmbeddedObject::TYPE_JPEG:
                            $outputFile = static::changePathnameExtension($outputFile, 'jpg');
                            break;
                        case EmbeddedObject::TYPE_PNG:
                            $outputFile = static::changePathnameExtension($outputFile, 'png');
                            break;
                    }

                    $swfextract->extract($this, $embedded, $outputFile);

                    return $outputFile;
                } catch (Exception\RuntimeException $e) {

                }
            }
        }

        throw new Exception\RuntimeException('Unable to extract an image');
    }
}
