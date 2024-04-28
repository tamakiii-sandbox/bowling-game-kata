<?php declare(strict_types=1);

namespace TamakiiiSandbox\BowlingGameKata;

class Game
{
    private array $rolls = [];
    private int $currentRoll = 0;

    public function roll(int $pins): void
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; ++$frame) {
            if ($this->isSpare($frameIndex)) {
                $score += 10 + $this->rolls[$frameIndex + 2];
                $frameIndex += 2;
            } else {
                $score += $this->rolls[$frameIndex] + $this->rolls[$frameIndex+1];
                $frameIndex += 2;
            }
        }
        return $score;
    }

    private function isSpare(int $frameIndex): bool
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] == 10;
    }
}
