<?php

namespace Cli\Tests;

use Cli\Main;
use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    public function testHelloWorld()
    {
        Main::main(2, ['cli-test', 'Hello']);
        $this->expectOutputString('World');
    }
}
