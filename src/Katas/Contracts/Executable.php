<?php

namespace Katas\Contracts;

interface Executable
{
    /**
     * Make class compatible to a single executable method.
     *
     * @param mixed $arguments
     * @return void
     */
    public function execute(...$arguments);
}
