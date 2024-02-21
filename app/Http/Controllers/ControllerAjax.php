<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use DB;

class ControllerAjax extends Controller
{
    public function createBrand(Request $request)
    {
        try {
            DB::table('brands')->insert([
                'brand'   => $request->brand,
                'premium' => ($request->premium == 'true') ? 1 : 0
            ]);

            $brands = DB::table('brands')->get();

        } catch (Exception $e){
            return $e;
        }

        return json_encode($brands);
    }

    public function loadModels(Request $request)
    {
        $models = DB::table('models')->where('brand', $request->brand)->get();
        return json_encode($models);
    }

    public function createModel(Request $request)
    {
        try {
            DB::table('models')->insert([
                'brand' => $request->brand,
                'model' => $request->model
            ]);

            $models = DB::table('models')
                ->where('brand', $request->brand)
                ->orderBy('model')
                ->get();

        } catch (Exception $e){
            return $e;
        }

        return json_encode($models);
    }

    public function searchPostcode(Request $request)
    {
        $result = DB::table('postalcodes')
            ->where('postalcode', $request->postcode)
            ->orderBy('address')
            ->get();

        return json_encode($result);
    }

    public function carsByClient(Request $request)
    {
        $autos = DB::table('autos')->where('client_id', $request->client)->orderBy('brand')->get();
        return json_encode($autos);
    }

    public function createItemInvoice(Request $request)
    {
        DB::table('services_items')->insert([
            'service_id' => $request->service,
            'amount'     => $request->amount,
            'item'       => $request->item,
            'price'      => $request->price,
        ]);

        $invoiceItems = DB::table('services_items')->where('service_id', $request->service)->get();

        return json_encode($invoiceItems);
    }

    public function removeItemInvoice(Request $request)
    {
        DB::table('services_items')
            ->where('id', $request->item)
            ->delete();

        $invoiceItems = DB::table('services_items')
            ->where('service_id', $request->service)
            ->get();

        return json_encode($invoiceItems);
    }

    public function searchPostalCode(Request $request)
    {
        $addresses = DB::table('postalcodes')
            ->where('address','LIKE', "%".$request->address."%")
            ->get();

        return json_encode($addresses);
    }

}
