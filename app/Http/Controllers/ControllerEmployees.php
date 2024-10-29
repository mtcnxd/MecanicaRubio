<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use DB;

class ControllerEmployees extends Controller
{
    public function store(Request $request)
    {
        Employee::create($request->all());

        if ($request->create == 'on')
        {
            if ($request->password != $request->repeat){
                return to_route('profile')
                    ->with('error', 'Las contraseñas no coinciden');
            }

            User::create([
                'email'    => $request->email,
                'password' => md5($request->password),
            ]);
        }

        return to_route('profile')
            ->with('message', 'Los datos se guardaron correctamente');
    }

    public static function operation()
    {
        $errorInterno = true;
        try {
            if (!self::connect())
            {
                throw new Exception("Error Processing operation");
            }
            
            if ($errorInterno)
            {
                throw new Exception("Error Processing operation");
            }

            return "exito";

        } catch(Exception $e){
            throw new Exception($e->getMessage());
        }

    }

    public static function connect()
    {
        # throw new Exception("Error Processing connection");
        return true;
    }
}
