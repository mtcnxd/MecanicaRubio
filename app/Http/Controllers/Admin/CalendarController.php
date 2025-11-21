<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Notifications\Whatsapp;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;
use Carbon\Carbon;
use Exception;
use \DB;

class CalendarController extends Controller
{
    public function index(Calendar $calendar)
    {
        $events = [];

        $events = $calendar->whereBetween('event_date',[
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->get();

        return view('admin.services.calendar', compact('calendar', 'events'));
    }

    public function sendNotification()
    {
        $params = [
            "recipient" => "+529991210261",
            "customer"  => "Marcos Tzuc Cen",
            "car"       => "BMW 330i",
            "date"      => "15 de marzo"
        ];

        # $response = Whatsapp::send($template);
        
        $template = Whatsapp::createServiceTemplate($params);
        Whatsapp::send();
    }

    public function getEvent(Request $request)
    {
        $event = Calendar::find($request->id);

        return response()->json([
            "success" => true,
            "data"    => [
                'event'   => $event,
                'service' => $event->service,
                'client'  => $event->service->client,
                'car'     => $event->service->car,
            ]
        ]);
    }
}
