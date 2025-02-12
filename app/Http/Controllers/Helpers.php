<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helpers extends Controller
{
    static function sendNotify($text)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                "chat_id"    => '-4785746771',
                "text" 	     => $text,
                "parse_mode" => "HTML"
            )
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
