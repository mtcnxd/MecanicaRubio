<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    protected $table = "quotes";

    protected $fillable = [
        'client_name',
        'car_name',
        'fault_reported',
        'comments',
        'status',
        'total',
    ];
}
