<?php

namespace Katas;

use Katas\Support\Arr;
use Katas\Contracts\Executable;

/**
 * Story.
 *
 * As the owner of a local 5-a-side football team, I want to generate as evenly balanced
 * teams as possible so that matches are fair and competitive. You should also have
 * received a JSON list of player names and rankings.
 *
 * Acceptance Criteria.
 *
 * Each team should consist of 5 players and be as evenly ranked as possible.
 */
class TeamMaker extends Kata implements Executable
{
    /**
     * {@inheritDoc}
     */
    public function execute(...$arguments)
    {
        do {
            [$team1, $team2] = $this->makeTeam($arguments[0]);

            $teamScore1 = round($this->getTeamRanking($team1));
            $teamScore2 = round($this->getTeamRanking($team2));
        } while ($teamScore1 !== $teamScore2);

        return [$team1, $team2];
    }

    /**
     * Generate two teams.
     *
     * @param array $players
     * @param int   $size
     *
     * @return array
     */
    public function makeTeam($players, $size = 5)
    {
        shuffle($players);

        return array_chunk($players, $size);
    }

    /**
     * Extract the scores of each player and sum it up
     * resulting in the total score for the team.
     *
     * @param array $team
     *
     * @return float
     */
    public function getTeamRanking($team)
    {
        return array_sum(Arr::pluck($team, 'score'));
    }
}
