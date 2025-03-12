<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Whatsapp;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalendarModel;
use Carbon\Carbon;
use DB;

class Calendar extends Controller
{
    public function index()
    {
        $calendar = CalendarModel::getCalendar();

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
        
        $template = Whatsapp::createServiceTemplate($params);
        $response = Whatsapp::send();
        
        /*
        $response = Whatsapp::send($template);
        $response->json()['messages'][0]['message_status'];
        */
    }
}
