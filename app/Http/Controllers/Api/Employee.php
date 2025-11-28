<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee as EmployeeModel;
use App\Models\Client;

class Employee extends Controller
{
    public function loadAll(Request $request, EmployeeModel $employee)
    {
        $employee = $employee->with('user')
            ->join('users', 'employees.user_id', 'users.id')
            ->where('users.id', $request->employee)
            ->first();

        return Response()->json([
            "success" => true,
            "message" => "Employee loaded successfully",
            "data"    => $employee
        ]);
    }

    public function delete(Request $request)
    {
        try {
            Client::where('id', $request->client)->update([
                "status" => 'Eliminado'
            ]);

            sleep(random_int(1,5));
    
            return Response()->json([
                "success" => true,
                "message" => 'El usuario a sido eliminado',
                "data"    => $request->all()
            ]);
        }

        catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "message" => 'Ocurrio un error: ' . $e->getMessage(),
                "data"    => $request->all()
            ]);
        }
    }
}
