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
            $table->integer('client_id');
            $table->integer('car_id');
            $table->integer('odometer')->nullable();
            $table->string('service_type')->nullable();
            $table->text('fault');
            $table->text('comments')->nullable();
            $table->string('status')->default('Pendiente');
            $table->text('notes')->nullable();
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
