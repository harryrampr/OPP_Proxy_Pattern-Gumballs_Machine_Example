<?php
declare(strict_types=1);

namespace App;

class GumBallMachine
{
    private State $soldOutState;
    private State $noQuarterState;
    private State $hasQuarterState;
    private State $soldState;
    private State $winnerState;
    private string $location;

    private State $state;
    private int $count = 0;

    public function __construct(string $location, int $count)
    {
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->soldState = new SoldState($this);
        $this->winnerState = new WinnerState($this);
        $this->location = $location;

        if ($count > 0) {
            $this->count = $count;
            $this->state = $this->noQuarterState;
        } else {
            $this->state = $this->soldOutState;
        }
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getWinnerState(): State
    {
        return $this->winnerState;
    }

    public function __toString(): string
    {
        $text = '<h1>Mighty Gumball, Inc.</h1>' . PHP_EOL;
        $text .= '<h2>Java-enabled Standing Gumball Model #2004</h2>' . PHP_EOL;
        $text .= "<p>Inventory: {$this->count} gumballs</p>" . PHP_EOL;
        $text .= "<p class='message'>{$this->state->__toString()}</p>" . PHP_EOL;
        return $text;
    }

    public function insertQuarter(): void
    {
        $this->state->insertQuarter();
    }

    public function ejectQuarter(): void
    {
        $this->state->ejectQuarter();
    }

    public function turnCrank(): void
    {
        $this->state->turnCrank();
        $this->state->dispense();
    }

    public function getSoldOutState(): State
    {
        return $this->soldOutState;
    }

    public function getNoQuarterState(): State
    {
        return $this->noQuarterState;
    }

    public function getHasQuarterState(): State
    {
        return $this->hasQuarterState;
    }

    public function getSoldState(): State
    {
        return $this->soldState;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function releaseBall(): void
    {
        echo 'A gumball comes rolling out the slot...', PHP_EOL;
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function refill(int $refill): void
    {
        if ($refill > 0) {
            $this->state->refill($refill);
        }
    }

}