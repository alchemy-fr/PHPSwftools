<?php

namespace SwfTools\Tests\Processor;

use SwfTools\Binary\DriverContainer;
use SwfTools\Processor\PDFFile;
use SwfTools\Tests\TestCase;

class PDFFileTest extends TestCase
{
    /**
     * @var PDFFile
     */
    protected $object;
    protected $destination;

    protected function setUp(): void
    {
        $this->destination = __DIR__ . '/../../../files/tmp.swf';
        $this->object = new PDFFile(DriverContainer::create($this->getConfig()));
    }

    protected function tearDown(): void
    {
        if (file_exists($this->destination)) {
            unlink($this->destination);
        }
    }

    public function testToSwf()
    {
        $this->object->toSwf(__DIR__ . '/../../../files/PDF.pdf', $this->destination);
        $this->assertTrue(file_exists($this->destination));

        unlink($this->destination);
    }

    public function testToSwfNoBinary()
    {
        $this->expectException(\SwfTools\Exception\RuntimeException::class);
        $this->expectExceptionMessage('Unable to load pdf2swf');
        $this->object = new PDFFile(DriverContainer::create(array('pdf2swf.binaries' => '/path/to/nowhere')));
        $this->object->toSwf(__DIR__ . '/../../../files/PDF.pdf', $this->destination);
    }

    public function testToSwfFailed()
    {
        $this->expectException(\SwfTools\Exception\InvalidArgumentException::class);
        $this->object->toSwf(__DIR__ . '/../../../files/PDF.pdf', '');
    }
}
