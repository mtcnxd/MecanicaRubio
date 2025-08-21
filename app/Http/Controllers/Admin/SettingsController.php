<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{   
    public function index()
    {
        $configs = DB::table('settings')->get();

        return view('admin.admin.configuration', compact('configs'));
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key != '_token' and $key != '_method'){
                DB::table('settings')->where('name', $key)->update([
                    "value" => $value
                ]);
            }
        }

        return to_route('setting.index')->with('message', 'La configuracion a sido guardada con exito');
    }

    public function store(Request $request)
    {
        DB::table('settings')->insert([
            "name"  => $request->name,
            "value" => $request->value
        ]);

        return to_route('setting.index')->with('message', 'Nuevo elemento de configuracion creado');
    }
}
