<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function getAll()
    {
        $clients = Client::all();

        return Response()->json([
            "success" => true,
            "data" => $clients            
        ]);
    }

    public function getInfo(Request $request)
    {
        $client = Client::find($request->clientId);

        return Response()->json([
            "success" => true,
            "data" => $client
        ]);
    }

    public function getServices(Request $request)
    {
        $services = [];
        $client = Client::find($request->clientId);

        foreach ($client->services as $service) {
            $services[] = [
                'id'       => $service->id, 
                'car'      => $service->car->carName(),
                'fault'    => $service->fault,
                'started'  => $service->entry_date,
                'finished' => $service->finished_date,
                'status'   => $service->status,
                'total'    => $service->total
            ];
        }

        return Response()->json([
            "success" => true,
            "data" => $services
        ]);
    }
}
