<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'description',
        'amount',
        'price',
        'status',
        'responsible',
        'total',
        'expense_date',
        'attach',
    ];

    protected $dates = [
        'expense_date',
    ];

    public function getAttachAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getTotalCurrentMonth()
    {   
        $total = $this->select(Expense::raw('SUM(amount * price) as total'))
            ->whereMonth('expense_date', now()->month)
            ->first()->total;

        if ($total){
            return $total;
        }

        return 0.0;
    }
}
