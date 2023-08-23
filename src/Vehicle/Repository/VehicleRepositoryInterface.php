<?php

namespace Karrakoliko\CarbaseTest\Vehicle\Repository;

use Karrakoliko\CarbaseTest\Vehicle\VehicleInterface;

interface VehicleRepositoryInterface
{
    /**
     * @return VehicleInterface[]
     */
    public function getAll(): iterable;

}