<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use Sysvale\Helpers;

class HelpersTest extends TestCase
{
    public function testMaskBank()
    {
        $expected = '1234-5';

        $actual = Helpers::maskBank('12345');

        $this->assertEquals($expected, $actual);
    }

    public function testTrimpp()
    {
        $expected = 'word test';
        $actual = Helpers::trimpp(' word  test ');
        $this->assertEquals($expected, $actual);
    }
}
