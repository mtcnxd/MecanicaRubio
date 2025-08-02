<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryItems extends Model
{
    use HasFactory;

    protected $table = 'salaries_details';

    protected $hidden = [
        'number',
    ];

    public function salary()
    {
        $this->belongsTo(Salary::class, 'salary_id');
    }
}
