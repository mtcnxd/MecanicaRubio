<?php

namespace App\Http\Controllers;

use App\Contracts\CarsContract;
use DB;

class CarsController implements CarsContract
{
    public static function getCar($id)
    {
        return DB::table('autos')
            ->join('clients', 'autos.client_id', 'clients.id')
            ->where('autos.id', $id)
            ->first();
    }
}