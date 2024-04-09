<?php
namespace App;

use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    public function testConcatenateStrings()
    {
        $myClass = new MyClass();
        $str1 = 'hello';
        $str2 = 'world';
        $expectedResult = 'helloworld';

        $result = $myClass->concatenateStrings($str1, $str2);

        $this->assertEquals($expectedResult, $result);
    }
}