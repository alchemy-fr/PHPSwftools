<?php

namespace SwfTools\Processor;

class FileTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers SwfTools\Processor\File::getBinaryAdapter
     * @expectedException  \SwfTools\Exception\RuntimeException
     */
    public function testGetBinaryAdapter()
    {
        $object = new ExtendedFile();
        $object->testGetBinaryAdapter();
    }

    /**
     * @covers SwfTools\Processor\File::changePathnameExtension
     */
    public function testGetChangePathnameExtension()
    {
        $object = new ExtendedFile();
        $this->assertEquals('/path/kawabunga.plus', $object->change('/path/kawabunga.png', 'plus'));
    }

}

class ExtendedFile extends File
{

    public function __construct()
    {

    }

    public function testGetBinaryAdapter()
    {
        $this->getBinaryAdapter('Babebibobu');
    }

    public function change($pathname, $extension)
    {
        return static::changePathnameExtension($pathname, $extension);
    }

}
