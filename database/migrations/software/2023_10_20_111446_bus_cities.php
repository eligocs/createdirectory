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
        Schema::create('bus_cities', function (Blueprint $table) {
            $table->id();
            $table->string('CityId', 200)->nullable();
            $table->string('CityName', 255)->nullable();
            $table->tinyInteger('top_cities')->nullable();
            $table->tinyInteger('priority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_cities');
    }
};
