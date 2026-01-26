<?php

namespace App\Services;

use App\Models\Service;

class ServicesService
{
    public function all()
    {
        return Service::all();
    }

    public function create($data)
    {
        return Service::create($data);
    }

    public function findByCriteria(array $criteria)
    {
        return Service::select('client_id','car_id','service_type','fault','status','entry_date','finished_date','total')
            ->with('client:id,name,email,phone')
            ->with('car:id,brand,model,year')
            ->where(function($query) use ($criteria) {
                if (isset($criteria['status'])){
                    $query->where('status', $criteria['status']);
                }

                if(isset($criteria['id'])){
                    $query->where('id', $criteria['id']);
                }
            })->get();
    }

    public function createPDF(Service $service)
    {
        dd($service);
    }
}