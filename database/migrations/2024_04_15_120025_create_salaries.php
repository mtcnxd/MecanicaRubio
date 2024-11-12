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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('salary');
            $table->integer('hours')->nullable();
            $table->integer('price')->nullable();
            $table->text('bonds_comment')->nullable();
            $table->integer('bonds')->nullable();
            $table->text('discount_comment')->nullable();
            $table->integer('discount')->nullable();
            $table->enum('status',['Pendiente', 'Pagado', 'Cancelado'])->default('Pendiente');
            $table->date('date_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
