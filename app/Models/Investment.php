<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Investment extends Model
{
    use HasFactory;

    protected $table = 'investments';

    protected $fillable = [
        'name',
        'amount',
        'active',
    ];

    public function investmentData()
    {
        return $this->hasMany(InvestmentData::class, 'investment_id');
    }

    public function investmentPercentage()
    {
        $total = $this->sum('current_amount');
        $value = $this->current_amount;
        return ($value/$total) * 100;
    }

    public function differenceBetweenDeposits()
    {
        return ($this->current_amount - $this->last_amount);
    }

    public static function getInvestmentPercentageMonthAgo()
    {
        $last = DB::table('chart_assets_increment')
            ->where('export_date', now()->format('Y-m-d'))
            ->first()->amount;
        
        $first = DB::table('chart_assets_increment')
            ->where('export_date', now()->subDays(2)->format('Y-m-d'))
            ->first()->amount;

        return ($last - $first);
    }
}
