<?php
declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\GumBallMachine;
use App\GumballMonitor;

$gumballMachine = new GumballMachine('Seattle', 112);

echo $gumballMachine, PHP_EOL;

$monitor = new GumballMonitor($gumballMachine);

$monitor->report();