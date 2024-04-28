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
            if ($this->isStrike($frameIndex)) {
                $score += 10 + $this->strikeBonus($frameIndex);
                $frameIndex++;
            } elseif ($this->isSpare($frameIndex)) {
                $score += 10 + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->twoBallsInFrame($frameIndex);
                $frameIndex += 2;
            }
        }
        return $score;
    }

    private function isSpare(int $frameIndex): bool
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] == 10;
    }

    private function isStrike(int $frameIndex): bool
    {
        return $this->rolls[$frameIndex] == 10;
    }

    private function strikeBonus(int $frameIndex): int
    {
        return $this->rolls[$frameIndex+1] + $this->rolls[$frameIndex+2];
    }

    private function spareBonus(int $frameIndex): int
    {
        return $this->rolls[$frameIndex + 2];
    }

    private function twoBallsInFrame(int $frameIndex): int
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex+1];
    }
}
