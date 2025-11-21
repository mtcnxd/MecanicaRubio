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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->boolean('quote')->default(false);
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('car_id');
            $table->unsignedBigInteger('odometer')->nullable();
            $table->string('service_type',32)->nullable();
            $table->text('fault')->nullable();
            $table->text('comments')->nullable();
            $table->string('status')->default('Pendiente');
            $table->text('notes')->nullable();
            $table->date('entry_date')->nullable();
            $table->date('finished_date')->nullable();
            $table->date('due_date')->nullable();
            $table->double('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
