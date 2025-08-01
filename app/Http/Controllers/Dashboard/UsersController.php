<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();

        return view('dashboard.users.create', compact('employees'));
    }
}
