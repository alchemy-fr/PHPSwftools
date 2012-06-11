<?php

namespace SwfTools\Processor;

class PDFFileTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PDFFile
     */
    protected $object;
    protected $destination;

    protected function setUp()
    {
        $this->destination = __DIR__ . '/../../../files/tmp.swf';
        $this->object = new PDFFile();
        $this->object->open(__DIR__ . '/../../../files/PDF.pdf');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        if (file_exists($this->destination))
            unlink($this->destination);
    }

    /**
     * @covers SwfTools\Processor\PDFFile::toSwf
     */
    public function testToSwf()
    {
        $this->object->toSwf($this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\Processor\PDFFile::toSwf
     * @expectedException \SwfTools\Exception\InvalidArgumentException
     */
    public function testToSwfFailed()
    {
        $this->object->toSwf('');
    }

}
