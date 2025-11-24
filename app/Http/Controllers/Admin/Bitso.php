<?php

namespace App\Http\Controllers\Admin;

use App\Models\BitsoData;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bitso extends Controller
{
    public function index(BitsoData $bitsoData, Investment $investment)
    {
        $bitso = $bitsoData->where('active', true)->get();

        $investments = $investment->where('active', true)->get(); 

        return view('admin.bitso.index', compact('bitso', 'investments'));
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

    public function destroy(Request $request)
    {
        try {
            $result = BitsoData::find($request->id);
            $result->update([
                'active' => false
            ]);

            return response()->json([
                'success' => true,
                'type'    => 'success',
                'message' => 'Set as deleted successfully'
            ]);
        }

        catch (\Exception $er){
            return response()->json([
                'success' => false,
                'type'    => 'error',
                'message' => $er->getMessage()
            ]);
        }
    }
}
