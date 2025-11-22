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

    public function createScheduleService(Telegram $telegram)
    {
        $services = Service::where('created_at','>', Carbon::now()->subMonth(2))
            ->whereIn('service_type',['Mayor','Menor'])
            ->get();

        $servicesCreated = 0;
        foreach ($services as $service){
            if ($this->createCalendarEvent($service)){
                $servicesCreated += 1;
            }
        }

        if ($servicesCreated > 0){
            $telegram->send(
                sprintf('New %s services scheduled created successfully', $servicesCreated)
            );
        }

        return response()->json([
            'success' => true,
            'data' => [
                'all'   => $services->count(),
                'count' => $servicesCreated,
                'created_at' => Carbon::now(),
            ]
        ]);
    }

    protected function createCalendarEvent($service) : bool
    {
        $eventFound = Calendar::where('client_id', $service->client_id)->where('car_id', $service->car_id)->first();

        if (!$eventFound){
            Calendar::insert([
                'name'          => 'Mantenimiento programado',
                'description'   => 'Mantenimiento programado',
                'client_id'     => $service->client_id,
                'car_id'        => $service->car_id,
                'event_date'    => Carbon::parse($service->finished_date)->addMonths(5),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);

            return true;
        }

        return false;
    }
}
