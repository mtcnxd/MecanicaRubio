<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ControllerCalendar extends Controller
{
    public $currentDate;

    public function index()
    {
        $currentDate = date('d');
        $daysOfweek = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        
        for($i = 1; $i<= $this->daysOfMonth(2); $i++) {
            $date = Carbon::parse(date('Y-m-').$i);
            $events[] = DB::table('calendar')->where('date', $date)->first();
        }

        // dd($events);

        return view('dashboard.calendar', [
            'daysOfWeek'  => $daysOfweek,
            'daysOfMonth' => $this->daysOfMonth(2),
            'currentDate' => date('d'),
            'events'      => $events,
        ]);
    }

    public function daysOfMonth($month)
    {
        $events = DB::table('calendar')
            ->where('date', '23-02-2024')
            ->get();

        return cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
    }
}
