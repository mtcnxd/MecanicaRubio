<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'car_id',
        'fault',
        'service_type',
        'entry_date',
        'finished_date',
        'comments',
        'notes',
        'odometer',
        'status',
        'total',
    ];

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
