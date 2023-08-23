<?php

namespace Karrakoliko\CarbaseTest\Vehicle\All;

use Karrakoliko\CarbaseTest\Vehicle\VehicleAbstract;
use Karrakoliko\CarbaseTest\Vehicle\VehicleType;

class SpecMachine extends VehicleAbstract
{

    public function __toString(): string
    {
        return sprintf('Шедевр спецтехники от %s! %s! Грузоподъёмность %02.2f т!',
            $this->getAttribute('brand'),
            $this->getAttribute('extra'),
            $this->getAttribute('capacity_tons'),
        );
    }

}