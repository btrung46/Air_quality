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
        Schema::create('air_datas', function (Blueprint $table) {
           $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->double('temperature', 8, 2)->nullable();
            $table->double('humidity', 8, 2)->nullable();
            $table->double('CO', 8, 2)->nullable();
            $table->double('O3', 8, 2)->nullable();
            $table->double('PM2_5', 8, 2)->nullable();
            $table->double('CO2', 8, 2)->nullable();
            $table->double('TVOC', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('air_data');
    }
};
