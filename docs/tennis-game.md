# Tennis Game Kata

## Definition

The object of the game is to maneuver the ball in such a way that the opponent is not able to play a valid return. The player who is unable to return the ball will not gain a point, while the opposite player will.

## Rules

1. A game is won by the first player to have won at least four points in total and at least two points more than the opponent.
2. The running score of each game is described in a manner peculiar to tennis:
    - Scores from zero to three points are described as "love", "fifteen", "thirty", and "forty" respectively.
3. If at least three points have been scored by each player, and the scores are equal, the score is "deuce".
4. If at least three points have been scored by each side and a player has one more point that his opponent, the score of the game is "advantage" for the player in the lead.

## Process

1. Check if either player has a score enough to be declared a winner.
2. If so get the name of the player and pass on as winner of the match.
3. If not continue with the game by checking to see if either player has an advantage over the other.
4. If so determine which player has an advantage over the other and pass on as player with advantage.
5. Check if the score between the two players are deuce.
6. If so show the score as "deuce".
7. If not show the score according to respective terms of the points.
