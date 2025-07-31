<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\Models\Cars;
use App\Models\Quotes;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('name')->get();
        $quotes  = Quotes::all();
        
        return view('dashboard.services.quotes_index', compact('clients', 'quotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = null;
        $genericClientId = null;
        $genericClientId = DB::table('settings')->where('name','genericClient')->first()->value;
        
        if (!is_null($genericClientId)){
            $client = Client::find($genericClientId);
        }

        $cars = Cars::all();
        $quoteItems = array();

        return view('dashboard.services.quotes_create', compact('client', 'cars', 'quoteItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Quotes::create([
            'client_name'    => $request->input('client'),
            'car_name'       => $request->input('car'),
            'fault_reported' => $request->input('fault'),
            'comments'       => $request->input('comments'),
            'status'         => 'Pendiente',
            'total'          => $request->input('total'),
        ]);

        return to_route('quotes.create')
            ->with('message', 'Cotizacion creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quotes::find($id);
        $quoteItems = DB::table('quotes_items')->get();

        return view('dashboard.services.quotes_show', compact('quote', 'quoteItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addItemToList(Request $request)
    {
        DB::table('quotes_items')->insert([
            "amount" => $request->input('amount'),
            "item"   => $request->input('item'),
            "price"  => $request->input('price'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Objeto agregado correctamente',
            'data'    => $request->all()
        ]);
    }

    public function remItemFromList(Request $request)
    {
        DB::table('quotes_items')->where([
            'id' => $request->input('itemId')
        ])->delete();

        return response()->json([
            'success' => true,
            'message' => 'Objeto eliminado correctamente',
            'data'    => $request->all()
        ]);
    }    
}
