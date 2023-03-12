<?php

use PHPUnit\Framework\TestCase;

// use App\Calculate;

require_once "src/Calculate.php";

class CalculateTest extends TestCase
{
    public function testGetKilled ()
    {
        $calc = new Calculate();

        $this->assertContains('2', $calc->witchKill(12, 10));
    }

    public function testGetAverage()
    {
        $calc = new Calculate();

        $this->assertEquals(4.5, $calc->getAverage(2, 7));
    }
}