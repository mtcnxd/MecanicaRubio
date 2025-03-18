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

        DB::table('brands')->insert([
            'brand'      => 'BMW',
            'premium'    => true,
        ]);
    }
}
