<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->insert([
            'name'       => 'Marcos Tzuc Cen',
            'address'    => 'Col. San Jose Vergel',
            'city'       => 'Merida',
            'state'      => 'Yucatan',
            'phone'      => '9991210261',
            'rfc'        => 'TUCM851227ES3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('clients')->insert([
            'name'       => 'Alejandra Lopez Chan',
            'address'    => 'Col. Francisco Villa Ote.',
            'city'       => 'Merida',
            'state'      => 'Yucatan',
            'phone'      => '9991210261',
            'rfc'        => 'TUCM851227ES3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('autos')->insert([
            'brand'      => 'Mercedes Benz',
            'model'      => 'CLA500',
            'year'       => '2015',
            'client'     => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('autos')->insert([
            'brand'      => 'Toyota',
            'model'      => 'Camry',
            'year'       => '2015',
            'client'     => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('brands')->insert([
            'brand'      => 'BMW',
            'premium'    => true,
        ]);
        
        DB::table('brands')->insert([
            'brand'      => 'Mercedes Benz',
            'premium'    => true,
        ]);
    }
}
