<?php

namespace App\Http\Controllers\Notifications;

use \DB;
use \Http;
use \Exception;
use Illuminate\Http\Request;
use App\Contracts\Notificator;
use App\Http\Controllers\Controller;

class Whatsapp extends Controller
{
    public static function send($template = null)
    {
        $url   = 'https://graph.facebook.com/v21.0/590821560777074/messages';

        $token = DB::table('settings')->where('name','whatsapp_api')->first()->value;
        
        if (is_null($template)){
            $template = self::helloWorld();
        }

        $response = Http::withToken($token)->post($url, $template);

        if (!$response->successful()){
            session()->flash('warning', $response->json()['error']['message']);
        }

        return $response;
    }

    static function helloWorld()
    {
        return [
            "messaging_product" => "whatsapp",
            "to"                => "+529991210261",
            "type"              => "template",
            "template" => [
                "name" => "hello_world",
                "language" => [
                    "code" => "en_US"
                ]
            ]
        ];
    }

    static function createServiceTemplate($parameters){
        return [
            "messaging_product" => "whatsapp",
            "to"                => $parameters['recipient'],
            "type"              => "template",
            "template" => [
                "name" => "primer_aviso_de_servicio",
                "language" => [
                    "code" => "es_MX"
            ],
            "components" => [
                [
                    "type" => "body",
                    "parameters" => [
                            [
                                "type" => "text",
                                "parameter_name" => "customer",
                                "text" => $parameters['customer']
                            ],[
                                "type" => "text",
                                "parameter_name" => "car",
                                "text" => $parameters['car']
                            ],[
                                "type" => "text",
                                "parameter_name" => "date",
                                "text" => $parameters['date']
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
