<?php

namespace Karrakoliko\CarbaseTest\Vehicle\All;

use Karrakoliko\CarbaseTest\Vehicle\VehicleAbstract;

class Truck extends VehicleAbstract
{

    public function __toString(): string
    {
        $line = sprintf('Потрясающий трак от %s! Грузоподъёмность %02.2f т!',
            $this->getAttribute('brand'),
            $this->getAttribute('capacity_tons'),
        );

        $whlAttr = $this->getAttribute('body_whl');

        if ($whlAttr !== null) {
            $line .= sprintf(' Габариты: %s! Это ж целых %02.2f м3 чистой мощи!',
                $whlAttr,
                $this->getBodyVolume()
            );
        }

        return $line;
    }

    public function getBodyVolume(): ?float
    {
        $whlAttr = $this->getAttribute('body_whl');

        if ($whlAttr === null) {
            return null;
        }

        $whl = explode('x', $whlAttr);

        return array_reduce($whl, function ($carry, $item) {
            return $carry * $item;
        }, 1);
    }
}
