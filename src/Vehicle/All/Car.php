<?php

namespace Karrakoliko\CarbaseTest\Vehicle\All;

use Karrakoliko\CarbaseTest\Vehicle\VehicleAbstract;

class Car extends VehicleAbstract
{
    public function __toString(): string
    {
        return sprintf('Невероятный автомобиль %s для %d пассажиров и грузоподъемностью целых %d тонны!',
            $this->getAttribute('brand'),
            $this->getAttribute('passenger_seats_count'),
            $this->getAttribute('capacity_tons'),
        );
    }
}
