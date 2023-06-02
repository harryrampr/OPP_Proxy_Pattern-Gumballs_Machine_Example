<?php
declare(strict_types=1);

namespace App;

class NoQuarterState implements State
{
    private GumBallMachine $gumBallMachine;

    public function __construct(GumBallMachine $gumBallMachine)
    {
        $this->gumBallMachine = $gumBallMachine;
    }

    public function insertQuarter(): void
    {
        echo 'You inserted a quarter', PHP_EOL;
        $this->gumBallMachine->setState($this->gumBallMachine->getHasQuarterState());
    }

    public function ejectQuarter(): void
    {
        echo 'You haven’t inserted a quarter', PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'You turned, but there’s no quarter', PHP_EOL;
    }

    public function dispense(): void
    {
        echo 'You need to pay first', PHP_EOL;
    }

    public function __toString(): string
    {
        return 'Machine is waiting for quarter';
    }

    public function refill(int $refill): void
    {
        $this->gumBallMachine->setCount($this->gumBallMachine->getCount() + $refill);
        echo "A $refill gumballs refill was done" . PHP_EOL;
    }
}