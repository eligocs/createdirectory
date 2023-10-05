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
        Schema::create('attraction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('city');
            $table->longText('hot_des')->nullable();
            $table->longText('description')->nullable();
            $table->string('attractionimage', 255)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->timestamps();

            $table->foreign('state')->references('id')->on('states'); // Assuming you have a 'states' table
            $table->foreign('city')->references('id')->on('cities'); // Assuming you have a 'cities' table
            $table->foreign('country_id')->references('id')->on('countries'); // Assuming you have a 'countries' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction');
    }
};
