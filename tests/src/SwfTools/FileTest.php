<?php

namespace SwfTools;

class FileTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers SwfTools\File::getBinaryAdapter
     * @expectedException  \SwfTools\Exception
     */
    public function testGetBinaryAdapter()
    {
        $object = new ExtendedFile();
        $object->testGetBinaryAdapter();
    }

    /**
     * @covers SwfTools\File::changeExtension
     */
    public function testGetChangeExtension()
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
        return $this->changeExtension($pathname, $extension);
    }

}
