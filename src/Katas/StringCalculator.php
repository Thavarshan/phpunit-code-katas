<?php

namespace Katas;

use InvalidArgumentException;
use Katas\Contracts\Executable;

class StringCalculator extends Kata implements Executable
{
    /**
     * The mamximum number allowed to be calculated.
     */
    public const MAX_NUMBER_ALLOWED = 1000;

    /**
     * Acceptable delimeters.
     *
     * @var string
     */
    protected $delimeter = ",|\n";

    /**
     * {@inheritDoc}
     */
    public function execute(...$arguments)
    {
        return $this->add($arguments[0]);
    }

    /**
     * Sum up the given string as integers.
     *
     * @param string $numbers
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     */
    public function add(string $numbers): int
    {
        $numbers = $this->parseString($numbers);

        $numbers = $this->disallowNegativeNumbers($numbers)
            ->ignoreGreateThanOneThousand($numbers);

        return (int) array_sum($numbers);
    }

    /**
     * Identify and parse given parameter.
     *
     * @param string $numbers
     *
     * @return array
     */
    protected function parseString(string $numbers): array
    {
        // Define a custom delimeter of our own example.
        // NOTE: just for placeholder sake.
        $customDelimter = "\/\/(.)\n";

        // Identify custom delimeter
        if (preg_match("/{$customDelimter}/", $numbers, $matches)) {
            $this->delimeter = $matches[1];
            // Replace identified custom delimeter and replace
            // it with an empty string
            $numbers = str_replace($matches[0], '', $numbers);
        }

        // If a new line exists within the given parameter
        // remove it and given only characters.
        return preg_split("/{$this->delimeter}/", $numbers);
    }

    /**
     * Determine if geven array of numbers are positive integers.
     *
     * @param array $numbers
     *
     * @return \Katas\StringCalculator
     */
    protected function disallowNegativeNumbers(array $numbers): StringCalculator
    {
        // Determine if each character is not negative
        // if negative throw an exception
        foreach ($numbers as $number) {
            if (intval($number) < 0) {
                throw new InvalidArgumentException('Negative numbers are disallowed.');
            }
        }

        return $this;
    }

    /**
     * Determine if each integer in the given array is below 1000.
     *
     * @param array $numbers
     *
     * @return array
     */
    protected function ignoreGreateThanOneThousand(array $numbers): array
    {
        // Filter out the characters that are less than 1001
        return array_filter(
            $numbers,
            fn ($number) => $number <= self::MAX_NUMBER_ALLOWED
        );
    }
}
