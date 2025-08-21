<?php

namespace App\Http\Controllers\Client;

use App\Models\Cars;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cars = Cars::where('client_id', $user->client_id)->get();

        return view('client.dashboard', compact('cars'));
    }

    public function show(string $id)
    {
        $details = Cars::find($id);

        return view('client.car_details', compact('details'));
    }
}
