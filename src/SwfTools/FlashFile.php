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

class FlashFile extends File
{

    /**
     * Render the flash to PNG file
     *
     * @param type $outputFile
     * @param type $legacy_rendering
     * @return boolean
     * @throws Exception
     */
    public function render($outputFile, $legacy_rendering = false)
    {
        $swfrender = $this->getBinaryAdapter('Swfrender');

        if(!$outputFile)
        {
            throw new Exception('Invalid argument');
        }

        $outputFile = $this->changeExtension($outputFile, 'png');

        try
        {
            $swfrender->render($this, $outputFile, $legacy_rendering);

            return $outputFile;
        }
        catch (Exception\RuntimeException $e)
        {
            throw new Exception('Unable to use SwfExtract');
        }
        catch (Exception\InvalidArgument $e)
        {
            throw new Exception('Invalid argument');
        }

        throw new Exception('Unable to render the object');
    }

    /**
     * Returns an ArrayCollection of embedded object
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     *
     * @throws Exception
     */
    public function listEmbeddedObjects()
    {
        if ($this->embedded)
        {
            return $this->embedded;
        }

        $this->embedded = new \Doctrine\Common\Collections\ArrayCollection();

        $swfextract = $this->getBinaryAdapter('Swfextract');

        try
        {
            $datas = explode("\n", $swfextract->listEmbedded($this));
        }
        catch (Exception\RuntimeException $e)
        {
            throw new Exception('Unable to list embedded datas');
        }

        foreach ($datas as $line)
        {

            $matches = array();

            preg_match('/\[-([a-z]{1})\]\ [0-9]+\ ([a-z]+):\ ID\(s\)\ ([0-9-,\ ]+)/i', $line, $matches);

            if (count($matches) === 0)
                continue;

            $option = $matches[1];
            $type   = EmbeddedObject::detectType($matches[2]);

            if ( ! $type)
            {
                continue;
            }

            foreach (explode(",", $matches[3]) as $id)
            {
                if (false !== $offset = strpos($id, '-'))
                {
                    for ($i = substr($id, 0, $offset); $i <= substr($id, $offset + 1); $i ++ )
                    {
                        $this->embedded->add(new EmbeddedObject($option, $matches[2], $i));
                    }
                }
                else
                {
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
     * @throws Exception
     */
    public function extractEmbedded($id, $outputFile)
    {
        foreach ($this->listEmbeddedObjects() as $embedded)
        {
            if ($embedded->getId() == $id)
            {
                $swfextract = $this->getBinaryAdapter('Swfextract');

                try
                {
                    $swfextract->extract($this, $embedded, $outputFile);

                    return $outputFile;
                }
                catch (Exception\RuntimeException $e)
                {
                    throw new Exception('Unable to use SwfExtract');
                }
                catch (Exception\InvalidArgument $e)
                {
                    throw new Exception('Invalid argument');
                }
            }
        }

        throw new Exception('Unable to extract an embedded object');
    }

    /**
     * Extract the first embedded image found
     *
     * @param type $outputFile
     *
     * @return type
     *
     * @throws Exception
     */
    public function extractFirstImage($outputFile)
    {
        if ( ! $outputFile)
        {
            throw new Exception('Bad destination');
        }

        $objects = $this->listEmbeddedObjects();

        if ( ! $objects)
        {
            throw new Exception('Unable to extract an image');
        }

        foreach ($objects as $embedded)
        {
            if (in_array($embedded->getType(), array(EmbeddedObject::TYPE_JPEG, EmbeddedObject::TYPE_PNG)))
            {
                $swfextract = $this->getBinaryAdapter('Swfextract');

                try
                {
                    switch ($embedded->getType())
                    {
                        case EmbeddedObject::TYPE_JPEG:
                            $outputFile = $this->changeExtension($outputFile, 'jpg');
                            break;
                        case EmbeddedObject::TYPE_PNG:
                            $outputFile = $this->changeExtension($outputFile, 'png');
                            break;
                    }

                    $swfextract->extract($this, $embedded, $outputFile);

                    return $outputFile;
                }
                catch (Exception\RuntimeException $e)
                {

                }
            }
        }

        throw new Exception('Unable to extract an image');
    }

}
