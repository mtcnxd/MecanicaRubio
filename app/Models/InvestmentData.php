<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentData extends Model
{
    use HasFactory;

    protected $table = 'investments_data';

    protected $fillable = [
        'investment_id',
        'amount',
    ];

    protected $dates = [
        'updated_at',
        'created_at'
    ];

    public function getAmountByDaysAgo($daysAgo)
    {
        $result = InvestmentData::where('date', now()->subDays($daysAgo)->format('Y-m-d'))->first();

        if ($result){
            return $result->amount;
        }

        return 0;
    }
}
