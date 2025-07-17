<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

   protected function casts(): array
    {
        return [
            'paid_date' => 'datetime',
        ];
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function salaryItems()
    {
        return $this->hasMany(SalaryItems::class);
    }
}
