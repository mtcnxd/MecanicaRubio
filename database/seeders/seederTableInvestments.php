<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seederTableInvestments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('investments')->insert([
            [
                'name' => 'Yo te presto',
                'last_amount' => 0,
                'current_amount' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Doopla',
                'last_amount' => 0,
                'current_amount' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'GBM Trading',
                'last_amount' => 0,
                'current_amount' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Nu Bank',
                'last_amount' => 0,
                'current_amount' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
