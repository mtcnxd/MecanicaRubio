<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Exception;
use DB;

class Helpers extends Controller
{
    static function sendTelegram(string $text)
    {
        $url = 'https://api.telegram.org/bot8169963766:AAGGQYcAR-bwEew8p9Amo5SWb-PL79IQGAM/sendMessage';
        
        return Http::post($url, array(
            "chat_id"    => '-4785746771',
            "text" 	     => $text,
            "parse_mode" => "HTML"
        ));
    }

    static function sendWhatsapp($template = null)
    {
        $url = 'https://graph.facebook.com/v21.0/590821560777074/messages';

        $token = 'EAARe8OvWY7MBO5QddWZCSjrb7M5Wck5hr8f5L9xoQPxQXDDJiSB2yOFeywNwkfS4jbZC9GCVN2BHJ4vr1BJJ0ZBwJpFFtmEIIzqwx1zaEre48bXzqlMjdZCWoELO3PcpUZCBtGUdxXB7H8opmrlw8p4dhO7lqWzl61uy8v8ECp9ZBkvbWT3NiSuPV7S9YbYxSk9CAan3sMWkqrqh1rVZCKT4yUnZCgZDZD';
        
        $response = Http::withToken($token)->post($url, [
            "messaging_product" => "whatsapp",
            "to"                => "+529991210261",
            "type"              => "template",
            "template" => [
                "name" => "hello_world",
                "language" => [
                    "code" => "en_US"
                ]
            ]
        ]);

        if($response->failed()){
            throw new Exception($response->json()['error']['message']);
        }
    }

    static function logger(array $parameters)
    {
        DB::table('logger')->insert([
            "client_id" => $parameters['client_id']
        ]);
    }
}
