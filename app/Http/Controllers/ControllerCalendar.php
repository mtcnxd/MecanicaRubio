<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ControllerCalendar extends Controller
{
    public $currentDate;

    public function index(){
        $currentDate = date('d-m-Y');

        return view('dashboard.calendar', [
            'today' => $currentDate,
            'days'  => $this->daysOfMonth(2)
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
