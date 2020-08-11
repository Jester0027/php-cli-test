<?php

namespace Cli\Tests\Maker;

use Cli\Maker\ControllerMaker;
use PHPUnit\Framework\TestCase;

class ControllerMakerTest extends TestCase
{
    public function testClassContainsGeneratedNamespace()
    {
        $actual = (new ControllerMaker('App\\Controller'))->getNamespace();
        $expected = 'App\\Controller';
        $this->assertEquals($expected, $actual);
    }
}
