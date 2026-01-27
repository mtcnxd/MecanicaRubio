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
        $token = DB::table('settings')->where('name','telegram_api')->first();

        if (empty($token) || is_null($token)){
            throw new \Exception("Telegram API token is not configured");
        }
        
        $url = 'https://api.telegram.org/'. $token->value .'/sendMessage';
        
        $response = Http::post($url, array(
            "chat_id"    => '-1002434117829',
            "text" 	     => $text,
            "parse_mode" => "HTML"
        ));

        if ($response->getStatusCode() == 400){
            throw new \Exception("Error Processing Request: ". $response['description']);
        }
    }
}
