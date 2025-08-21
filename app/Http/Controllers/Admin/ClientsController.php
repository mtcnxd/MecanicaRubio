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

        $customerId = Client::insertGetId([
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
        ]);

        try {
            Telegram::send(
                sprintf("<b>New client created:</b> %s <b>Phone:</b> %s", $request->name, $request->phone)
            );
        }
        
        catch (Exception $err){
            session()->flash('warning', 'ERROR: '. $err->getMessage());
		}

        session()->flash('success', 'El cliente se guardó correctamente');
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
        
        $client->update([
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
        Client::where('id', $request->client)->update([
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
