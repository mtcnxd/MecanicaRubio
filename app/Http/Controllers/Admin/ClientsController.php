<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Notifications\Telegram;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::where('status','Activo')->get();

        return view ('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $contactExists = Client::where('phone', $request->phone)->first();

        if ($contactExists){
            session()->flash('warning', 'El número de teléfono ya esta registrado');
            return to_route('clients.index');
        }

        try {
            Client::insert($request->except('_method','_token'));

            session()->flash('success', sprintf('El cliente %s se guardó correctamente', $request->name));
            
            Telegram::send(
                sprintf("<b>New client created:</b> %s <b>Phone:</b> %s", $request->name, $request->phone)
            );
        }
        
        catch (Exception $err){
            session()->flash('warning', sprintf('Error al crear cliente | %s ', $err->getMessage()));
		}

        return to_route('clients.index');
    }

    public function show(string $id)
    {
        $client = Client::find($id);

        return view('admin.clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        
        $client->update($request->except('_method','_token'));

        return to_route('clients.index')
            ->with('message', 'El registro se actualizo correctamente');
    }

    public function destroy(Request $request)
    {
        $client = Client::find($request->id);
        
        $client->update([
            'status' => 'Eliminado'
        ]);

        return Response()->json([
            'message' => 'El cliente se elimino correctamente'
        ]);
    }

    public function getClientsList(Request $request)
    {
        $data = Client::select('id','name')
            ->where('name', 'like', '%'.$request->name.'%')
            ->get();

        return Response()->json([
            "success" => true,
            "data"    => $data
        ]);
    }

    public function searchByPostcode(Request $request)
    {
        $result = DB::table('postalcodes')
            ->where('postalcode', $request->postcode)
            ->orderBy('address')
            ->get();

        return Response()->json([
            "success" => true,
            "data"    => $result
        ]);
    }

    public function searchByAddress(Request $request)
    {
        $addresses = DB::table('postalcodes')
            ->where('address','LIKE', "%".$request->address."%")
            ->limit(15)
            ->get();

        return response()->json([
            "success" => true,
            "data"    => $addresses
        ]);
    }
}
