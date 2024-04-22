<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use DB;

class ControllerEmployees extends Controller
{
    public function store(Request $request)
    {
        if ($request->password != $request->repeat){
            return to_route('profile')->with('error', 'Las contraseñas no coinciden');
        }
        
        Employee::create($request->all());

        return to_route('profile')->with('message', 'Los datos se guardaron correctamente');
    }
}
