<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::statement("
            CREATE view services_view AS
            SELECT 
                `services`.`id` AS `service_id`,
                `services`.`client_id` AS `client_id`,
                `services`.`car_id` AS `car_id`,
                `services`.`fault` AS `fault`,
                `clients`.`name` AS `name`,
                concat(`autos`.`brand`,' ',`autos`.`model`) AS `car`,
                `services`.`entry_date` AS `entry_date`,
                `services`.`finished_date` AS `finished_date`,
                `services`.`status` AS `status`,
                `services`.`total` AS `total` 
            FROM `services` 
            JOIN `autos` ON `services`.`car_id` = `autos`.`id` 
            JOIN `clients` ON `services`.`client_id` = `clients`.`id` 
            WHERE `services`.`quote` = 0
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("DROP VIEW IF EXISTS services_view");
    }
};
