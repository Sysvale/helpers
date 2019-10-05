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
}
