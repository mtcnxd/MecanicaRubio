<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ControllerClients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('dashboard.clients.index', [
            'clients' => DB::table('clients')->where('status', 'Activo')->get()
        ]);
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
        try {
            DB::table('clients')->insert([
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
            session()->flash('message', 'El registro se guardó correctamente');
        
        } catch (Exception $error){
            session()->flash('error', 'El número de teléfono ya se encuentra registrado');
        }

        return to_route('clients.index');
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.clients.edit', [
            'client' => DB::table('clients')->where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dd($id);

        DB::table('clients')->where('id', $id)->update([
            'status' => 'Eliminado'
        ]);

        return to_route('clients.index')->with('message', 'El registro se elimino correctamente');
    }
}
