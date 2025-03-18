<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use Exception;
use Str;
use DB;

class ControllerAjax extends Controller
{
    public function createItemInvoice(Request $request)
    {
        $labour = false;
        $item   = $request->item;
        $amount = $request->amount;

        if ($request->labour == 'true'){
            if ( empty($request->item) ){
                $item   = "Servicio (mano de obra)";
            }

            $labour = true;
            $amount = 1;
        }

        DB::table('services_items')->insert([
            'service_id' => $request->service,
            'amount'     => $amount,
            'item'       => $item,
            'supplier'   => $request->supplier,
            'price'      => $request->price,
            'labour'     => $labour,
        ]);

        $data = DB::table('services_items')->where('service_id', $request->service)->get();

        return response()->json([
            "success" => true,
            "message" => "Agregado correctamente",
            "data"    => $data
        ]);
    }

    public function removeItemInvoice(Request $request)
    {
        DB::table('services_items')
            ->where('id', $request->item)
            ->delete();

        return 'Eliminado correctamente';
    }

    public function getImageAttached(Request $request)
    {
        return DB::table('expenses')
            ->where('id', $request->id)
            ->first();
    }
}
