<?php

namespace Katas;

use Katas\Contracts\Executable;

class FizzBuzz extends Kata implements Executable
{
    /**
     * {@inheritDoc}
     */
    public function execute(...$arguments)
    {
        return $this->convert($arguments[0]);
    }

    /**
     * Give appropriate term of number being checked.
     *
     * @param  int    $number
     * @return string
     */
    public function convert(int $number): string
    {
        $result = '';

        if ($number % 3 === 0) {
            $result .= 'Fizz';
        }

        if ($number % 5 === 0) {
            $result .= 'Buzz';
        }

        return $result ?: $number;
    }
}
