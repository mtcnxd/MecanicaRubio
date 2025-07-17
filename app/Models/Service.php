<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }

    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id');
    }

    public function invoiceItems()
    {
        return $this->hasMany(ServiceItems::class,'service_id');
    }
}
