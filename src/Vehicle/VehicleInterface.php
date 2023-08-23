<?php

namespace Karrakoliko\CarbaseTest\Vehicle;

interface VehicleInterface extends \Stringable
{

    /**
     * @return mixed
     */
    public function getAttribute(string $key): mixed;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setAttribute(string $key, $value): void;
    public static function hydrate(array $props): self;

}