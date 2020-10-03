<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;

use Sysvale\Helpers\Mask;

class MaskTest extends TestCase
{
    public function testMaskBank()
    {
        $expected = '1234-5';

        $actual = Mask::bank('12345');

        $this->assertEquals($expected, $actual);
    }

    public function testeMaskCnpj()
    {
        $expected = '99.999.999/9999-99';

        $actual = Mask::cnpj('99999999999999');

        $this->assertEquals($expected, $actual);
    }

    public function testMaskCep()
    {
        $expected = '99999-999';

        $actual = Mask::cep('99999999');

        $this->assertEquals($expected, $actual);
    }

    public function testMaskMoney()
    {
        $expected1 = '0,55';
        $expected2 = '999,00';
        $expected3 = '999.999,99';
        $expected4 = '1.999.999,99';

        $actual1 = Mask::money(0.55);
        $actual2 = Mask::money(999);
        $actual3 = Mask::money(999999.99);
        $actual4 = Mask::money(1999999.99);

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

        $actual1 = Mask::money(0.554);
        $actual2 = Mask::money(9.989);
        $actual3 = Mask::money(9.999);

        $this->assertEquals($expected1, $actual1);
        $this->assertEquals($expected2, $actual2);
        $this->assertEquals($expected3, $actual3);
    }


    public function testMaskPhone()
    {
        $expected = '(44) 99236-7809';
        $expected2 = '(44) 9236-7809';

        $actual = Mask::phone("44992367809");
        $actual2 = Mask::phone("4492367809");

        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected2, $actual2);
    }

    public function testUnMaskCpf()
    {
        $actual = "77298408631";
        $this->assertEquals($actual, Mask::unMaskCpf("772.984.086-31"));
    }
}
