<?php

namespace App\Tests;

use App\Services\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testSomething(): void
    {
        $calculator = new Calculator();
        $result = $calculator->add(1, 2);
        $this->assertEquals(3, $result);
    }
}
