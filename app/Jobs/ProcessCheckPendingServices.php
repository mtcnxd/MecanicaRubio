<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use DB;

class ProcessCheckPendingServices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        # select a.*, b.name, b.phone 
        # from  a join clients b on a.client_id = b.id 
        # where fault like ('%%') 
        # and a.created_at < now() interval 1 month;

        // DB::table('services')
        //  ->select('services.*, clients.name, clients.phone, clients.email')
        //  ->join('clients', 'services.client_id', 'clients.id')
        //  ->whereLike('%mantenimiento menor%)
        //  ->where('created_at','<', Carbon::now()->subDays(150))
        //  ->get();

        DB::table('salaries')->delete(); 
    }
}
