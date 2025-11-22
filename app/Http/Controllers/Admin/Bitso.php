<?php

namespace App\Http\Controllers\Admin;

use App\Models\BitsoData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bitso extends Controller
{
    public function index(BitsoData $bitsoData)
    {
        $bitsoData = $bitsoData->where('active', true)->get();
        
        return view('admin.bitso.index', compact('bitsoData'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'purchase_value' => ($request->amount * $request->price)
        ]);

        BitsoData::create($request->except('_token'));

        session()->flash('success', sprintf('El registro almacenado con exito'));

        return to_route('bitso.index');
    }
}
