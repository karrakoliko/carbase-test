<?php

namespace Karrakoliko\CarbaseTest\Vehicle;

abstract class VehicleAbstract implements VehicleInterface
{
    private array $attributes = [];
    public function getPhotoFileExt(): ?string
    {
        $photoPath = $this->getPhotoPath();

        if ($photoPath === null) {
            return null;
        }

        return pathinfo($this->getPhotoPath(), PATHINFO_EXTENSION);
    }

    public static function hydrate(array $props): VehicleInterface
    {

        $vehicle = new static();

        foreach ($props as $key => $value){
            $vehicle->setAttribute($key,$value);
        }

        return $vehicle;

    }

    public function setAttribute(string $key, $value): void
    {
        $this->attributes[$key] = empty($value) ? null : $value ;
    }

    public function getAttribute(string $key): mixed
    {
        if(!array_key_exists($key,$this->attributes)){
            return null;
        }

        return $this->attributes[$key];
    }

    public function __toString(): string
    {
        return implode(' | ', $this->attributes);
    }


}
