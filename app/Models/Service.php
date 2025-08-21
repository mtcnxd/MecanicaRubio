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
        'quote',
        'entry_date',
        'finished_date',
        'comments',
        'notes',
        'odometer',
        'status',
        'total',
    ];

    protected $casts = [
        'entry_date'    => 'date',
        'finished_date' => 'date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
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
