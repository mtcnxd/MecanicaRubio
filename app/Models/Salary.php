<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'status',
        'start_date',
        'end_date',
        'total',
        'created_at',
        'updated_at',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function salaryItems()
    {
        return $this->hasMany(SalaryItems::class);
    }
}
