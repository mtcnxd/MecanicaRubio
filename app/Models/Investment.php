<?php

namespace App\Models;

use App\Http\Controllers\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected static function getAmountByDaysAgo($daysAgo)
    {
        $amount = DB::table('chart_assets_increment')
            ->where('export_date', now()->subDays($daysAgo)->format('Y-m-d'))
            ->first();

        if ($amount){
            return $amount->amount;
        }

        return 0;
    }

    public static function getInvestmentAmountMonthAgo()
    {
        $first = self::getAmountByDaysAgo(1);
        $last  = self::getAmountByDaysAgo(10);

        return  ($first - $last);
    }

    public static function getInvestmentPercentageMonthAgo()
    {
        $first = self::getAmountByDaysAgo(1);
        $last  = self::getAmountByDaysAgo(10);

        return Helpers::convertToPercentage($first, $last);
    }
}
