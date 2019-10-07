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

    public function testMaskMoney()
    {
        $expected1 = '0,55';
        $expected2 = '999,00';
        $expected3 = '999.999,99';
        $expected4 = '1.999.999,99';

        $actual1 = Helpers::maskMoney(0.55);
        $actual2 = Helpers::maskMoney(999);
        $actual3 = Helpers::maskMoney(999999.99);
        $actual4 = Helpers::maskMoney(1999999.99);

        $this->assertEquals($expected1, $actual1);
        $this->assertEquals($expected2, $actual2);
        $this->assertEquals($expected3, $actual3);
        $this->assertEquals($expected4, $actual4);
    }

    public function testMaskMoneyWithMoreThanTwoDecimalPlaces()
    {
        $expected1 = '0,55';
        $expected2 = '9,99';
        $expected3 = '10,00';

        $actual1 = Helpers::maskMoney(0.554);
        $actual2 = Helpers::maskMoney(9.989);
        $actual3 = Helpers::maskMoney(9.999);

        $this->assertEquals($expected1, $actual1);
        $this->assertEquals($expected2, $actual2);
        $this->assertEquals($expected3, $actual3);
    }

    public function testMaskPhone()
    {
        $expected = '(44) 99236-7809';
        $expected2 = '(44) 9236-7809';

        $actual = Helpers::maskPhone("44992367809");
        $actual2 = Helpers::maskPhone("4492367809");

        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected2, $actual2);
    }
}
