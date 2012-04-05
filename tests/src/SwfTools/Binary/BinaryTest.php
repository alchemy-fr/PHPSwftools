<?php

namespace SwfTools\Binary;

class BinaryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Binary
     */
    protected $object;

    protected function setUp()
    {
        $this->object = BinaryTester::load(new \SwfTools\Configuration(array('php' => '/fakepath')));
    }

    /**
     * @covers SwfTools\Binary\Binary::__construct
     * @covers SwfTools\Binary\Binary::findBinary
     * @covers SwfTools\Binary\Binary::autoDetect
     * @covers SwfTools\Binary\Binary::run
     */
    public function testBinaryPath()
    {
        $object = BinaryTester::load(new \SwfTools\Configuration(array('php' => '/fakepath')));
        $this->assertEquals('/fakepath', $object->getBinaryPath());

        $object = BinaryTester::load(new \SwfTools\Configuration());
        $this->assertTrue(is_executable($object->getBinaryPath()));

        try
        {
            BinaryBadTester::load(new \SwfTools\Configuration());
            $this->fail();
        }
        catch (\SwfTools\Exception\BinaryNotFoundException $e)
        {

        }
    }

    public function testGetVersion()
    {
        $object = Swfextract::load(new \SwfTools\Configuration());
        $this->assertRegExp('/([0-9]+\.)+[0-9]+/', $object->getVersion());
    }

}

class BinaryTester extends Binary
{

    public static function load(\SwfTools\Configuration $configuration)
    {
        return static::findBinary('php', $configuration);
    }

    public function getBinaryPath()
    {
        return $this->binaryPathname;
    }

}

class BinaryBadTester extends Binary
{

    public static function load(\SwfTools\Configuration $configuration)
    {
        return static::findBinary('randomprogramnamethatwouldnotexists', $configuration);
    }

    public function getBinaryPath()
    {
        return $this->binaryPath;
    }

}
