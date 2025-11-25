<?php

namespace App\Http\Controllers\Admin;

use \DB;
use Exception;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Notifications\Whatsapp;

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
