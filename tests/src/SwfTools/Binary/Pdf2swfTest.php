<?php

namespace SwfTools\Binary;

use Monolog\Logger;
use Monolog\Handler\NullHandler;
use SwfTools\Configuration;

class Pdf2swfTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Pdf2swf
     */
    protected $object;

    protected function setUp()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());
        $this->object = Pdf2swf::load(new Configuration(), $logger);
    }

    /**
     * @covers SwfTools\Binary\Pdf2swf::toSwf
     */
    public function testToSwf()
    {
        $pdf   = new \SplFileObject(__DIR__ . '/../../../files/PDF.pdf');
        $swf   = __DIR__ . '/../../../files/PDF.swf';
        $embed = $this->object->toSwf($pdf, $swf);

        unlink($swf);
    }

    /**
     * @covers SwfTools\Binary\Pdf2swf::toSwf
     * @expectedException \SwfTools\Exception\InvalidArgumentException
     */
    public function testToSwfInvalidFile()
    {
        $pdf   = new \SplFileObject(__DIR__ . '/../../../files/PDF.pdf');
        $embed = $this->object->toSwf($pdf, '');
    }

    /**
     * @covers SwfTools\Binary\Pdf2swf::toSwf
     * @dataProvider getWrongOptions
     * @expectedException \SwfTools\Exception\InvalidArgumentException
     */
    public function testToSwfInvalidRes($pdf, $dest, $opts, $convert, $res, $pages, $framerate, $quality, $timelimit)
    {
        $this->object->toSwf($pdf, $dest, $opts, $convert, $res, $pages, $framerate, $quality, $timelimit);
    }

    /**
     * @covers SwfTools\Binary\Pdf2swf::toSwf
     * @dataProvider getGoodOptions
     */
    public function testToSwfValidRes($pdf, $dest, $opts, $convert, $res, $pages, $framerate, $quality, $timelimit)
    {
        $this->object->toSwf($pdf, $dest, $opts, $convert, $res, $pages, $framerate, $quality, $timelimit);
    }

    /**
     * Data provider for testToSwfWrongOptions
     *
     * @return array
     */
    public function getWrongOptions()
    {
        $dest     = __DIR__ . '/../../../files/tmp.file';
        $pdf      = new \SplFileObject(__DIR__ . '/../../../files/PDF.pdf');
        $wrongpdf = new \SplFileInfo(__DIR__ . '/../../../files/wrongPDF.pdf');
        $convert  = Pdf2swf::CONVERT_POLY2BITMAP;

        return array(
          array($pdf, $dest, array(), $convert, 0, '1-', 15, 75, 100),
          array($pdf, $dest, array(), $convert, 1, '1', 15, 75, 100),
          array($pdf, $dest, array(), $convert, 1, '1-', 0, 75, 100),
          array($pdf, $dest, array(), $convert, 1, '1-', 15, 110, 100),
          array($pdf, $dest, array(), $convert, 1, '1-', 15, 75, -1),
          array($wrongpdf, $dest, array(), $convert, 1, '1-', 15, 75, -1),
          array($pdf, '', array(), $convert, 1, '1-', 15, 75, -1),
        );
    }

    public function getGoodOptions()
    {
        $dest    = __DIR__ . '/../../../files/tmp.file';
        $pdf     = new \SplFileObject(__DIR__ . '/../../../files/PDF.pdf');
        $convert = Pdf2swf::CONVERT_POLY2BITMAP;

        return array(
          array($pdf, $dest, array(Pdf2swf::OPTION_DISABLE_SIMPLEVIEWER), $convert, 1, '1-', 15, 75, 10),
          array($pdf, $dest, array(Pdf2swf::OPTION_ENABLE_SIMPLEVIEWER), $convert, 1, '1-', 15, 75, 10),
          array($pdf, $dest, array(Pdf2swf::OPTION_LINKS_DISABLE), $convert, 1, '1-', 15, 75, 10),
          array($pdf, $dest, array(Pdf2swf::OPTION_LINKS_OPENNEWWINDOW), $convert, 1, '1-', 15, 75, 10),
          array($pdf, $dest, array(Pdf2swf::OPTION_ZLIB_DISABLE), $convert, 1, '1-', 15, 75, 10),
          array($pdf, $dest, array(Pdf2swf::OPTION_ZLIB_ENABLE), $convert, 1, '1-', 15, 75, 10),
        );
    }

    /**
     * @covers SwfTools\Binary\Pdf2swf::load
     */
    public function testLoad()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $pdf2swf = Pdf2swf::load(new Configuration(), $logger);

        $this->assertInstanceOf('SwfTools\Binary\Pdf2swf', $pdf2swf);
    }

}
