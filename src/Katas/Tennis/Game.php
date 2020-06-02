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
     * @param Player $playerOne
     * @param Player $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($argument)
    {
        //
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

                break;

            case 1:
                return 'fifteen';

                break;

            case 2:
                return 'thirty';

                break;

            case 3:
                return 'forty';

                break;
        }
    }
}