<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Traits\Notificator;
use App\Services\ClientServices;

class ClientsController extends Controller
{
    use Notificator;

    public function __construct(ClientServices $clientServices)
    {
        $this->clientServices = $clientServices;
    }

    public function index(Client $client)
    {
        $clients = $client->where('status','Activo')->get();

        return view ('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        try {
            $client = $this->clientServices->create($request->except('_method','_token'));
            
            $this->notify(
                sprintf("<b>New client created:</b> %s <b>Phone:</b> %s", $request->name, $request->phone)
            );

            session()->flash('success', sprintf('El cliente %s se guardó correctamente', $request->name));
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
        // TODO: validate if $id can be a Client model instance
        $client = Client::find($id);

        $this->clientServices->update($client, $request->except('_method','_token'));

        return to_route('clients.index')->with('message', 'El registro se actualizo correctamente');
    }

    public function destroy(Request $request)
    {
        $client = Client::find($request->id);

        $this->clientServices->delete($client);

        return Response()->json([
            'message' => 'El cliente se elimino correctamente'
        ]);
    }

    public function search(Request $request)
    {
        $result = Client::select('id', 'name')
            ->where(function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->name.'%')
                    ->orWhere('phone', 'like', '%'.$request->name.'%');
            })
            ->get();

        return Response()->json([
            "success" => true,
            "data"    => $result
        ]);
    }

    // Deprecates this method by search when search admites the search by postcode
    public function searchPostalCode(Request $request)
    {
        $result = DB::table('postalcodes')
            ->where(function ($query) use ($request) {
                $query->where('postalcode', 'like', '%'.$request->postcode.'%')
                    ->where('address', 'like', '%'.$request->address.'%');
            })
            ->get();

        return Response()->json([
            "success" => true,
            "data"    => $result
        ]);
    }
}
