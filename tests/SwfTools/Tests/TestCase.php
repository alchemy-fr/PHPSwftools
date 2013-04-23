<?php

namespace SwfTools\Tests;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected function createLoggerMock()
    {
        return $this
            ->getMockBuilder('Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
