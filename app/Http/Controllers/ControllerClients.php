<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use DB;

class ControllerClients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = DB::table('clients')->where('status', 'Activo')->get();

        return view (
            'dashboard.clients.index', 
            compact('clients')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contactExists = DB::table('clients')->where('phone', $request->phone)->first();

        if ($contactExists){
            session()->flash('message', 'El número de teléfono ya esta registrado');
            return to_route('clients.index');
        }

        $customerId = DB::table('clients')->insertGetId([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'postcode'   => $request->postcode,
            'street'     => $request->street,
            'address'    => $request->address,
            'city'       => $request->city,
            'state'      => $request->state,
            'rfc'        => $request->rfc,
            'comments'   => $request->comments,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(),
        ]);

        Helpers::sendTelegram(
            sprintf("<b>New client created:</b> %s Phone: %s", $request->name, $request->phone)
        );

        session()->flash('message', 'El cliente se guardó correctamente');
        return to_route('clients.index');
    }

    public function show(string $id)
    {
        $services = DB::table('autos')
            ->join('services','autos.id','services.car_id')
            ->where('autos.client_id', $id)
            ->orderBy('services.created_at', 'desc')
            ->get();

        return view('dashboard.clients.show', [
            'client'   => DB::table('clients')->where('id', $id)->first(),
            'services' => $services,
            'cars'     => DB::table('autos')->where('client_id', $id)->get(),
        ]);
    }

    public function edit(string $id)
    {
        return view('dashboard.clients.edit', [
            'client' => DB::table('clients')->where('id', $id)->first()
        ]);
    }

    public function update(Request $request, string $id)
    {
        DB::table('clients')->where('id', $id)->update([
            "name"     => $request->name,
            "email"    => $request->email,
            "phone"    => $request->phone,
            "postcode" => $request->postcode,
            "street"   => $request->street,
            "address"  => $request->address,
            "city"     => $request->city,
            "state"    => $request->state,
            "rfc"      => $request->rfc,
            "comments" => $request->comments,
        ]);

        return to_route('clients.index')->with('message', 'El registro se actualizo correctamente');
    }

    public function destroy(Request $request)
    {
        DB::table('clients')->where('id', $request->client)->update([
            'status' => 'Eliminado'
        ]);

        return Response()->json([
            'message' => 'El cliente se elimino correctamente'
        ]);
    }

    public function getClientsList(Request $request)
    {
        $data = DB::table('clients')
            ->select('id','name')
            ->where('name', 'like', '%'.$request->name.'%')
            ->get();

        return Response()->json([
            "success" => true,
            "data"    => $data
        ]);
    }
}
