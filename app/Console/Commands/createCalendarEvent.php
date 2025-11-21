<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Calendar;
use Illuminate\Console\Command;

class createCalendarEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-calendar-event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $services = Service::where('created_at','>', Carbon::now()->subDays(10))
            ->whereIn('service_type',['Mayor','Menor'])
            ->get();

        foreach ($services as $service){
            $this->createCalendarEvent($service);
        }

        echo 'Process finished'.PHP_EOL;
    }

    protected function createCalendarEvent($service)
    {
        $eventFound = Calendar::where('client_id', $service->client_id)->where('car_id', $service->car_id)->first();

        if (!$eventFound){
            Calendar::insert([
                'name'          => 'Mantenimiento programado',
                'description'   => 'Mantenimiento programado',
                'client_id'     => $service->client_id,
                'car_id'        => $service->car_id,
                'event_date'    => Carbon::parse($service->finished_date)->addMonths(5),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
