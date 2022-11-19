<?php

namespace Katas;

use Katas\Contracts\Executable;

class BowlingGame extends Kata implements Executable
{
    /**
     * The number of frames in a game.
     */
    public const FRAMES_PER_GAME = 10;

    /**
     * All rolls for the game.
     *
     * @var array
     */
    protected array $rolls = [];

    /**
     * {@inheritDoc}
     */
    public function execute(...$arguments)
    {
        $this->roll($arguments[0]);

        return $this->score();
    }

    /**
     * Roll the ball.
     *
     * @param int $pins
     *
     * @return void
     */
    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    /**
     * Calculate the final score.
     *
     * @return int
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                ++$roll;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * Determine if the current roll was a strike.
     *
     * @param int $roll
     *
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return 10 === $this->pinCount($roll);
    }

    /**
     * Determine if the current frame was a spare.
     *
     * @param int $roll
     *
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return 10 === $this->defaultFrameScore($roll);
    }

    /**
     * Calculate the score for the frame.
     *
     * @param int $roll
     *
     * @return int
     */
    protected function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * Get the bonus for a strike.
     *
     * @param int $roll
     *
     * @return int
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    /**
     * Get the bonus for a spare.
     *
     * @param int $roll
     *
     * @return int
     */
    protected function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    /**
     * Get the number of pins knocked down for the given roll.
     *
     * @param int $roll
     *
     * @return int
     */
    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}
