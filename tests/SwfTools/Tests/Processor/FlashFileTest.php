<?php

namespace SwfTools\Tests\Processor;

use SwfTools\Binary\DriverContainer;
use SwfTools\Processor\FlashFile;
use SwfTools\Tests\TestCase;

class FlashFileTest extends TestCase
{
    /**
     * @var FlashFile
     */
    protected $object;
    protected $destination;

    protected function setUp(): void
    {
        $this->destination = __DIR__ . '/../../../files/tmp.jpg';
        $this->object = new FlashFile(DriverContainer::create());
    }

    protected function tearDown(): void
    {
        if (file_exists($this->destination)) {
            unlink($this->destination);
        }
    }

    public function testRender()
    {
        $this->destination = $this->object->render(__DIR__ . '/../../../files/flashfile.swf', $this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    public function testRenderNoBinary()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->expectExceptionMessage('Unable to load swfrender');
        $object = new FlashFile(DriverContainer::create(array('swfrender.binaries' => '/path/to/nowhere')));
        $object->render(__DIR__ . '/../../../files/flashfile.swf', '/target');
    }

    public function testExtractEmbeddedNoBinary()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->expectExceptionMessage('Unable to load swfextract');
        $object = new FlashFile(DriverContainer::create(array('swfextract.binaries' => '/path/to/nowhere')));
        $object->extractEmbedded(1, __DIR__ . '/../../../files/flashfile.swf', '/target');
    }

    public function testListEmbeddedNoBinary()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->expectExceptionMessage('Unable to load swfextract');
        $object = new FlashFile(DriverContainer::create(array('swfextract.binaries' => '/path/to/nowhere')));
        $object->listEmbeddedObjects(__DIR__ . '/../../../files/flashfile.swf');
    }

    public function testExtractFirstImageNoBinary()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->expectExceptionMessage('Unable to load swfextract');
        $object = new FlashFile(DriverContainer::create(array('swfextract.binaries' => '/path/to/nowhere')));
        $object->extractFirstImage(__DIR__ . '/../../../files/flashfile.swf', '/target');
    }

    public function testRenderWrongDestination()
    {
        $this->expectException(\SwfTools\Exception\InvalidArgumentException::class);
        $this->object->render(__DIR__ . '/../../../files/flashfile.swf', '');
    }

    public function testListEmbeddedObjects()
    {
        $this->object->listEmbeddedObjects(__DIR__ . '/../../../files/flashfile.swf');
    }

    public function testExtractEmbedded()
    {
        $this->object->extractEmbedded(1, __DIR__ . '/../../../files/flashfile.swf', $this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    public function testNoFirstImage()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $object = $this->getMockBuilder('SwfTools\Processor\FlashFile')
            ->setMethods(array('listEmbeddedObjects'))
            ->disableOriginalConstructor()
            ->getMock();

        $object->expects($this->any())
            ->method('listEmbeddedObjects')
            ->will($this->returnValue(array()));

        $object->extractFirstImage(__DIR__ . '/../../../files/flashfile.swf', $this->destination);
    }

    public function testEmbeddedFailed()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $object = $this->getMockBuilder('SwfTools\Processor\FlashFile')
            ->setMethods(array('listEmbeddedObjects'))
            ->disableOriginalConstructor()
            ->getMock();

        $object->expects($this->any())
            ->method('listEmbeddedObjects')
            ->will($this->returnValue(null));

        $object->extractFirstImage(__DIR__ . '/../../../files/flashfile.swf', $this->destination);
    }

    public function testExtractFirstImage()
    {
        $this->object->extractFirstImage(__DIR__ . '/../../../files/flashfile.swf', $this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    public function testExtractFirstImageFailWithoutDestination()
    {
        $this->expectException(\SwfTools\Exception\InvalidArgumentException::class);
        $this->object->extractFirstImage(__DIR__ . '/../../../files/flashfile.swf', '');
    }

    public function testExtractEmbeddedWrongId()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->object->extractEmbedded(-4, __DIR__ . '/../../../files/flashfile.swf', $this->destination);
    }

    public function testExtractEmbeddedWrongOutput()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->object->extractEmbedded(1, __DIR__ . '/../../../files/flashfile.swf', '/dsmsdf/dslgfsdm');
    }
}
