<?php

namespace Karrakoliko\CarbaseTest\Vehicle\Repository;

use Karrakoliko\CarbaseTest\Vehicle\All\Car;
use Karrakoliko\CarbaseTest\Vehicle\All\SpecMachine;
use Karrakoliko\CarbaseTest\Vehicle\All\Truck;
use Karrakoliko\CarbaseTest\Vehicle\VehicleAbstract;
use RuntimeException;

class CsvFileVehicleRepository implements VehicleRepositoryInterface
{
    private readonly string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getAll(): iterable
    {
        try {

            if (($fp = fopen($this->path, "r")) === FALSE) {
                throw new RuntimeException(sprintf('Unable to open file at %s', $this->path));
            }

            $heading = null;
            $typeKeyIndex = null;

            $mapping = self::getVehicleTypeMapping();

            while ($row = fgetcsv($fp, null, ";")) {

                if ($heading === null) {
                    $heading = $row;
                    $typeKeyIndex = array_search('vehicle_type', $heading);
                    continue;
                }

                $vehicleTypeName = $row[$typeKeyIndex];

                if (empty($vehicleTypeName)) {
                    continue;
                }

                if (!is_string($vehicleTypeName) || !array_key_exists($vehicleTypeName, $mapping)) {
                    throw new RuntimeException(sprintf('Unknown vehicle type %s', $vehicleTypeName));
                }

                /** @var VehicleAbstract $vehicleClass */
                $vehicleClass = $mapping[$vehicleTypeName];

                $props = array_combine($heading, $row);

                yield $vehicleClass::hydrate($props);

            }
        } finally {
            fclose($fp);
        }

    }

    /**
     * @return string[]
     */
    protected static function getVehicleTypeMapping(): array
    {
        return [
            'car' => Car::class,
            'spec_machine' => SpecMachine::class,
            'truck' => Truck::class
        ];

    }

}