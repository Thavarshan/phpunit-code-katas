<?php

namespace Katas\Tennis;

class Player
{
    /**
     * Representation of player two.
     *
     * @var string
     */
    protected string $name;

    /**
     * Representation of player two.
     *
     * @var int
     */
    protected int $points = 0;

    /**
     * Create new player instance.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Update player points.
     *
     * @return void
     */
    public function score(): void
    {
        $this->points++;
    }

    /**
     * Get player points.
     *
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * Get name of player.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
