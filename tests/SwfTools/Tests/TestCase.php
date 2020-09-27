<?php

namespace SwfTools\Tests;

use \PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function createLoggerMock()
    {
        return $this
            ->getMockBuilder('Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getConfig()
    {
        return array(
            'pdf2swf.binaries'    => getenv('PDF_2_SWF_BIN') ? getenv('PDF_2_SWF_BIN') : 'pdf2swf',
            'swfrender.binaries'  => getenv('SWF_RENDER_BIN') ? getenv('SWF_RENDER_BIN') : 'swfrender',
            'swfextract.binaries' => getenv('SWF_EXTRACT_BIN') ? getenv('SWF_EXTRACT_BIN') : 'swfextract',
        );
    }

}
