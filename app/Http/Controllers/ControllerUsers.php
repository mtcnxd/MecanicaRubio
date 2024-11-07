<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ControllerUsers extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.users', compact('users'));
    }

    public function create()
    {
        return "create new user";
    }

    public function store()
    {


    }
}
