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
            $table->integer('user_id');
            $table->enum('status',['Pendiente', 'Pagado', 'Cancelado'])->default('Pendiente');
            $table->enum('type',['Nomina','Aguinaldo','Finiquito','Liquidacion','Otras percepciones'])->default('Nomina');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('paid_date')->nullable();
            $table->double('total');
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
