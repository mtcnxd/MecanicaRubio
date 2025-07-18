<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    public function cars()
    {
        return $this->hasMany(Cars::class, 'client_id');
    }
}
