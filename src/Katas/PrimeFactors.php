<?php

namespace Katas;

class PrimeFactors extends Kata implements Executable
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
     * {@inheritDoc}
     */
    public function execute($argument)
    {
        return $this->generate($argument);
    }

    /**
     * Generate prime factors of given numbers.
     *
     * @param integer $number
     * @return array
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
