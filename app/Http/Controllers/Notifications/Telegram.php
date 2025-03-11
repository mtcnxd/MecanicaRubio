<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Http;
use \DB;

class Telegram extends Controller
{
    static function send(string $text)
    {
        $token = DB::table('settings')->where('name','telegram_api')->first()->value;
        
        $url   = 'https://api.telegram.org/'. $token .'/sendMessage';
        
        return Http::post($url, array(
            "chat_id"    => '-4785746771',
            "text" 	     => $text,
            "parse_mode" => "HTML"
        ));
    }
}
