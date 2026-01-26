<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Models\{Client, Service};
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
}
