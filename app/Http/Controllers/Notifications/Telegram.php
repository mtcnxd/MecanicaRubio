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
        
        $url = 'https://api.telegram.org/'. $token .'/sendMessage';
        
        try {
            $response = Http::post($url, array(
                "chat_id"    => '-1002434117829',
                "text" 	     => $text,
                "parse_mode" => "HTML"
            ));

            if ($response->getStatusCode() == 400){
                throw new \Exception("Error Processing Request: ". $response['description']);
            }

        } catch(Exception $err) {
            
        }
    }
}
