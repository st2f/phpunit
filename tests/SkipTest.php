<?php
namespace App;

use PHPUnit\Framework\TestCase;

class SkipTest extends TestCase
{
    protected function setUp(): void
    {
        if (!extension_loaded('mysql')) {
            $this->markTestSkipped(
                'The MySql extension is not available',
            );
        }
    }

    public function testConnection(): void
    {
        $this->assertSame(true, true);
    }
}