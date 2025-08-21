<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    protected $table = "autos";

    protected $fillable = [
        'brand',
        'model',
        'serie',
        'year',
        'plate',
        'client_id',
        'comments',
        'created_at',
        'updated_at',
    ];    

    public function findByCriteria(string $criteria)
    {
        return $this->where(function($query) use ($criteria){
            $query->orWhere('model','like', '%'.$criteria.'%')
                  ->orWhere('brand','like', '%'.$criteria.'%');
        })->get();
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function carName()
    {
        return $this->brand .' '.$this->model;
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'car_id');
    }
}
