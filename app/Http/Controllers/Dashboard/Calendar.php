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

        Whatsapp::send();

        return view('dashboard.services.calendar', compact('calendar'));
    }

    public function sendNotification()
    {
        $params = [
            "client" => 'Marcos Tzuc',
            "car"    => 'BMW 320i',
            "date"   => '10 marzo 2025'
        ];

        /*
        $template = Whatsapp::createServiceTemplate($params);
        $response = Whatsapp::send($template);
        $response->json()['messages'][0]['message_status'];
        */
    }
}
