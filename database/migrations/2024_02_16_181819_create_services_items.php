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
        Schema::create('services_items', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('amount');
            $table->string('item');
            $table->string('supplier')->nullable();
            $table->boolean('labour')->default(false);
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_items');
    }
};
