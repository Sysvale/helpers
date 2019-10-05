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

    public function testeMaskCnpj()
    {
        $expected = '99.999.999/9999-99';

        $actual = Helpers::maskCnpj('99999999999999');

        $this->assertEquals($expected, $actual);
    }
}
