<?php
declare(strict_types=1);

namespace App;


class SoldState implements State
{
    private GumBallMachine $gumBallMachine;

    public function __construct(GumBallMachine $gumBallMachine)
    {
        $this->gumBallMachine = $gumBallMachine;
    }

    public function insertQuarter(): void
    {
        echo 'Please wait, we’re already giving you a gumball', PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo 'Sorry, you already turned the crank', PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'Turning twice doesn’t get you another gumball!', PHP_EOL;
    }

    public function dispense(): void
    {
        $this->gumBallMachine->releaseBall();
        if ($this->gumBallMachine->getCount() > 0) {
            $this->gumBallMachine->setState($this->gumBallMachine->getNoQuarterState());
        } else {
            echo 'Oops, out of gumballs!', PHP_EOL;
            $this->gumBallMachine->setState($this->gumBallMachine->getSoldOutState());
        }
    }

    public function __toString(): string
    {
        return 'Gumball sold';
    }

    public function refill(int $refill): void
    {
        echo "Can't refill now", PHP_EOL;
    }

}