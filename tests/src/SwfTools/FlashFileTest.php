<?php

namespace SwfTools;

require_once dirname(__FILE__) . '/../../../src/SwfTools/FlashFile.php';

class FlashFileTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FlashFile
     */
    protected $object;
    protected $fakeObject;
    protected $destination;

    protected function setUp()
    {
        $this->destination = __DIR__ . '/../../files/tmp.jpg';
        $this->object = new FlashFile(__DIR__ . '/../../files/flashfile.swf');


        $this->fakeObject = $this->getMock(
          '\SwfTools\FlashFile'
          , array('getPathname')
          , array(__DIR__ . '/../../files/flashfile.swf')
        );

        /* @var $fakeFile \PHPUnit_Framework_MockObject_MockObject */

        $this->fakeObject->expects($this->any())
          ->method('getPathname')
          ->will($this->returnValue('nofile'));
    }

    protected function tearDown()
    {
        if (file_exists($this->destination))
            unlink($this->destination);
    }

    /**
     * @expectedException \SwfTools\Exception
     */
    public function testWrongFile()
    {
        new FlashFile('bad file');
    }

    /**
     * @covers SwfTools\FlashFile::render
     * @covers SwfTools\FlashFile::getBinaryAdapter
     */
    public function testRender()
    {
        $this->destination = $this->object->render($this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::render
     * @expectedException \SwfTools\Exception
     */
    public function testRenderWrongFile()
    {
        $this->fakeObject->render($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::render
     * @expectedException \SwfTools\Exception
     */
    public function testRenderWrongDestination()
    {
        $this->object->render('');
    }

    /**
     * @covers SwfTools\FlashFile::listEmbeddedObjects
     */
    public function testListEmbeddedObjects()
    {
        $this->object->listEmbeddedObjects();
    }

    /**
     * @covers SwfTools\FlashFile::listEmbeddedObjects
     * @expectedException \SwfTools\Exception
     */
    public function testListEmbeddedObjectsOnWrongFile()
    {
        $this->fakeObject->listEmbeddedObjects();
    }

    /**
     * @covers SwfTools\FlashFile::extractEmbedded
     */
    public function testExtractEmbedded()
    {
        $this->object->extractEmbedded(1, $this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::extractFirstImage
     * @expectedException  \SwfTools\Exception
     */
    public function testNoFirstImage()
    {
        $object = $this->getMock(
          '\\SwfTools\\FlashFile'
          , array('listEmbeddedObjects')
          , array(__DIR__ . '/../../files/flashfile.swf')
        );

        $object->expects($this->any())
          ->method('listEmbeddedObjects')
          ->will($this->returnValue(new \Doctrine\Common\Collections\ArrayCollection()));

        $object->extractFirstImage($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::extractFirstImage
     * @expectedException  \SwfTools\Exception
     */
    public function testEmbeddedFailed()
    {
        $object = $this->getMock(
          '\\SwfTools\\FlashFile'
          , array('listEmbeddedObjects')
          , array(__DIR__ . '/../../files/flashfile.swf')
        );

        $object->expects($this->any())
          ->method('listEmbeddedObjects')
          ->will($this->returnValue(null));

        $object->extractFirstImage($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::extractFirstImage
     */
    public function testExtractFirstImage()
    {
        $this->object->extractFirstImage($this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::extractFirstImage
     * @expectedException \SwfTools\Exception
     */
    public function testExtractFirstImageFailWiththBadObject()
    {
        $this->fakeObject->extractFirstImage($this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::extractFirstImage
     * @expectedException \SwfTools\Exception
     */
    public function testExtractFirstImageFailWithoutDestination()
    {
        $this->object->extractFirstImage('');
    }

    /**
     * @covers SwfTools\FlashFile::extractEmbedded
     * @expectedException  \SwfTools\Exception
     */
    public function testExtractEmbeddedWrongId()
    {
        $this->object->extractEmbedded(-4, $this->destination);
    }

    /**
     * @covers SwfTools\FlashFile::extractEmbedded
     * @expectedException  \SwfTools\Exception
     */
    public function testExtractEmbeddedWrongOutput()
    {
        $this->object->extractEmbedded(1, '');
    }

    /**
     * @covers SwfTools\FlashFile::extractEmbedded
     * @expectedException  \SwfTools\Exception
     */
    public function testExtractEmbeddedWrongObject()
    {
        $this->fakeObject->extractEmbedded(1, '');
    }

}
