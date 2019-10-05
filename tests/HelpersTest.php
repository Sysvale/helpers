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

    public function testMaskCep()
    {
        $expected = '99999-999';

        $actual = Helpers::maskCep('99999999');

        $this->assertEquals($expected, $actual);
    }
}
