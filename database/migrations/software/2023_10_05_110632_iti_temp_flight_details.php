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
        Schema::create('iti_temp_flight_details', function (Blueprint $table) {
            $table->id('id_temp');
            $table->unsignedBigInteger('iti_id');
            $table->integer('in_itinerary')->default(1)->comment('0=false,1=true');
            $table->string('trip_type', 200)->comment('round/oneway');
            $table->string('flight_name', 200);
            $table->string('flight_price', 200);
            $table->string('dep_city', 200)->nullable();
            $table->string('arr_city', 200)->nullable();
            $table->string('arr_time', 200)->nullable();
            $table->string('dep_date', 200)->nullable();
            $table->string('return_date', 200)->nullable();
            $table->string('return_arr_date', 30)->nullable();
            $table->string('total_passengers', 50)->nullable();
            $table->string('flight_class', 200)->nullable();
            $table->timestamps(0); // Use 0 for Laravel 7 and later
            $table->text('flight_other_details')->nullable();
            $table->text('return_flight_name')->nullable();
            $table->longText('multicity_data')->nullable();
            $table->unsignedBigInteger('amdId');

            //$table->foreign('iti_id')->references('iti_id')->on('itinerary'); // Assuming 'itinerary' is the related table
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_temp_flight_details');
    }
};
