<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \DB;

class ConfigController extends Controller
{   
    public function index()
    {
        $configs = DB::table('configurations')->get();

        return view('dashboard.admin.configuration', compact('configs'));
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key != '_token' and $key != '_method'){
                DB::table('configurations')->where('name', $key)->update([
                    "value" => $value
                ]);
            }
        }

        return to_route('config.index')->with('message', 'La configuracion a sido guardada con exito');
    }
}
