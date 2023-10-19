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
        Schema::create('hotel_room_rates', function (Blueprint $table) {
            $table->increments('htr_id');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->integer('hotel_id');
            $table->string('hotel_name', 100);
            $table->integer('season_id');
            $table->integer('room_cat_id');
            $table->integer('meal_plan_id');
            $table->string('room_rates', 20);
            $table->string('extra_bed_rate', 20);
            $table->string('extra_bed_rate_child', 10);
            $table->integer('del_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_room_rates');

    }
};
