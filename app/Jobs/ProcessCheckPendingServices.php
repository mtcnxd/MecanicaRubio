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
        $services = DB::table('services')
            ->where('fault','like', '%mantenimiento menor%')
            ->get();

        foreach($services as $service){
            DB::table('calendar')->insert([
                'event'       => 'Mantenimiento programado',
                'description' => 'Llamar cliente por mantenimiento programado',
                'client_id'   => $service->client_id,
                'date'        => Carbon::now()->format('Y-m-d'),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);

            # Enviar correo electronico y mensaje por whatsapp
        }
    }
}
