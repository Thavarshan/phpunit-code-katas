<?php

namespace Katas\Tests;

use Katas\Tennis\Game;
use Katas\Tennis\Player;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    public function it_scores_a_tennis_match($playerOnePoint, $playerTwoPoint, $score)
    {
        $game = new Game(
            $john = new Player('John'),
            $jane = new Player('Jane'),
        );

        for ($i = 0; $i < $playerOnePoint; $i++) {
            $game->pointTo($john->getName());
        }

        for ($i = 0; $i < $playerTwoPoint; $i++) {
            $game->pointTo($jane->getName());
        }

        $this->assertEquals($score, $game->score());
    }

    /**
     * Provide scores data.
     *
     * @return array
     */
    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Jane'],
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jane'],
        ];
    }
}
