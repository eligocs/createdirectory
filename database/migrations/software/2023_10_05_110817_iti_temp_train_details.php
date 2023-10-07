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
        Schema::create('iti_temp_train_details', function (Blueprint $table) {
            $table->id('id_temp');
            $table->unsignedBigInteger('iti_id');
            $table->integer('in_itinerary')->default(1)->comment('0=false,1=true');
            $table->string('t_trip_type', 200)->nullable()->comment('round/oneway');
            $table->string('train_name', 200)->nullable();
            $table->string('train_number', 200)->nullable();
            $table->string('t_dep_city', 200)->nullable();
            $table->string('t_arr_city', 200)->nullable();
            $table->string('t_arr_time', 200)->nullable();
            $table->string('t_dep_date', 200)->nullable();
            $table->string('t_return_date', 200)->nullable();
            $table->string('t_return_arr_date', 30)->nullable()->comment('train return arrival date time');
            $table->string('t_passengers', 100)->nullable();
            $table->string('train_class', 200)->nullable();
            $table->string('t_cost', 200)->nullable();
            $table->timestamps(0); // Use 0 for Laravel 7 and later
            $table->text('train_other_details')->nullable();
            $table->text('return_train_name')->nullable();
            $table->unsignedBigInteger('amdId');

            //$table->foreign('iti_id')->references('iti_id')->on('itinerary'); // Assuming 'itinerary' is the related table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_temp_train_details');
    }
};
