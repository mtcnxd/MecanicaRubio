<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    protected $table = "autos";

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
}
