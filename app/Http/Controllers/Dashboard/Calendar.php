<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Whatsapp;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalendarModel;
use Carbon\Carbon;
use Exception;
use \DB;

class Calendar extends Controller
{
    public function index()
    {
        $calendar = CalendarModel::getCalendar();

        // session()->flash('success', "Hola mundo" );

        try {
            self::sendNotification();

        } catch (Exception $err){
            session()->flash('warning', $err->getMessage() );
        }

        return view('dashboard.services.calendar', compact('calendar'));
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
        $event = DB::table('calendar')
            ->select('calendar.*', 'clients.name','clients.phone', 'autos.brand', 'autos.model')
            ->join('clients', 'calendar.client_id', 'clients.id')
            ->join('autos', 'calendar.car_id', 'autos.id')
            ->where('calendar.id', $request->id)
            ->first();

        return response()->json([
            "success" => true,
            "data"    => $event
        ]);
    }

    public function arduinoPost(Request $request)
    {
        /*
        DB::table('arduino')->insert([
            'data'       => $request->data,
            'created_at' => Carbon::now()
        ]);
        */

        return response()->json([
            "success" => true,
            "message" => "Success"
        ]);
    }
}
