<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Carbon\Carbon;
use DB;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendar';

    protected $fillable = [
        'event',
        'description',
        'service_id',
        'date',
        'status',
        'notified',
    ];

    protected $dates = [
        'date'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function currentDay()
    {
        return Carbon::now()->day;
    }

    public function getEvents() : array
    {
        for($i = 0; $i<= date('t') -1; $i++) {
            $createdDate = Carbon::parse(date('Y-m-').$i);
            $events[$i]  = Calendar::where('event_date', $createdDate)->first();
        }
        
        return $events;
    }

    public function startDay()
    {
        $month    = Carbon::now()->month;
        $firstDay = mktime(0, 0, 0, $month, 0, date("Y"));

        if ( date('N', $firstDay) == 7 ){
            return 0;
        }

        return date('N', $firstDay);
    }

    public function weekDays()
    {
        return [
            'Lunes',    'Martes',   'Miercoles', 
            'Jueves',   'Viernes',  'Sabado', 
            'Domingo'
        ];
    }

    public function monthName(){
        $monthNames = [
            'Enero',    'Febrero',      'Marzo',
            'Abril',    'Mayo',         'Junio',
            'Julio',    'Agosto',       'Septiembre',
            'Octubre',  'Noviembre',    'Diciembre'
        ];

        $month = Carbon::now()->month -1;
        return $monthNames[$month];
    }

    public function getCalendar()
    {
        return $this;
    }
}
