<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Helpers extends Controller
{
    public static function getLastCutDate()
    {
        $lastDate = DB::table('montly_balances')->orderBy('created_at','desc')->first();

        if ($lastDate){
            return Carbon::parse($lastDate->close_date);
        }

        return Carbon::now()->subMonth();
    }

    public static function convertToPercentage(float $first, float $second) : float
    {
        $difference = ($first - $second);
        return ($difference / $first) * $first;
    }
}
