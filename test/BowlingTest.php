<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use TamakiiiSandbox\BowlingGameKata\Game;

class BowlingTest extends TestCase
{
    private Game $game;

    public function setUp(): void
    {
        $this->game = new Game;
    }

    private static function rollMany(Game $game, int $n, int $pins): Game
    {
        for ($i = 0; $i < $n; ++$i) {
            $game->roll($pins);
        }

        return $game;
    }

    private static function rollSpare(Game $game): Game
    {
        return self::rollMany($game, 2, 5);
    }

    private static function rollStrike(Game $game): Game
    {
        return self::rollMany($game, 1, 10);
    }

    #[Test]
    #[DoesNotPerformAssertions]
    public function canRoll(): void
    {
        $this->game->roll(0);
    }

    #[Test]
    public function gutterGame(): void
    {
        $game = self::rollMany($this->game, 20, 0);

        $this->assertSame(0, $game->score());
    }

    #[Test]
    public function allOnes(): void
    {
        $game = self::rollMany($this->game, 20, 1);

        $this->assertSame(20, $game->score());
    }

    #[Test]
    public function oneSpare(): void
    {
        $game = $this->game;
        $game = self::rollSpare($game);
        $game->roll(7);
        $game = self::rollMany($game, 17, 0);

        $this->assertSame(24, $game->score());
    }

    #[Test]
    public function oneStrike(): void
    {
        $game = $this->game;
        $game = self::rollStrike($game);
        $game->roll(2);
        $game->roll(3);
        $game = self::rollMany($this->game, 16, 0);

        $this->assertSame(20, $game->score());
    }
}
