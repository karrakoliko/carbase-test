<?php

namespace Karrakoliko\CarbaseTest\Vehicle;

use Stringable;

interface VehicleInterface extends Stringable
{

    public static function hydrate(array $props): self;

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

}