<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;
use Sysvale\Helpers\Dates;

class DatesTest extends TestCase
{
    public function testGetWeekDayNameIsCorrect()
    {
        $this->assertEquals("Segunda-feira", Dates::getWeekDayNamePtBr(1));
        $this->assertEquals("Terça-feira", Dates::getWeekDayNamePtBr(2));
        $this->assertEquals("Quarta-feira", Dates::getWeekDayNamePtBr(3));
        $this->assertEquals("Quinta-feira", Dates::getWeekDayNamePtBr(4));
        $this->assertEquals("Sexta-feira", Dates::getWeekDayNamePtBr(5));
        $this->assertEquals("Sábado", Dates::getWeekDayNamePtBr(6));
        $this->assertEquals("Domingo", Dates::getWeekDayNamePtBr(7));
    }

    public function testGetgetMonthNamePtBrBrIsCorrect()
    {
        $this->assertEquals("Janeiro", Dates::getMonthNamePtBr(1));
        $this->assertEquals("Fevereiro", Dates::getMonthNamePtBr(2));
        $this->assertEquals("Março", Dates::getMonthNamePtBr(3));
        $this->assertEquals("Abril", Dates::getMonthNamePtBr(4));
        $this->assertEquals("Maio", Dates::getMonthNamePtBr(5));
        $this->assertEquals("Junho", Dates::getMonthNamePtBr(6));
        $this->assertEquals("Julho", Dates::getMonthNamePtBr(7));
        $this->assertEquals("Agosto", Dates::getMonthNamePtBr(8));
        $this->assertEquals("Setembro", Dates::getMonthNamePtBr(9));
        $this->assertEquals("Outubro", Dates::getMonthNamePtBr(10));
        $this->assertEquals("Novembro", Dates::getMonthNamePtBr(11));
        $this->assertEquals("Dezembro", Dates::getMonthNamePtBr(12));
    }

    public function testPtDate2IsoDate()
    {
        $date = '01/02/2003';
        $other_date = '01/02/03';
        $incomplete_date = '01/02';
        $another_incomplete_date = '01/2002';
        $wrong_input = 'string';

        $this->assertEquals(Dates::parsePtDateToIsoDateFormat($date), '2003-02-01');
        $this->assertEquals(Dates::parsePtDateToIsoDateFormat($other_date), '2003-02-01');
        $this->assertNull(Dates::parsePtDateToIsoDateFormat($incomplete_date));
        $this->assertNull(Dates::parsePtDateToIsoDateFormat($another_incomplete_date));
        $this->assertNull(Dates::parsePtDateToIsoDateFormat($wrong_input));
    }
}
