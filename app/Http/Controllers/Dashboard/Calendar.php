<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Whatsapp;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalendarModel;
use Carbon\Carbon;
use Exception;
use DB;

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
}
