<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = [
        'user_id',
        'status',
        'type',
        'start_date',
        'end_date',
        'paid_date',
        'total',
        'updated_at',
        'created_at',
    ];

    protected $dates = [
        'paid_date',
        'start_date',
        'end_date',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function PayrollItems()
    {
        return $this->hasMany(PayrollItems::class, 'salary_id');
    }

    public function getTotalCurrentMonth()
    {
        $lastCloseDate = DB::table('montly_balances')->orderBy('id', 'desc')->first()->close_date;
        
        return $this->select(Payroll::raw('SUM(total) as total'))
            ->where('paid_date', $lastCloseDate)
            ->first()->total;
    }
}
