<?php

namespace SwfTools\Binary;

use Monolog\Logger;
use Monolog\Handler\NullHandler;
use SwfTools\Configuration;

class SwfrenderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Swfrender
     */
    protected $object;

    protected function setUp()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $this->object = Swfrender::load(new Configuration(), $logger);
    }

    /**
     * @covers SwfTools\Binary\Swfrender::render
     */
    public function testRender()
    {
        $flash = new \SplFileInfo(__DIR__ . '/../../../files/flashfile.swf');

        $dest_file = __DIR__ . '/../../../files/tmp.jpg';

        $this->object->render($flash, $dest_file, true);

        $sizes = getimagesize($dest_file);
        $this->assertTrue(file_exists($dest_file));

        unlink($dest_file);

        $this->assertEquals(1250, $sizes[0]);
        $this->assertEquals(580, $sizes[1]);

        $this->object->render($flash, $dest_file, false);

        $sizes = getimagesize($dest_file);
        $this->assertTrue(file_exists($dest_file));

        unlink($dest_file);

        $this->assertEquals(1250, $sizes[0]);
        $this->assertEquals(580, $sizes[1]);

        $fakeFlash = new \SplFileInfo(__DIR__ . '/../../../files/noflashfile.swf');

        try {
            $this->object->render($fakeFlash, $dest_file, true);
            $this->fail('Swfrender should raise an exception on an unexistent file');
        } catch (\SwfTools\Exception\RuntimeException $e) {

        }
        try {
            $this->object->render($flash, '', true);
            $this->fail('Swfrender should raise an exception on an unexistent destination');
        } catch (\SwfTools\Exception\InvalidArgumentException $e) {

        }
    }

    /**
     * @covers SwfTools\Binary\Swfrender::load
     */
    public function testLoad()
    {
        $logger = new Logger('Null logger');
        $logger->pushHandler(new NullHandler());

        $swfextract = Swfrender::load(new Configuration(), $logger);

        $this->assertInstanceOf('SwfTools\Binary\Swfrender', $swfextract);
    }

}
