<?php

namespace Katas;

use Katas\Contracts\Executable;

class RomanNumerals extends Kata implements Executable
{
    /**
     * Numeral symbol lookup.
     */
    const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    /**
     * {@inheritDoc}
     */
    public function execute(...$arguments)
    {
        return $this->generate($arguments[0]);
    }

    /**
     * Generate respective roman numeral representation of given number.
     *
     * @param integer $number
     * @return string
     */
    public function generate(int $number)
    {
        if ($number <= 0 || $number >= 4000) {
            return false;
        }

        $result = '';

        foreach (static::NUMERALS as $numeral => $arabic) {
            for (; $number >= $arabic; $number -= $arabic) {
                $result .= $numeral;
            }
        }

        return $result;
    }
}
