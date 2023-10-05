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
        Schema::create('iti_befor_train_details', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
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
            $table->timestamps();
            $table->text('train_other_details')->nullable();
            $table->text('return_train_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_befor_train_details');
    }
};
