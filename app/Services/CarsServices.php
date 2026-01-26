<?php

namespace App\Services;

use App\Models\Cars;

class CarServices
{
    public function createCar($info) : Cars
    {
        $car = Cars::create($info);
        return $car;
    }
}