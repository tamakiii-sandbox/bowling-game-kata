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
}
