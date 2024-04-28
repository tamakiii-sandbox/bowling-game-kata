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

    #[Test]
    #[DoesNotPerformAssertions]
    public function canRoll(): void
    {
        $this->game->roll(0);
    }

    #[Test]
    public function gutterGame(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $this->game->roll(0);
        }

        $this->assertSame(0, $this->game->score());
    }
}
