<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Exception;
use \Http;
use \DB;

class Whatsapp extends Controller
{
    static function send($template = null)
    {
        $url   = 'https://graph.facebook.com/v21.0/590821560777074/messages';

        $token = DB::table('settings')->where('name','whatsapp_api')->first()->value;
        
        if (is_null($template)){
            $template = self::helloWorld();
        }

        $response = Http::withToken($token)->post($url, $template);

        if($response->getStatusCode()){
            throw new Exception("Error Processing Request:" .$response);
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
