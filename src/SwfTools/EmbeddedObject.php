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

class EmbeddedObject
{

    protected $option;
    protected $type;
    protected $id;

    const TYPE_SHAPE     = 'Shape';
    const TYPE_MOVIECLIP = 'MovieClip';
    const TYPE_JPEG      = 'JPEG';
    const TYPE_PNG       = 'PNG';
    const TYPE_FRAME     = 'Frame';
    const TYPE_SOUND     = 'Sound';

    /**
     *
     * @param string $option The option to pass to the command line to extract
     * @param type $type The type of embedded object, one of the self::TYPE_* constants
     * @param int $id The id of the object
     */
    public function __construct($option, $type, $id)
    {
        $this->option = $option;
        $this->type = $type;
        $this->id = (int) $id;
    }

    /**
     *
     * @return string
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Detect type based on the raw output
     *
     * @param string $type The raw output
     * @return string
     */
    public static function detectType($type)
    {
        $type = strtolower($type);

        switch ($type)
        {
            case 'frame':
            case 'frames':
                return self::TYPE_FRAME;
                break;
            case 'shape':
            case 'shapes':
                return self::TYPE_SHAPE;
                break;
            case 'jpeg':
            case 'jpegs':
                return self::TYPE_JPEG;
                break;
            case 'png':
            case 'pngs':
                return self::TYPE_PNG;
                break;
            case 'sound':
            case 'sounds':
                return self::TYPE_SOUND;
                break;
            case 'movieclip':
            case 'movieclips':
                return self::TYPE_MOVIECLIP;
                break;
        }

        return null;
    }

}
