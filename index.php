#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Karrakoliko\CarbaseTest\Command\ShowCarsCommand;
use Karrakoliko\CarbaseTest\Vehicle\Repository\CsvFileVehicleRepository;
use Symfony\Component\Console\Application;

$application = new Application();

$repo = new CsvFileVehicleRepository(
    realpath(__DIR__ . '/var/data.csv')
);

$application->add(new ShowCarsCommand($repo, 'show'));

$application->run();