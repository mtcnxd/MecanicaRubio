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
        $token = DB::table('configurations')->where('name','telegram_api')->first()->value;
        
        $url   = 'https://api.telegram.org/'. $token .'/sendMessage';
        
        return Http::post($url, array(
            "chat_id"    => '-4785746771',
            "text" 	     => $text,
            "parse_mode" => "HTML"
        ));
    }

    static function logger(array $parameters)
    {
        DB::table('logger')->insert([
            "client_id" => $parameters['client_id']
        ]);
    }
}
