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

    public function testMaskCep()
    {
        $expected = '99999-999';

        $actual = Helpers::maskCep('99999999');

        $this->assertEquals($expected, $actual);
    }

    public function testTrimpp()
    {
        $expected = 'word test';
        $actual = Helpers::trimpp(' word  test ');
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
  
    public function testTitleCase()
    {
        $expected1 = 'Jon Doe';
        $expected2 = 'Jon de Doe';
        $expected3 = 'King Henry VIII';
        
        $actual1 = Helpers::titleCase('jon doe');
        $actual2 = Helpers::titleCase('jon de doe');
        $actual3 = Helpers::titleCase('king henry viii', [' '], ['VIII']);

        $this->assertEquals($expected1, $actual1);        
        $this->assertEquals($expected2, $actual2);        
        $this->assertEquals($expected3, $actual3);
    }

    public function testWeekDay()
    {
        $this->assertEquals("Segunda-feira", Helpers::weekDay(1));
        $this->assertEquals("Terça-feira", Helpers::weekDay(2));
        $this->assertEquals("Quarta-feira", Helpers::weekDay(3));
        $this->assertEquals("Quinta-feira", Helpers::weekDay(4));
        $this->assertEquals("Sexta-feira", Helpers::weekDay(5));
        $this->assertEquals("Sábado", Helpers::weekDay(6));
        $this->assertEquals("Domingo", Helpers::weekDay(7));
    }

    public function testMonthPt()
    {
        $this->assertEquals("Janeiro", Helpers::monthPt(1));
        $this->assertEquals("Fevereiro", Helpers::monthPt(2));
        $this->assertEquals("Março", Helpers::monthPt(3));
        $this->assertEquals("Abril", Helpers::monthPt(4));
        $this->assertEquals("Maio", Helpers::monthPt(5));
        $this->assertEquals("Junho", Helpers::monthPt(6));
        $this->assertEquals("Julho", Helpers::monthPt(7));
        $this->assertEquals("Agosto", Helpers::monthPt(8));
        $this->assertEquals("Setembro", Helpers::monthPt(9));
        $this->assertEquals("Outubro", Helpers::monthPt(10));
        $this->assertEquals("Novembro", Helpers::monthPt(11));
        $this->assertEquals("Dezembro", Helpers::monthPt(12));
    }
    
    public function testUnMaskCpf()
    {
        $actual = "77298408631";
        $this->assertEquals($actual, Helpers::unMaskCpf("772.984.086-31"));
    }

    public function testSpeakMoney()
    {
        $test_case_1 = 700.45;
        $test_case_2 = '1500000.54';
        $test_case_3 = 1753.63;

        $speak_case_1 = Helpers::speakMoney($test_case_1);
        $speak_case_2 = Helpers::speakMoney($test_case_2);
        $speak_case_3 = Helpers::speakMoney($test_case_3);

        $this->assertEquals($speak_case_1 ,'setecentos reais e quarenta e cinco centavos');
        $this->assertEquals($speak_case_2 ,'um milhão e quinhentos mil reais e cinquenta e quatro centavos');
        $this->assertEquals($speak_case_3 ,'um mil setecentos e cinquenta e três reais e sessenta e três centavos');
    }
}

