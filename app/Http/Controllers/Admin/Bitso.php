<?php

namespace App\Http\Controllers\Admin;

use App\Models\BitsoData;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\InvestmentData;
use App\Http\Controllers\Controller;
use App\Models\Charts;

class Bitso extends Controller
{
    public function index(BitsoData $bitsoData, Investment $investment, Charts $charts)
    {
        $bitso = $bitsoData->where('active', true)->get();

        $investments = $investment->where('active', true)->get(); 

        // $chartData = $charts->chartAssetsIncrement();
        $chartData = $charts->chartServicesByMonth();
        // dd($chartData);

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

    public function update(Request $request)
    {        
        try {
            InvestmentData::create($request->except('_token'));

            Investment::where('id', $request->investment_id)->update([
                'last_amount'    => Investment::raw('current_amount'),
                'current_amount' => $request->amount
            ]);
            
            session()->flash('success', sprintf('El registro almacenado con exito'));
        }

        catch (\Exception $er){
            session()->flash('error', sprintf('we got an error: %s', $er->getMessage()));
        }

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
