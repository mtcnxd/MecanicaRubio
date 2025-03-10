<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Whatsapp;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class Calendar extends Controller
{
    public function index()
    {
        $month = date('n');
        $months = [
            'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
        ];
        
        $daysOfweek = [
            'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'
        ];
        
        for($i = 1; $i<= date('t'); $i++) {
            $date = Carbon::parse(date('Y-m-').$i);
            $events[] = DB::table('calendar')->where('date', $date)->first();
        }

        // Whatsapp::send();

        return view('dashboard.services.calendar', [
            'weekStartsIn' => $this->getFirstDay($month),
            'daysOfWeek'   => $daysOfweek,
            'daysOfMonth'  => date('t'),
            'currentDate'  => date('d'),
            'events'       => $events,
            'month'        => $months[$month - 1],
        ]);
    }

    public function testingNotifications()
    {
        /*
        $template = Whatsapp::createServiceTemplate($params);
        $response = Whatsapp::send($template);
        $response->json()['messages'][0]['message_status'];
        */
    }

    protected function getFirstDay($month)
    {
        $firstDay = mktime(0, 0, 0, $month, 0, date("Y"));

        if ( date('N',$firstDay) == 7 ){
            return 0;
        }

        return date('N', $firstDay);
    }
}
