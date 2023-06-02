<?php
declare(strict_types=1);

namespace App;

class SoldOutState implements State
{
    private GumBallMachine $gumBallMachine;

    public function __construct(GumBallMachine $gumBallMachine)
    {
        $this->gumBallMachine = $gumBallMachine;
    }

    public function insertQuarter(): void
    {
        echo 'You can’t insert a quarter, the machine is sold out', PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo 'You can’t eject, you haven’t inserted a quarter yet', PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'You turned, but there are no gumballs', PHP_EOL;
    }

    public function dispense(): void
    {
        echo 'No gumball dispensed', PHP_EOL;
    }

    public function __toString(): string
    {
        return 'Machine is sold out';
    }

    public function refill(int $refill): void
    {
        $this->gumBallMachine->setCount($refill);
        echo "A $refill gumballs refill was done" . PHP_EOL;
        $this->gumBallMachine->setState($this->gumBallMachine->getNoQuarterState());
    }
}