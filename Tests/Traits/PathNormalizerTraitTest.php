<?php


namespace Cli\Tests\Traits;

use Cli\Traits\PathNormalizerTrait;
use PHPUnit\Framework\TestCase;

class PathNormalizerTraitTest extends TestCase
{
    use PathNormalizerTrait;

    public function testWindowsPath()
    {
        $actual = 'C:\\Users\\Public';
        $expected = 'C:/Users/Public';
        $this->assertEquals($expected, $this->wp_normalize_path($actual));
    }

    public function testUnixBasedPath()
    {
        $actual = '/usr/bin/php';
        $expected = '/usr/bin/php';
        $this->assertEquals($expected, $this->wp_normalize_path($actual));
    }
}
