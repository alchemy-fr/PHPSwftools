<?php

namespace SwfTools\Binary;

class SwfextractTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Swfextract
     */
    protected $object;

    protected function setUp()
    {
        $this->object = Swfextract::load(new \SwfTools\Configuration());
    }

    /**
     * @covers SwfTools\Binary\Swfextract::listEmbedded
     */
    public function testListEmbedded()
    {
        $flash = new \SwfTools\FlashFile(__DIR__ . '/../../../files/flashfile.swf');
        $embed = $this->object->listEmbedded($flash);

        $this->assertTrue(strpos($embed, 'Objects in file ') !== false);
    }

    /**
     * @covers SwfTools\Binary\Swfextract::listEmbedded
     * @expectedExcpetion \SwfTools\Exception\RuntimeException
     */
    public function testListEmbeddedWrongFile()
    {
        $fakeFile = $this->getMock(
          '\SwfTools\FlashFile'
          , array('getPathname')
          , array(__DIR__ . '/../../../files/flashfile.swf')
        );

        /* @var $fakeFile \PHPUnit_Framework_MockObject_MockObject */

        $fakeFile->expects($this->once())
          ->method('getPathname')
          ->will($this->returnValue('nofile'));

        $this->object->listEmbedded($fakeFile);
    }

    /**
     * @covers SwfTools\Binary\Swfextract::extract
     */
    public function testExtract()
    {
        $flash     = new \SwfTools\FlashFile(__DIR__ . '/../../../files/flashfile.swf');
        $embeddeds = $flash->listEmbeddedObjects();

        $embedded = null;

        foreach ($embeddeds as $e)
        {
            if ($e->getType() === \SwfTools\EmbeddedObject::TYPE_JPEG)
            {
                $embedded = $e;
                break;
            }
        }

        $dest_file = __DIR__ . '/../../../files/tmp.jpg';

        $this->object->extract($flash, $e, $dest_file);
        $sizes = getimagesize($dest_file);
        $this->assertTrue(file_exists($dest_file));

        unlink($dest_file);

        $this->assertEquals(1440, $sizes[0]);
        $this->assertEquals(420, $sizes[1]);

        $fakeFile = $this->getMock(
          '\SwfTools\FlashFile'
          , array('getPathname')
          , array(__DIR__ . '/../../../files/flashfile.swf')
        );

        /* @var $fakeFile \PHPUnit_Framework_MockObject_MockObject */

        $fakeFile->expects($this->once())
          ->method('getPathname')
          ->will($this->returnValue('nofile'));

        try
        {
            $this->object->extract($fakeFile, $e, $dest_file);
            $this->fail('Swfrender should file on an unexistent file');
        }
        catch (\SwfTools\Exception\RuntimeException $e)
        {

        }
    }

    /**
     * @covers SwfTools\Binary\Swfextract::load
     */
    public function testLoad()
    {
        $swfextract = Swfextract::load(new \SwfTools\Configuration());

        $this->assertInstanceOf('SwfTools\Binary\Swfextract', $swfextract);
    }

}
