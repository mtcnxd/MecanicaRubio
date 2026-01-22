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
        Schema::create('vacations_history', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->enum('type', ['Vacaciones', 'Permiso', 'Salud'])->default('Vacaciones');
            $table->date('date');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacations_history');
    }
};
