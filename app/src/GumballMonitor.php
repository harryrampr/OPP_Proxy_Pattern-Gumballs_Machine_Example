<?php
declare(strict_types=1);

namespace App;

class GumballMonitor
{
    private GumBallMachine $machine;

    public function __construct(GumBallMachine $machine)
    {
        $this->machine = $machine;
    }

    public function report(): void
    {
        echo "<h2 class='monitor'>Gumball Machine: {$this->machine->getLocation()}</h2>", PHP_EOL;
        echo "<p>Current inventory: {$this->machine->getCount()}</p>", PHP_EOL;
        echo "<p>Current state: {$this->machine->getState()}</p>", PHP_EOL;
    }
}