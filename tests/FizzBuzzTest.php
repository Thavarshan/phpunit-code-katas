<?php

namespace Katas\Tests;

use Katas\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    public function it_return_fizz_for_multiples_of_three()
    {
        $converter = new FizzBuzz();

        foreach ([3, 6, 9, 12] as $number) {
            $this->assertEquals('Fizz', $converter->convert($number));
        }
    }

    /** @test */
    public function it_return_buzz_for_multiples_of_five()
    {
        $converter = new FizzBuzz();

        foreach ([5, 10, 20, 25] as $number) {
            $this->assertEquals('Buzz', $converter->convert($number));
        }
    }

    /** @test */
    public function it_return_fizzbuzz_for_multiples_of_three_and_five()
    {
        $converter = new FizzBuzz();

        foreach ([15, 30, 45, 60] as $number) {
            $this->assertEquals('FizzBuzz', $converter->convert($number));
        }
    }

    /** @test */
    public function it_return_the_original_number_if_not_divisible_by_three_and_five()
    {
        $converter = new FizzBuzz();

        foreach ([1, 2, 4, 7] as $number) {
            $this->assertEquals($number, $converter->convert($number));
        }
    }
}
