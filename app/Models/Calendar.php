<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendar';

    static function currentMonth()
    {
        return Carbon::now()->month;
    }

    static function currentDay()
    {
        return Carbon::now()->day;
    }

    static function getEvents() : array
    {
        for($i = 0; $i<= date('t') -1; $i++) {
            $createdDate = Carbon::parse(date('Y-m-').$i);
            $events[$i]  = Calendar::where('date', $createdDate)->first();
        }

        return $events;
    }

    static function startDay()
    {
        $month = self::currentMonth();
        $firstDay = mktime(0, 0, 0, $month, 0, date("Y"));

        if ( date('N', $firstDay) == 7 ){
            return 0;
        }

        return date('N', $firstDay);
    }

    static function weekDays()
    {
        return (object) [
            'Lunes', 
            'Martes', 
            'Miercoles', 
            'Jueves', 
            'Viernes', 
            'Sabado', 
            'Domingo'
        ];
    }

    static function monthName(){
        $monthNames = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];

        $month = self::currentMonth() -1;
        return $monthNames[$month];
    }

    static function getCalendar()
    {
        return new Calendar;
    }
}
