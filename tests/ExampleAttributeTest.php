<?php
namespace App;

use PHPUnit\Framework\Attributes\RequiresPhpExtension;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ExampleAttributeTest extends TestCase
{
    #[Test]
    #[TestDox('Strings concatenation')]
    public function concatenateStrings()
    {
        $myClass = new MyClass();
        $str1 = 'hello';
        $str2 = 'world';
        $expectedResult = 'helloworld';

        $result = $myClass->concatenateStrings($str1, $str2);

        $this->assertEquals($expectedResult, $result);
    }

    #[RequiresPhpExtension('MySql')]
    #[TestDox('MySql connection')]
    public function testConnection(): void
    {
        $this->assertSame(true, true);
    }
}