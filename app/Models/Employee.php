<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'salary',
        'extra',
        'depto',
        'rfc',
        'curp',
        'nss',
        'comments'
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'user_id');
    }

    public function vacations()
    {
        return DB::table('vacations_pendings')
            ->where('employee_id', $this->id)
            ->first();
    }

    public function vacationsDaysTaken()
    {
        return DB::table('vacations_history')
            ->where('employee_id', $this->id)
            ->orderBy('date')
            ->get();
    }
}
