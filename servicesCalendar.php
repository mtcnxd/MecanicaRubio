<?php
require __DIR__ . '/vendor/autoload.php';

$app 	= require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

# Laravel main code start here

use App\Http\Controllers\Notifications\Telegram;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$results = DB::table('services_calendar_view')
	->where('days_after','>', 20)
	->get();

foreach($results as $row){
	$service_date = Carbon::now()->addDays(3);

	$exists = DB::table('calendar')
		->where('car_id', $row->car_id)
		->where('date', $service_date->format('Y-m-d'))
		->first();
		
	if (!$exists){
		DB::table('calendar')->insert([
			"event" 	  => 'Mantenimiento programado', 
			"description" => 'Mantenimiento: '. $row->car,
			"client_id"	  => $row->client_id,
			"car_id"	  => $row->car_id,
			"date"		  => $service_date,
			"status"	  => 'Pendiente',
			"notified"	  => 1,
			"created_at"  => Carbon::now(),
			"updated_at"  => Carbon::now()
		]);
		
		Telegram::send(
			sprintf ("<b>New service programmed:</b> %s <b>Client:</b> %s <b>Car:</b> %s", $service_date->format('d-m-Y'), $row->name, $row->car)
		);

		continue;
	}

	$diffInDays = Carbon::parse($exists->created_at)->diffInDays(Carbon::now());

	if ($diffInDays == 5){
		Telegram::send(
			sprintf ("<b>Second reminder sended:</b> %s <b>Car:</b> %s", $row->name, $row->car)
		);

		DB::table('calendar')->where('id', $row->id)->update([
			"notified"   => 2,
			"updated_at" => Carbon::now()
		]);

		continue;
	}

	if ($diffInDays == 10){
		Telegram::send(
			sprintf ("<b>Thirth reminder sended:</b> %s <b>Car:</b> %s", $row->name, $row->car)
		);

		DB::table('calendar')->where('id', $row->id)->update([
			"notified"   => 3,
			"updated_at" => Carbon::now()
		]);

		continue;
	}

	if ($diffInDays >= 15){
		DB::table('calendar')->where('id', $row->id)->update([
			"status"	 => 'Cancelado',
			"updated_at" => Carbon::now()
		]);
	}
}
