<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

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

    protected $dates = [
        'entry_date',
        'finished_date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id');
    }

    public function serviceItems()
    {
        return $this->hasMany(ServiceItems::class,'service_id');
    }

    public function serviceItemsTotal()
    {
        return ServiceItems::where('service_id', $this->id)
            ->sum(ServiceItems::raw('price * amount'));
    }
}
