<?php

namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class seederTableUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'  => 'Marcos Tzuc Cen',
            'phone' => '9991112233',
            'email' => 'mtc.nxd@gmail.com',
            'password' => Hash::make('nodoubt'),
            'status' => 'Activo',
            'rol'    => 'Admin',
            'remember_token' => false,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
