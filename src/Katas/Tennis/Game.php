<?php

namespace Katas\Tennis;

use Katas\Kata;
use Katas\Contracts\Executable;

class Game extends Kata implements Executable
{
    /**
     * Instance of player one.
     *
     * @var integer
     */
    protected $playerOne;

    /**
     * Instance of player two.
     *
     * @var integer
     */
    protected $playerTwo;

    /**
     * Create new match instance.
     *
     * @param \Katas\Tennis\Player|null $playerOne
     * @param \Katas\Tennis\Player|null $playerTwo
     */
    public function __construct(?Player $playerOne = null, ?Player $playerTwo = null)
    {
        $this->playerOne = $playerOne ?? new Player('John');
        $this->playerTwo = $playerTwo ?? new Player('Jane');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(...$arguments)
    {
        $arguments = $arguments[0];

        for ($i = 0; $i < $arguments[0]; $i++) {
            $this->pointTo($this->playerOne->getName());
        }

        for ($i = 0; $i < $arguments[1]; $i++) {
            $this->pointTo($this->playerTwo->getName());
        }

        return $this->score();
    }

    /**
     * Set score for player one.
     *
     * @param string $playerName
     * @return void
     */
    public function pointTo(string $playerName): void
    {
        if ($this->playerOne->getName() === $playerName) {
            $this->playerOne->score();
        }

        if ($this->playerTwo->getName() === $playerName) {
            $this->playerTwo->score();
        }
    }

    /**
     * Show score of current match.
     *
     * @return string
     */
    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader();
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            '%s-%s',
            $this->pointsToTerm($this->playerOne->getPoints()),
            $this->pointsToTerm($this->playerTwo->getPoints()),
        );
    }

    /**
     * Determine which player is in the lead regarding score.
     *
     * @return string
     */
    protected function leader(): string
    {
        return $this->playerOne->getPoints() > $this->playerTwo->getPoints()
            ? $this->playerOne->getName()
            : $this->playerTwo->getName();
    }

    /**
     * Determine if either player has enough score to win a macth.
     *
     * @return bool
     */
    protected function hasWinner(): bool
    {
        if ($this->playerOne->getPoints() < 4 && $this->playerTwo->getPoints() < 4) {
            return false;
        }

        return abs($this->playerOne->getPoints() - $this->playerTwo->getPoints()) >= 2;
    }

    /**
     * Determine if the either player has an advantage over the other.
     *
     * @return bool
     */
    protected function hasAdvantage(): bool
    {
        if (! $this->hasReachedDeuceThreshold()) {
            return false;
        }

        return ! $this->isDeuce();
    }

    /**
     * Determine if the score is "deuce/tied".
     *
     * @return bool
     */
    protected function isDeuce(): bool
    {
        if (! $this->hasReachedDeuceThreshold()) {
            return false;
        }

        return $this->playerOne->getPoints() === $this->playerTwo->getPoints();
    }

    /**
     * Determine if a match can be won.
     *
     * @param  string $value
     * @return bool
     */
    protected function hasReachedDeuceThreshold(): bool
    {
        return $this->playerOne->getPoints() >= 3 &&
            $this->playerTwo->getPoints() >= 3;
    }

    /**
     * Get respective term for score.
     *
     * @param  int $points
     * @return string
     */
    protected function pointsToTerm(int $points): string
    {
        switch ($points) {
            case 0:
                return 'love';

            case 1:
                return 'fifteen';

            case 2:
                return 'thirty';

            case 3:
                return 'forty';
        }
    }
}
