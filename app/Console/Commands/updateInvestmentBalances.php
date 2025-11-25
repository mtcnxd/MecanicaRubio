<?php

namespace App\Console\Commands;

use App\Models\Investment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Notifications\Telegram;
use Carbon\Carbon;

class updateInvestmentBalances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-investment-balances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Telegram $telegram)
    {
        try {
            Investment::all()->each(function ($investment) {
                DB::table('assets_increment')->insert([
                    'investment_id' => $investment->id,
                    'amount' => $investment->investmentData->last()->amount,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            });
    
            $telegram->send(
                sprintf('Process finished at %s', Carbon::now())
            );        
        }

        catch (\Exception $e){
            $telegram->send(
                sprintf('Error while updating data | Error: %s', $e->getMessage())
            );
        }
    }
}
