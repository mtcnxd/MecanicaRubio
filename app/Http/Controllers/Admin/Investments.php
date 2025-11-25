<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;

class Investments extends Controller
{
    public function show(string $investment_id, Investment $investment)
    {
        $investment = $investment->find($investment_id);

        return view('admin.investments.show', 
            compact('investment')
        );
    }
}
