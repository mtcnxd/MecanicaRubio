<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacationsProcessor extends Controller
{
    public static function Information($employeeId) : array
    {
        return [
            'current' => self::vacationsDaysLeft($employeeId),
            'history' => self::vacationsHistory($employeeId),
        ];
    }

    public static function vacationsPerYear($activeYears)
    {
        return DB::table('settings_vacations')
            ->where('name', sprintf('year%s', $activeYears))
            ->first()
            ->value;
    }

    public static function vacationsDaysLeft($employeeId) : int
    {
        $daysLeft = 0;
        $employee = Employee::find($employeeId);

        if($employee){
            $activeYears = Carbon::parse($employee->start_date)->diffInYears(Carbon::now());
            $daysLeft = self::vacationsPerYear($activeYears);
        }
        
        return $daysLeft;
    }

    public static function vacationsHistory($employeeId)
    {
        return DB::table('employees_vacations')->where('employee_id', $employeeId)->get();
    } 
}
