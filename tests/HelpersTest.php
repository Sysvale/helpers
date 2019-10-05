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

    public function testValidateCpf()
    {
        //generated random CPF by
        //https://www.4devs.com.br/gerador_de_cpf
        $result1 = Helpers::validateCpf('334.734.750-17');
        $result2 = Helpers::validateCpf('33473475017');
        $result3 = Helpers::validateCpf('334.734.750-00');
        $result4 = Helpers::validateCpf('33473475000');
        $result5 = Helpers::validateCpf('33473');
        $result6 = Helpers::validateCpf('3347347501789');
        $result7 = Helpers::validateCpf('55555555555');

        $this->assertTrue($result1);
        $this->assertTrue($result2);
        $this->assertFalse($result3);
        $this->assertFalse($result4);
        $this->assertFalse($result5);
        $this->assertFalse($result6);
        $this->assertFalse($result7);
    }
}
