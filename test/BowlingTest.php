<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use TamakiiiSandbox\BowlingGameKata\Game;

class BowlingTest extends TestCase
{
    private Game $game;

    public function setUp(): void
    {
        $this->game = new Game;
    }

    #[Test]
    public function notthing(): void
    {
        $this->assertSame('TamakiiiSandbox\BowlingGameKata\Game', get_class($this->game));
    }
}
