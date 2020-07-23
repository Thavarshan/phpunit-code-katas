<?php

namespace Katas\Tests;

use Katas\StringCalculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function it_evaluates_an_empty_string_to_0()
    {
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    public function it_finds_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5'));
    }

    /** @test */
    public function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add('5, 5'));
    }

    /** @test */
    public function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(19, $calculator->add('5, 5, 5, 4'));
    }

    /** @test */
    public function it_accepts_a_new_line_character_as_a_delimeter_too()
    {
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add("5\n5"));
    }

    /** @test */
    public function negative_numbers_are_not_allowed()
    {
        $this->expectException(InvalidArgumentException::class);

        $calculator = new StringCalculator();

        $this->assertSame(9, $calculator->add('5, -4'));
    }

    /** @test */
    public function numbers_bigger_than_1000_are_ignored()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5, 1001'));
    }

    /** @test */
    public function it_supports_custom_delimeters()
    {
        $calculator = new StringCalculator();

        $this->assertSame(9, $calculator->add("//:\n5:4"));
    }
}
