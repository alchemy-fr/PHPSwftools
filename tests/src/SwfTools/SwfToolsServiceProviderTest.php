<?php

namespace SwfTools;

use Silex\Application;

class SwfToolsServiceProviderTest extends \PHPUnit_Framework_TestCase
{

    public function testInitialize()
    {
        $app = new Application();
        $app->register(new SwfToolsServiceProvider());

        $this->assertInstanceOf('\\SwfTools\\Processor\\FlashFile', $app['swftools.flash-file']);
        $this->assertInstanceOf('\\SwfTools\\Processor\\PdfFile', $app['swftools.pdf-file']);
    }

    /**
     * @expectedException SwfTools\Exception\BinaryNotFoundException
     */
    public function testInitializeFailOnSwfRender()
    {
        $app = new Application();
        $app->register(new SwfToolsServiceProvider(), array('swftools.options' => array('swfrender' => '/no/swf/render')));


        $app['swftools.flash-file']->open(__FILE__)->render(tempnam(sys_get_temp_dir(), 'test'));
    }
}
