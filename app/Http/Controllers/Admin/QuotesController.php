<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $quotes  = Service::where('quote', true)->get();
        
        return view('admin.services.quotes_index', compact('clients','quotes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);
        return view('admin.services.quotes_show', compact('service'));
    }

    public function destroy(string $id)
    {
        //
    }  
}
