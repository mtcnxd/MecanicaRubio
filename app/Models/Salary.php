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
        'updated_at',
        'created_at',
    ];

    protected $hidden = [
        'blocked',
        'updated_at',
        'created_at',
    ];

    protected $casts = [
        'paid_date' => 'date'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function salaryDetails()
    {
        return $this->hasMany(SalaryItems::class, 'salary_id');
    }
}
