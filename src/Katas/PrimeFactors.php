<?php

namespace Katas;

class PrimeFactors extends Kata
{
    /**
     * The primefactors generated for the given number.
     *
     * @var array
     */
    protected $factors = [];

    /**
     * The base number used to identify prime numbers.
     *
     * @var int
     */
    protected $divisor = 2;

    /**
     * {@inheritdoc}
     */
    public function generate(int $number): array
    {
        for ($this->divisor = 2; $number > 1; ++$this->divisor) {
            for (null; 0 === $number % $this->divisor; $number /= $this->divisor) {
                $this->factors[] = (int) $this->divisor;
            }
        }

        return $this->factors;
    }
}
