<?php

namespace Karrakoliko\CarbaseTest\Command;

use Karrakoliko\CarbaseTest\Vehicle\Repository\VehicleRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCarsCommand extends Command
{
    private VehicleRepositoryInterface $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository, string $name = null)
    {
        $this->vehicleRepository = $vehicleRepository;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Посмотрите на нашу замечательную технику!');
        $output->writeln('У нас есть:');

        $vehicles = $this->vehicleRepository->getAll();

        foreach ($vehicles as $vehicle) {
            $output->writeln('* ' . $vehicle);
        }

        return self::SUCCESS;
    }
}