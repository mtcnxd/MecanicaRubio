<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Database\Seeders\seederTableUsers;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            seederTableUsers::class
        ]);
    }
}
