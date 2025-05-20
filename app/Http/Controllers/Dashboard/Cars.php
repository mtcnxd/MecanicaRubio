<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class Cars extends Controller
{
    public function index()
    {
        $autos = DB::table('clients')
            ->join('autos', 'autos.client_id', 'clients.id')
            ->where('clients.status','Activo')
            ->get();

        return view ('dashboard.autos.index', compact('autos'));
    }

    public function create()
    {
        $brands  = DB::table('brands')->orderBy('brand')->get();
        $clients = DB::table('clients')->where('status','Activo')->orderBy('name')->get();

        return view('dashboard.autos.create', compact('brands','clients'));
    }

    public function store(Request $request)
    {
        DB::table('autos')->insert([
            "brand"      => $request->brand,
            "model"      => $request->model,
            "serie"      => $request->serie,
            "year"       => $request->year,
            "plate"      => $request->plate,
            "client_id"  => $request->client,
            "comments"   => $request->comments,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        try {
            Telegram::send(
                sprintf("<b>New car created:</b> %s <b>Model:</b> %s", $request->brand, $request->model)
            );
        } catch (Exception $err){
            session()->flash('warning', 'ERROR: '. $err->getMessage());
		}

        return to_route('cars.index')->with('message', 'Los datos se guardaron correctamente');
    }

    public function show(string $id)
    {
        $client = DB::table('autos')
            ->join('clients','autos.client_id', 'clients.id')
            ->where('autos.id', $id)
            ->first();

        $services = DB::table('autos')
            ->join('services', 'services.car_id', 'autos.id')
            ->where('autos.id', $id)
            ->get();

        return view('dashboard.autos.show', compact('services','client'));
    }

    public function edit(string $id)
    {
        $brands  = array();
        $clients = array();
        
        $auto = DB::table('autos')
            ->select('autos.*', 'clients.name')
            ->join('clients', 'autos.client_id','clients.id')
            ->where('autos.id', $id)
            ->first();

        return view('dashboard.autos.edit', compact('brands','clients','auto'));
    }

    public function update(Request $request, string $id)
    {
        DB::table('autos')->where('id', $id)->update([
            "brand"    => $request->brand,
            "model"    => $request->model,
            "year"     => $request->year,
            "plate"    => $request->plate,
            "serie"    => $request->serie,
            "comments" => $request->comments,
        ]);

        return to_route('cars.index')->with('message', 'Los datos se guardaron correctamente');
    }

    public function createBrand(Request $request)
    {
        $brandExists = DB::table('brands')->where('brand', $request->brand)->first();

        if ($brandExists){
            return response()->json([
                'success' => false,
                'message' => 'La marca que intentas crear ya existe'
            ]);
        }

        try {
            DB::table('brands')->insert([
                'brand'   => $request->brand,
                'premium' => ($request->premium == 'true') ? 1 : 0
            ]);

            $brands = DB::table('brands')->get();

            return response()->json([
                'success' => true,
                'message' => 'Los datos se guardaron con exito',
                'data'    => $brands
            ]);            

        } catch (Exception $e){
            return $e->getMessage();
        }
    }    

    public function loadModels(Request $request)
    {
        $models = DB::table('models')->where('brand', $request->brand)->get();
        
        return response()->json([
            'success' => true,
            'data'    => $models
        ]);
    }
    
    public function createModel(Request $request)
    {
        $exists = DB::table('models')->where('model', $request->model)->first();

        if ($exists){
            return response()->json([
                'success' => false,
                'message' => 'El modelo que intentas crear ya existe'
            ]);
        }

        try {
            DB::table('models')->insert([
                'brand' => $request->brand,
                'model' => $request->model
            ]);

            $models = DB::table('models')
                ->where('brand', $request->brand)
                ->orderBy('model')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Los datos se guardaron con exito',
                'data'    => $models
            ]);

        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function searchByClient(Request $request)
    {
        $cars = DB::table('autos')
            ->where('client_id', $request->client)
            ->orderBy('brand')
            ->get();
        
        return response()->json([
            "success" => true,
            "data"    => $cars
        ]);
    }

    public function report()
    {
        $brands = DB::table('autos')
            ->select(DB::raw('count(*) as count, brand'))
            ->groupBy('brand')
            ->orderBy('count', 'desc')
            ->get();

        $items = DB::table('services_items')
            ->select('item', DB::raw('count(*) as count'))
            ->whereNotIn('item',['Servicio (mano de obra)'])
            ->groupBy('item') 
            ->orderBy('count', 'desc')
            ->get();
    
        return view('dashboard.reports.autos', compact('brands', 'items'));
    }
}
