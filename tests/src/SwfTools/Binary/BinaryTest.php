<?php

namespace SwfTools\Binary;

use Monolog\Logger;
use Monolog\Handler\NullHandler;
use SwfTools\Configuration;
use Symfony\Component\Process\Process;

class BinaryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException SwfTools\Exception\BinaryNotFoundException
     */
    public function testWrongPath()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        BinaryTester::load(new Configuration(array('php' => '/fakepath')), $logger);
    }

    /**
     * @covers SwfTools\Binary\Binary::__construct
     * @covers SwfTools\Binary\Binary::loadBinary
     * @covers SwfTools\Binary\Binary::run
     */
    public function testBinaryPath()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $object = BinaryTester::load(new Configuration(), $logger);
        $this->assertTrue(is_executable($object->getBinaryPath()));

        try {
            BinaryBadTester::load(new Configuration(), $logger);
            $this->fail();
        } catch (\SwfTools\Exception\BinaryNotFoundException $e) {

        }

        try {
            $object->runIt(new Process('mycommand'));
            $this->fail('should fail on bad command');
        } catch (\SwfTools\Exception\RuntimeException $e) {

        }
        $object->runIt(new Process('mycommand'), true);
    }

    public function testGetVersion()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $object = Swfextract::load(new Configuration(), $logger);
        $this->assertRegExp('/([0-9]+\.)+[0-9]+/', $object->getVersion());
    }

}

class BinaryTester extends Binary
{

    public static function load(Configuration $configuration, Logger $logger)
    {
        return static::loadBinary('php', $configuration, $logger);
    }

    public function getBinaryPath()
    {
        return $this->binaryPathname;
    }

    public function runIt(Process $process, $bypass = false)
    {
        return $this->run($process, $bypass);
    }

}

class BinaryBadTester extends Binary
{

    public static function load(Configuration $configuration, Logger $logger)
    {
        return static::loadBinary('randomprogramnamethatwouldnotexists', $configuration, $logger);
    }

    public function getBinaryPath()
    {
        return $this->binaryPath;
    }
}
