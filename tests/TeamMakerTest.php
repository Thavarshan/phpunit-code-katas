<?php

namespace Katas\Tests;

use Katas\TeamMaker;
use PHPUnit\Framework\TestCase;

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
class TeamMakerTest extends TestCase
{
    public function testTwoTeamsWithEqualScoringAreGenerated()
    {
        $maker = new TeamMaker();
        $players = json_decode(
            \file_get_contents(__DIR__ . '/../resources/data/players.json'),
            true
        );

        [$team1, $team2] = $maker->execute($players);

        $this->assertEquals(
            round($maker->getTeamRanking($team1)),
            round($maker->getTeamRanking($team2))
        );
    }
}
