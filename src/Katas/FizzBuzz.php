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
     * @param int $number
     *
     * @return string
     */
    public function convert(int $number): string
    {
        $result = '';

        if (0 === $number % 3) {
            $result .= 'Fizz';
        }

        if (0 === $number % 5) {
            $result .= 'Buzz';
        }

        return $result ?: $number;
    }
}
