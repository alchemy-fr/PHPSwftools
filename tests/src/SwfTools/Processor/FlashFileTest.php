<?php

namespace SwfTools\Processor;

class FlashFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FlashFile
     */
    protected $object;
    protected $destination;

    protected function setUp()
    {
        $this->destination = __DIR__ . '/../../../files/tmp.jpg';
        $this->object = new FlashFile();
        $this->object->open(__DIR__ . '/../../../files/flashfile.swf');
    }

    protected function tearDown()
    {
        $this->object->close();
        if (file_exists($this->destination)) {
            unlink($this->destination);
        }
    }

    /**
     * @expectedException \SwfTools\Exception\InvalidArgumentException
     */
    public function testWrongFile()
    {
        $file = new FlashFile();
        $file->open('bad file');
    }

    /**
     * @covers SwfTools\Processor\FlashFile::render
     * @covers SwfTools\Processor\FlashFile::getBinaryAdapter
     */
    public function testRender()
    {
        $this->destination = $this->object->render($this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\Processor\FlashFile::render
     * @expectedException \SwfTools\Exception\InvalidArgumentException
     */
    public function testRenderWrongDestination()
    {
        $this->object->render('');
    }

    /**
     * @covers SwfTools\Processor\FlashFile::listEmbeddedObjects
     */
    public function testListEmbeddedObjects()
    {
        $this->object->listEmbeddedObjects();
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractEmbedded
     */
    public function testExtractEmbedded()
    {
        $this->object->extractEmbedded(1, $this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractFirstImage
     * @expectedException  \SwfTools\Exception\RuntimeException
     */
    public function testNoFirstImage()
    {
        $object = $this->getMock(
            '\\SwfTools\\Processor\\FlashFile'
            , array('listEmbeddedObjects')
        );

        $object->expects($this->any())
            ->method('listEmbeddedObjects')
            ->will($this->returnValue(array()));

        $object->open(__DIR__ . '/../../../files/flashfile.swf');
        $object->extractFirstImage($this->destination);
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractFirstImage
     * @expectedException  \SwfTools\Exception\RuntimeException
     */
    public function testEmbeddedFailed()
    {
        $object = $this->getMock(
            '\\SwfTools\\Processor\\FlashFile'
            , array('listEmbeddedObjects')
        );

        $object->expects($this->any())
            ->method('listEmbeddedObjects')
            ->will($this->returnValue(null));

        $object->open(__DIR__ . '/../../../files/flashfile.swf');
        $object->extractFirstImage($this->destination);
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractFirstImage
     */
    public function testExtractFirstImage()
    {
        $this->object->extractFirstImage($this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractFirstImage
     * @expectedException \SwfTools\Exception\InvalidArgumentException
     */
    public function testExtractFirstImageFailWithoutDestination()
    {
        $this->object->extractFirstImage('');
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractEmbedded
     * @expectedException  \SwfTools\Exception\RuntimeException
     */
    public function testExtractEmbeddedWrongId()
    {
        $this->object->extractEmbedded(-4, $this->destination);
    }

    /**
     * @covers SwfTools\Processor\FlashFile::extractEmbedded
     * @expectedException  \SwfTools\Exception\RuntimeException
     */
    public function testExtractEmbeddedWrongOutput()
    {
        $this->object->extractEmbedded(1, '/dsmsdf/dslgfsdm');
    }

}
