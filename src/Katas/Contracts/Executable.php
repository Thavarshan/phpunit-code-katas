<?php

namespace Katas\Contracts;

interface Executable
{
    /**
     * Make class compatible to a single executable method.
     *
     * @param mixed $argument
     * @return void
     */
    public function execute($argument);
}
