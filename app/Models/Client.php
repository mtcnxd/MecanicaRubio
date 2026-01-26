<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'postcode',
        'street',
        'address',
        'city',
        'state',
        'rfc',
        'comments',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getEmailAttribute($value)
    {
        return $value ?? '';
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'client_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'client_id');
    }
}
