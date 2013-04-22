<?php

namespace SwfTools\Tests\Binary;

use SwfTools\Binary\Binary;
use SwfTools\Binary\Swfextract;
use Monolog\Logger;
use Monolog\Handler\NullHandler;
use SwfTools\Configuration;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ExecutableFinder;

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

    public function testDefaultTimeoutIsZeroOnConstruction()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $finder = new ExecutableFinder();
        $php = $finder->find('php');

        if (!$php) {
            $this->markTestSkipped('An executable is required for this test');
        }

        $object = new BinaryTester($php, $logger);
        $this->assertTrue(0 === $object->getTimeout());
    }

    public function testDefaultTimeoutIsZero()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $configuration = new Configuration();

        $binary = BinaryTester::load($configuration, $logger);

        $this->assertTrue(0 === $binary->getTimeout());
    }

    public function testTimeoutSetter()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $configuration = new Configuration();

        $binary = BinaryTester::load($configuration, $logger);
        $binary->setTimeout(60);
        $this->assertEquals(60, $binary->getTimeout());
    }

    /**
     * @expectedException SwfTools\Exception\InvalidArgumentException
     */
    public function testInvalidTimeoutSetter()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $configuration = new Configuration();

        $binary = BinaryTester::load($configuration, $logger);
        $binary->setTimeout(-1);
    }

    /**
     * @expectedException SwfTools\Exception\InvalidArgumentException
     */
    public function testInvalidStringTimeoutSetter()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $configuration = new Configuration();

        $binary = BinaryTester::load($configuration, $logger);
        $binary->setTimeout('lambda');
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
